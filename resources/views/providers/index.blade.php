@extends('layouts.app')

@section('content')

@if (session('mssg') !="")
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('mssg') }}</strong>
</div>
@endif

<h1>Prestadores de Serviços</h1>
<br>
<p>
    <a class="btn btn-sm btn-primary" href="/employees"><span class="glyphicon glyphicon-plus"></span> Ver Relação de Horas Lançadas</a>
    <a class="btn btn-sm btn-success" href="/providers/create"><span class="glyphicon glyphicon-plus"></span> Cadastrar Novo Prestador de Serviço</a>
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


{{-- <form class="form-inline" method="GET">

   <div class="form-group mb-2">
    <label for="filter" class="col-sm-2 col-form-label">Filtrar</label>
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

</form> --}}

<table class="table table-bordered table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">CPF / CNPJ</th>
        <th scope="col">Total Horas</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        @if ($providers->count() == 0)
        <tr>
            <td colspan="5">Sem Prestadores de Serviços cadastrados.</td>
        </tr>
        @endif

        @foreach ($providers as $key => $provider)
        <tr>
            <td>{{$provider->id}}</td>
            <td>{{$provider->name}}</td>
            <td>{{$provider->email}}</td>
            <td>{{$provider->telefone}}</td>
            <td>{{$provider->cpf_cnpj}}</td>
            <td style="font-weight: bold;color:blue">{{$provider->total}}</td>
            <td>
                <a href="/providers/{{$provider->id}}"><button class="btn btn-sm btn-primary">Ver Cadastro</button></a>
                <a href="/employee-hours/{{$provider->id}}"><button class="btn btn-sm btn-primary">Ver Horas por Período</button></a>
                <a href="/employees/create/{{$provider->id}}"><button class="btn btn-sm btn-success">Lançar Horas</button></a>

                <form style="display:inline-block" action="{{  route('providers.destroy', $provider->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger"> Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $providers->withQueryString()->links('pagination::bootstrap-4') }}

<p>
    Mostrando {{$providers->count()}} de {{ $providers->total() }} prestador(es).
</p>

@endsection
