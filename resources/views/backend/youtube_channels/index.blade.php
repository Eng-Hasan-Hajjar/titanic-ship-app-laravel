@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <h1>YouTube Channels</h1>
        <a href="{{ route('youtube_channels.create') }}" class="btn btn-primary mb-3">Add New YouTube Channel</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('youtube_channels.filter') }}" method="POST" class="mb-3">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="min_subscribers" class="form-control" placeholder="Min Subscribers">
                </div>
                <div class="col-md-2">
                    <input type="number" name="max_subscribers" class="form-control" placeholder="Max Subscribers">
                </div>
                   <!-- Location Filter -->
        <div class="col-md-3">
            <input type="text" name="location" class="form-control" placeholder="Location">
        </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary">Filter</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Subscribers</th>
                    <th>Category</th>
                    <th>Location</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($youtubeChannels as $channel)
                    <tr>
                        <td>{{ $channel->name }}</td>
                        <td><a href="{{ $channel->url }}" target="_blank">{{ $channel->url }}</a></td>
                        <td>{{ $channel->subscribers_count }}</td>
                        <td>{{ $channel->category->name }}</td>
                        <td>{{ $channel->location }}</td> <!-- عرض الموقع -->
                        <td>
                            <a href="{{ route('youtube_channels.show', $channel->id) }}" class="btn btn-info">View Details</a>
                            <a href="{{ route('youtube_channels.edit', $channel->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('youtube_channels.destroy', $channel->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

