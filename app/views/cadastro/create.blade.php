@extends('layouts.default')
<script src="{{URL::asset('js/validaCPF.js')}}"/>

@section('title')
{{'Criar Contato'}}

@stop
@section('title2')
{{'Contato'}}
@stop
@section('content')
<script>

</script>
    {{ Form::open(array('route' => 'cadastro.store', 'files' => true)) }}
<span>Campos marcados com um * são obrigatórios</span>

    <div class="form-group">
        {{ Form::label('grupo','Grupo: ')}}
        {{ Form::select('grupo', ['Selecione','Aluno', 'Palestrante', 'Curso', 'Produtos', 'Serviços'], null, ['class' =>'form-control']) }}
    </div>
        <div class="form-group">
            {{ Form::label('nome', 'Nome: *') }}
            {{ Form::text('nome','', array('class' => 'form-control')) }}
            {{ $errors->first('nome') }}
        </div>

        <div class="form-group">

            {{ Form::label('data', 'Data Nascimento: *') }}
            {{ Form::text('data', '', array('class' => 'form-control')) }}
            {{ $errors->first('data') }}

        </div>

        <div class="form-group">

            {{ Form::label('idade', 'Idade: ') }}
            {{ Form::text('idade', '', array('class' => 'form-control', 'javascript: getAge(this.value)', 'readonly' => 'readonly')) }}
            {{--{{ $errors->first('data') }}--}}

        </div>
        <div class="inputClone">
            {{ Form::label('nomeres', 'Nome Responsável: ') }}
            {{ Form::text('nomeres', '', array('class' => 'form-control')) }}
            {{ Form::label('cpfres','Cpf Responsável: ') }}
            {{ Form::text('cpfres', '', array('class' => 'form-control', 'onkeypress' => 'javascript: mascara(this, cpf_mask);', 'maxlength' => '14', 'onblur' => 'javascript: validarCPF(this.value);')) }}
        </div>


    <div class="form-group">

            {{ Form::label('cpf', 'CPF: *') }}
            {{ Form::text('cpf','', array('class' => 'form-control', 'onkeypress' => 'javascript: mascara(this, cpf_mask);', 'maxlength' => '14', 'onblur' => 'javascript: validarCPF(this.value);')) }}
            {{ $errors->first('cpf') }}
    </div>

    <div class="form-group">

            {{ Form::label('email', 'Email: ') }}
            {{ Form::email('email','', array('class' => 'form-control')) }}
            {{ $errors->first('email') }}

    </div>

    <div id="inputTel" class="form-group">

        {{ Form::label('tipoTel', 'Tipo Telefone ') }}
        {{ Form::select('tipoTel', ['Selecione','Residencial', 'Fax', 'Móvel'], null, ['class' =>'form-control']) }}

    </div>
    <div id="inputOp" class="inputOp">

            {{ Form::label('op', 'Operadora: ') }}
            {{ Form::select('op', ['Selecione','Tim', 'Vivo', 'Claro', 'Oi'], null, ['class' =>'form-control']) }}

    </div><br>


    <div class="form-group">

            {{ Form::label('telefone', 'Telefone: *') }}
            {{ Form::text('telefone','', array('class' => 'form-control')) }}
            {{ $errors->first('telefone') }}

    </div>

     <div id="input1" style="margin-bottom:4px;" class="clonedInput">
            Nome Filho: <input type="text" name="name[]" id="name1" class="form-control" />
        </div>

        <div>
          <input type="button" id="btnAdd" value="Adicionar Filho" class="form-control" />
          <input type="button" id="btnDel" value="Remover" class="form-control" />
         </div>


    <div class="col-lg-12">
            <h1 class="page-header">
               Endereço
            </h1>
    </div>

     <div class="form-group">
            {{ Form::label('tipo','Tipo: ')}}
            {{ Form::select('tipo', ['Comercial', 'Residencial', 'Correspondência', 'Cobrança'], null, ['class' =>'form-control']) }}
    </div>

     <div class="form-group">
            {{ Form::label('cep','CEP: ') }}
            {{ Form::text('cep','', ['class' =>'form-control', 'maxlength' => '8', 'onblur' => 'javascript: getEndereco()']) }}
    </div>


    <div class="form-group">
        {{ Form::label('estado', 'Estado ') }}
        {{ Form::text('estado','', array('class' => 'form-control', 'readonly' => 'readonly')) }}
        {{--{{ $errors->first('telefone') }}--}}
    </div>

    <div class="form-group">

        {{ Form::label('cidade', 'Cidade: ') }}
        {{ Form::text('cidade','', array('class' => 'form-control', 'readonly' => 'readonly')) }}

    </div>

    <div class="form-group">

        {{ Form::label('bairro', 'Bairro: ') }}
        {{ Form::text('bairro','', array('class' => 'form-control')) }}

    </div>


    <div class="form-group">

        {{ Form::label('rua', 'Rua: ') }}
        {{ Form::text('rua','', array('class' => 'form-control')) }}

    </div>
    <div class="form-group">

        {{ Form::label('numero', 'Número: ') }}
        {{ Form::text('numero','', array('class' => 'form-control')) }}

    </div>


    <div class="form-group">

        {{ Form::label('logradouro', 'Logradouro: ') }}
        {{ Form::text('logradouro','', array('class' => 'form-control')) }}

    </div>



@stop

@section('content2')


    &nbsp
    <div class="form-group">
        {{ Form::label('genero','Gênero: ')}}
        {{ Form::select('genero', ['Masculino', 'Feminino'], null, ['class' =>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('estadoCivil','Estado Civil: ')}}
        {{ Form::select('estadoCivil', ['Casado', 'Solteiro', 'Viúvo', 'Divorciado', 'Desquitado', 'Amasiado', 'União Estável'], null, ['class' =>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('mae', 'Nome mãe: ') }}
        {{ Form::text('mae','', array('class' => 'form-control')) }}
    {{--{{ $errors->first('nome') }}--}}
    </div>

    <div class="form-group">
        {{ Form::label('pai', 'Nome pai: ') }}
        {{ Form::text('pai','', array('class' => 'form-control')) }}
        {{--{{ $errors->first('nome') }}--}}
    </div>





    <div class="form-group">
        {{ Form::label('foto', 'Clique aqui para selecionar sua foto ') }}
        {{ Form::file('foto') }}
        {{ $errors->first('foto') }}
    </div>

    <div class="form-group">
        {{ Form::label('ativo', 'Ativo :') }}
        {{ Form::radio('ativo','1', true) }}<span>Sim</span>
        {{ Form::radio('ativo', '0') }}<span>Não</span>
    </div>

     <div class="form-group">
        {{ Form::label('exaluno', 'Ex-Aluno :') }}
        {{ Form::radio('exaluno','1', true) }}<span>Sim</span>
        {{ Form::radio('exaluno', '0') }}<span>Não</span>
    </div>

    <div class="form-group">

       {{ Form::submit() }}

    </div>

@stop
{{ Form::close() }}

