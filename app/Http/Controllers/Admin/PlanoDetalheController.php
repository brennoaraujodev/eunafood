<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use App\Models\PlanoDetalhe;
use Illuminate\Http\Request;

class PlanoDetalheController extends Controller
{
    protected $repositorio, $plano;

    public function __construct(PlanoDetalhe $planoDetalhe, Plano $plano)
    {
        $this->repositorio = $planoDetalhe;
        $this->plano = $plano;
    }


    public function index($planoUrl)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        if (!$plano)
        {
            return redirect()->back();
        }
        $detalhes = $plano->detalhes()->paginate();

        return view('admin.paginas.planos.detalhes.index',[
            'plano'=>$plano,
            'detalhes'=>$detalhes,
        ]);
    }




    public function create($planoUrl)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        if (!$plano)
        {
            return redirect()->back();
        }
        return view('admin.paginas.planos.detalhes.create',[
           'plano'=>$plano,
        ]);
    }




    public function store(Request $request, $planoUrl)
    {

        $plano = $this->plano->where('url',$planoUrl)->first();
        if (!$plano)
        {
            return redirect()->back();
        }

        $plano->detalhes()->create(request()->all());

        return redirect(route('planosdetalhes.index',$plano->url));

    }




    public function show($id)
    {
        //
    }




    public function edit($id)
    {
        //
    }




    public function update(Request $request, $id)
    {
        //
    }




    public function destroy($id)
    {
        //
    }
}
