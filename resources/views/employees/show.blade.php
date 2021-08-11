@extends('layouts.app')

@section('content')
{{-- <div>
    <h1>Prestador: {{$employee->name}} Email: {{$employee->email}}</h1>
    <form action="{{  route('employees.destroy', $employee->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Apagar</button>
    </form>
</div>
<a href="/employee-hours/{{$employee->email}}"><button>Horas de {{$employee->name}}</button></a>
<a href="/employees" class="back">Voltar a lista de prestadores</a>
    --}}
<div class="card text-center">
    <h5 class="card-header">Prestador: {{$employee->name}}</h5>
    <div class="card-body">
      <h5 class="card-title">Email: {{$employee->email}}</h5>
      <p class="card-text">A quantidade de horas de {{$employee->name}} no período da {{$employee->start}} é de {{$employee->hours}} horas</p>
      <form action="{{  route('employees.destroy', $employee->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Apagar</button><br/><br/>
    </form>
    <a href="/employee-hours/{{$employee->email}}"><button class="btn btn-primary">Ver o total de horas de {{$employee->name}}</button></a>
    <a href="/employees" class="back"><button class="btn btn-primary">Ver lista de prestadores</button></a>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
@endsection
