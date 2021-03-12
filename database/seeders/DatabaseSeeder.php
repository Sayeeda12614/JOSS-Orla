<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\User;
use App\Models\Ciclo;
use App\Models\Curso;
use App\Models\Profesor;
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
        // $this->profesores();

    }
    private function usuarios(){
        $admin = new User();
        $admin->name="Admin";
        $admin->tipo="administrador";
        $admin->password=Hash::make("admin123456");
        $admin->email="admin@gmail.com";
        $admin->save();
    }
    private function ciclos(){
        $file = fopen('public/assets/csv/Ciclos.csv', "r");
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
            $Ciclo = new Ciclo();
            $Ciclo->id=$importData[0];
            $Ciclo->nombre=$importData[1];
            $Ciclo->save();
        }
    }
    private function cursos(){
        $file = fopen('public/assets/csv/Cursos.csv', "r");
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
            $Curso = new Curso();
            $Curso->id=$importData[0];
            $Curso->ano=$importData[1];
            $Curso->save();
        }
    }
    // private function profesores(){
    //     $file = fopen('public/assets/csv/Profesores.csv', "r");
    //     $data = array();
    //     $i = 0;
    //     while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
    //         $num = count($filedata );
    //         // Skip first row (Remove below comment if you want to skip the first row)
    //         if($i == 0){
    //             $i++;
    //             continue;
    //         }
    //         for ($c=0; $c < $num; $c++) {
    //            $data[$i][] = $filedata [$c];
    //         }
    //         $i++;
    //      }
    //      fclose($file);

    //     // Insert to MySQL database
    //     foreach($data as $importData){
    //         $Profesor = new Profesor();
    //         $Profesor->id=$importData[0];
    //         $Profesor->nombre=$importData[1];
    //         $Profesor->apellidos=$importData[2];
    //         $Profesor->foto=$importData[3];
    //         $Profesor->id_user=$importData[4];
    //         $Profesor->ciclo=$importData[5];
    //         $Profesor->curso=$importData[6];
    //         $Profesor->save();
    //     }
    // }

}
