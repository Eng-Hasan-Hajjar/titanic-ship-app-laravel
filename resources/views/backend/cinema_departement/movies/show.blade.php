@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $movie->title }}</h1>

    <div class="row">
        <div class="col-md-8">
            <p><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
            <p><strong>Genre:</strong> {{ $movie->genre }}</p>
            <p><strong>Release Date:</strong> {{ $movie->release_date->format('M d, Y') }}</p>
            <p>{{ $movie->description }}</p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('seat-reservations.create', $movie->id) }}" class="btn btn-success btn-lg mb-3">Book a Seat</a>

            <h3>Movie Reviews</h3>
            @foreach ($movie->reviews as $review)
                <div class="review mb-3">
                    <strong>{{ $review->passenger->name }}</strong> rated it {{ $review->rating }} stars
                    <p>{{ $review->review }}</p>
                </div>
            @endforeach

            <a href="{{ route('movie-reviews.create', $movie->id) }}" class="btn btn-primary">Write a Review</a>
        </div>
    </div>
</div>
@endsection
