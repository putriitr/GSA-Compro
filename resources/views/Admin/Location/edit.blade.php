@extends('layouts.admin.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header">
                <h2 class="h4">Edit Lokasi</h2>
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

                <form action="{{ route('admin.location.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image_url">Gambar</label>
                        <input type="file" name="image_url" class="form-control" id="image_url">
                        @if($location->image) 
                            <img src="{{ asset('assets/img/' . $location->image) }}" alt="Image of {{ $location->name }}" class="img-thumbnail mt-3" style="max-width: 150px; height: auto;">
                        @endif
                        @error('image_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="latitude">Lintang</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $location->latitude) }}" required>
                        @error('latitude')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="longitude">Bujur</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $location->longitude) }}" required>
                        @error('longitude')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Perbarui Lokasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
