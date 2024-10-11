<body>
    {{-- <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End --> --}}

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

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center p-0">
                <img src="{{ asset('storage/logo-gsa2.png') }}" alt="Logo" class="me-2"
                    style="height: auto; width: 180px;">
                <img src="{{ asset('storage/catalogue.png') }}" alt="Logo" class="me-2"
                    style="height: auto; width: 150px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">{{ __('messages.home') }}</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('messages.about') }}</a>
                    <a href="{{ route('member.activity') }}" class="nav-item nav-link">{{ __('messages.activity') }}</a>
                    <a href="{{ route('product.index') }}" class="nav-item nav-link">{{ __('messages.products') }}</a>

                    @foreach ($activeMetas as $type => $metas)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown-{{ $type }}"
                                aria-expanded="false" data-bs-toggle="dropdown">{{ ucfirst($type) }}</a>
                            <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown-{{ $type }}">
                                @foreach ($metas as $meta)
                                    <a href="{{ route('member.meta.show', $meta->slug) }}"
                                        class="dropdown-item">{{ $meta->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    @auth
                        <a href="{{ route('portal') }}" class="nav-item nav-link">{{ __('messages.portal_member') }}</a>
                    @endauth

                    <a href="{{ route('contact') }}" id="contact-link"
                        class="nav-item nav-link">{{ __('messages.contact_us') }}</a>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        @if (LaravelLocalization::getCurrentLocale() == 'id')
                            <img src="{{ asset('assets/kai/assets/img/flags/id.png') }}" alt="Bahasa Indonesia">
                        @elseif(LaravelLocalization::getCurrentLocale() == 'en')
                            <img src="{{ asset('assets/kai/assets/img/flags/us.png') }}" alt="English">
                        @else
                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end m-0">
                        <a href="{{ LaravelLocalization::getLocalizedURL('id') }}" class="dropdown-item">
                            <img src="{{ asset('assets/kai/assets/img/flags/id.png') }}" alt="Bahasa Indonesia">
                            {{ __('messages.bahasa') }}
                        </a>
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item">
                            <img src="{{ asset('assets/kai/assets/img/flags/us.png') }}" alt="English">
                            {{ __('messages.english') }}
                        </a>
                    </div>
                </div>
                <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                            class="fas fa-map-marker-alt"></i></a>
                    <a class="btn btn-square btn-light rounded-circle mx-1" href="mailto:info@gsacommerce.com"><i
                            class="fas fa-envelope"></i></a>
                    <div class="btn-group">
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="https://wa.me/6282114702128">WhatsApp 1</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://wa.me/6281390069009">WhatsApp 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if (auth()->check())
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="companyDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <small><i
                                    class="fa fa-user text-primary me-2"></i>{{ auth()->user()->nama_perusahaan }}</small>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                            <!-- Show Profile -->
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fa fa-user me-2"></i>Profil
                                </a>
                            </li>

                            <!-- Logout -->
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt me-2"></i>Keluar
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
                            <i class="fa fa-sign-in-alt text-white me-2"></i>LOGIN
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
            border-bottom: 2px solid #6196FF;
            /* Underline */
            padding-bottom: 5px;
            /* Space for the underline */
        }
    </style>

    <script>
        // Activate the current nav item based on the URL
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const currentPath = window.location.pathname;

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
