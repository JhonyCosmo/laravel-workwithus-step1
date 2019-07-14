@extends('layouts.app')

@section('content')

   @include('mensagem',['mensagem'=>$mensagem])

   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">{{ __('Contas - ' . $pessoa->nome) }}</div>

                   <div class="card-body">

                       <ul class="list-group">

                           <table class="table table-bordered">
                               <thead>
                               <tr>
                                   <th scope="col">Resumo</th>
                                   <th scope="col">Titulo</th>
                                   <th scope="col">Vencimento</th>
                                   <th scope="col">Valor</th>
                                   <th scope="col">Ações</th>
                               </tr>
                               </thead>
                               <tbody>

                                    @foreach($contas as $conta)

                                        <tr>
                                            <td>{{$conta->resumo}}</td>
                                            <td>{{$conta->titulo}}</td>
                                            <td>{{$conta->vencimento}}</td>
                                            <td>{{$conta->valor}}</td>
                                            <td>
                                                <span class="d-flex">
                                                {{-- editar--}}
                                                    @auth
                                                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $conta->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                    @endauth
                                                    {{-- detalhar--}}
                                                <a href="/pessoas/{{ $conta->id }}/contas" class="btn btn-info btn-sm mr-1">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>

                                                {{-- deletar--}}
                                                <form method="post" action="/contas/{{ $conta->id }}"
                                                      onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($conta->nome) }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    @auth
                                                        <button class="btn btn-danger btn-sm">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    @endauth
                                                </form>
                                            </span>

                                            </td>
                                        </tr>

                                    @endforeach

                               </tbody>
                           </table>
                       </ul>

                       @auth
                           <a href="{{ route( 'listar_pessoas')}}" class="btn btn-dark mb-2">Voltar</a>
                           <a href="{{ route("form_criar_conta",$pessoa->id)}}" class="btn btn-dark mb-2">Adicionar</a>
                       @endauth

                   </div>
               </div>
           </div>
       </div>
   </div>



@endsection
