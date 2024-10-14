@php
$compro = \App\Models\CompanyParameter::first();
$brand = \App\Models\BrandPartner::where('type', 'brand', 'nama')->get();
@endphp

<!-- Footer Start -->
<div id="footer-section" class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <h4 class="text-white mb-4">{{ __('messages.pengaduan') }}</h4>
                    <div class="opening-date mb-3 pb-3">
                        <div class="opening-clock flex-shrink-0">
                            <p class="mb-4 me-auto">Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga Kementerian Perdagangan RI</p>
                        </div>
                        <div class="opening-clock flex-shrink-0">
                            <p class="mb-0a">
                                <i class="fa fa-map-marker-alt me-2"></i>
                                <a href="https://www.google.com/maps?q=Gedung+I+Lantai+3+M.I.+Ridwan+Rais+No.+5,+Jakarta+Pusat+10110"
                                   target="_blank"
                                   style="text-decoration: none; color: inherit;">
                                    Gedung I Lantai.3 M.I. Ridwan Rais No. 5, Jakarta Pusat 10110
                                </a>
                            </p>
                        </div>
                        <div class="opening-clock flex-shrink-0">
                            <p class="mb-0">
                                <i class="fab fa-whatsapp me-2"></i>
                                <a href="tel:6281390069009" style="text-decoration: none; color: inherit;">+6281390069009</a>
                            </p>
                        </div>
                        <div class="opening-clock flex-shrink-0">
                            <p class="mb-0">
                                <i class="fas fa-envelope me-2"></i>
                                <a href="mailto:pengaduan.konsumen@kemendag.go.id" style="text-decoration: none; color: inherit;">pengaduan.konsumen@kemendag.go.id</a>
                            </p>
                        </div>
                        <div class="opening-clock flex-shrink-0">
                            <p class="mb-0">
                                <i class="fas fa-globe me-2"></i>
                                <a href="http://simpktn.kemendag.go.id/" target="_blank" style="text-decoration: none; color: inherit;">http://simpktn.kemendag.go.id/</a>
                            </p>
                        </div>
                    </div>
                    <div>
                        <p class="text-white mb-2">{{ __('messages.pembayaran') }}</p>
                        <img src="{{ asset('storage/midtrans.png') }}" class="img-fluid" alt="Image" style="border-radius: 20px; height: 80px; width: 120px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">{{ __('messages.quick_access') }}</h4>
                    <a href="{{ route('about') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.about_us') }}</a>
                    <a href="{{ route('home') }}#merek-mitra"><i class="fas fa-angle-right me-2"></i> {{ __('messages.our_brands') }}</a>
                    <a href="{{ route('qnaguest1') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.user') }}</a>
                    <a href="{{ route('member.activity') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.our_activity') }}</a>
                    <a href="{{ route('contact') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.contact_us') }}</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">{{ __('messages.find_products') }}</h4>
                    <a href="{{route('product.index')}}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.our_products') }}</a>
                    <a href="{{ route('portal') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.member_portal') }}</a>
                    @if($brand->isNotEmpty())
                    @foreach($brand as $singleBrand)
                        <a href="{{ $singleBrand->url }}"><i class="fas fa-angle-right me-2"></i> {{ $singleBrand->nama }}</a>
                    @endforeach
                @endif

                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">{{ __('messages.contact_info') }}</h4>

                    <!-- Address -->
                    @if(!empty($compro->alamat))
                        <a href="#"><i class="fa fa-map-marker-alt me-2"></i> {{ $compro->alamat }}</a>
                    @else
                        <p><i class="fa fa-map-marker-alt me-2"></i> {{ __('messages.address_not_available') }}</p>
                    @endif

                    <!-- Email -->
                    @if(!empty($compro->email))
                        <a href="mailto:{{ $compro->email }}"><i class="fas fa-envelope me-2"></i> {{ $compro->email }}</a>
                    @else
                        <p><i class="fas fa-envelope me-2"></i> {{ __('messages.email_not_available') }}</p>
                    @endif

                    <!-- Phone Number -->
                    @if(!empty($compro->no_telepon))
                        <a href="tel:{{ $compro->no_telepon }}"><i class="fab fa-whatsapp fa-2x"></i> {{ $compro->no_telepon }}</a>
                    @else
                        <p><i class="fab fa-whatsapp fa-2x"></i>{{ __('messages.phone_not_available') }}</p>
                    @endif

                    <!-- WhatsApp -->
                    @if(!empty($compro->no_wa))
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $compro->no_wa) }}" class="mb-3">
                            <i class="fab fa-whatsapp fa-2x"></i> {{ $compro->no_wa }}
                        </a>
                    @else
                        <p><i class="fab fa-whatsapp fa-2x"></i> {{ __('messages.whatsapp_not_available') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12 text-center mb-md-0">
                <span class="text-white"><a href="#">2024  <i class="fas fa-copyright text-light me-2"></i></a>PT. Gudang Solusi Acommerce</span>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top" style="display: none;"><i class="fa fa-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('assets/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset('assets/lib/counterup/counterup.min.js')}}"></script>
<script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
