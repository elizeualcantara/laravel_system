
<div>
    <h2>
        RECIBO DE HORAS TRABALHADAS / {{$employee->first()->name}}
    </h2>
    <h3>
        Total de horas lançadas : {{$count}} horas
    </h3>
    <br>
    <hr>
    <br>
<table class="table" border=1 cellpadding=10 cellspacing=0>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Período</th>
        <th scope="col">Horas</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employee as $key => $item)
    <tr>
        <th scope="row">{{$key+1}}</th>
        <td>Semana {{$item->start}}</td>
        <td>{{$item->hours}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
    <br>
    <hr>
    <br>
    <h4>
        Emitido em {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s')}}
    </h4>
</div>
