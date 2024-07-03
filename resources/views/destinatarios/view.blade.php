@extends('layouts.app')

@section('title', 'MTTO')

@section('content')

    <div class=" container" style="">
        <div class="row " style=" margin-top:5%;">
            <div class="col-12">
                <h1>Mantenimiento de <?= Auth::user()->usuario ?></h1>
                <a href="{{ route('destinatarios.index') }}" class="btn btn-info">REGRESAR</a>
            </div>
            <div class="col-6 cajaview">
                <h2>d</h2>
            </div>
            <div class="col-6 cajaview">
                <h2>d</h2>
            </div>
        </div>
    </div>

@endsection
