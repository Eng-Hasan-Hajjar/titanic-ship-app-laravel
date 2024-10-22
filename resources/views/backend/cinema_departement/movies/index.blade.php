@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Available Movies</h1>

    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text"><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $movie->genre }}</p>
                        <p class="card-text"><strong>Release Date:</strong> {{ $movie->release_date->format('M d, Y') }}</p>
                        <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
