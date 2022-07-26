@extends('layout.app', ["current"=>"novoCliente"])
@section('body')
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('cadCliente')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do cliente</label>
                                <input type="text" id="nome" name="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do cliente</label>
                                <input type="number" id="idade" name="idade" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereco do cliente</label>
                                <input type="text" id="endereco" name="endereco" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail do cliente</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection