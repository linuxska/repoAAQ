<?php use_helper('Asset') ?>
<?php use_helper('Url') ?>

<div class="mail_wrapper">
    <div class="mail_header" style=" text-align:center;background-color:#5377B1;height:150px;">
        <?php echo image_tag(image_path('mail/header.png', true), array('alt'=>'Instituto Práctico Ebenezer', 'style'=>'height:150px;width:800px;'))?>
    </div>
    <div class="mail_content" style="height:300px;margin:10px;padding:10px;text-align:justify;">
        <?php echo $template ?>
    </div>
    <div class="mail_footer" style="border-top: 1px #BFBCB6 solid;clear:both;text-align:center;color:grey;padding: 10px 10px 10px 10px;font-size:0.8em;">
        <p>&copy; 2010<?php echo date('Y', time()) > '2010' ? sprintf(' - %s.', date('Y', time())) : sprintf('.'); ?>
            <a style="color:inherit;text-decoration:none;border-bottom:1px grey dotted;" href="http://www.institutoebenezer.mx/">Instituto Práctico Ebenezer</a>.
        <p class="mail_itc" style="float:left;width:50%">Dr. Noriega No. 161 esq con Ramirez, Colonia Centro, Hermosillo, Sonora. CP 83000. Telefono: 01 662 213 3878 | CorreoElectronico: institutoebenezer@prodigy.net</p>
        <p class="mail_dgtyv" style="float:right;width:50%">Desarrollado por Abraham Rafael Rico Moreno.</p>
        <p class="mail_navbar" style="clear:both;">
            <a style="color:inherit;text-decoration:none;border-bottom:1px grey dotted;" href="mailto:<?php echo sprintf("%s <%s>", sfConfig::get('app_sf_guard_extra_plugin_name_from'), sfConfig::get('app_sf_guard_extra_plugin_mail_from'))?> ">Contacto</a> |
    </div>
</div>
