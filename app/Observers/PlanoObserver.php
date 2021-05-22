<?php

namespace App\Observers;

use App\Models\Plano;
use Illuminate\Support\Str;

class PlanoObserver
{
    /**
     * Handle the Plano "created" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function creating(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }

    /**
     * Handle the Plano "updated" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function updating(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }
}
