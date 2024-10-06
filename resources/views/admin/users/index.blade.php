@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('title')
   control of users
@endsection

@section('header')

<!-- DataTables -->
{{Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}
 {{Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}


@endsection




@section('content')

<div class="container">
    <h1>User Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Approved</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_approved ? 'Yes' : 'No' }}</td>
                    <td>
                        @if( $user->role =="customer")
                            <a style="" href="{{ route('users.showByUserId', $user) }}" class="btn btn-info"> details</a>

                            @if($user->is_approved)
                                <form action="{{ route('admin.users.disapprove', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">Disapprove</button>
                                </form>
                            @else
                                <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection




@section('footer')

<!-- DataTables -->
{{Html::script('admin/plugins/datatables/jquery.dataTables.min.js')}}
{{Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}
{{Html::script('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}
{{Html::script('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}


@endsection
