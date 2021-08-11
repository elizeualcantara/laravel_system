@extends('layouts.app')

@section('content')

@if (session('mssg') !="")
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('mssg') }}</strong>
</div>
@endif

<h1>Relação de Horas</h1>
<br>
<p>
    <a href="/providers"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Ver Relação de Prestadores</button></a>
    <a href="/employees/hours"><button class="btn btn-sm btn-primary">Total de horas por Período</button></a>
    <a href="/employees/create"><button class="btn btn-sm btn-success">Lancar horas</button></a>
    <a href="/providers/create"><button class="btn btn-sm btn-success">Cadastrar Novo Prestador de Serviço</button></a>
</p>

<script>
    function filterprovider(id)
    {
        window.location.href = "index-filtering?provider=" + id;
    }
    function filterperiod(id)
    {
        window.location.href = "index-filtering?period=" + id;
    }
</script>


<form class="form-inline" method="GET">

   <div class="form-group mb-2">
    <label for="filter" class="col-sm-2 col-form-label">Filtrar&nbsp;</label>
        <select onchange="filterprovider(this.value)">
        <option>--- Prestador de Serviço ---</option>
        <option value="">Todos</option>
        @foreach (\App\Models\Provider::select('id','name')->get() as $provider)

            @if($provider->id == Request::get('provider'))
                <option selected="selected" value="{{ $provider->id }}">{{ $provider->name }}</option>
            @else
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
            @endif

        @endforeach
        </select>
  </div>
  <div class="form-group mb-2">

        <select onchange="filterperiod(this.value)">
        <option>--- Período ---</option>
        <option value="">Todos</option>
        @for ($i = 1; $i <= 52; $i++)

            @if($i == Request::get('period'))
                <option selected="selected" value="{{$i}}">Semana {{$i}}</option>
            @else
                <option  value="{{$i}}">Semana {{$i}}</option>
            @endif

        @endfor
        </select>
  </div>

</form>

<table class="table table-bordered table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Período</th>
        <th scope="col">Horas</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        @if ($hours->count() == 0)
        <tr>
            <td colspan="5">Sem Horas de Serviços cadastrados.</td>
        </tr>
        @endif

         @foreach ($hours as $key => $hour)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$hour->name}}</td>
            <td>{{$hour->email}}</td>
            <td>Semana {{$hour->start}}</td>
            <td>{{$hour->hours}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="/providers/{{$hour->provider_id}}">Ver Prestador de Serviço</a>
                <a href="/employee-hours/{{$hour->provider_id}}"><button class="btn btn-sm btn-primary">Relação de horas</button></a>
                <a href="/employees/create/{{$hour->provider_id}}"><button class="btn btn-sm btn-success">Lançar Horas</button></a>

                <form style="display:inline-block" action="{{  route('providers.destroy', $hour->provider_id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger"> Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $hours->withQueryString()->links('pagination::bootstrap-4') }}

<p>
    Mostrando {{$hours->count()}} de {{ $hours->total() }}
</p>



@endsection
