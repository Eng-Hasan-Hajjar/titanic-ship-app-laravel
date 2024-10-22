@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Reserve a Seat for {{ $movie->title }}</h1>

    <form action="{{ route('seat-reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <div class="form-group mb-3">
            <label for="seat_number">Seat Number</label>
            <input type="text" name="seat_number" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="reservation_time">Reservation Time</label>
            <input type="datetime-local" name="reservation_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Reserve Seat</button>
    </form>
</div>
@endsection
