{!! Form::open(['url' => '/auth/login', 'method' => 'POST']) !!}
        <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <div class="checkbox">
                <label><input type="checkbox"> Recuérdame</label>
        </div>

        <div class="pull-left" style="line-height: 50px;">
                <a class="btn btn-social btn-google btn-sm" id="btn-especial-1" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);" >
                        <span class="fa fa-google" id="icono-especial-2"></span> Entrar con Google
                </a>
                <a class="btn-especial btn btn-social btn-facebook btn-sm" id="btn-especial-2" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);" >
                        <span class="icono-especial fa fa-facebook " id="icono-especial-2"  ></span> Entrar con Facebook
                </a>
        </div>
        <button type="submit" class="btn pull-right" style="margin-bottom:10px">Entrar</button>
{!! Form::close() !!}
<div class="clearfix"></div>
 <hr>
<div class="text-center">
        <a href="/auth/register" class="register-hyperlink">¿Todavía no tienes cuenta? <b>Registrate aquí</b></a>
</div>

