<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importe isso
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory; // Adicione isso dentro da classe

    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco'];
}
