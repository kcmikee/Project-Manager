<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
          // code...
          $companies = Company::where('user_id',Auth::user()->id)->get();
          return view('companies.index', ['companies'=>$companies]);
        }else {
          return view('Auth.login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
          $company = Company::create([
            'name'=> $request->input('name'),
            'description'=>$request->input('description'),
            'user_id' => Auth::user()->id
          ]);

          if($company){
            return redirect()->route('companies.show' , ['company'=>$company->id])
            ->with('success' , 'Company updated successfullly!');
          }
        }
              return back()->withInput()->with('errors' , 'something went wrong, Try Again');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
      //  $company = Company::where('$id', $company)->first;
        $company = Company::find($company->id);
        return view('companies.show', ['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::find($company->id);
        return view('companies.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        //sava data
        $companyUpdate= Company::where('id', $company->id)
                ->update([
                  'name'=> $request->input('name'),
                  'description'=>$request->input('description')
                ]);

        if($companyUpdate){
          return redirect()->route('companies.show', ['company'=>$company->id])
          ->with('success' , 'Company updated successfullly!');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $findcompany= Company::find($company->id);
          if($findcompany->delete()){
            //redirect
            return redirect()->route('companies.index')
            ->with('success' , 'Company deleted successfullly');
          }
          return back()->withInput->with('error' , 'This company could not be deleted');
    }
}
