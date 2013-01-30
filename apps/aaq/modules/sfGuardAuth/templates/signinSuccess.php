<?php use_stylesheet('sfGuardPlugin/signin.css')?>

<div id="text">
    <h2>Bienvenidos al Sistema de Cotización y Facturazión  </br>
        de Aire Acondicionado de Queretaro</h2>
    <dl>
        <dt>Inicie sesión</dt>
        <dd>Ingrese al sistema proporcionando sus datos de acceso en el formulario
        de la derecha.</dd>
        <dd style="font-style: italic">Nota: Si accede desde un equipo público no
         elija la opción <em>¿Recordar?</em></dd>
    </dl>
</div>
<div id="login">
    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <table>
            <?php echo $form ?>
        </table>
        <input type="submit" value="Accesar" />
	 <a href = "<?php echo url_for(@recover_password) ?>" >¿Olvidaste tu contraseña?</a>
    </form>
</div>

