@extends('layout.app', ["current"=>"novacategoria"])
@section('body')
    <div class="card border bg-light">
        <div class="card-body">
            <form action="{{ route('categorias') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomecategoria">Nome categoria</label>
                    <input type="text" class="form-control" name="nomecategoria" id="nomecategoria" placeholder="Digite o nome da categoria">
                </div>
                <button class="btn btn-primary btn-sn">Salvar</button>
                <button class="btn btn-danger btn-sn">Cancelar</button>
            </form>
        </div>
    </div>
@endsection