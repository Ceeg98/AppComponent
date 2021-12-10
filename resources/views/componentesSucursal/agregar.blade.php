@extends('layouts.app')

@section('content')
<?php

use Illuminate\Support\Str;

$uniqid = Str::random(6);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-center" style="color:white; font-size: 1.5rem;">
                    Registrar Componente
                </div>
                @if($errors->any())
                        <div class="alert alert-danger m-2">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                <div class="card-body">
                    <form method="POST" action="{{url('/guardarComponente')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="unique_code" value="<?= $uniqid ?>">
                        <div class="form-group row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">
                                Nombre Componente
                            </label>
                            <div class="col-md">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">
                                Precio
                            </label>
                            <div class="col-md">
                                <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">
                                Imagen
                            </label>
                            <div class="col-md">
                                <input type="file" class="form-control form-control-sm" name="imagen"  autofocus></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">
                                Descripción
                            </label>
                            <div class="col-md">
                                <textarea class="form-control" name="descripcion"  autofocus></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tipoComponente" class="col-md-4 col-form-label text-md-right">
                                Seleccione el tipo de componente
                            </label>
                            <div class="col-md">
                                <select class="form-control" name="idTipo_componente"  autofocus>
                                    <option selected disabled>Seleccione el tipo de componente</option>
                                    @foreach($tipoComponentes as $tipoComponente)
                                    <option value="{{$tipoComponente->id}}"> {{$tipoComponente->nombre}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="form-group row  mt-4 mb-0" style="margin: .1rem;">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection