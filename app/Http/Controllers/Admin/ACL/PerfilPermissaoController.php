<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permissao;
use App\Models\Perfil;

class PerfilPermissaoController extends Controller
{

    protected $permissao, $perfil;
    public function __construct(Permissao $permissao, Perfil $perfil)
    {
        $this->permissao = $permissao;
        $this->perfil = $perfil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idPerfil)
    {

        $perfil = $this->perfil->find($idPerfil);

        if (!$perfil)
        {
            return redirect()->back();
        }

        $permissoes = $perfil->permissoes()->paginate();

        return view('admin.paginas.perfis.permissoes.index',compact('perfil','permissoes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPerfil)
    {
            if (!$perfil = $this->perfil->find($idPerfil))
        {
            return redirect()->back();
        }

        $permissoes = $this->permissao->paginate();

        return view('admin.paginas.perfis.permissoes.create',compact('perfil','permissoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPerfil)
    {
        if (!$perfil = $this->perfil->find($idPerfil))
        {
            return redirect()->back();
        }

        if (!$request->permissoes || count($request->permissoes) < 1) {
            return redirect()
                    ->back()
                    ->with('info','É necessário selecionar no mínimo uma permissão.');
        }
        // dd($request->permissoes);
        $perfil->permissoes()->attach($request->permissoes);



        return redirect()->route('perfis.permissoes.index',$perfil->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
