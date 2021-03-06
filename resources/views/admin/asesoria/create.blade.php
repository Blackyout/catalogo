@extends('layouts.admin2')

@section('content')
<!--grid-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Asesoria</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!---->
    <section class="content">
        <div class="grid-hor">
            {!!Form::open(['route'=>'asesoria.store','method'=>'POST','class'=>'col-sm-10'])!!}
                <div class="form-group">
                    {!!Form::label('nombre','Nombre')!!}
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
                    @error('nombre')
                    <small class="text-danger">Escribir el nombre del curso</small>    
                    @enderror 
                </div>
                <div class="form-group">
                    {!!Form::label('descripcion','Descripcion')!!}
                    {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'descripcion'])!!}
                    @error('descripcion')
                    <small class="text-danger">Escribir la descripcion del curso</small>    
                    @enderror
                </div>
                
                    {!!Form::submit('Crear',['class'=>'btn btn-success'])!!}
                <!-- Agregar boton de cancelar -->
                <a class="btn btn-danger" href="{{ route('asesoria.index') }}">Cancelar</a>
            {!!Form::close()!!}

        </div>
    </section>
</div>
@endsection