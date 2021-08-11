@extends('layouts.app')

@section('content')
<div>
    <h1>Total de horas / Geral por Período: </h1>
    <br>

<table class="table">
    <tbody>
    @foreach ($hours as $key => $hour)
    <tr>
        <td>Total de Horas da <font style="font-weight: bold">Semana {{$hour->start}}:</font> <font style="font-weight: bold;color:blue">{{$hour->total}} horas</font></td>
    </tr>
    @endforeach
    </tbody>
  </table>

    <br>
    <a href="/employees"><button class="btn btn-secondary">Voltar</button></a>

</div>
@endsection
