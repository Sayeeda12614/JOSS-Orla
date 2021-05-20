<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
class ClaveRegistro extends Model
{
    use HasFactory;
    protected $table = "claves_registro";
    protected $fillable = [
        'clave',
        'curso'
    ];
    public function cursos(){
        return $this->belongsTo(Curso::class, "curso","id");
    }
}
