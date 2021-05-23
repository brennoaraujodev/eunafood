<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use App\Models\PlanoDetalhe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePlanoDetalhe;

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




    public function store(StoreUpdatePlanoDetalhe $request, $planoUrl)
    {

        $plano = $this->plano->where('url',$planoUrl)->first();
        if (!$plano)
        {
            return redirect()->back();
        }

        $plano->detalhes()->create(request()->all());

        return redirect(route('planosdetalhes.index',$plano->url));

    }




    public function show($planoUrl, $idDetalhe)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        $detalhe =$this->repositorio->find($idDetalhe);
        if (!$plano || !$detalhe)
        {
            return redirect()->back();
        }

        return view('admin.paginas.planos.detalhes.show',[
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);
    }




    public function edit($planoUrl, $idDetalhe)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        $detalhe =$this->repositorio->find($idDetalhe);
        if (!$plano || !$detalhe)
        {
            return redirect()->back();
        }

        return view('admin.paginas.planos.detalhes.edit',[
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);
    }




    public function update(StoreUpdatePlanoDetalhe $request, $planoUrl, $idDetalhe)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        $detalhe =$this->repositorio->find($idDetalhe);
        if (!$plano || !$detalhe)
        {
            return redirect()->back();
        }

        $detalhe->update($request->all());

        return redirect(route('planosdetalhes.index',$plano->url));
    }




    public function destroy($planoUrl, $idDetalhe)
    {
        $plano = $this->plano->where('url',$planoUrl)->first();
        $detalhe =$this->repositorio->find($idDetalhe);
        if (!$plano || !$detalhe)
        {
            return redirect()->back();
        }

        $detalhe->delete();

        return redirect()
            ->route('planosdetalhes.index',$plano->url)
            ->with('msg',"Detalhe: $detalhe->nome, deletado com sucesso!");
    }
}
