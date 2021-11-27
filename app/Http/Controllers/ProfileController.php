<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Retorna el listado de perfiles para un combo seleccionable
     */

    public function getListSelectBox () 
    {
        return response(Profile::All(), 200); 
    }
}
