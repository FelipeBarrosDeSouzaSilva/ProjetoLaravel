@extends('layout.app', ["current"=>"categorias"])
@section('body')
    <label style="display: none">{{$link = "http://localhost/cadastro/public"}}</label>
        <div class="card border">
            <div class="card-body">
                <h5 class="card-title">Cadastro de categorias</h5>
                @if (count($cats) > 0)
                    <table class="table table-ordered table-houver">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome da categoria</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->nome }}</td>
                                    <td>
                                        <a href="{{$link}}/categorias/editar/{{ $cat->id }}" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                        <a href="{{$link}}/categorias/apagar/{{ $cat->id }}" class="btn btn-sm btn-danger">
                                            Apagar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="card">
                        <div class="p-1 py-2rounded text-info">
                            Você precisa cadastrar uma categoria para inserir um produto
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('novacategoria') }}" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
            </div>
        </div>
    
@endsection