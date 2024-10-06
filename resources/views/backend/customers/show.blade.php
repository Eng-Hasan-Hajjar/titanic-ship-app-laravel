<!-- resources/views/reservations/show.blade.php -->

@extends('admin.layouts.layout')

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
            <div class="card-header">details </div>

            <div class="card-body hcard-body">
                <!-- تفاصيل  -->
                <p><strong> name:</strong>  @foreach ($users as $user)
                    @if($user->id == $customer->user_id)  {{ $user->name }} @endif
                @endforeach</p>
                <p><strong> phone:</strong> {{ $customer->phone}}</p>
                <p><strong> work:</strong> {{  $customer->work}}</p>
                <p><strong> nationality:</strong> {{ $customer->nationality}}</p>
                <p><strong> current location:</strong> {{ $customer->current_location}}</p>
                <p><strong> gender:</strong>   @if($customer->gender == 0) male @else female @endif</p>
                <p><strong> birthday:</strong> {{ $customer->birthday }}</p>
                    <p>
                        <strong>Image of Syriatel Cach:</strong>
                        <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" style="width: 300px; height: auto;" />
                    </p>
                <div class="btn-group">
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">edit</a>
                    <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this customer?')">delete</button>
                    </form>
                    <a href="{{ url('/adminpanel/customers') }}" class="btn btn-secondary">customers</a>

                </div>






            </div>
        </div>
    </div>
@endsection























