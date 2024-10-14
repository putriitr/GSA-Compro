@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <h1>User Locations</h1>
        <a href="{{ route('userlocations.create') }}" class="btn btn-primary">Add Location</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->name }}</td>
                        <td><img src="{{ asset('storage/' . $location->image) }}" alt="{{ $location->name }}" width="50"></td>
                        <td>{{ $location->latitude }}</td>
                        <td>{{ $location->longitude }}</td>
                        <td>
                            <a href="{{ route('userlocations.edit', $location) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('userlocations.destroy', $location) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
