
<!-- resources/views/reservations/edit.blade.php -->

@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('title')
   edit
@endsection

@section('header')
{{ Html::style('hdesign/hstyle.css') }}
    <!-- DataTables -->
    {{ Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
@endsection
@section('content')
    <div class="container helementedit">
        <div class="card ">
            <div class="card-header">edit </div>

            <div class="card-body">
                <form method="POST" action="{{ route('customers.update', $customer) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="phone">phone:  </label>
                        <input type="phone" name="phone" class="form-control" id="phone" value="{{$customer->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="work">work:  </label>
                        <input type="text" name="work" class="form-control" id="work" value="{{ $customer->work }}">
                    </div>
                    <div class="form-group">
                        <label for="nationality">nationality:  </label>
                        <input type="text" name="nationality" class="form-control" id="nationality" value="{{$customer->nationality  }}">
                    </div>
                    <div class="form-group">
                        <label for="current_location">current location:   </label>
                        <input type="text" name="current_location" class="form-control" id="current_location" value="{{$customer->current_location }}">
                    </div>

                    <div class="form-group">
                        <label for="gender"> gender: </label>
                        <select name="gender" class="form-control" id="gender">
                                <option value="0" {{ $customer->gender == '0' ? 'selected' : '' }}>male </option>
                                <option value="1" {{ $customer->gender == '1' ? 'selected' : '' }}> female </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">birthday:  </label>
                        <input type="date" name="birthday" class="form-control" id="birthday" value="{{$customer->birthday  }}">
                    </div>

                    <div class="form-group">

                        <label for="image" >Image of Syriatel Cash :</label>
                        <div class="mt-4">
                            <input type="file" class="form-control" id="image" name="image"value="{{$user->image  }}">

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary"> save </button>
                    <!-- زر الرجوع -->
                    @if(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin'))

                          <a href="{{ url('/adminpanel/customers') }}" class="btn btn-secondary" >  customers </a>
                    @else
                         <a href="{{ url('/dashboard') }}" class="btn btn-secondary" >  dashboard </a>

                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection

