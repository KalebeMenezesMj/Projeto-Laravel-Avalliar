<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_cliente',
        'empresa_contratante',
        'endereco',
        'engenheiro_responsavel',
        'contato_vistoria',
        'data_abertura',
        'status',
    ];
}