@extends('admin.layouts.layoutpassenger')

@section('title')
input
@endsection

@section('header')
{{ Html::style('hdesign/hstyle.css') }}
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container helement" style=" direction: ltr;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Passenger</div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>
                        @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('passengers2.input') }}">
                            @csrf
                            <table>
                                <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="phone" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="work">Work</label>
                                        <input type="text" name="work" class="form-control" id="work" value="{{ old('work') }}">
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                        <div class="form-group">
                                            <label for="current_location">Current Location</label>
                                            <input type="text" name="current_location" class="form-control" id="current_location" value="{{ old('current_location') }}">
                                        </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" name="nationality" class="form-control" id="nationality" value="{{ old('nationality') }}">
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                        <div class="form-group">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday') }}">
                                        </div>
                                </td>
                                <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <!-- Back button -->
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
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
