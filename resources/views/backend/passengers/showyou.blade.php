@extends('admin.layouts.layoutpassenger')

@section('title')
    details
@endsection

@section('header')
    {{ Html::style('hdesign/hstyle.css') }}
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container hcontainer">
        <div class="card hcard">
            <div class="card-header">Passenger Details</div>

            <div class="card-body hcard-body">
                <table>
                    <tr>
                        <td>
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        </td>
                        <td>
                            <p><strong>Phone:</strong> {{ $passenger->phone }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Work:</strong> {{ $passenger->work }}</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Nationality:</strong> {{ $passenger->nationality }}</p>
                        </td>
                        <td>
                            <p><strong>Current Location:</strong> {{ $passenger->current_location }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Gender:</strong> @if($passenger->gender == 0) Male @else Female @endif</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Birthday:</strong> {{ $passenger->birthday }}</p>
                        </td>
                        <td>
                            <p>
                                <strong>Image of Syriatel Cach:</strong>
                                <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />
                            </p>
                        </td>
                    </tr>
                </table>

                <div class="btn-group">
                    <a href="{{ route('passengers.edit', $passenger) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('dashboard') }}" class="btn btn-secondary">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
