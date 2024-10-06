@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <h1>Facebook Page Details</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-3">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
        <a href="{{ route('facebook_pages.index') }}" class="btn btn-primary mb-3">Back to List</a>

        <div class="card">
            <div class="card-header">
                {{ $facebookPage->name }}
            </div>
            <div class="card-body">
                <p><strong>URL:</strong> <a href="{{ $facebookPage->url }}" target="_blank">{{ $facebookPage->url }}</a></p>
                <p><strong>Description:</strong> {{ $facebookPage->description }}</p>
                <p><strong>Followers Count:</strong> {{ $facebookPage->followers_count }}</p>
                <p><strong>Category:</strong> {{ $facebookPage->category->name }}</p>
                <p><strong>Location (Country):</strong> {{ $facebookPage->location }}</p>
                @if ($facebookPage->image)
                    <div class="row mb-3">
                        <div class="col">
                            <strong>Image:</strong>
                            <img src="{{ URL::to('/') }}/images/{{ $facebookPage->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
