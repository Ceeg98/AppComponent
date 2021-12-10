@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar producto</div>
                <div class="card-body">
                    <form action="{{ url('/actualizarComponente')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $componente->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $componente->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" name="precio" class="form-control" value="{{ $componente->precio }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control" value="{{ $componente->descripcion }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen actual:</label>
                            <input type="text" disabled name="imagenAct" id="imagenAct" value="{{ $componente->imagen }}" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Tipo de componente</label>
                            <select name="idTipo_componente" class="form-select">
                                @foreach($tiposComponente as $tipoComponente)
                                @if($tipoComponente->id == $componente->idTipo_componente)
                                <option selected value="{{ $tipoComponente->id }}"> {{ $tipoComponente->nombre}} </option>
                                @continue
                                @endif
                                
                                <option value="{{ $tipoComponente->id}}">{{ $tipoComponente->nombre}}</option>
                                
                                
                                @endforeach
                            </select>

                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <br>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection