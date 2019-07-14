@extends('layouts.app')

{{--@section('cabecalho')--}}
{{--    Séries--}}
{{--@endsection--}}

@section('content')

   @include('mensagem',['mensagem'=>$mensagem])

   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">{{ __('Pessoas') }}</div>
                   <div class="card-body">

                       <ul class="list-group">
                            @foreach($pessoas as $pessoa)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span id="nome-pessoa-{{ $pessoa->id }}">{{ $pessoa->nome }}</span>

                                    <div class="input-group w-50" hidden id="input-nome-pessoa-{{ $pessoa->id }}">
                                        <input type="text" class="form-control" value="{{ $pessoa->nome }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" onclick="editarSerie({{ $pessoa->id }})">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            @csrf
                                        </div>
                                    </div>

                                    <span class="d-flex">
                                        @auth
                                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $pessoa->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endauth
                                        <a href="/pessoas/{{ $pessoa->id }}/contas" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                        <form method="post" action="/pessoas/{{ $pessoa->id }}"
                                            onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($pessoa->nome) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            @auth
                                            <button class="btn btn-danger btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            @endauth
                                        </form>
                                    </span>
                                </li>
                            @endforeach
                       </ul>

                       @auth
                           <a href="{{ route('form_criar_pessoa') }}" class="btn btn-dark mt-2">Adicionar</a>
                       @endauth

                   </div>
               </div>
           </div>
       </div>
   </div>


    <script>
        function toggleInput(serieId) {
            const nomeSerieEl = document.getElementById(`nome-pessoa-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-pessoa-${serieId}`);
            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }

        function editarNome(serieId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-nome-pessoa-${serieId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/pessoas/${serieId}/editaNome`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`nome-pessoa-${serieId}`).textContent = nome;
            });
        }
    </script>
@endsection
