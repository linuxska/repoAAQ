<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php include_slot('title', 'IPE')?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div id="header">
          <div id="logos">
              <img alt="" src="/images/logos/banner.jpg" />
          </div>
      </div>
      <div id="content" class="ipe_admin_content">
          <?php echo $sf_content ?>
      </div>
      <div class="rp_admin_footer">
        <p> <?php echo date('Y', time());?> <a href="http://www.google.com.mx">Aire Acondicionado de Queretaro</a>.
        <p class="rp_admin_ipe">Montes CLaros No. 134, Colonia Lomas del Marques, Queretaro, Qro. CP 76146.<br />Telefono: 01 442 224 2361 | CorreoE: aaq@prodigy.net</p>
        <p class="rp_admin_dev">Desarrollado por Abraham Rafael Rico Moreno.<br /> <a href="http://www.abricolabs.net/">Labs Cafeinne</a>. 461 1433 296 </p>
      </div>
  </body>
</html>
