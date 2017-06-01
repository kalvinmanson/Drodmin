<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Link;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
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

        $menus = Menu::orderBy('updated_at', 'desc')->paginate(20);
        return view('menus/index', compact('menus'));
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
            'name' => ['required', 'max:100']
        ]);
        $record_store = request()->all();
        Menu::create($record_store);
        return redirect()->action('MenuController@index');
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

        $menu = Menu::find($id);
        $countries = Country::all();
        $linksl1 = Link::where('parent_id', 0)->where('menu_id', $menu->id)->orderBy('orden', 'asc')->get();
        return view('menus/edit', compact('menu', 'linksl1', 'countries'));
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

        $menu = Menu::findOrFail($id);
        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);
        $record_store = request()->all();
        $menu->fill($record_store)->save();
        return redirect()->action('MenuController@index');
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
        
        $menu = Menu::find($id);
        Menu::destroy($menu->id);
        return redirect()->action('MenuController@index');
    }
}
