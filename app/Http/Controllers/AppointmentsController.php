<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//  *   All Using Paths
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AppointmentsController extends Controller
{
    //  ?   Appointment & Doctor List
    public function index(Request $request)
    {
        $data=[];

        session()->has('code');
        $code = session()->get('code');

        $data['department'] = Department::get();

        $data['appointment'] = Session::where('code',$code)->with('doctors')->get();


        return view('appointments.index',$data);

    }

    //  ?   Doctor Dropdown
    public function getDoctor(Request $request)
    {
        $did=$request->post('did');

        $doctor = Doctor::where('department_id',$did)->get();

        $html='<option value="">Select Doctor</option>';

        foreach($doctor as $list){
			$html.='<option value="'.$list->id.'">'.$list->name.' - '.$list->fee.'Tk'.'</option>';
		}

		echo $html;

    }

    //  ?   Add Doctor Appointment
    public function getAppointmet(Request $request)
    {
        // dd($request);

        if (session()->has('code')) {
            $request['code'] = session()->get('code');
        }

        //  todo    Validation Check in
        $request->validate([
            'appointment_date' => 'required|unique:sessions',
            'doctor_id'        => 'required',
        ]);

        if ($request['code'] != null)
        {
            $input = [
                'code' => $request['code'],
                'appointment_date' => $request['appointment_date'],
                'doctor_id' =>$request['doctor_id'],
            ];
        }
        else
        {
            $input = [
                'code' => $this->generateUniqueCode(),
                'appointment_date' => $request['appointment_date'],
                'doctor_id' =>$request['doctor_id'],
            ];
        }

        //dd($input);

        //  todo    Data Insert in DB
        $appointment = Session::create($input);

        $request->session()->put('code',$appointment->code);

        return redirect()->back()->with('message','Data Addedd successfully.');
    }

    //  ?   Create Unique code for New Insert
    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Session::where("code", "=", $code)->first());

        return $code;

    }

    //  ?   Data Remove for session table
    public function remove($id)
    {
        $appointment = Session::find($id);

        $appointment->delete();

        //redirect
        return back()->with('message', 'Record Deleted Successfully.');

    }

    public function addAppointment(Request $request)
  {
        //  todo    Validation Check in
      $request->validate([

          'appointment_date'        => 'required',
          'doctor_id'               => 'required',
          'patient_name'            => 'required',
          'patient_phone'           => 'required',
          'total_fee'               => 'required',
          'paid_amount'             => 'required',
    ]);

      if ($request['paid_amount'] != ['total_fee']) {
      		redirect()->back()->with('message','paid_amount must be Equal');
      }

        //  ?   Insert Database
        $appointment = Appointment::create([

            'appointment_no'      => $this->generateUniqueCode(),
            'appointment_date'    => implode(',',$request->appointment_date),
            'doctor_id'           => implode(',',$request->doctor_id),
            'patient_name'        => $request->input('patient_name'),
            'patient_phone'       => $request->input('patient_phone'),
            'total_fee'           => $request->input('total_fee'),
            'paid_amount'         => $request->input('paid_amount'),

        ]);

          return redirect()->route('appointments.list')->with('message','Appointment Added Successfully');

  }

  //    ?   Home Page & Final Appointment List
  public function listAppointment()
  {
        session()->has('code');
        session()->forget('code');

        $appointments = Appointment::orderby('id','desc')->with('doctors')->paginate(5);

        // dd($appointments);

        return view('appointments.list',compact('appointments'))
                                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

}
