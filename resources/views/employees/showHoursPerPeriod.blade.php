@extends('layouts.app')

@section('content')
<div>
    <h1>Horas geral por período</h1>
    <br>
    <h3>O total de horas no período da <span style="font-weight: 900;">Semana {{$allPeriods->first()->start}}</span> é de: <span style="font-weight: 900;">{{$count}} horas</span></h3>
    <br>
    <a href="/employees/hours"><button class="btn btn-secondary">Voltar</button></a>
</div>
@endsection
