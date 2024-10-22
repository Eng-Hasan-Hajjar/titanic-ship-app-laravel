@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Seat Reservations</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Passenger</th>
                <th>Seat Number</th>
                <th>Reservation Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->movie->title }}</td>
                    <td>{{ $reservation->passenger->name }}</td>
                    <td>{{ $reservation->seat_number }}</td>
                    <td>{{ $reservation->reservation_time->format('M d, Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
