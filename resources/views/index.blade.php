@extends('layout.app', ["current"=>"index"])
@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra os seus produtos, mas não esqueça de cadastrar as categorias
                        </p>
                        <a href="{{ route('produtos') }}" class="btn btn-primary">Cadastre os seus produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                           cadastre as categorias
                        </p>
                        <a href="{{ route('categorias') }}" class="btn btn-primary">Cadastre as suas categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection