<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "celular",
        "email",
        "cpf",
        "dataNacimento",
        "cidade",
        "estado",
        "pais",
        "rua",
        "numero",
        "bairro",
        "cep",
        "complemeto",
        "password",
        "salario"
    ];
}