@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <h1>YouTube Channel Details</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-3">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
        <a href="{{ route('youtube_channels.index') }}" class="btn btn-primary mb-3">Back to List</a>

        <div class="card">
            <div class="card-header">
                {{ $youtubeChannel->name }}
            </div>
            <div class="card-body">
                <p><strong>URL:</strong> <a href="{{ $youtubeChannel->url }}" target="_blank">{{ $youtubeChannel->url }}</a></p>
                <p><strong>Description:</strong> {{ $youtubeChannel->description }}</p>
                <p><strong>Subscribers Count:</strong> {{ $youtubeChannel->subscribers_count }}</p>
                <p><strong>Location (Country):</strong> {{ $youtubeChannel->location }}</p>

                <p><strong>Category:</strong>
                    @foreach($categories as $category)
                        @if ($category->id  == $youtubeChannel->category_id)
                         {{ $category->name }}
                          @endif
                     @endforeach
                </p>

                    @if ($youtubeChannel->image)
                        <div class="row mb-3">
                            <div class="col">
                                <strong>Image:</strong>
                                <img src="{{ URL::to('/') }}/images/{{ $youtubeChannel->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />

                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
