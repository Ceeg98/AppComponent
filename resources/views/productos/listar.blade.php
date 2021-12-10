@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($messageError))
    <div class="alert alert-danger">
        {{ $messageError }}
    </div>
    @elseif(isset($messageAdd))
    <div class="alert alert-success">
        {{ $messageAdd }}
    </div>
    @elseif(isset($messageEdit))
    <div class="alert alert-primary">
        {{ $messageEdit }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Listar Componentes</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($componentes as $componente)
                        <div class="col-3">
                            <div class="card mb-3" style="max-width: 540px; min-height: 243px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        @if(Storage::disk('imagenes')->has($componente->imagen))
                                        <img src="{{ url('miniatura/'.$componente->imagen) }}" class="img-fluid rounded-start" alt="...">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="min-height: 192px;">
                                            <h5 class="card-title">{{ $componente->nombre }}</h5>
                                            <p class="card-text">$ {{ $componente->precio }}</p>
                                            <p class="card-text">{{ $componente->descripcion }}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="min-height: 49px;">
                                        <a href="#eliminarModal{{$componente->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                        <a href="#editarModal{{$componente->id}}" role="button" class="btn btn-sm btn-warning" data-toggle="modal">Editar</a>

                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="eliminarModal{{$componente->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title ">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres borrar el componente {{ $componente->nombre }}?</p>
                                                        <p><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('eliminarComponente/'.$componente->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editarModal{{$componente->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres editar el componente {{ $componente->nombre }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('editarComponente/'.$componente->id) }}" type="button" class="btn btn-warning">Editar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $componentes->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection