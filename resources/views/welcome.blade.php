<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIHCOv2.0</title>
    <!-- Bootstrap core CSS -->
    <link href="{{url('landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ url('landing/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="{{ url('landing/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('landing/css/creative.min.css')}}" rel="stylesheet">
</head>
<style type="text/css">
@media (min-width: 768px) {

    header.masthead {
        height: 60% !important;
        min-height: 0px !important;
    }
}
</style>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">SIHCO</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Rese&nacute;a</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="header-content">
            <div class="header-content-inner">
                <!--h1 id="homeHeading">Your Favorite Source of Free Bootstrap Themes</h1-->
                <hr>
                <!--p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a-->
            </div>
        </div>
    </header>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center" style="text-align: justify;">
                    <h2 class="section-heading text-white">Rese&ntilde;a Hist&oacute;rica!</h2>
                    <hr class="light">
                    <p class="text-faded">Misión La Facultad tiene como propósito formar integralmente a los profesionales de la odontología y al personal técnico mediante la integración de las áreas docencia-asistencial, investigación y extensión en los niveles de pregrado y postgrado; caracterizados por ser de alta calidad y prestigio, con sensibilidad social y calor humano, valores éticos y universales, críticos y generadores de conocimientos; capaces de prevenir y dar respuesta a las necesidades de salud bucal como parte de la salud general de la población en el ámbito regional, nacional e inclusive internacional
                    </p>
                    <p class="text-faded">
                        Visión Ser una facultad de calidad de reconocimiento nacional e internacional en la formación del personal odontológico y técnico altamente cualificado, promoviendo la existencia de una comunidad organizada, integra, andragógica, competente, de excelencia, proactiva, innovadora, creativa, comprometida, solidaria, tolerante, respetuosa, ética y abierta a los cambios, global, dinámica, competitiva, generadora de nuevos conocimientos y alternativas científico-técnicas disponibles al servicio de la humanidad y al desarrollo sustentable de la sociedad.
                    </p>
                </div>
                <div class="col-lg-6 mx-auto text-center">
                    <h2 class="section-heading text-white">Acceder</h2>
                    <hr class="light">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Direccion E-Mail</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Contraseña</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-6">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvido su Contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nuestros Servicios</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Gestion Administrativa</h3>
                        <p class="text-muted">EN SIHCO puedes gestionar los pacientes, sus historia clinicas, imagenes dentales</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Todo en SIHCO</h3>
                        <p class="text-muted">Las historias permaceran almacendas en nuesta base de datos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Gestion de Citas</h3>
                        <p class="text-muted">Puedes realizar la gestion de citas, registrar y consultar de acuerdo a la Clinica y Especialidad</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Trabajo con Amor</h3>
                        <p class="text-muted">En SIHCO facilitamos todo el proceso de registro y almacenamiento, para mantener el orden, y poder brindar una atencion adecuada a los pacientes!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Contacto</h2>
                    <hr class="primary">
                    <p>Cualquier duda, sugerencia, inconveniente, no dudes en contactar!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p>
                        <a href="mailto:your-email@your-domain.com">sihcoodontologia@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('landing/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ url('landing/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ url('landing/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{ url('landing/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- Custom scripts for this template -->
    <script src="{{ url('landing/js/creative.min.js')}}"></script>
</body>

</html>