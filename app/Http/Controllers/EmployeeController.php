<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Employee Page';
        $employees = Employee::paginate(10)->withQueryString();
        $companies = Company::all();

        return view('employee.index', compact(
            'title',
            'employees',
            'companies'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:6',
        ];
        $request->validate($rules);

        Employee::create($request->all());

        return back()->with('success', 'Berhasil menambah data employee!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $title = 'Employee Page \ Edit';
        $companies = Company::all();

        return view('employee.edit', compact(
            'employee',
            'companies',
            'title'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // dd($request->all());
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $request->validate($rules);

        $employee->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('/employee')->with('updated', 'Berhasil mengubah data employee!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
            // return response()->json([
            //     'success' => true
            // ], 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
