@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutpassenger')

@section('title')
    control
@endsection

@section('header')
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container hcontainer" style="direction: rtl;">
        <div class="card hcard helement hcard-body">
            <div class="card-header  ">
                <p class="float-right">All passengers</p>
            </div>
            <div class="card-header">
                <a href="{{ route('dashboard') }}" class="btn btn-primary"> Dashboard </a>
                <a href="{{ route('passengers.create') }}" class="btn btn-success float-right">Create New</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Work</th>
                            <th>Current Location</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passengers as $passenger)
                            <tr>
                                <td>
                                    @foreach ($users as $user)
                                        @if($user->id == $passenger->user_id)  {{ $user->name }} @endif
                                    @endforeach
                                </td>
                                <td>{{ $passenger->phone }}</td>
                                <td>{{ $passenger->work }}</td>
                                <td>{{ $passenger->current_location }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('passengers.show', $passenger) }}" class="btn btn-info">Details</a>
                                        <a href="{{ route('passengers.edit', $passenger) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('passengers.destroy', $passenger) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this passenger?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
