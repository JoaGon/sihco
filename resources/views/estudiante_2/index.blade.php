@extends('admin-layout.sidebarAdmin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Estudiante de 2 : {{ Auth::user()->email }} </div>

                <div class="panel-body">
                    SIHCO
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
