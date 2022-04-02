@extends('layouts.layout_1')

@section('content')
    <div class="row" style="margin-top: 45px; margin-bottom: 5px">
            <div class="col-md-9">
                <h2> Show Doctor Details</h2>
            </div>
            <div class="col-md-3">
                <a class="btn btn-dark" href="{{ route('doctors.index') }}"> Back</a>
            </div>
    </div>

    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Doctor Name:</strong>
                {{ $doctor->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {{ $doctor->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Doctor fee:</strong>
                {{ $doctor->fee }}
            </div>
        </div>
    </div>
@endsection
