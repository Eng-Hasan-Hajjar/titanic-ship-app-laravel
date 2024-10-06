@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')

<div class="container" style="margin:20px;padding:20px">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-3">
        <i class="fas fa-arrow-left"></i> Dashboard
    </a>
    <h2>Edit Category</h2>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
