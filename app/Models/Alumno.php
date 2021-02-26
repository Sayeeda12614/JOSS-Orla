<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciclo;
use App\Models\Curso;
use App\Models\Profesor;

class Alumno extends Model
{
    use HasFactory;

    protected $table = "alumnos";
    protected $fillable = [
        'nombre',
        'apellidos',
        'foto',
        'ciclo',
        'curso',
        'tutor'
    ];
    public function ciclos(){
        return $this->belongsTo(Ciclo::class, "ciclo", "id");
    }
    public function cursos(){
        return $this->belongsTo(Curso::class, "curso", "id");
    }
    public function profesors(){
        return $this->belongsTo(Profesor::class, "tutor", "id");
    }
}
