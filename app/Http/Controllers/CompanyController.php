<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Company Page';
        $companies = Company::all();

        return view('company.index', compact(
            'title',
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
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ];
        $request->validate($rules);

        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->storeAs('images', $imageName);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $imageName,
            'website' => $request->website,
        ]);

        return back()->with('success', 'Berhasil menambah data company!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $title = 'Company Page | Edit';

        return view('company.edit', compact(
            'title',
            'company'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // dd($request->oldimage);
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ];
        $request->validate($rules);

        if(!$request->logo){
            $imageName = $company->logo;
        }else{
            Storage::delete('images/' . $company->logo);
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('images', $imageName);
        }

        $company = $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $imageName,
            'website' => $request->website,
        ]);

        return redirect('/company')->with('updated', 'Berhasil mengubah data company!');
        // return response()->json([
        //     'success' => true,
        //     'company' =>$company
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company)
    {
        try{
            Storage::delete('images/' . $company->logo);
            $company->delete();
            // return response()->json([
            //     'success' => true
            // ], 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
