@extends('layouts.admin2')

@section('content')
<!--grid-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Usuario</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!---->
    <section class="content">
        <div class="grid-hor">
            {!!Form::open(['route'=>'usuario.store','method'=>'POST','class'=>'col-sm-10'])!!}
                <div class="form-group">
                    {!!Form::label('nombres','Nombres')!!}
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('email','Correo electronico')!!}
                    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'email'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('rol','Rol')!!}
                    {!!Form::text('rol',null,['class'=>'form-control','placeholder'=>'Ingrese el costo','id'=>'rol'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('password','Contraseña')!!}
                    {!!Form::text('password',null,['class'=>'form-control','placeholder'=>'Ingrese el password','id'=>'password'])!!}
                </div>            
                    {!!Form::submit('Crear',['class'=>'btn btn-success'])!!}
                <!-- Agregar boton de cancelar -->
                <a class="btn btn-danger" href="{{ route('usuario.index') }}">Cancelar</a>
            {!!Form::close()!!}

        </div>
    </section>
</div>
@endsection