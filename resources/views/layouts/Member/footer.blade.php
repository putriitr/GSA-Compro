@php
$compro = \App\Models\CompanyParameter::first();
$brand = \App\Models\BrandPartner::where('type', 'brand', 'nama')->get();
@endphp

<!-- Footer Start -->
<div id="footer-section" class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item d-flex flex-column">
                    <form action="{{ route('guest-messages.store') }}" method="POST" class="bg-light p-4 rounded">
                        @csrf
                        <h4 class="text-dark mb-4">{{ __('messages.leave_message') }}</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">{{ __('messages.full_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('messages.email') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">{{ __('messages.company') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="company" name="company" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('messages.phone') }} <span class="text-danger">*</span></label>
                                    <input type="tel" id="no_wa" name="no_wa" class="form-control" required pattern="\d{10,12}" title="Nomor WhatsApp harus terdiri dari 10 hingga 12 digit angka" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="12">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('messages.your_message') }} <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">{{ __('messages.send_message') }}</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">{{ __('messages.quick_access') }}</h4>
                    <a href="{{ route('about') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.about_us') }}</a>
                    <a href="{{ route('home') }}#merek-mitra"><i class="fas fa-angle-right me-2"></i> {{ __('messages.brands_partners') }}</a>
                    <a href="{{ route('activity') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.our_activity') }}</a>
                    <a href="{{ route('qnaguest1') }}"><i class="fas fa-angle-right me-2"></i> {{ __('messages.qna-guest') }}</a>
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
                        <a href="tel:{{ $compro->no_telepon }}"><i class="fas fa-phone me-2"></i> {{ $compro->no_telepon }}</a>
                    @else
                        <p><i class="fas fa-phone me-2"></i> {{ __('messages.phone_not_available') }}</p>
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
                <span class="text-white"><a href="#">2024  <i class="fas fa-copyright text-light me-2"></i></a>GSA</span>
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
