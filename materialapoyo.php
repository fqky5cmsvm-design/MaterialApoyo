<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialApoyo extends Model // 
{
    use HasFactory;

    protected $table = 'materialapoyos';

    protected $fillable = [
        'no_unidad',
        'materia',
        'grupo',
        'periodo',
        'rfc',
        'id_material_apoyo',
        'materiales_apoyo',
        'materiales_apoyo1',
    ];

}