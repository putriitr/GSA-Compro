    <?php

    use App\Http\Controllers\Admin\MasterData\BidangPerusahaanController;
    use App\Http\Controllers\Admin\MasterData\KategoriController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Admin\Member\MemberController;
    use App\Http\Controllers\Admin\FAQ\FAQController;
    use App\Http\Controllers\Admin\Monitoring\MonitoringController;
    use App\Http\Controllers\Admin\Parameter\CompanyParameterController;
    use App\Http\Controllers\Admin\Produk\ProdukController;
    use App\Http\Controllers\Member\Portal\PortalController;
    use App\Http\Controllers\Member\Produk\ProdukMemberController;
    use App\Http\Controllers\Admin\Slider\SliderController;
    use App\Http\Controllers\Admin\Activity\ActivityController;
    use App\Http\Controllers\Member\Activity\ActivityMemberController;
    use App\Http\Controllers\Admin\BrandPartner\BrandPartnerController;
    use App\Http\Controllers\Admin\Meta\MetaController;
    use App\Http\Controllers\Member\Meta\MetaMemberController;
    use App\Http\Controllers\Member\Profile\ProfileMemberController;
    use App\Http\Controllers\Admin\Location\LocationController;
    use App\Http\Controllers\Admin\Visitor\VisitorController;
    use App\Http\Controllers\Guest\Message\GuestMessageController;
    use App\Http\Controllers\Member\Location\LocationMemberController;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use App\Http\Controllers\Admin\QnaGuest\QnaGuestController;
    use App\Http\Controllers\Member\QnaGuest1\QnaGuest1Controller;
    use App\Http\Controllers\ContactPageController;
    use App\Http\Controllers\Admin\Activity\CategoryActivityController;
    use App\Http\Controllers\Distributor\PortalDistributor\PortalDistributorController;
    use App\Exports\CustomerReportExport;
    use Maatwebsite\Excel\Facades\Excel;
    use App\Http\Controllers\Distributor\CustomerReportController;
    use App\Http\Controllers\Distributor\DistributorController;
    use App\Http\Controllers\Vendor\VendorController;
    use App\http\Controller\Admin\Ticketing\TicketingController;
    use App\Http\Controllers\Member\Ticketing\TicketingMemberController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    */


    // Guest Routes (No Authentication Required)
    Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');
        // Rute lainnya
        Route::get('/products', [ProdukMemberController::class, 'index'])->name('product.index');
        Route::get('/products/category/{id}', [ProdukMemberController::class, 'index'])->name('product.category');
        Route::get('/product/{id}', [ProdukMemberController::class, 'show'])->name('product.show');

        Route::get('/products/search', [ProdukMemberController::class, 'search'])->name('products.search');
        Route::post('/products/search', [ProdukMemberController::class, 'search'])->name('products.search');

        Route::get('/products/filter/{id}', [ProdukMemberController::class, 'filterByCategory'])->name('filterByCategory');
        Route::get('/member/activities', [ActivityMemberController::class, 'activity'])->name('member.activity');
        Route::get('/member/activities/{activity}', [ActivityMemberController::class, 'show'])->name('member.activity.detail-act');
        Route::get('/member/meta/{slug}', [MetaMemberController::class, 'showMetaBySlug'])->name('member.meta.show');
        Route::get('/member/meta', [MetaMemberController::class, 'showMeta'])->name('member.meta.index');
        Route::get('/locations', [LocationMemberController::class, 'index']);
        Route::get('/admin/guest-messages', [GuestMessageController::class, 'index'])->name('admin.guest-messages.index');
        Route::post('/guest-messages', [GuestMessageController::class, 'store'])->name('guest-messages.store');

        // Member QnA Guest
        Route::get('/qnaguest1', [QnaGuest1Controller::class, 'index'])->name('qnaguest1');

        // Admin Qna Guest
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('qnaguest', QnaGuestController::class);
        });

        Auth::routes();
    });

    // Member Routes (Authenticated Users with "member" role)
    Route::middleware(['auth', 'user-access:member'])->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
            Route::resource('ticketings', TicketingMemberController::class);

            // Ticketing Management
            Route::post('ticketings/{ticketing}/batal', [TicketingMemberController::class, 'destroy'])->name('ticketings.batal');

            // Portal Access
            Route::get('/portal', [PortalController::class, 'index'])->name('portal');
            Route::get('/profile', [ProfileMemberController::class, 'show'])->name('profile.show');
            // Route::get('/portal/ticketing', function () {
            //     return view('member.ticketing.index');
            // })->name('portal.ticketing');
            Route::get('/portal/ticketing', [TicketingMemberController::class, 'ticketing'])->name('member.portal.ticketing');


            // Additional Portal routes
            $portalRoutes = [
                'user-product' => 'UserProduk',
                'photos' => 'photos',
                'instructions' => 'instructions',
                'tutorials' => 'videos',
                'controlgenerations' => 'ControllerGenerations',
                'document' => 'document',
                'qna' => 'aftersalesService',
                'monitoring' => 'Monitoring',
            ];

            foreach ($portalRoutes as $uri => $method) {
                Route::get("/portal/{$uri}", [PortalController::class, $method])->name("portal.{$uri}");
            }

            Route::get('/portal/monitoring/detail/{userProduk}', [PortalController::class, 'showInspeksiMaintenance'])->name('portal.monitoring.detail');

            // Profile Management
            Route::get('/profile/edit', [ProfileMemberController::class, 'edit'])->name('profile.edit');
            Route::put('/profile/update', [ProfileMemberController::class, 'update'])->name('profile.update');
        });
    });


    // Distributor Routes (Authenticated Users with "distributor" role)
    Route::middleware(['auth', 'user-access:distributor'])->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
            Route::get('/dist-portal', [PortalDistributorController::class, 'index'])->name('dist-portal')->middleware('role:distributor');
            Route::get('/dist-portal/dist-report', [PortalDistributorController::class, 'customerReport'])->name('dist-report');
            Route::get('/dist-portal/dist-quotation', [PortalDistributorController::class, 'quotation'])->name('dist-quotation');
            Route::get('/dist-portal/dist-proforma', [PortalDistributorController::class, 'proformaInvoice'])->name('dist-proforma');
            Route::get('/dist-portal/dist-invoice', [PortalDistributorController::class, 'invoice'])->name('dist-invoice');
            Route::get('/dist-portal/dist-service', [PortalDistributorController::class, 'aftersalesService'])->name('dist-service');

            // Rute tambahan untuk laporan pelanggan dan ekspor laporan
            Route::get('/dist-portal/customer-report', [PortalDistributorController::class, 'customerReport'])->name('customer-report');
            Route::get('/dist-portal/export-customer-report', [PortalDistributorController::class, 'exportCustomerReport'])->name('customer-report.export');
        });
    });

    // Vendor Routes (Authenticated Users with "vendor" role)
    Route::middleware(['auth', 'user-access:vendor'])->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
            Route::get('/vendor-portal', [VendorController::class, 'index'])->name('vendor-portal')->middleware('role:distributor');
        });
    });

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
            Route::resource('admin/ticketings', TicketingController::class)->names('admin.ticketings');

            Route::post('admin/ticketings/{ticketing}/process', [TicketingController::class, 'process'])->name('admin.ticketings.process');
            Route::post('admiFn/ticketings/{ticketing}/complete', [TicketingController::class, 'complete'])->name('admin.ticketings.complete');

            Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

            Route::resource('admin/activity/category-activity', CategoryActivityController::class)->names('admin.activity.category-activity');
            Route::put('/admin/activity/{activity}', [ActivityController::class, 'update'])->name('admin.activity.update');
            Route::resource('admin/members', MemberController::class);
            Route::get('members/{id}/add-products', [MemberController::class, 'addProducts'])->name('members.add-products');
            Route::post('members/{id}/store-products', [MemberController::class, 'storeProducts'])->name('members.store-products');
            Route::get('members/{id}/edit-products', [MemberController::class, 'editProducts'])->name('members.edit-products');
            Route::put('members/{id}/update-products', [MemberController::class, 'updateProducts'])->name('members.update-products');
            Route::post('/members/{id}/update-password', [MemberController::class, 'updatePassword'])->name('members.updatePassword');
            Route::post('/admin/validate-password', [MemberController::class, 'validatePassword'])->name('admin.validatePassword');

            Route::resource('admin/distributors', DistributorController::class);

            Route::get('admin/monitoring', [MonitoringController::class, 'index'])->name('admin.monitoring.index');
            Route::get('admin/monitoring/{id}', [MonitoringController::class, 'show'])->name('admin.monitoring.show');
            Route::get('monitoring/{id}', [MonitoringController::class, 'monitoringDetail'])->name('monitoring.detail');
            Route::get('admin/monitoring/create/{userProdukId}', [MonitoringController::class, 'create'])->name('admin.monitoring.create');
            Route::post('admin/monitoring/store', [MonitoringController::class, 'store'])->name('admin.monitoring.store');
            Route::get('admin/monitoring/{id}/edit', [MonitoringController::class, 'edit'])->name('admin.monitoring.edit');
            Route::put('admin/monitoring/{id}', [MonitoringController::class, 'update'])->name('admin.monitoring.update');

            Route::prefix('admin/inspeksi')->name('admin.inspeksi.')->group(function () {
                Route::get('/{userProdukId}', [MonitoringController::class, 'inspeksiIndex'])->name('index');
                Route::get('/create/{userProdukId}', [MonitoringController::class, 'inspeksiCreate'])->name('create');
                Route::post('/store/{userProdukId}', [MonitoringController::class, 'inspeksiStore'])->name('store');
                Route::get('/edit/{id}', [MonitoringController::class, 'inspeksiEdit'])->name('edit');
                Route::put('/update/{id}/{userProdukId}', [MonitoringController::class, 'inspeksiUpdate'])->name('update');
                Route::delete('/destroy/{id}', [MonitoringController::class, 'inspeksiDestroy'])->name('destroy');
                Route::get('/show/{id}', [MonitoringController::class, 'inspeksiShow'])->name('show');
            });

            Route::get('/admin/visitors', [VisitorController::class, 'index'])->name('admin.visitors');
            Route::resource('admin/produk', ProdukController::class)->names('admin.produk');
            Route::resource('admin/parameter', CompanyParameterController::class);
            Route::resource('admin/bidangperusahaan', BidangPerusahaanController::class);
            Route::resource('admin/kategori', KategoriController::class)->names('admin.kategori');
            Route::resource('admin/faq', FAQController::class)->names('admin.faq');
            Route::resource('admin/slider', SliderController::class)->names('admin.slider');
            Route::resource('admin/activity', ActivityController::class)->names('admin.activity');
            Route::resource('admin/brand', BrandPartnerController::class)->names('admin.brand');
            Route::resource('admin/meta', MetaController::class)->names('admin.meta');
            Route::post('/froala/upload_image', [MetaController::class, 'uploadImage'])->name('froala.upload_image');
            Route::resource('admin/location', LocationController::class)->names('admin.location');
        });
    });
