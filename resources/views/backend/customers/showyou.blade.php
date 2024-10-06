<!-- resources/views/reservations/show.blade.php -->

@extends('admin.layouts.layoutvisitor')

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
            <div class="card-header"> details </div>

            <div class="card-body hcard-body">
                <table>
                    <tr>
                    <td>
                            <p><strong> name:</strong>
                                {{ Auth::user()->name }}
                           </p>
                    </td>
                    <td>
                            <p><strong> phone:</strong> {{ $customer->phone}}</p>
                    </td>

                    </tr>
                    <tr>
                    <td>

                             <p><strong> work:</strong> {{  $customer->work}}</p>
                    </td>
                    <td>

                    </td>

                    </tr>
                    <tr>
                    <td>
                            <p><strong> nationality:</strong> {{ $customer->nationality}}</p>
                    </td>
                        <td>

                <p><strong> current location :</strong> {{ $customer->current_location}}</p>
                    </td>

                    </tr>
                    <tr>
                        <td>
                            <p><strong> gender:</strong> @if($customer->gender == 0) ذكر @else أنثى @endif</p>
                    </td>
                        <td>
                    </td>

                    </tr>
                    <tr>

                        <td>
                            <p><strong> birthday:</strong> {{ $customer->birthday }}</p>

                        </td>
                        <td>
                            <p>
                                <strong>Image of Syriatel Cach:</strong>
                                <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />
                            </p>
                        </td>

                    </tr>





                  </table>

                <!-- تفاصيل  -->






                <div class="btn-group">
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">edit</a>

                    <a href="{{ url('dashboard') }}" class="btn btn-secondary">dashboard</a>

                </div>






            </div>
        </div>
    </div>
@endsection























