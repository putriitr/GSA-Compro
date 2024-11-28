<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use App\Models\UserProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('type', 3);

        if ($request->has('search') && $request->search !== null) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nama_perusahaan', 'like', "%{$search}%");
            });
        }

        $vendors = $query->paginate(10);

        return view('Admin.Vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('Admin.Vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'nama_perusahaan' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $randomPassword = Str::random(8);

        $vendor = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
            'type' => 3,
            'nama_perusahaan' => $request->nama_perusahaan ?? '',
            'no_telp' => $request->no_telp ?? '',
            'alamat' => $request->alamat ?? '',
        ]);

        session()->flash('password', $randomPassword);

        return redirect()->route('admin.vendors.show', $vendor->id);
    }

    public function show($id)
    {
        $vendor = User::findOrFail($id);
        $password = session('password') ?? 'Password tidak tersedia';

        return view('Admin.Vendors.show', compact('vendor', 'password'));
    }

    public function edit($id)
    {
        $vendor = User::findOrFail($id);
        return view('Admin.Vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'nama_perusahaan' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $vendor = User::findOrFail($id);

        $vendor->update([
            'name' => $request->name,
            'email' => $request->email,
            'nama_perusahaan' => $request->nama_perusahaan ?? '',
            'no_telp' => $request->no_telp ?? '',
            'alamat' => $request->alamat ?? '',
        ]);

        if ($request->filled('password')) {
            $vendor->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        $vendor = User::findOrFail($id);
        $vendor->delete();

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted successfully.');
    }

    public function addProducts($id)
    {
        $vendor = User::findOrFail($id);
        $produks = Produk::all(); // Mendapatkan semua produk yang tersedia

        return view('Admin.Vendors.add-products', compact('vendor', 'produks'));
    }

    public function storeProducts(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'produk_id' => 'required|array|min:1', // Ensure at least one product is selected
            'produk_id.*' => 'exists:produk,id', // Validate that each selected product exists
            'pembelian.*' => 'nullable|date', // Optional date validation
        ], [
            'produk_id.required' => 'Please select at least one product.',
        ]);

        // Find the vendor
        $vendor = User::findOrFail($id);

        // Save the selected products and purchase dates
        foreach ($request->produk_id as $produk_id) {
            $pembelianDate = $request->pembelian[$produk_id] ?? null;

            // Save the product to the user_produk table
            UserProduk::create([
                'user_id' => $vendor->id,
                'produk_id' => $produk_id,
                'pembelian' => $pembelianDate,
            ]);
        }

        return redirect()->route('admin.vendors.show', $vendor->id)->with('success', 'Products added to vendor successfully.');
    }

    public function editProducts($id)
    {
        $vendor = User::with('userProduk')->findOrFail($id);

        $userProduks = $vendor->userProduk;

        return view('Admin.Vendors.edit-products', compact('vendor', 'userProduks'));
    }


    public function updateProducts(Request $request, $id)
    {
        $request->validate([
            'produk_id.*' => 'exists:produk,id',
            'pembelian.*' => 'nullable|date', // Allow null or valid date
        ]);

        $vendor = User::findOrFail($id);

        // Get existing products and purchase dates for comparison
        $existingProducts = $vendor->userProduk->pluck('produk_id')->toArray();
        $existingPurchases = $vendor->userProduk->pluck('pembelian', 'produk_id')->toArray();

        // Prepare submitted products and purchases
        $submittedProducts = $request->produk_id ?? [];
        $submittedPurchases = $request->pembelian ?? [];

        // Compare existing and submitted products
        $productsChanged = array_diff($existingProducts, $submittedProducts) || array_diff($submittedProducts, $existingProducts);
        $purchasesChanged = false;

        foreach ($submittedProducts as $index => $produk_id) {
            $submittedPurchaseDate = $submittedPurchases[$index] ?? null;
            $existingPurchaseDate = $existingPurchases[$produk_id] ?? null;

            if ($submittedPurchaseDate != $existingPurchaseDate) {
                $purchasesChanged = true;
                break;
            }
        }

        // If no changes were made, return with a message
        if (!$productsChanged && !$purchasesChanged) {
            return redirect()->route('admin.vendors.show', $vendor->id)->with('info', 'No changes were made.');
        }

        // If changes detected, remove old products and insert new ones
        UserProduk::where('user_id', $vendor->id)->delete();

        if ($request->has('produk_id')) {
            foreach ($submittedProducts as $index => $produk_id) {
                UserProduk::create([
                    'user_id' => $vendor->id,
                    'produk_id' => $produk_id,
                    'pembelian' => $submittedPurchases[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.vendors.show', $vendor->id)->with('success', 'Products updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['success' => true]);
    }
}
