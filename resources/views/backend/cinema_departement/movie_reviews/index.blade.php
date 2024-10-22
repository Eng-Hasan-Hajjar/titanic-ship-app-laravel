@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Movie Reviews</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Passenger</th>
                <th>Rating</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->movie->title }}</td>
                    <td>{{ $review->passenger->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->review }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
