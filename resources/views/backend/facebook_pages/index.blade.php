@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <h1>Facebook Pages</h1>
        <a href="{{ route('facebook_pages.create') }}" class="btn btn-primary mb-3">Add New Facebook Page</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('facebook_pages.filter') }}" method="POST" class="mb-3">
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
                    <input type="number" name="min_followers" class="form-control" placeholder="Min Followers">
                </div>
                <div class="col-md-2">
                    <input type="number" name="max_followers" class="form-control" placeholder="Max Followers">
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
                    <th>Followers</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facebookPages as $page)
                    <tr>
                        <td>{{ $page->name }}</td>
                        <td><a href="{{ $page->url }}" target="_blank">{{ $page->url }}</a></td>
                        <td>{{ $page->followers_count }}</td>
                        <td>{{ $page->category->name }}</td>
                        <td>{{ $page->location }}</td> <!-- عرض الموقع -->
                        <td>
                            <a href="{{ route('facebook_pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('facebook_pages.show', $page->id) }}" class="btn btn-info">View Details</a>

                            <form action="{{ route('facebook_pages.destroy', $page->id) }}" method="POST" style="display:inline-block;">
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
