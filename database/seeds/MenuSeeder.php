<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
      

        Menu::insert([
            'name'    => 'Dashboard',
            'class'   => 'mdi mdi-view-dashboard menu-icon',
            'path'    => 'home',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);
        Menu::insert([
            'name'    => 'Usuarios',
            'class'   => 'mdi mdi-account-multiple menu-icon',
            'path'    => 'users',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);   
        Menu::insert([
            'name'    => 'Viáticos',
            'class'   => 'mdi mdi-folder-multiple-image menu-icon',
            'path'    => 'viatics',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]); 
        Menu::insert([
            'name'    => 'Catálogo',
            'class'   => 'mdi mdi-database menu-icon',
            'path'    => 'catalogue',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);    
        Menu::insert([
            'name'    => 'Solicitudes',
            'class'   => 'mdi mdi-ticket menu-icon',
            'path'    => 'request.user',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);  
        Menu::insert([
            'name'    => 'Revisiones',
            'class'   => 'mdi mdi-bookmark menu-icon',
            'path'    => 'request.approve',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);
        Menu::insert([
            'name'    => 'Gestiones',
            'class'   => 'mdi mdi-play-box-outline menu-icon',
            'path'    => 'request.manage',
            'parent'  => '0',
            'created_at' => $now,
            'updated_at' => $now
            ]);

    }
}
