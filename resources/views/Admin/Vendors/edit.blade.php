@extends('layouts.Admin.master')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Edit Vendor</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nama Vendor :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vendor->name) }}" required>
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $vendor->email) }}" required>
                        @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="company_name" class="form-label">Nama Perusahaan :</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $vendor->company_name) }}">
                        @if ($errors->has('company_name'))
                            <small class="text-danger">{{ $errors->first('company_name') }}</small>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon :</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $vendor->phone_number) }}">
                        @if ($errors->has('phone_number'))
                            <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $vendor->address) }}">
                        @if ($errors->has('address'))
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        @endif
                    </div>

                    <!-- Password Fields -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password Baru :</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-danger" id="password_error"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru :</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        <small class="text-danger" id="password_confirmation_error"></small>
                    </div>

                    <button type="submit" class="btn btn-success">Perbaharui</button>
                    <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        // Ensure jQuery is properly loaded
        if (typeof $ === 'undefined') {
            console.error('jQuery is not loaded');
            return;
        }

        // Handle form submission
        $('form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var newPassword = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();

            if (newPassword !== confirmPassword) {
                $('#password_confirmation_error').text('Konfirmasi password tidak cocok!');
                return;
            }

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Vendor berhasil diperbarui');
                        window.location.href = "{{ route('admin.vendors.index') }}";
                    } else {
                        // Handle validation errors
                        $('#password_error').text(response.errors.password || '');
                        $('#password_confirmation_error').text(response.errors.password_confirmation || '');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
