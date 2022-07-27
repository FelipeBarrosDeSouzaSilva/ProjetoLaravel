@extends('layout.app', ["current" => "produtos"])
@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Produtos</h5>
        <table class="table table-ordered">
            <tr>
                <th>
                    <select name="selectcategoria" id="selectcategoria" class="form-control text-white bg-primary">
                            <option class="bg-white text-primary" value="">Listar categorias</option>
                            @foreach ($dados["cat"] as $key)
                               <option class="bg-white text-primary" value="{{ $key->id }}">{{ $key->nome }}</option>
                            @endforeach
                    </select>
                </th>
                <th id="cod_cat">
                    
                </th>
                <th id="nome_cat">
                    
                </th>
            </tr>
            <tr id="titulosDados">
                <th>Código</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Stock</th>
                <th>Ação</th>
            </tr>
            <thead>
                <div class="" style="displlay: table">
                    <form id="cadProd" action="{{route('createProdutos')}}" class="forms coluna_left botao_save" style="displlay: table-cell" method="POST">
                        <input type="hidden" id="cat" name="cat">
                        @csrf
                    </form>
                </div>
            </thead>
            <tbody>
                 @foreach ($dados["prod"] as $prod)
                    <tr id="{{$prod->id}}">
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->nome}}</td>
                            <td>{{$prod->categoria_id}}</td>
                            <td>{{$prod->preco}}</td>
                            <td>{{$prod->stock}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" onclick="remover({{$prod->id}})">Remover</a>
                                <a class="btn btn-sm btn-primary" onclick="abrirForm({{$prod->id}})">Editar</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection