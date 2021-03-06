<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoDetalhe extends Model
{
    use HasFactory;

    protected $fillable=['nome'];

    public function plano()
    {
        $this->belongsTo(Plano::class);
    }
}
