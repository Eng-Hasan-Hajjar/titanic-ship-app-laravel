<!-- resources/views/reservations/create.blade.php -->

@extends('admin.layouts.layout')

@section('title')
control || add your info
@endsection

@section('header')
{{ Html::style('hdesign/hstyle.css') }}
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container helement">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">create new </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    <div class="card-body ">
                        <form method="POST" action="{{ route('customers.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="phone">phone  </label>
                                <input type="phone" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="work">work  </label>
                                <input type="text" name="work" class="form-control" id="work" value="{{ old('work') }}">
                            </div>

                            <div class="form-group">
                                <label for="nationality">nationality  </label>
                                <input type="text" name="nationality" class="form-control" id="nationality" value="{{ old('nationality') }}">
                            </div>
                            <div class="form-group">
                                <label for="current_location"> current location  </label>
                                <input type="text" name="current_location" class="form-control" id="current_location" value="{{ old('current_location') }}">
                            </div>

                            <div class="form-group">
                                <label for="gender"> gender </label>
                                <select name="gender" class="form-control" id="gender">
                                        <option value="0">male </option>
                                        <option value="1"> female </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthday">birthday  </label>
                                <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday') }}">
                            </div>
                            <div class="form-group">
                                <label for="driving_license_number">driving license number  </label>
                                <input type="text" class="form-control" name="driving_license_number" id="driving_license_number" required>
                            </div>



                            <button type="submit" class="btn btn-primary">save </button>
                                <!-- زر الرجوع -->
                                @if(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin'))

                                        <a href="{{ url('/adminpanel/customers') }}" class="btn btn-secondary" >  customers </a>
                                @else

                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
