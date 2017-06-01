<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function duplicate(Request $request) {
        $page = Page::find($request->id);
        $newPage = $page->replicate();
        $newPage->slug = $newPage->slug .'-copy'; 
        $newPage->save();

        return redirect()->action('PageController@edit', $newPage->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $q = $request->session()->get('q');
        $q_country = $request->session()->get('q_country');
        $q_category = $request->session()->get('q_category');
        $q_trash = $request->session()->get('q_trash');
        
        if(isset($request->q)) {
            //set categry
            $request->session()->put('q_category', $request->q_category);
            $q_category = $request->q_category;

            //set countrie
            $request->session()->put('q_country', $request->q_country);
            $q_country = $request->q_country;

            //set countrie
            $request->session()->put('q', $request->q);
            $q = $request->q;

            //set trash
            $request->session()->put('q_trash', $request->q_trash);
            $q_trash = $request->q_trash;
            
        }

        $pages = Page::where(function($query) use ($q){
                    $query->where('name', 'LIKE', '%'.$q.'%')
                        ->orWhere('content', 'LIKE', '%'.$q.'%');
            })        
            ->where(function($query) use ($q_country){
                if(isset($q_country) && $q_country != 'all') {
                    $query->where('country_id', $q_country);
                }
            })
            ->where(function($query) use ($q_category){
                if(isset($q_category) && $q_category != 'all') {
                    $query->where('category_id', $q_category);
                }
            })
            ->orderBy('updated_at', 'desc');
            //if soft delete
            if(isset($q_trash) && $q_trash == 1) {
                $pages->onlyTrashed();
            }
            $pages = $pages->paginate(50);

        $categories = Category::all();
        $countries = Country::all();
        return view('pages/index', compact('pages', 'categories', 'countries', 'q_country', 'q_category', 'q', 'q_trash'));
    }

    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages', 'required', 'max:50']
        ]);
        $record_store = request()->all();
        $page = Page::create($record_store);
        return redirect()->action('PageController@edit', $page->id);
    }

    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::withTrashed()->find($id);
        $categories = Category::all();
        $countries = Country::all();
        return view('pages/edit', compact('page', 'categories', 'countries'));
    }
    public function update(Request $request, $id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::withTrashed()->find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages,slug,'.$page->id, 'required', 'max:50']
        ]);

        //restore trashed item
        if($request->untrash) {
            $page->restore();
        }
        $record_store = request()->all();
        $page->fill($record_store)->save();
        return redirect()->action('PageController@index');
    }
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $page = Page::withTrashed()->find($id);
        if($page->trashed()) {
            $page->forceDelete();
        }
        Page::destroy($page->id);
        return redirect()->action('PageController@index');
    }
}
