<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $countries = Country::orderBy('updated_at', 'desc')->paginate(20);
        return view('countries/index', compact('countries'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'domain' => ['required', 'max:150'],
            'code' => ['unique:countries', 'required', 'max:50']
        ]);
        $record_store = request()->all();
        Country::create($record_store);
        return redirect()->action('CountryController@index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $country = Country::find($id);
        return view('countries/edit', compact('country'));
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
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $country = Country::findOrFail($id);
        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'domain' => ['required', 'max:150'],
            'code' => ['unique:countries,code,'.$country->id]
        ]);
        $record_store = request()->all();
        $country->fill($record_store)->save();
        return redirect()->action('CountryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $country = Country::find($id);
        Country::destroy($category->id);
        return redirect()->action('CountryController@index');
    }
}
