@extends('layout.app', ["current"=>"cliente"])
@section('body')
    <main role="main">
        <div class="row">
            <div class="container offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{route('novoCliente')}}">Novo cliente</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tabelproduto">
                            <thead>
                                <tr>
                                    <td>Código</td>
                                    <td>Nome</td>
                                    <td>Idade</td>
                                    <td>E-mail</td>
                                    <td>Endereço</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $c)
                                    <tr id="tr_{{$c->id}}">
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->nome}}</td>
                                        <td>{{$c->endereco}}</td>
                                        <td>{{$c->email}}</td>
                                        <td>{{$c->idade}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" onclick="removerCliente({{$c->id}})">Remover</a>
                                            <a class="btn btn-sm btn-primary" onclick="editarCliente({{$c->id}})">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection