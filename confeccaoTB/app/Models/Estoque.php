<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoque extends Model
{
    use HasFactory;
    protected $fillable = ['quantidade', 'cpf', 'email', 'telefone', 'endereco'];
}
