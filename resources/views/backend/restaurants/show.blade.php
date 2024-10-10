@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $restaurant->name }}</h1>
            <p>{{ $restaurant->description }}</p>

            <h4>Menu</h4>
            <ul>
                @foreach ($restaurant->menus as $menu)
                    <li>{{ $menu->name }} - ${{ $menu->price }}</li>
                @endforeach
            </ul>

            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

        <div class="col-md-4">
            <img src="{{ $restaurant->image_url }}" class="img-fluid" alt="{{ $restaurant->name }}">
        </div>
    </div>
</div>
@endsection
