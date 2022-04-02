<div class="row">
    <form class="row row-cols-lg-auto g-3 align-items-center" action="/getAppointmet" method="POST">
        @csrf
        <div class="col-12">
          <label><b>Appointment Date</b></label>
          <div class="input-group">
            <input type="date" class="form-control" name="appointment_date">
          </div>
        </div>

        <div class="col-12">
            <label><b>Department Name</b></label>
          <select class="form-select" name="" id="department">
            <option selected>Choose...</option>
            @foreach ($department as $list)
            <option value="{{ $list->id }}">{{ $list->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-12">
            <label><b>Doctor with Fee</b></label>
          <select class="form-select" name="doctor_id" id="doctor">
            <option value="">Select Dcotor</option>
          </select>
        </div>

        <div class="col-12" style="margin-bottom: 15px">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </form>
</div>
