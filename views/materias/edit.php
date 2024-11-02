@extends('views/layout.php')

@section('content-title')
Modificación de materias
@endsection

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Editar Materia
    </h3>
</div>

@isset($validator)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($validator as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset

<div class="row">
    <div class="col-lg-12">
        <form action="/editar-materia/{{$materia->id}}" method="post">
            @csrf
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-pen mr-2"></i>
                                    <h5 class="mb-0">Formulario de registro de materias</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="name">Nombre asignatura</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Ingresa el nombre de la asignatura" value="{{ $materia->name }}" required>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Editar</button>
                                    <a href="/materias" class="btn btn-light">Cancelar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
