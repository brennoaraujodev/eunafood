<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    protected $repositorio;
    public function __construct(Permissao $permissao)
    {
        $this->repositorio = $permissao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $permissoes = $this->repositorio->paginate();

        return view('admin.paginas.permissoes.index',['permissoes'=>$permissoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas.permissoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissao = $this->repositorio->create($request->all());

        return view('admin.paginas.permissoes.show',['permissao'=>$permissao]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$permissao = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        return view('admin.paginas.permissoes.show',['permissao'=>$permissao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$permissao = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        return view('admin.paginas.permissoes.edit',['permissao'=>$permissao]);
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
        if (!$permissao = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        $permissao->update($request->all());
        return view('admin.paginas.permissoes.show',['permissao'=>$permissao]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$permissao = $this->repositorio->find($id))
        {
            return redirect()->back();
        }
        $permissao->delete();
        return redirect()
            ->route('permissoes.index')
            ->with('msg',"Permissão '$permissao->nome' excluída com sucesso!");
    }


    /**
     * Search
     */
    public function search(Request $request){

        $filtros =  $request->except('_token');
        $permissoes = $this->repositorio->pesquisar($request->filtro);

        return view('admin.paginas.permissoes.index',[
            'filtros'=>$filtros,
            'permissoes'=>$permissoes,
        ]);
    }

}
