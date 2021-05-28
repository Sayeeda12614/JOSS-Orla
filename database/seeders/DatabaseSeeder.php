<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\User;
use App\Models\Ciclo;
use App\Models\Curso;
use App\Models\ClaveRegistro;
use App\Models\Clave;
use App\Models\Integrante;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->usuarios();
        $this->ciclos();
        $this->cursos();
        $this->claves_registro();
        $this->claves();
        $this->integrantes();

    }
    private function usuarios(){
        $admin = new User();
        $admin->name="Admin";
        $admin->tipo="administrador";
        $admin->password=Hash::make("admin123456");
        $admin->email="admin@gmail.com";
        $admin->save();

        $jon = new User();
        $jon->name="Jon";
        $jon->tipo="tutor";
        $jon->password=Hash::make("jon123456");
        $jon->email="jon@gmail.com";
        $jon->save();
    }
    private function ciclos(){
        $ciclo = new Ciclo();
        $ciclo->nombre="Desarrollo de Aplicaciones Web, G. SUP";
        $ciclo->save();

        $ciclo1 = new Ciclo();
        $ciclo1->nombre="Desarrollo de Aplicaciones Multiplataforma, G. SUP";
        $ciclo1->save();

        $ciclo2 = new Ciclo();
        $ciclo2->nombre="Integración Social, G. SUP";
        $ciclo2->save();

        $ciclo3 = new Ciclo();
        $ciclo3->nombre="Laboratorio de Análisis y Control de Calidad, G. SUP";
        $ciclo3->save();

        $ciclo4 = new Ciclo();
        $ciclo4->nombre="Administración y Finanzas, G. SUP";
        $ciclo4->save();

        $ciclo5 = new Ciclo();
        $ciclo5->nombre="Marketing y Publicidad, G. SUP";
        $ciclo5->save();

        $ciclo6 = new Ciclo();
        $ciclo6->nombre="Gestión de Ventas y Espacios Comerciales, G. SUP";
        $ciclo6->save();

        $ciclo7 = new Ciclo();
        $ciclo7->nombre="Administración de Sist Informáticos en Red, G. SUP";
        $ciclo7->save();

        $ciclo8 = new Ciclo();
        $ciclo8->nombre="Instalación de Telecomunicaciones, G. MED";
        $ciclo8->save();

        $ciclo9 = new Ciclo();
        $ciclo9->nombre="Actividades Comerciales, G. MED";
        $ciclo9->save();

        $ciclo10 = new Ciclo();
        $ciclo10->nombre="Sist Microinformáticos en Red, G. MED";
        $ciclo10->save();
    }
    
    private function cursos(){
        $curso = new Curso();
        $curso->anio="2021";
        $curso->save();

        $curso0 = new Curso();
        $curso0->anio="2020";
        $curso0->save();

        $curso1 = new Curso();
        $curso1->anio="2019";
        $curso1->save();

        $curso2 = new Curso();
        $curso2->anio="2018";
        $curso2->save();
    }

    function claves_registro(){

        $clave_reg = new ClaveRegistro();
        $clave_reg->clave = "claveadmin";
        $clave_reg->curso = 1;
        $clave_reg->save();
    }
    function claves() {
        $clave = new Clave();
        $clave->clave = "123456";
        $clave->ciclo = 1;
        $clave->curso = 1;
        $clave->tutor = 2;
        $clave->save();
    }
    function integrantes() {
        $file = fopen('public/assets/csv/integrantes.csv', "r");
            $data = array();
            $i = 0;
            while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                $num = count($filedata );
                // Skip first row (Remove below comment if you want to skip the first row)
                if($i == 0){
                    $i++;
                    continue;
                }
                for ($c=0; $c < $num; $c++) {
                   $data[$i][] = $filedata [$c];
                }
                $i++;
             }
             fclose($file);
    
            // Insert to MySQL database
            foreach($data as $importData){
                $integrante = new Integrante();
                $integrante->id=$importData[0];
                $integrante->nombre=$importData[1];
                $integrante->apellidos=$importData[2];
                $integrante->foto=$importData[3];
                $integrante->tipo=$importData[4];
                $integrante->tutor=$importData[5];
                $integrante->ciclo=$importData[6];
                $integrante->curso=$importData[7];
                $integrante->save();
            }
    }
    

}
