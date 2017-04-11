<?php

namespace App\Http\Controllers;

use Auth;
use App\Menu;
use App\Country;
use App\Link;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $global_links = Link::where('parent_id', 0)->where('country_id', $this::country()->id)->orderBy('orden', 'asc')->get();

        view()->share('country', $this::country());
        view()->share('global_links', $global_links);
    }
    public function country() {
        $domain = request()->server->get('SERVER_NAME');
        $country = Country::where('domain', $domain)->first();
        if($country) {
            return $country;
        } else {
            $country = Country::first();
            return $country;
        }
        
    }

    public function hasrole($role) {
        //validar solo admin
        $current_user = Auth::user();
        if($current_user->role == $role) {
            return true;
        } else {
            flash('No tiene permiso para acceder a esta área.', 'danger');
            return false;
        }
    }


}
