<?php

namespace App\Http\Controllers;


use Auth;
use App\Link;
use App\Country;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{


    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        //validation
        $this->validate($request, [
            'name'          =>  'required',
            'menu_id'       =>  'required'
        ]);
        
        //save record
        $link = request()->all();
        Link::create($link);

        //response
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }


    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $link = Link::find($id);
        $countries = Country::all();
        return view('links/edit', compact('link', 'countries'));
    }


    public function update(Request $request, $id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $link = Link::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);
        $record_store = request()->all();
        $link->fill($record_store)->save();
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }

    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $link = Link::find($id);
        Link::destroy($link->id);
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }
}
