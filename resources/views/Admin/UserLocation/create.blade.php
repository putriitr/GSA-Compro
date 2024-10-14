@extends('layouts.admin.master')

@section('content')
<div class="container">
    <h1>Add User Location</h1>
    <form action="{{ route('userlocations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Location</button>
    </form>
</div>
@endsection
