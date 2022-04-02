@extends('layouts.layout_1')

@section('content')
    <div class="row">

    
        <div class="col-6" style="background-color: #C0C0C0">
            @include('appointments.add-appont')
        </div>
        <div class="col-6"  style="background-color: #808080">
            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                <table class="table table-bordered table-md"  style="color: #C0C0C0">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">App.Date</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Fee</th>
                    <th scope="col" style="width: 20%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach ($appointment as $row)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $row->appointment_date }}</td>
                    <td>{{ $row->doctors->name }}</td>
                    <td id="subtotal">{{ $row->doctors->fee }}</td>
                    <td><a href="{{ route('appointments.remove', $row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            </div>
            <div class="row" style="background-color:ghostwhite; margin:10px">
                <div class="col-md-12">

                    <form action="/addAppointment" method="POST">
                        @csrf
                        <label for="exampleFormControlInput1" class="form-label"><b>Patient Information</b></label>
                        <div class="row">
                            <div class="col-md-5">

                            <input class="form-control form-control-sm" type="text" name="patient_name" placeholder="Patient Name">
                        </div>
                        <div class="col-md-5">
                            <input class="form-control form-control-sm" type="text" name="patient_phone" placeholder="Phone Number">
                        </div>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label"><b>Payment</b></label>
                        <div class="row">
                            <div class="col-md-5">
                            <input class="form-control form-control-sm" type="text"  id="total" name="total_fee" placeholder="{{ $appointment->sum(function($row){
                                return $row->doctors->fee; })}} Tk" value="{{ $appointment->sum(function($row){
                                return $row->doctors->fee; })}}">
                        </div>
                        <div class="col-md-5">
                            <input class="form-control form-control-sm" type="text" name="paid_amount" placeholder="Paid Amount">
                        </div>
                        @foreach ($appointment as $row)
                        <input class="form-control form-control-sm" type="hidden" name="appointment_date[]" value="{{ $row->appointment_date }}">
                        <input class="form-control form-control-sm" type="hidden" name="doctor_id[]" value="{{ $row->doctor_id }}">
                        @endforeach
                        </div>

                            <button type="submit" class="btn btn-primary" style="width: 400px; margin: 25px; margin-left: 0px">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">

function calculatePrice(){

      //Get selected data
      var elt = document.getElementById("#subtotal");
      var subtotal = elt.options[elt.selectedIndex].value;

      //convert data to integers
      subtotal = parseInt(subtotal);

      //calculate total value
      var total =+ subtotal;

      //print value to  PicExtPrice
      document.getElementById("#total").value=total;

 }
</script>
@endpush
