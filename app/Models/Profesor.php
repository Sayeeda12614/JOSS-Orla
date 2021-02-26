<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciclo;
use App\Models\Curso;
use App\Models\User;

class Profesor extends Model
{
    use HasFactory;

    protected $table = "profesors";
    protected $fillable = [
        'nombre',
        'apellidos',
        'foto',
        'id_user',
        'ciclo',
        'curso'   
    ];
    public function ciclos(){
        return $this->belongsTo(Ciclo::class, "ciclo", "id");
    }
    public function cursos(){
        return $this->belongsTo(Curso::class, "curso", "id");
    }
    public function usuarios(){
        return $this->belongsTo(User::class, "id_user", "id");
    }

}
