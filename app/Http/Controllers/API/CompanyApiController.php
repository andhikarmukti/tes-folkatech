<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return response()->json([
            'companies' => $companies
        ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->storeAs('images', $imageName);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $imageName,
            'website' => $request->website,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New company has been created!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $company = Company::find($id);
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        if(!$request->logo){
            $imageName = $company->logo;
        }else{
            Storage::delete('images/' . $company->logo);
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('images', $imageName);
        }

        Company::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $imageName,
            'website' => $request->website,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New company has been updated!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        try{
            Storage::delete('images/' . $company->logo);
            $company->delete();
            return response()->json([
                'success' => true,
                'message' => 'The company has been deleted!'
            ], 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
