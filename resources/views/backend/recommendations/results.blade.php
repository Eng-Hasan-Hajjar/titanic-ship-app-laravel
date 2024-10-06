@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Recommendation Results</h1>
    <a href="{{ route('recommendations.index') }}" class="btn btn-outline-primary mb-4">
        <i class="fas fa-arrow-left"></i> Back to Recommendations
    </a>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-4">
        <i class="fas fa-arrow-left"></i> Dashboard
    </a>
    @foreach ($allRecommendations->groupBy('platform') as $platform => $recommendations)
        <div class="mb-5">
            <h2 class="text-secondary  text-center    @if ($platform == 'facebook')
                                    bg-primary text-white
                                @elseif ($platform == 'youtube')
                                    bg-danger text-white
                                @elseif ($platform == 'instagram')
                                    bg-gradient text-white" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 50%, #d6249f 75%, #285AEB 100%);
                                @endif      ">{{ ucfirst($platform) }} Recommendations</h2>
            <div class="row">
                @foreach ($recommendations as $recommendation)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <!-- اختيار اللون بناءً على المنصة -->
                            <div class="card-header
                                @if ($platform == 'facebook')
                                    bg-primary text-white
                                @elseif ($platform == 'youtube')
                                    bg-danger text-white
                                @elseif ($platform == 'instagram')
                                    bg-gradient text-white" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 50%, #d6249f 75%, #285AEB 100%);
                                @endif
                            ">
                                <h5 class="card-title mb-0">{{ $recommendation->name }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Followers/Subscribers:</strong>
                                    {{ $recommendation->followers_count ?? $recommendation->subscribers_count }}
                                </p>
                                <p class="card-text">
                                    <strong>Location:</strong> {{ $recommendation->location }}
                                </p>
                                @if ($recommendation->image)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <strong>profile:</strong>
                                            <img src="{{ URL::to('/') }}/images/{{ $recommendation->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <a href="
                                 @if ($platform == 'facebook')
                                        {{ route('facebook_pages.show', $recommendation->id) }}
                                    @elseif ($platform == 'youtube')
                                        {{ route('youtube_channels.show', $recommendation->id) }}
                                    @elseif ($platform == 'instagram')
                                        {{ route('instagram_accounts.show', $recommendation->id) }}
                                    @endif
                                    " class="btn btn-outline-primary
                                @if ($platform == 'facebook')
                                    bg-primary text-white
                                @elseif ($platform == 'youtube')
                                    bg-danger text-white
                                @elseif ($platform == 'instagram')
                                    bg-gradient text-white" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 50%, #d6249f 75%, #285AEB 100%);
                                @endif
                                ">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
