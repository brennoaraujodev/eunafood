<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';
    protected $fillable = ['nome', 'descricao'];

    //Consulta por nome e descrição
    public function pesquisar($filtro = null)
    {
        $resultado = $this
                          ->where('nome','LIKE',"%{$filtro}%")
                          ->orWhere('descricao','LIKE',"%{$filtro}%")
                          ->paginate(10);

        return $resultado;
    }

    //Buscar perfis
    public function perfis(){
        return $this->belongsToMany(Perfil::class,'perfil_permissao');
    }
}
