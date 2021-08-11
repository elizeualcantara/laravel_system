@extends('layouts.app')

@section('content')

<!-- display error messages -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div>
    <h1>Cadastrar Novo Prestador de Serviço</h1>
    <form  action="/providers" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="text" name="telefone" id="telefone" value="{{old('telefone')}}">
        </div>
        <div class="form-group">
            <label for="cpf_cnpj">CPF / CNPJ</label>
            <input class="form-control" type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{old('cpf_cnpj')}}">
        </div>
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="/providers"><button class="btn btn-primary">Ver Lista de Prestadores de Serviços</button></a>
</div>
@endsection
