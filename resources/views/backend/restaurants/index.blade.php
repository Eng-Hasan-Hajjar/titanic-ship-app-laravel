@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Restaurants</h1>

    <!-- زر لإضافة مطعم جديد -->
    <div class="text-right mb-3">
        <a href="{{ route('restaurants.create') }}" class="btn btn-success">Add New Restaurant</a>
    </div>

    <!-- عرض قائمة المطاعم -->
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $restaurant->image_url }}" class="card-img-top" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">{{ $restaurant->description }}</p>
                        <a href="{{ route('restaurants.show', $restaurant->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
