@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <h1>Instagram Account Details</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-3">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
        <a href="{{ route('instagram_accounts.index') }}" class="btn btn-primary mb-3">Back to List</a>

        <div class="card">
            <div class="card-header">
                {{ $instagramAccount->name }}
            </div>
            <div class="card-body">
                <p><strong>URL:</strong> <a href="{{ $instagramAccount->url }}" target="_blank">{{ $instagramAccount->url }}</a></p>
                <p><strong>Description:</strong> {{ $instagramAccount->description }}</p>
                <p><strong>Followers Count:</strong> {{ $instagramAccount->followers_count }}</p>
                <p><strong>Category:</strong> {{ $instagramAccount->category->name }}</p>
                <p><strong>Location (Country):</strong> {{ $instagramAccount->location }}</p>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Image:</strong>
                            <img src="{{ URL::to('/') }}/images/{{ $instagramAccount->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />

                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
