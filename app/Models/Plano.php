<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlanoDetalhe;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','preco','url'];

    public function detalhes()
    {
        return $this->hasMany(PlanoDetalhe::class);
    }

    public function pesquisar($filtro = null)
    {
        $resultado = $this
                          ->where('nome','LIKE',"%{$filtro}%")
                          ->orWhere('descricao','LIKE',"%{$filtro}%")
                          ->paginate(10);

        return $resultado;
    }
}
