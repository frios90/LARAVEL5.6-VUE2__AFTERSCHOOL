<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Commune;
use App\Models\Country;

use App\Models\Region;
use App\Models\Status;
use App\Models\Subject;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

/**Semillas para Chile */
        $CHILE = Country::create(['name' => 'Chile']);
    /** Semillas para Regiones de Chile*/          
            $ARICAYPARINACOTA = Region::create(['name' => 'Arica y Parinacota XV', 'country_id' =>$CHILE->id]);
                Commune::create(['name' => 'Arica',          'region_id' => $ARICAYPARINACOTA->id]);
                Commune::create(['name' => 'Camarones',      'region_id' => $ARICAYPARINACOTA->id]);
                Commune::create(['name' => 'General Lagos',  'region_id' => $ARICAYPARINACOTA->id]);
                Commune::create(['name' => 'Putre',          'region_id' => $ARICAYPARINACOTA->id]);
            
            $TARAPACA = Region::create(['name' => 'Tarapacá I', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Alto Hospicio','region_id' => $TARAPACA->id]);
                Commune::create(['name' => 'Iquique','region_id'       => $TARAPACA->id]);
                Commune::create(['name' => 'Camiña','region_id'        => $TARAPACA->id]);
                Commune::create(['name' => 'Colchane','region_id'      => $TARAPACA->id]);
                Commune::create(['name' => 'Huara','region_id'         => $TARAPACA->id]);
                Commune::create(['name' => 'Pica','region_id'          => $TARAPACA->id]);
                Commune::create(['name' => 'Pozo Almonte','region_id'  => $TARAPACA->id]);

            $ANTOFAGASTA = Region::create(['name' => 'Antofagasta II', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Antofagasta','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Mejillones','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Sierra Gorda','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Taltal','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Calama','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Ollague','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'San Pedro de Atacama','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'María Elena','region_id'  => $ANTOFAGASTA->id]);
                Commune::create(['name' => 'Tocopilla','region_id'  => $ANTOFAGASTA->id]);


            $ATACAMA = Region::create(['name' => 'Atacama III',    'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Chañaral','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Diego de Almagro','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Caldera','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Copiapó','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Tierra Amarilla','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Alto del Carmen','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Freirina','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Huasco','region_id'  => $ATACAMA->id]);
                Commune::create(['name' => 'Vallenar','region_id'  => $ATACAMA->id]);


            $COQUIMBO = Region::create(['name' => 'Coquimbo IV',    'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Canela','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Illapel','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Los Vilos','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Salamanca','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Andacollo','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Coquimbo','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'La Higuera','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'La Serena','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Paihuaco','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Vicuña','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Combarbalá','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Monte Patria','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Ovalle','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Punitaqui','region_id'  => $COQUIMBO->id]);
                Commune::create(['name' => 'Río Hurtado','region_id'  => $COQUIMBO->id]);

            $VALPARAISO = Region::create(['name' => 'Valparaíso V',   'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Isla de Pascua','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Calle Larga','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Los Andes','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Rinconada','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'San Esteban','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'La Ligua','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Papudo','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Petorca','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Zapallar','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Hijuelas','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'La Calera','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'La Cruz','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Limache','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Nogales','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Olmué','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Quillota','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Algarrobo','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Cartagena','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'El Quisco','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'El Tabo','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'San Antonio','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Santo Domingo','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Catemu','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Llaillay','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Panquehue','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Putaendo','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'San Felipe','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Santa María','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Casablanca','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Concón','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Juan Fernández','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Puchuncaví','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Quilpué','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Quintero','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Valparaíso','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Villa Alemana','region_id'  => $VALPARAISO->id]);
                Commune::create(['name' => 'Viña del Mar','region_id' => $VALPARAISO->id]);
                Commune::create(['name' => 'Cabildo','region_id' => $VALPARAISO->id]);

            $SANTIAGO = Region::create(['name' => 'Metropolitana de Santiago RM', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Colina','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Lampa','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Tiltil','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Pirque','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Puente Alto','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San José de Maipo','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Buin','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Calera de Tango','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Paine','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San Bernardo','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Alhué','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Curacaví','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'María Pinto','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Melipilla','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San Pedro','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Cerrillos','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Cerro Navia','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Conchalí','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'El Bosque','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Estación Central','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Huechuraba','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Independencia','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'La Cisterna','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'La Granja','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'La Florida','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'La Pintana','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'La Reina','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Las Condes','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Lo Barnechea','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Lo Espejo','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Lo Prado','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Macul','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Maipú','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Ñuñoa','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Pedro Aguirre Cerda','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Peñalolén','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Providencia','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Pudahuel','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Quilicura','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Quinta Normal','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Recoleta','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Renca','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San Miguel','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San Joaquín','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'San Ramón','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Santiago','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Vitacura','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'El Monte','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Isla de Maipo','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Padre Hurtado','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Peñaflor','region_id' => $SANTIAGO->id]);
                Commune::create(['name' => 'Talagante','region_id' => $SANTIAGO->id]);


            $BERNARDO = Region::create(['name' => 'Libertador General Bernardo O\'Higgins VI', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Codegua','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Coínco','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Coltauco','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Doñihue','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Graneros','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Las Cabras','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Machalí','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Malloa','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Mostazal','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Olivar','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Peumo','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Pichidegua','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Quinta de Tilcoco','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Rancagua','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Rengo','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Requínoa','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'San Vicente de Tagua Tagua','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'La Estrella','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Litueche','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Marchihue','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Navidad','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Peredones','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Pichilemu','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Chépica','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Chimbarongo','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Lolol','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Nancagua','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Palmilla','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Peralillo','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Placilla','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Pumanque','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'San Fernando','region_id' => $BERNARDO->id]);
                Commune::create(['name' => 'Santa Cruz','region_id' => $BERNARDO->id]);
           
           
            $MAULE = Region::create(['name' => 'Maule VII',       'country_id' => $CHILE->id]);

                Commune::create(['name' => 'Cauquenes','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Chanco','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Pelluhue','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Curicó','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Hualañé','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Licantén','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Molina','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Rauco','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Romeral','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Sagrada Familia','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Teno','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Vichuquén','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Colbún','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Linares','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Longaví','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Parral','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Retiro','region_id' => $MAULE->id]);
                Commune::create(['name' => 'San Javier','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Villa Alegre','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Yerbas Buenas','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Constitución','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Curepto','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Empedrado','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Maule','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Pelarco','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Pencahue','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Río Claro','region_id' => $MAULE->id]);
                Commune::create(['name' => 'San Clemente','region_id' => $MAULE->id]);
                Commune::create(['name' => 'San Rafael','region_id' => $MAULE->id]);
                Commune::create(['name' => 'Talca','region_id' => $MAULE->id]);


            $BIO = Region::create(['name' => 'Biobío VIII', 'country_id' => $CHILE->id]);

                Commune::create(['name' => 'Arauco','region_id' => $BIO->id]);
                Commune::create(['name' => 'Cañete','region_id' => $BIO->id]);
                Commune::create(['name' => 'Contulmo','region_id' => $BIO->id]);
                Commune::create(['name' => 'Curanilahue','region_id' => $BIO->id]);
                Commune::create(['name' => 'Lebu','region_id' => $BIO->id]);
                Commune::create(['name' => 'Los Álamos','region_id' => $BIO->id]);
                Commune::create(['name' => 'Tirúa','region_id' => $BIO->id]);
                Commune::create(['name' => 'Alto Biobío','region_id' => $BIO->id]);
                Commune::create(['name' => 'Antuco','region_id' => $BIO->id]);
                Commune::create(['name' => 'Cabrero','region_id' => $BIO->id]);
                Commune::create(['name' => 'Laja','region_id' => $BIO->id]);
                Commune::create(['name' => 'Los Ángeles','region_id' => $BIO->id]);
                Commune::create(['name' => 'Mulchén','region_id' => $BIO->id]);
                Commune::create(['name' => 'Nacimiento','region_id' => $BIO->id]);
                Commune::create(['name' => 'Negrete','region_id' => $BIO->id]);
                Commune::create(['name' => 'Quilaco','region_id' => $BIO->id]);
                Commune::create(['name' => 'Quilleco','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Rosendo','region_id' => $BIO->id]);
                Commune::create(['name' => 'Santa Bárbara','region_id' => $BIO->id]);
                Commune::create(['name' => 'Tucapel','region_id' => $BIO->id]);
                Commune::create(['name' => 'Yumbel','region_id' => $BIO->id]);
                Commune::create(['name' => 'Chiguayante','region_id' => $BIO->id]);
                Commune::create(['name' => 'Concepción','region_id' => $BIO->id]);
                Commune::create(['name' => 'Coronel','region_id' => $BIO->id]);
                Commune::create(['name' => 'Florida','region_id' => $BIO->id]);
                Commune::create(['name' => 'Hualpén','region_id' => $BIO->id]);
                Commune::create(['name' => 'Hualqui','region_id' => $BIO->id]);
                Commune::create(['name' => 'Lota','region_id' => $BIO->id]);
                Commune::create(['name' => 'Penco','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Pedro de La Paz','region_id' => $BIO->id]);
                Commune::create(['name' => 'Santa Juana','region_id' => $BIO->id]);
                Commune::create(['name' => 'Talcahuano','region_id' => $BIO->id]);
                Commune::create(['name' => 'Tomé','region_id' => $BIO->id]);
                Commune::create(['name' => 'Bulnes','region_id' => $BIO->id]);
                Commune::create(['name' => 'Chillán','region_id' => $BIO->id]);
                Commune::create(['name' => 'Chillán Viejo','region_id' => $BIO->id]);
                Commune::create(['name' => 'Cobquecura','region_id' => $BIO->id]);
                Commune::create(['name' => 'Coelemu','region_id' => $BIO->id]);
                Commune::create(['name' => 'Coihueco','region_id' => $BIO->id]);
                Commune::create(['name' => 'El Carmen','region_id' => $BIO->id]);
                Commune::create(['name' => 'Ninhue','region_id' => $BIO->id]);
                Commune::create(['name' => 'Ñiquen','region_id' => $BIO->id]);
                Commune::create(['name' => 'Pemuco','region_id' => $BIO->id]);
                Commune::create(['name' => 'Pinto','region_id' => $BIO->id]);
                Commune::create(['name' => 'Portezuelo','region_id' => $BIO->id]);
                Commune::create(['name' => 'Quillón','region_id' => $BIO->id]);
                Commune::create(['name' => 'Quirihue','region_id' => $BIO->id]);
                Commune::create(['name' => 'Ránquil','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Carlos','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Fabián','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Ignacio','region_id' => $BIO->id]);
                Commune::create(['name' => 'San Nicolás','region_id' => $BIO->id]);
                Commune::create(['name' => 'Treguaco','region_id' => $BIO->id]);
                Commune::create(['name' => 'Yungay','region_id' => $BIO->id]);



            $ARAUCO = Region::create(['name' => 'La Araucanía IX', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Carahue','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Cholchol','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Cunco','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Curarrehue','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Freire','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Galvarino','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Gorbea','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Lautaro','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Loncoche','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Melipeuco','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Nueva Imperial','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Padre Las Casas','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Perquenco','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Pitrufquén','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Pucón','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Saavedra','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Temuco','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Teodoro Schmidt','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Toltén','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Vilcún','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Villarrica','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Angol','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Collipulli','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Curacautín','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Ercilla','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Lonquimay','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Los Sauces','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Lumaco','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Purén','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Renaico','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Traiguén','region_id' => $ARAUCO->id]);
                Commune::create(['name' => 'Victoria','region_id' => $ARAUCO->id]);


            $RIOS = Region::create(['name' => 'Los Ríos XIV',    'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Corral','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Lanco','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Los Lagos','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Máfil','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Mariquina','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Paillaco','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Panguipulli','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Valdivia','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Futrono','region_id' => $RIOS->id]);
                Commune::create(['name' => 'La Unión','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Lago Ranco','region_id' => $RIOS->id]);
                Commune::create(['name' => 'Río Bueno','region_id' => $RIOS->id]);

            $LAGOS = Region::create(['name' => 'Los Lagos X',     'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Ancud','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Castro','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Chonchi','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Curaco de Vélez','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Dalcahue','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Puqueldón','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Queilén','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Quemchi','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Quellón','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Quinchao','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Calbuco','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Cochamó','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Fresia','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Frutillar','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Llanquihue','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Los Muermos','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Maullín','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Puerto Montt','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Puerto Varas','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Osorno','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Puero Octay','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Purranque','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Puyehue','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Río Negro','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'San Juan de la Costa','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'San Pablo','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Chaitén','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Futaleufú','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Hualaihué','region_id' => $LAGOS->id]);
                Commune::create(['name' => 'Palena','region_id' => $LAGOS->id]);



            $AISEN = Region::create(['name' => 'Aisén del General Carlos Ibáñez del Campo XI', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Aisén','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Cisnes','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Guaitecas','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Cochrane','region_id' => $AISEN->id]);
                Commune::create(['name' => 'O\'higgins','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Tortel','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Coihaique','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Lago Verde','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Chile Chico','region_id' => $AISEN->id]);
                Commune::create(['name' => 'Río Ibáñez','region_id' => $AISEN->id]);
            
            $MAGALLANES = Region::create(['name' => 'Magallanes y de la Antártica Chilena XII', 'country_id' => $CHILE->id]);
                Commune::create(['name' => 'Antártica','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Cabo de Hornos','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Laguna Blanca','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Punta Arenas','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Río Verde','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'San Gregorio','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Porvenir','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Primavera','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Timaukel','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Natales','region_id' => $MAGALLANES->id]);
                Commune::create(['name' => 'Torres del Paine','region_id' => $MAGALLANES->id]);
          
        
        
        /**Perfiles del Sistema */
        Profile::create(['name' => 'admin', 'label' => 'Administrador']);
        Profile::create(['name' => 'teacher', 'label' => 'Profesor / Docente']);
        Profile::create(['name' => 'attorney','label' => 'Apoderado']);
        Profile::create(['name' => 'alumn','label' => 'Alumno']);
        

/**Usuario para Administrador Francisco Rios Castillo */ 
        User::create([
            'rut'        => '17.482.835-0',
            'name'       => 'Francisco Javier Rios Castillo',
            'email'      => 'frios@fejhu.cl',
            'password'   => bcrypt('03272835'),
            'phone'      => 949500353,
            'address'    => 'Administración santiago',
            'genere'     => 'male',
            'birthdate'  => '1990-03-27',
            'profile_id' => Profile::where('name', '=', 'admin')->first()->id,
            'commune_id' => Commune::where('name', '=', 'Ancud')->first()->id,
            'region_id'  => Region::where('name', '=', 'Los Lagos X')->first()->id,
            'country_id'  => Country::where('name', '=', 'Chile')->first()->id,
            
         ]);

        
        
        
        
        
        
        
            }


    
    
}