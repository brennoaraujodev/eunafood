<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';
    protected $fillable = ['nome', 'descricao'];

    public function pesquisar($filtro = null)
    {
        $resultado = $this
                          ->where('nome','LIKE',"%{$filtro}%")
                          ->orWhere('descricao','LIKE',"%{$filtro}%")
                          ->paginate(10);

        return $resultado;
    }

}
