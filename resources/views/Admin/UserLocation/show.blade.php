@extends('layouts.admin.master')

@section('content')
<div class="container">
    <h1>User Location Details</h1>
    <p>Name: {{ $userLocation->name }}</p>
    <p>Image:</p>
    <img src="{{ asset('storage/' . $userLocation->image) }}" alt="{{ $userLocation->name }}" style="width: 100px;">
    <p>Position: {{ $userLocation->position_top }}% Top, {{ $userLocation->position_left }}% Left</p>
    <a href="{{ route('user_locations.edit', $userLocation->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('user_locations.destroy', $userLocation->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('user_locations.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
s
