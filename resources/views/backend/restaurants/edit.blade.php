@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Restaurant</h1>

    <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Restaurant Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $restaurant->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $restaurant->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload New Image (Optional)</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>

        <button type="submit" class="btn btn-warning">Update Restaurant</button>
    </form>
</div>
@endsection
