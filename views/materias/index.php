@extends('views/layout.php')


@section('content-title')
Materias
@endsection

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Materias
    </h3>
</div>


@isset($_SESSION['flash_message'])
    <div class="alert alert-{{$_SESSION['flash_message']['type']}} alert-dismissible fade show" role="alert">
        {{$_SESSION['flash_message']['message']}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @php
        unset($_SESSION['flash_message']);
    @endphp
@endisset

<div class="row">

    <div class="col-lg-12">
        <form action="materias" method="get">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fa fa-search"></i>
                                Buscar materias
                            </h4>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresa el nombre de la materia"
                                    aria-label="Ingresa el nombre de la materia" name="search" value="{{$search}}">

                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-list mr-2"></i>
                        <h5 class="mb-0">Lista de materias</h5>
                    </div>

                    <a href="agregar-materia" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Nuevo
                    </a>
                </div>

                <div class="table-responsive">  
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Creado en</th>
                                <th>Actualizado en</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($materias as $materia)
                            <tr>
                                <td>{{$materia->id}}</td>
                                <td>{{$materia->name}}</td>
                                <td>{{$materia->update_at}}</td>
                                <td>{{$materia->created_at}}</td>
                               
                                <td>
                                    <a href="/editar-materia/{{$materia->id}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-materias-{{$materia->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!---Modal para eliminar materias-->

                            <form action="/borrar-materia/{{$materia->id}}" method="post" id="materia-{{$materia->id}}">
                                <div class="modal fade" id="modal-materias-{{$materia->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-materias-label-{{$materia->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" id="modal-materias-label-{{$materia->id}}">
                                                <h5 class="modal-title">Advertencia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p>
                                                    Quieres eliminar este registro (<b>{{$materia->name}}</b>)
                                                </p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="mt-3">
                        {{$paginador}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection