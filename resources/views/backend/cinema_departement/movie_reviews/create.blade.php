@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Write a Review for {{ $movie->title }}</h1>

    <form action="{{ route('movie-reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <div class="form-group mb-3">
            <label for="rating">Rating (1 to 5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="form-group mb-3">
            <label for="review">Your Review</label>
            <textarea name="review" class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
@endsection
