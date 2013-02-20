<br/><br/><br/><br/>
<?php include'cambio.php';?>
<?php $cliente = ClienteCotizacionPeer::retrieveByPk($cotizacion->getId())?>
<table>
    <tr>
        <td align="right"><?php echo sprintf("%s", $cotizacion->getId())?></td>
    </tr>   <br/>
    <tr>
        <td align="right"><?php 
        setlocale(LC_ALL,"es_ES");
        echo strtoupper(strftime("%d de %B del %Y", strtotime($cotizacion->getFechaCotizacion())));
        ?> </td>
    </tr>
</table> <br/>
<table>
    <tr>
        <td><?php echo sprintf("%s", $cliente->getNombreEmpresa())?> </td>
    </tr>
    <tr>
        <td><?php echo sprintf("%s     C.P.  %s", $cliente->getDireccion(), $cliente->getCp())?></td>
    </tr>
    <tr>
        <td><?php echo sprintf("%s  %s ", $cliente->getCiudad(), $cliente->getEstado())?> </td>
    </tr>
</table>
<br/>
<table>
    <tr>
        <td>AT`N:&nbsp;<?php echo sprintf("%s", $cliente->getNombreCliente())?> </td>
    </tr>
    <tr>
        <td>ATENDIENDO A SU AMABLE SOLICITUD, LE ESTAMOS PRESENTADO A SU CONSIDERACION EL PRESUPUESTO <?php echo sprintf("%s", $cliente->getNombreCliente())?> </td>
    </tr>
</table>
<br/><br/><br/><br/><br/>
<table>
 <?php $servicios = array(); ?>
    <?php foreach ($cotizacion->getDetallesCotizacions() as $cotizaciones) : ?>
        <?php $obj = $cotizaciones; ?>
        <?php $servicios[] =  $obj;?>
    <?php endforeach; ?>
    <?php $subtotal=0; $total=0; $iva=0.16?>
    <?php foreach($servicios as $servicio) :?>
    <tr>
        <td width="120"><?php echo sprintf("%s", $servicio->getCantidadServicio() ) ?></td>
        <td width="180" align="left"><?php echo sprintf("%s", $servicio->getClave() ) ?></td>
        <td  width="1100" ><?php echo sprintf("%s", $servicio->getDescripcion() ) ?></td>
        <td width="370" align="center"><?php echo sprintf("$ %s.00", $servicio->getPrecioServicio() ) ?></td>
        <td width="350" ><?php echo sprintf("$ %s.00", $servicio->getCantidadServicio()*$servicio->getPrecioServicio()) ?></td>
    </tr>
    <?php $subtotal+= ($servicio->getCantidadServicio()*$servicio->getPrecioServicio())?>
    <?php  $total = $subtotal+ $subtotal * $iva  ?>
<?php endforeach; ?>
</table>

<table >
<br/><br/><br/>
<tr>
    <td align="center"><?php echo sprintf("%s",num2letras($total)) ?></td>
    <td align="rigth"><?php echo sprintf("$ %s.00", $subtotal) ?></td>
</tr>
<tr>
    <td></td>
    <td align="rigth"><?php echo sprintf("$ %s", $subtotal * $iva)?></td>
</tr>
<tr>
    <td></td>
    <td align="rigth"><?php echo sprintf("$ %s", $total) ?></td>
</tr>
</table>