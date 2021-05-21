<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','preco','url'];

    public function pesquisar($filtro = null){
        $resultado = $this
                          ->where('nome','LIKE',"%{$filtro}%")
                          ->orWhere('descricao','LIKE',"%{$filtro}%")
                          ->paginate(1);

        return $resultado;
    }
}
