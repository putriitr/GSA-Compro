<body>
    @php
        // Fetch the first record from the company_parameter table
        $compro = \App\Models\CompanyParameter::first();
    @endphp

    @php
        $activeMetas = \App\Models\Meta::where('start_date', '<=', today())
            ->where('end_date', '>=', today())
            ->get()
            ->groupBy('type');

        $brand = \App\Models\BrandPartner::where('type', 'brand', 'nama')->get();
    @endphp

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center p-0">
                <img src="{{ asset('assets/img/logo-gsa2.png') }}" alt="Logo" class="me-2"
                    style="height: auto; width: 150px;">
                <img src="{{ asset('assets/img/catalogue.png') }}" alt="Logo" class="me-2"
                    style="height: auto; width: 100px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">{{ __('messages.home') }}</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('messages.about') }}</a>
                    <a href="{{ route('product.index') }}" class="nav-item nav-link">{{ __('messages.products') }}</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ __('messages.laman') }}</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('member.activity') }}"
                                class="dropdown-item">{{ __('messages.activity') }}</a>
                            @foreach ($activeMetas as $type => $metas)
                                <div class="nav-item dropdown">
                                    @foreach ($metas as $meta)
                                    <a href="{{ route('member.meta.show', $meta->slug) }}"
                                        class="dropdown-item">{{ $meta->title }}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ __('messages.ecommerce') }}</a>
                        <div class="dropdown-menu m-0">
                            <a href="https://gsacommerce.com/" class="dropdown-item" target="_blank">Gsacommerce</a>
                        </div>
                    </div>

                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="memberDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('messages.portal') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="memberDropdown">
                                <li>
                                    <a href="{{ route('portal') }}"
                                        class="dropdown-item">{{ __('messages.portal_member') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('distribution') }}"
                                        class="dropdown-item">{{ __('messages.portal_partner') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('vendor.portal') }}"
                                        class="dropdown-item">{{ __('messages.portal_vendor') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endauth

                    <a href="{{ route('contact') }}" id="contact-link"
                        class="nav-item nav-link">{{ __('messages.contact_us') }}</a>
                </div>

                <div class="team-icon d-flex flex-row me-3">
                    <a class="btn btn-square btn-light rounded-circle mx-1"
                        href="https://maps.app.goo.gl/h3yLB18tBjUKppu28">
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                    <a class="btn btn-square btn-light rounded-circle mx-1" href="mailto:info@gsacommerce.com">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        @if (LaravelLocalization::getCurrentLocale() == 'id')
                            <img src="{{ asset('assets/kai/assets/img/flags/id.png') }}" alt="Bahasa Indonesia"
                                style="width: 25px; height: auto; margin-right: 5px;">
                        @elseif(LaravelLocalization::getCurrentLocale() == 'en')
                            <img src="{{ asset('assets/kai/assets/img/flags/us.png') }}" alt="English"
                                style="width: 25px; height: auto; margin-right: 5px;">
                        @else
                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end m-0">
                        <a href="{{ LaravelLocalization::getLocalizedURL('id') }}" class="dropdown-item">
                            <img src="{{ asset('assets/kai/assets/img/flags/id.png') }}" alt="Bahasa Indonesia"
                                style="width: 20px; height: auto; margin-right: 5px;">
                            {{ __('messages.bahasa') }}
                        </a>
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item">
                            <img src="{{ asset('assets/kai/assets/img/flags/us.png') }}" alt="English"
                                style="width: 20px; height: auto; margin-right: 5px;">
                            {{ __('messages.english') }}
                        </a>
                    </div>
                </div>

                <!-- Shopping Cart Icon -->
                @auth
                    @if (Auth::user()->type === 'distributor')
                        <div class="nav-item">
                            <a href="{{ route('quotations.cart') }}" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                                <span id="cart-count" class="badge bg-primary rounded-pill">
                                    {{ session('quotation_cart') ? count(session('quotation_cart')) : 0 }}
                                </span>
                            </a>

                        </div>
                    @endif
                @endauth

                @if (auth()->check())
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="companyDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <small><i
                                    class="fa fa-user text-primary me-2"></i>{{ auth()->user()->nama_perusahaan }}</small>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="companyDropdown">
                            <!-- Show Profile -->
                            <li>
                                <a class="dropdown-item"
                                    href="{{ auth()->user()->type === 'member' ? route('profile.show') : route('distributor.profile.show') }}">
                                    <i class="fa fa-user me-2"></i>Profil
                                </a>
                            </li>

                            <!-- Logout -->
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt me-2"></i>{{ __('messages.logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <small class="btn btn-primary rounded-pill text-white py-1 px-1">
                            <i class="fa fa-sign-in-alt text-white me-2"></i>{{ __('messages.masuk') }}
                        </small>
                    </a>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <style>
        .navbar-nav .nav-link.active {
            color: #6196FF !important;
            /* Warna teks untuk menu aktif */
            border-bottom: 2px solid #6196FF;
            /* Garis bawah untuk menandai menu aktif */
            background-color: rgba(97, 150, 255, 0.1);
            /* Latar belakang biru muda */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const currentPath = window.location.pathname;

            // Loop through all nav links to activate the correct link based on the current path
            navLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;
                // Check if the current link matches the current page path
                if (linkPath === currentPath) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Handle dropdowns separately
            const dropdowns = document.querySelectorAll('.nav-item.dropdown');
            dropdowns.forEach(dropdown => {
                const toggleLink = dropdown.querySelector('.nav-link.dropdown-toggle');
                const subLinks = dropdown.querySelectorAll('.dropdown-menu .dropdown-item');
                let isDropdownActive = false;

                // Check each sublink to see if it matches the current path
                subLinks.forEach(subLink => {
                    const subLinkPath = new URL(subLink.href).pathname;
                    if (subLinkPath === currentPath) {
                        subLink.classList.add('active');
                        isDropdownActive = true;
                    } else {
                        subLink.classList.remove('active');
                    }
                });

                // Only set the parent dropdown link as active if one of its sub-links is active
                if (isDropdownActive) {
                    toggleLink.classList.add('active');
                } else {
                    toggleLink.classList.remove('active');
                }
            });
        });
    </script>
</body>
