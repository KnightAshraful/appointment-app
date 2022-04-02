<?php

namespace App\Http\Controllers;

//  *   All Using Paths
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderby('id','desc')->with('department')->paginate(5);

        return view('doctors.index',compact('doctors'))
                                ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('doctors.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  todo    Validation Check in
        $request->validate([

            'department_id' => 'required|integer',
            'name' => 'required',
            'phone' => 'required',
            'fee' => 'required|integer',

        ]);

        //  todo    Data Insert in DB
        Doctor::create($request->all());

        return redirect()->route('doctors.index')
                            ->with('success','Data created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $departments = Department::all();

        return view('doctors.edit',compact('doctor','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //  todo    Validation Check in
        $request->validate([

            'department_id' => 'required|integer',
            'name' => 'required',
            'phone' => 'required|integer',
            'fee' => 'required|integer',
        ]);

        //  todo    Data Update on DB
        $doctor->update($request->all());

        return redirect()->route('doctors.index')
                        ->with('success','Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
                        ->with('success','Data deleted successfully');

    }
    
}
