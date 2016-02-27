<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>H4G Barcelona Home(post login)</title>

    <!-- Bootstrap Core CSS -->
	{!! Html::style('socialquest/css/bootstrap/bootstrap.min.css') !!}

    <!-- Custom CSS -->

	{!! Html::style('socialquest/css/bootstrap/clean-blog.min.css') !!}
	{!! Html::style('socialquest/css/app/home_PL.css') !!}
	{!! Html::style('socialquest/css/app/customcss.css') !!}
	{!! Html::style('socialquest/css/bootstrap-social-gh-pages/bootstrap-social.css') !!}
	{!! Html::style('socialquest/css/sweetalert/sweetalert.css') !!}

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top navbar-custom-socialquest">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">SocialQuest</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('static.home') }}">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('static.how_works') }}">Como funciona</a>
                    </li>
                    <li>
                        <a href="{{ route('static.contact') }}">Contacto</a>
                    </li>
                    @if(Auth::check())
			<li>
				<a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Mi perfil</a>
			</li>
	                <li>
        	                <a href="#"><i class="fa fa-map-marker"></i> Buscar Quest</a>
                	</li>
	                <li>
          	              <a href="#"><i class="fa fa-search"></i> Buscar</a>
                	</li>
		    @else
	                   <li>
				<a data-toggle="modal" data-target="#modal-login" class="modal-login" href="#">Entrar</a>
		           </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	@yield('page_content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

	@include('SocialQuest.partials.modal-login')

    <!-- jQuery -->
<!--    <script src="js/jquery.js"></script> -->
	{!! HTML::script('socialquest/js/jquery.js'); !!}

    <!-- Bootstrap Core JavaScript -->
<!--    <script src="js/bootstrap.min.js"></script> -->
        {!! HTML::script('socialquest/js/bootstrap.min.js'); !!}


    <!-- Custom Theme JavaScript -->
<!--    <script src="js/clean-blog.min.js"></script> -->
        {!! HTML::script('socialquest/js/clean-blog.min.js'); !!}

	{!! HTML::script('socialquest/js/sweetalert/sweetalert.min.js'); !!}


	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	{!! HTML::script('socialquest/thirds/gmaps/gmaps.min.js'); !!}


	@yield('scripts')

</body>

</html>

