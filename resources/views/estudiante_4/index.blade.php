@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Estudiante de 4to {{ Auth::user()->name }} </div>

                <div class="panel-body">
                    SIHCO
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
