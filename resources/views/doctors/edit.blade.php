@extends('layouts.layout_1')

@section('content')
    <div class="row" style="margin-top: 45px; margin-bottom: 5px">
            <div class="col-md-9">
                <h2>Edit Doctor Info</h2>
            </div>
            <div class="col-md-3">
                <a class="btn btn-dark" href="{{ route('doctors.index') }}"> Back</a>
            </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department Name:</strong>
                    <select name ="department_id" class="form-control">
                        <option>--Select--</option>
                        {{-- <?php $departments = \App\Models\Department::all(); ?> --}}
                        @foreach ($departments as $d )
                          <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
              </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Doctor Name:</strong>
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="Doctor Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Doctor Fee:</strong>
                    <input type="text" name="fee" value="{{ $doctor->fe }}" class="form-control" placeholder="Doctor Fee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 45px; margin-bottom: 5px">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
