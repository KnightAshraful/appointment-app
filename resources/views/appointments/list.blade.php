@extends('layouts.layout_1')

@section('content')
    <div class="row" style="margin-top: 45px; margin-bottom: 5px">
            <div class="col-md-9">
                <h2>Appointments List</h2>
            </div>
            <div class="col-md-3">
                <a class="btn btn-success" href=""{{ route('appointments.index') }}> <span class="fa-solid fa-circle-plus"></span></a>
            </div>
    </div>

    <div class="row">
        <div class="col-xs-12">


        <div class="box">
                <!-- /.box-header -->
                <div class="delete-msg" style="width: 100%; display: block; overflow: hidden;">
                  @if(session()->has('message'))
                    <div class="alert alert-success">
                      {{ session('message') }}
                    </div>
                  @endif
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>SL</th>
                            <th>App. No</th>
                            <th>App. Date</th>
                            <th>Doctor Id</th>
                            <th>Patient Name</th>
                            <th>Patient PhoneNo</th>
                            <th>Total Fees</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; ?>
                        @foreach($appointments as $list)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $list->appointment_no }}</td>
                            <td>
                                {{-- {{ $list->appointment_date }} --}}
                                @foreach(explode(',',$list->appointment_date) as $appointment_date)
                                    <span class="badge badge-info" style="background-color: rgb(223, 4, 4)">{{ $appointment_date }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                {{-- {{ $list->appointment_date }} --}}
                                @foreach(explode(',',$list->doctor_id) as $doctor_id)
                                <span class="badge badge-info" style="background-color: cornflowerblue">{{ $doctor_id }}</span><br>
                                @endforeach
                            </td>
                            <td>{{ $list->patient_name }}</td>
                            <td>{{ $list->patient_phone }}</td>
                            <td>{{ $list->total_fee }}</td>

                            </tr>
                      @endforeach
                      </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
