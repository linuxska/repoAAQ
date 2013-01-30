<br/><br/><br/><br/>
<?php include'cambio.php';?>
<?php $cliente = ClienteFacturaPeer::retrieveByPk($factura->getId())?>
<table>
    <tr>
        <td align="right"><?php echo sprintf("%s", $factura->getLugarExpedicion())?></td>
    </tr>   <br/>
    <tr>
        <td align="right">REGIMEN FISCAL PERSONA FISICA&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo sprintf("%s", $factura->getFechaFactura())?> </td>
    </tr>
</table> <br/>
<table>
    <tr>
        <td>NOMBRE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo sprintf("%s", $factura->getClienteFactura())?> </td>
    </tr>
    <tr>
        <td>RFC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo sprintf("%s", $cliente->getRfc())?></td>
    </tr>
    <tr>
        <td>DIRECCIÓN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo sprintf("%s     C.P.  %s", $cliente->getDireccion(), $cliente->getCp())?></td>
    </tr>
    <tr>
        <td>ESTADO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo sprintf("%s", $cliente->getEstado())?> </td>
    </tr>
</table>
<br/>
<table>
 <?php $servicios = array(); ?>
    <?php foreach ($factura->getDetalleFacturas() as $facturas) : ?>
        <?php $obj = $facturas; ?>
        <?php $servicios[] =  $obj;?>
    <?php endforeach; ?>
    <?php $subtotal=0; $total=0; $iva=0.16?>
    <?php foreach($servicios as $servicio) :?>
    <tr>
        <td width="120"><?php echo sprintf("%s", $servicio->getCantidadServicios() ) ?></td>
        <td width="180" align="left"><?php echo sprintf("%s", $servicio->getClaveServicio() ) ?></td>
        <td  width="1100" ><?php echo sprintf("%s", $servicio->getDescripcionServicio() ) ?></td>
        <td width="370" align="center"><?php echo sprintf("$ %s.00", $servicio->getPrecioServicio() ) ?></td>
        <td width="350" ><?php echo sprintf("$ %s.00", $servicio->getCantidadServicios()*$servicio->getPrecioServicio()) ?></td>
    </tr>
    <?php $subtotal+= ($servicio->getCantidadServicios()*$servicio->getPrecioServicio())?>
    <?php  $total = $subtotal+ $subtotal * $iva  ?>
<?php endforeach; ?>
</table>

<table >
<br/><br/><br/>
<tr>
    <td align="center"><?php echo num2letras($total); ?></td>
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