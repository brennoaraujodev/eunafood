<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    protected $repositorio;
    public function __construct(Perfil $perfil)
    {
        $this->repositorio = $perfil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfis = $this->repositorio->paginate();

        return view('admin.paginas.perfis.index',compact('perfis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas.perfis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repositorio->create($request->all());

        return redirect()->route('perfis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$perfil = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        return view('admin.paginas.perfis.show',['perfil'=>$perfil]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$perfil = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        return view('admin.paginas.perfis.edit',['perfil'=>$perfil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$perfil = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        $perfil->update($request->all());
        return view('admin.paginas.perfis.show',['perfil'=>$perfil]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$perfil = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        $perfil->delete();

        return redirect()
                         ->route('perfis.index')
                         ->with('msg',"Perfil: {$perfil->nome} excluido com sucesso!");
    }
}
