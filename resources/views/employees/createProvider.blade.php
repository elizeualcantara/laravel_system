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
    <h1>Lançar horas de {{$provider->name}}</h1>
    <form  action="/employees" method="POST">
        @csrf

        <input class="form-control" type="hidden" name="provider_id" id="provider_id" value="{{$provider->id}}">

        <div class="form-group">
            <label for="hours">Horas</label>
            <input class="form-control" type="text" name="hours" id="hours" value="{{old('hours')}}">
        </div>
        <div class="form-group">
            <label for="start">De</label>
        <select class="form-control" name="start" id="start">
            @for ($i = 1; $i <= 52; $i++)
            <option  value="{{$i}}">Semana {{$i}}</option>
            @endfor
        </select>
        </div>
        <input class="btn btn-success" type="submit" value="Lançar Horas">
    </form>
    <br>
    <a href="/employee-hours/{{$provider->id}}"><button class="btn btn-primary">Ver a Lista de Horas de {{$provider->name}}</button></a>

</div>
@endsection
