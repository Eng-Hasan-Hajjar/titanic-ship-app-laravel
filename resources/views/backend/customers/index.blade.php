<!-- resources/views/reservations/all.blade.php -->


@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('title')
    control
@endsection

@section('header')
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection
@section('content')
    <div class="container hcontainer" style="direction: rtl;">
        <div class="card hcard helement hcard-body">
            <div class="card-header  "><p  class="float-right">all customers </p></div>
            <div class="card-header">
                <a href="{{ route('dashboard') }}" class="btn btn-primary"> dashboard   </a>

                <a href="{{ route('customers.create') }}" class=" btn btn-success float-right">create new </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th> name</th>
                            <th> phone</th>
                            <th> work</th>
                            <th> current location </th>
                            <th>control </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    @foreach ($users as $user)
                                        @if($user->id == $customer->user_id)  {{ $user->name }} @endif
                                    @endforeach
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->work }}</td>
                                <td>{{ $customer->current_location }}</td>

                                <td>
                                    <div class="btn-group">
                                        <a style="" href="{{ route('customers.show', $customer) }}" class="btn btn-info"> details</a>

                                        <a style="" href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">edit</a>
                                        <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this customer?')">delete</button>
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
