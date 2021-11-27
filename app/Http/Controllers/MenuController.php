<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Auth;

class MenuController extends Controller
{
    /**Para obtener el listado de menus que se desplegara
     * según el perfil del usuario
     */
    public function getMenusUserSession()
    {
        $menus = Menu::all();
        return response($menus, 200);
    }
}
