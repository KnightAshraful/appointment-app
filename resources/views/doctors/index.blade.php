@extends('layouts.layout_1')

@section('content')
    <div class="row" style="margin-top: 45px; margin-bottom: 5px">
            <div class="col-md-9">
                <h2>Doctor List</h2>
            </div>
            <div class="col-md-3">
                <a class="btn btn-success" href="{{ route('doctors.create') }}"> <span class="fa-solid fa-circle-plus"></span></a>
            </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Department Name</th>
            <th>Doctor Name</th>
            <th>Phone Number</th>
            <th>Doctor fee</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($doctors as $doctor)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $doctor->department->name }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>{{ $doctor->fee }}</td>
            <td>
                <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('doctors.show',$doctor->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('doctors.edit',$doctor->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $doctors->links() !!}

@endsection
