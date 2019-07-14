@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Conta - ' . $pessoa->nome)}}</div>
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

                                    <label for="resumo" class="col-md-4 col-form-label text-md-right">Resumo</label>
                                    <input type="text" class="col-md-6 form-control" name="resumo" id="resumo" value="{{ old('resumo') }}" required autocomplete="resumo" autofocus >

                            </div>

                            <div class="form-group row">

                                    <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>
                                    <input type="text" class="col-md-6 form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>

                            </div>

                            <div class="form-group row">

                                <label for="fone" class="col-md-4 col-form-label text-md-right">Vencimento</label>
                                <input type="date" class="col-md-6 form-control" name="vencimento" id="vencimento" value="{{ old('vencimento') }}" required autocomplete="vencimento" autofocus>

                            </div>

                            <div class="form-group row">

                                <label for="fone" class="col-md-4 col-form-label text-md-right">Valor</label>
                                <input type="number"  name="valor" value="{{ old('valor') }}" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="currency" id="valor" required autocomplete="valor" autofocus />

                            </div>
                            <a href="{{ route( 'listar_contas',$pessoa->id)}}" class="btn btn-dark mt-2">Voltar</a>
                            <button class="btn btn-dark mt-2">Adicionar</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
