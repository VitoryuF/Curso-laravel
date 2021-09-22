<?php

namespace App\Models\painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    // use HasFactory;


    //Lista de dados autorizados, necessário somnente para uma conexão na hora de inserir dados no banco usando metood create, até então somente para isso.
    protected $fillable = [
        'name', 'number', 'active', 'image', 'categoria', 'desc'
    ];


    //Lista de dados não autorizados
    // protected $guarded = [
    //     'admin'
    // ];

}
