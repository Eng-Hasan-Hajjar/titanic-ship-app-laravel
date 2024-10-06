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
    <!-- في قسم head -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" style="width: 300px; height: auto;" data-bs-toggle="modal" data-bs-target="#imageModal" />
                </p>

                <!-- Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="btn-group">
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">edit</a>

                    <a href="{{ url('/users') }}" class="btn btn-secondary">users</a>



                </div>






            </div>
        </div>
    </div>
    <!-- في قسم body قبل انتهاءه -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection























