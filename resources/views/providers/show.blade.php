@extends('layouts.app')

@section('content')

@if (session('mssg') !="")
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('mssg') }}</strong>
</div>
@endif

<div class="card text-center">
    <h5 class="card-header"><b>Prestador de Serviço: {{$provider->name}}</b></h5>
    <h5 class="card-header">Total de {{$count}} horas</h5>
    <div class="card-body">
      <h5 class="card-title">Email: {{$provider->email}}</h5>
      <h5 class="card-title">Telefone: {{$provider->telefone}}</h5>
      <h5 class="card-title">CPF / CNPJ: {{$provider->cpf_cnpj}}</h5>

      <form action="{{  route('providers.destroy', $provider->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este cadastro?')">Apagar</button><br/><br/>
    </form>

    <a href="/employees/create/{{$provider->id}}"><button class="btn btn-sm btn-success">Lancar horas deste Prestador de Serviço</button></a>
    <a href="/employee-hours/{{$provider->id}}"><button class="btn btn-sm btn-primary">Relação de horas deste Prestador de Serviço</button></a>
    <a href="/providers" class="back"><button class="btn btn-sm btn-primary">Ver lista de Prestadores de Serviços</button></a>

    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
@endsection
