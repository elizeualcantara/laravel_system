@extends('layouts.app')

@section('content')
<div class="content">
    <div class="wrapper">
        <img src="/images/logo_front.png" alt="Intergalaxy">
        <p class="title">Bem vindo ao Sistema</p>
    </div>
    <p class="mssg">{{ session('mssg') }}</p>

</div>
@endsection
