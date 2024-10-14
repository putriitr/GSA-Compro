@extends('layouts.admin.master')

@section('content')
<div class="container">
    <h1>Edit User Location</h1>
    <form action="{{ route('user_locations.update', $userLocation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $userLocation->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image (leave blank if not changing)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update Location</button>
    </form>
</div>
@endsection
