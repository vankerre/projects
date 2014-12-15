@extends('layouts.default')
@section('title')
{{'Visualizar Contatos'}}
@stop
@section('content')
  <div class="table-responsive">
   <table class="table table-hover">
    <thead>
     <tr>
         <th>Nome</th>
         <th>Cpf</th>
         <th>Idade</th>
         <th>Email</th>
         <th>imagem</th>

     </tr>
    </thead>
    <tbody>
@foreach($contatos as $contato)


     <tr>
      <td>{{$contato->nome}}</td>
      <td>{{$contato->cpf}}</td>
      <td>{{$contato->idade}}</td>
      <td>{{$contato->email}}</td>
      <td><a href="{{URL::asset('upload\\').$contato->caminho}}">{{$contato->caminho}}</td>

      </tr>





@endforeach

      </tbody>
      </table>
      </div>
      <a href="cadastro/create">Criar um novo contato</a>

@stop