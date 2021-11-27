<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Subject::create([
            'name' => 'Libre',
            'code' => 'OTHER',
            'description' => 'Clase Libre'
        ]);

        $now = \Carbon\Carbon::now();
        $regions = [
            [1,'Arica y Parinacota','XV'],
            [2,'Tarapacá I'],
            [3,'Antofagasta II'],
            [4,'Atacama III'],
            [5,'Coquimbo IV'],
            [6,'Valparaíso V'],
            [7,'Metropolitana de Santiago RM'],
            [8,'Libertador General Bernardo O\'Higgins VI'],
            [9,'Maule VII'],
            [10,'Biobío VIII'],
            [11,'La Araucanía IX'],
            [12,'Los Ríos XIV'],
            [13,'Los Lagos X'],
            [14,'Aisén del General Carlos Ibáñez del Campo XI'],
            [15,'Magallanes y de la Antártica Chilena XII']
        ];
        $regions = array_map(function($region) use ($now) {
           return [
               'id' => $region[0],
               'name' => $region[1],
               'ordinal' => $region[2],
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $regions);
        \DB::table('regions')->insert($regions);
        $communes = [
           
            
         
      
 
         
   
            
       
            
           
            
            
            
        ];
        $communes = array_map(function($commune) use ($now) {
            return [
                'id' => $commune[0],
                'name' => $commune[1],
                'region_id' => $commune[2],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $communes);
        \DB::table('communes')->insert($communes); // Query Builder 
    




/**Perfiles del Sistema */
        Profile::insert(['name' => 'admin', 'label' => 'Administrador', 'created_at' => $now, 'updated_at' => $now]);
        Profile::insert(['name' => 'teacher', 'label' => 'Profesor / Docente', 'created_at' => $now, 'updated_at' => $now]);
        Profile::insert(['name' => 'attorney','label' => 'Apoderado', 'created_at' => $now, 'updated_at' => $now]);
        Profile::insert(['name' => 'alumn','label' => 'Alumno', 'created_at' => $now, 'updated_at' => $now]);
        

/**Usuario para Administrador Francisco Rios Castillo */ 
        User::insert([
            'rut'        => '17.482.835-0',
            'name'       => 'Francisco Javier Rios Castillo',
            'email'      => 'frios@fejhu.cl',
            'password'   => bcrypt('03272835'),
            'phone'      => 949500353,
            'address'    => 'Administración santiago',
            'genere'     => 'male',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'admin')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]);
/**Usuario para Administrador Paula */ 

        User::insert([
            'rut'        => '13.354.618-9',
            'name'       => 'Paula',
            'email'      => 'paula@after.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 77777777,
            'address'    => 'Administración santiago',
            'genere'     => 'female',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'admin')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]);  
/**Usuario para Profesores */        
        User::insert([            
            'rut'        => '13.986.085-3',
            'name'       => 'Mª Daniela Gallardo Valderrama',
            'email'      => 'p1@after.cl',
            'password'   => bcrypt('0717085'),
            'phone'      => 91222666,
            'address'    => 'La Pintana #273',
            'genere'     => 'female',
            'birthdate'  => '1981-07-17',
            'profile_id' => Profile::where('name', '=', 'teacher')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Concón')->first()->id,
            'region_id'  => Region::where('name', '=', 'Valparaíso')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]); 
        User::insert([            
            'rut'        => '15698712-0',
            'name'       => 'Profesor 2',
            'email'      => 'p2@after.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 9999999,
            'address'    => 'Administración santiago',
            'genere'     => 'female',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'teacher')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]); 
        User::insert([            
            'rut'        => '15698712-0',
            'name'       => 'Profesor 3',
            'email'      => 'p3@after.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 9999999,
            'address'    => 'Administración santiago',
            'genere'     => 'female',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'teacher')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]); 
        User::insert([            
            'rut'        => '15698712-0',
            'name'       => 'Profesor 4',
            'email'      => 'p4@after.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 9999999,
            'address'    => 'Administración santiago',
            'genere'     => 'female',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'teacher')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]); 
/**Usuario para Apoderados */        
        User::insert([            
            'rut'        => '15698712-0',
            'name'       => 'apoderado1',
            'email'      => 'apoderado1@after.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 9999999,
            'address'    => 'Administración santiago',
            'genere'     => 'male',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'attorney')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
            'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
            'created_at' => $now,
            'updated_at' => $now
        ]); 
        User::insert([            
            'rut'        => '15698712-0',
            'name'       => 'alumno 1',
            'email'      => 'al1@sofag.cl',
            'password'   => bcrypt('secret'),
            'phone'      => 9999999,
            'address'    => 'Administración santiago',
            'genere'     => 'male',
            'birthdate'  => '1990-03-27',
            'profile_id' => 4,
            'commune_id' => 12,
            'region_id'  => 4,
            'created_at' => $now,
            'updated_at' => $now,
            'attorney_id'=>  User::where('name', '=', 'apoderado1')->first()->id
        ]); 
/**Usuario para Apoderados */        
    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'apoderado2',
        'email'      => 'apoderado2@after.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'attorney')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now
    ]); 
    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'alumno 2',
        'email'      => 'al2@sofag.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'alumn')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now,
        'attorney_id'=>  User::where('name', '=', 'apoderado2')->first()->id
    ]); 

    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'apoderado3',
        'email'      => 'apoderado3@after.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'attorney')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now
    ]); 
    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'alumno 3',
        'email'      => 'al3@sofag.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'alumn')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now,
        'attorney_id'=>  User::where('name', '=', 'apoderado3')->first()->id
    ]); 
    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'alumno 4',
        'email'      => 'al4@sofag.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'alumn')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now,
        'attorney_id'=>  User::where('name', '=', 'apoderado3')->first()->id
    ]); 

    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'apoderado4',
        'email'      => 'apoderado4@after.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'attorney')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now
    ]); 
    User::insert([            
        'rut'        => '15698712-0',
        'name'       => 'alumno 5',
        'email'      => 'al5@sofag.cl',
        'password'   => bcrypt('secret'),
        'phone'      => 9999999,
        'address'    => 'Administración santiago',
        'genere'     => 'male',
        'birthdate'  => '1990-03-27',
        'profile_id' => Profile::where('name', '=', 'alumn')->first()->id,
        'commune_id' => Commune::where('name', '=', 'Freire')->first()->id,
        'region_id'  => Region::where('name', '=', 'Tarapacá')->first()->id,
        'created_at' => $now,
        'updated_at' => $now,
        'attorney_id'=>  User::where('name', '=', 'apoderado4')->first()->id
    ]); 

                        
/**Semillas para Estados del sistema */
        Status::insert([
            'type' => 'LESSONS',
            'code' => 'OPENED',
            'description' => 'Clase Creada',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        Status::insert([
            'type' => 'LESSONS',
            'code' => 'BEGINED',
            'description' => 'Clase Iniciada',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        Status::insert([
            'type' => 'LESSONS',
            'code' => 'FINISHED',
            'description' => 'Clase Terminada',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        Status::insert([
            'type' => 'LESSONS',
            'code' => 'CANCELED',
            'description' => 'Clase Cancelada',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        Status::insert([
            'type' => 'LESSONS',
            'code' => 'POSTPONED',
            'description' => 'Clase Pospuesta',
            'created_at' => $now,
            'updated_at' => $now
        ]); 

    
    }
}
