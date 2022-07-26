@extends('layout.app', ["current"=>"categorias"])
@section('body')
    <div class="card border bg-light">
        <div class="card-body">
            <form action="../../editarCategoria/editar/{{$cat->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomecategoria">Nome categoria</label>
                    <input type="text" class="form-control" name="nomecategoria" value="{{$cat->nome}}" id="nomecategoria" placeholder="Digite o nome da categoria">
                </div>
                <button class="btn btn-primary btn-sn">Salvar</button>
                <button class="btn btn-danger btn-sn">Cancelar</button>
            </form>
        </div>
    </div>
@endsection