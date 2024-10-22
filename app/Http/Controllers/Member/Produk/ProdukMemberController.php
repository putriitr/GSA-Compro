<?php

namespace App\Http\Controllers\Member\Produk;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProdukMemberController extends Controller
{
    /**
     * Display a listing of the products, optionally filtered by category.
     *
     * @param int|null $categoryId
     * @return \Illuminate\View\View
     */
    public function index($categoryId = null)
    {
        // Get all categories
        $kategori = Kategori::all();

        // Check if a category is selected; filter products accordingly
        if ($categoryId) {
            $produks = Produk::where('kategori_id', $categoryId)->paginate(9);
            $selectedCategory = Kategori::find($categoryId);
        } else {
            $produks = Produk::paginate(9);
            $selectedCategory = null;
        }

        return view('member.product.product', compact('produks', 'kategori', 'selectedCategory'));
    }

    public function search(Request $request)
    {
        // $query = $request->input('search');
        $kategori = Kategori::all();
        $keyword = $request->keyword;

        // Validasi atau logika pencarian produk
        $produks = Produk::where('nama', 'LIKE', '%' . $keyword . '%')->get();

        // Log::channel('stderr')->info("test");
        // error_log(json_encode($produks));
        // exit();
        $selectedCategory = null;

        return view('member.product.product', compact('produks', 'kategori', 'selectedCategory'));

        // return response()->json($produks);
    }


    /**
     * Filter products by the selected category.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function filterByCategory($id)
    {
        // Get all categories for the sidebar
        $kategori = Kategori::all();

        // Filter products by the selected category
        $produks = Produk::where('kategori_id', $id)->paginate(9); // Added pagination for consistency

        // Get the selected category for highlighting
        $selectedCategory = Kategori::find($id);

        return view('member.product.product', compact('produks', 'kategori', 'selectedCategory'));
    }

    /**
     * Display the specified product's details.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Fetch the product details by ID
        $produk = Produk::findOrFail($id);

        // Get similar products based on category, excluding the current product
        $produkSerupa = Produk::where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $id) // Exclude the current product
            ->take(4) // Limit to 4 similar products
            ->get();

        return view('member.product.detail', compact('produk', 'produkSerupa'));
    }
}
