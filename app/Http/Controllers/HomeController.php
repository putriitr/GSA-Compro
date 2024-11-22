<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Helpers\TranslateHelper;
use App\Models\Activity;
use App\Models\AfterSales;
use App\Models\BrandPartner;
use App\Models\CompanyParameter;
use App\Models\Kategori;
use App\Models\Monitoring;
use App\Models\Slider;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = Produk::take(6)->get();
        $sliders = Slider::all();
        $activities = Activity::all(); // Fetching activities
        $company = CompanyParameter::first(); // Single object, not a collection
        $brand = BrandPartner::where('type', 'brand')->get();
        $partners = BrandPartner::where('type', 'partner')->get();
        $principals = BrandPartner::where('type', 'principal')->get();

        $locale = app()->getLocale();

        // Terjemahkan nama produk
        foreach ($sliders as $slider) {
            $slider->title = TranslateHelper::translate($slider->title, $locale);
            $slider->subtitle = TranslateHelper::translate($slider->subtitle, $locale);
            $slider->button_text = TranslateHelper::translate($slider->button_text, $locale);
            $slider->description = TranslateHelper::translate($slider->description, $locale);
        }

        if ($company) {
            $company->sejarah_singkat = TranslateHelper::translate($company->sejarah_singkat, $locale);
        }

        // Pass the activities variable to the view
        return view('home', compact('produks', 'sliders', 'company', 'brand', 'partners', 'principals', 'activities'));
    }

    public function dashboard(Request $request)
    {
        // Fetch daily visitor data
        $visitorData = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total_visits')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Prepare data for the chart
        $dates = $visitorData->pluck('date')->toArray();
        $visits = $visitorData->pluck('total_visits')->toArray();

        $totalMembers = User::where('type', 'member')->count(); // Count users with type 'member'
        $totalProducts = Produk::count(); // Assuming Product model
        $totalMonitoredProducts = Monitoring::count(); // Assuming Monitoring model
        $totalActivities = Activity::count(); // Assuming Activity model
        $totalTickets = AfterSales::count(); // Total tickets
        $totalDistributors = User::where('type', 2)->count();

        // Filter periode (default: 30 hari terakhir)
        $startDate = $request->input('start_date', now()->subDays(30)->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());

        // Fetch tickets based on status and period
        $ticketData = AfterSales::selectRaw('status, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->get();

        // Prepare data for the ticket chart
        $ticketStatuses = ['Open', 'Closed', 'Pending']; 
        $ticketCounts = [10, 5, 2];

        // Return the view with data
        return view('dashboard', compact(
            'dates',
            'visits',
            'totalMembers',
            'totalProducts',
            'totalMonitoredProducts',
            'totalActivities',
            'totalTickets',
            'totalDistributors',
            'ticketStatuses',
            'ticketCounts',
            'startDate',
            'endDate'
        ));
    }

    public function about()
    {
        $company = CompanyParameter::first();
        $brand = BrandPartner::where('type', 'brand')->get();
        $partners = BrandPartner::where('type', 'partner')->get();  // Filter by 'partner'
        $principals = BrandPartner::where('type', 'principal')->get();  // Filter by 'principal'

        $locale = app()->getLocale();

        if ($company) {
            $company->sejarah_singkat = TranslateHelper::translate($company->sejarah_singkat, $locale);
        }

        if ($company) {
            $company->visi = TranslateHelper::translate($company->visi, $locale);
        }

        if ($company) {
            $company->misi = TranslateHelper::translate($company->misi, $locale);
        }

        return view('member.about.about', compact('company', 'brand', 'partners', 'principals'));
    }
}
