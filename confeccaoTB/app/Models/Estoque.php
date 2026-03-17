<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto',
        'quantidade',
        'preco_custo',
        'preco_venda',
        'fornecedor'
    ];
}