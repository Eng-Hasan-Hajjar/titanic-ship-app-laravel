@extends('admin.layouts.layout')

@section('title')
    details
@endsection

@section('header')
    {{ Html::style('hdesign/hstyle.css') }}
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container hcontainer">
        <div class="card hcard">
            <div class="card-header">Passenger Details</div>

            <div class="card-body hcard-body">
                <!-- Passenger Details -->
                <p><strong>Name:</strong>
                    @foreach ($users as $user)
                        @if($user->id == $passenger->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                </p>
                <p><strong>Phone:</strong> {{ $passenger->phone }}</p>
                <p><strong>Work:</strong> {{ $passenger->work }}</p>
                <p><strong>Nationality:</strong> {{ $passenger->nationality }}</p>
                <p><strong>Current Location:</strong> {{ $passenger->current_location }}</p>
                <p><strong>Gender:</strong>
                    @if($passenger->gender == 0)
                        Male
                    @else
                        Female
                    @endif
                </p>
                <p><strong>Birthday:</strong> {{ $passenger->birthday }}</p>
                <p>
                    <strong>Image of Syriatel Cach:</strong>
                    <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />
                </p>

                <div class="btn-group">
                    <a href="{{ route('passengers.edit', $passenger) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('passengers.destroy', $passenger) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this passenger?')">Delete</button>
                    </form>
                    <a href="{{ url('/adminpanel/passengers') }}" class="btn btn-secondary">Passengers</a>
                </div>
            </div>
        </div>
    </div>
@endsection
