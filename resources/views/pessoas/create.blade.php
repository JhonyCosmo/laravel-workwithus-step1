@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Pessoa') }}</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post">
                            @csrf
                            <div class="form-group row">

                                    <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>
                                    <input type="text" class="col-md-6 form-control" name="nome" id="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus >

                            </div>

                            <div class="form-group row">

                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <input type="email" class="col-md-6 form-control" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>

                            <div class="form-group row">

                                    <label for="fone" class="col-md-4 col-form-label text-md-right">Telefone</label>
                                    <input type="phone" class="col-md-6 form-control" name="fone" id="fone" value="{{ old('fone') }}" required autocomplete="fone" autofocus>

                            </div>

                            <a href="{{ route( 'listar_pessoas')}}" class="btn btn-dark mt-2">Voltar</a>
                            <button class="btn btn-dark mt-2">Adicionar</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
