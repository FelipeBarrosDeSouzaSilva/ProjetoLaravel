<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Categoria::all();
        $prod = Produtos::all();
        $dados = ["cat"=>$cat, "prod"=>$prod];
        return view('produtos', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catSelecionada = $request->input('cat');
        $prod = $request->input('prod');
        $preco = $request->input('preco');
        $stock = $request->input('stock');

        $Categoria = new Categoria();
        $Produtos = new Produtos();

        $Produtos->categoria_id = $catSelecionada;
        $Produtos->nome = $prod;
        $Produtos->preco = $preco;
        $Produtos->stock = $stock;

        $Produtos->save();
        return redirect('produtos');
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
    public function buscar(Request $request){
        
        $produto = new Produtos();
        $retorno = $produto->Where('nome','like',"%{$request->pesquisa}%")->get();
        return $retorno;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'metodo edit';
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
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'preco' => 'required',
            'stock' => 'required',
        ]);
        $nome = $request->nome;
        $categorias = $request->categoria;
        $preco = $request->preco;
        $stock = $request->stock;
        $aray = [$id, $nome, $categorias, $preco, $stock];
        $produto = new Produtos();
        $produto = $produto->find($id);
        $produto->nome = $nome;
        $produto->categoria_id = $categorias;
        $produto->preco = $preco;
        $produto->stock = $stock;
        $produto->save();
        $dado = implode('|', $aray);
        return $dado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Produto = new Produtos();
        $p = $Produto->find($id);
        $p->delete();
        
    }
}
