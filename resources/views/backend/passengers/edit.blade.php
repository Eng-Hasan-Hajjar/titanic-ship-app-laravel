@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutpassenger')

@section('title')
   Edit Passenger
@endsection

@section('header')
    {{ Html::style('hdesign/hstyle.css') }}
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="container helementedit">
        <div class="card ">
            <div class="card-header">Edit Passenger</div>
            <div class="card-body">
                <form method="POST" action="{{ route('passengers.update', $passenger) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="phone" name="phone" class="form-control" id="phone" value="{{ $passenger->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="work">Work:</label>
                        <input type="text" name="work" class="form-control" id="work" value="{{ $passenger->work }}">
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" name="nationality" class="form-control" id="nationality" value="{{ $passenger->nationality }}">
                    </div>
                    <div class="form-group">
                        <label for="current_location">Current Location:</label>
                        <input type="text" name="current_location" class="form-control" id="current_location" value="{{ $passenger->current_location }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value="0" {{ $passenger->gender == '0' ? 'selected' : '' }}>Male</option>
                            <option value="1" {{ $passenger->gender == '1' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" class="form-control" id="birthday" value="{{ $passenger->birthday }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Passenger's Image:</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ $user->image }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ url('/adminpanel/passengers') }}" class="btn btn-secondary">Passengers</a>
                </form>
            </div>
        </div>
    </div>
@endsection
