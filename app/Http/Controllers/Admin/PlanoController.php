<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlano;
use Illuminate\Http\Request;
use App\Models\Plano;
use Illuminate\Support\Str;

class PlanoController extends Controller
{


    //Contrutor
    private $repositorio;

    public function __construct(Plano $plano)
    {
        $this->repositorio = $plano;
    }




    public function index()
    {
        $planos = $this->repositorio->paginate(5);

        return view('admin.paginas.planos.index',['planos' => $planos]);
    }




    public function create()
    {
        return view('admin.paginas.planos.create');
    }




    public function store(StoreUpdatePlano $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->nome);

        $this->repositorio->create($data);

        return redirect()-> route('planos.index');
    }




    public function show($url)
    {
        $plano = $this->repositorio->where('url', $url)->first();

        if (!$plano)
            return redirect()->back();

        return view('admin.paginas.planos.show',['plano' => $plano]);
    }




    public function edit($url)
    {
        $plano = $this->repositorio->where('url',$url)->first();

        if (!$plano)
            return redirect()->back();

        return view('admin.paginas.planos.edit',['plano' => $plano]);
    }




    public function update(StoreUpdatePlano $request, $url)
    {
        $plano = $this->repositorio->where('url',$url)->first();

        if (!$plano)
            return redirect()->back();

        $plano->update($request->all());

        return redirect(route('planos.index'));
    }




    public function destroy($url)
    {
        $plano = $this->repositorio->where('url',$url)->first();

        if (!$plano)
            return redirect()->back();

        $plano->delete();

        return redirect()->route('planos.index');
    }



    public function search(Request $request)
    {

        $filtros =  $request->except('_token');

        $planos = $this->repositorio->pesquisar($request->filtro);

        return view('admin.paginas.planos.index',
        [
            'planos' => $planos,
            'filtros' => $filtros,
        ]);
    }
}
