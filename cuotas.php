<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 10/12/2017
 * Time: 9:28 AM
 */
include "head.html";
require "claseSimuladorCredito.php";




$simulador = new simuladorCredito();
$correctos = 0;
if($simulador->validarRut($_POST['rut'])){
    $correctos +=1;
}else{
    echo "El rut ingresado no es valido<br/>";
}

if($simulador->validarRenta($_POST['renta'])){
    $correctos +=1;
}else{
    echo "La renta minima debe ser de $400000<br/>";
}

if($simulador->validarMontoCredito($_POST['montoCredito'])){
    $correctos +=1;
}else{
    echo "El monto minimo del credito debe ser $100000<br/>";
}

if($simulador->Validacioncuota($_POST['cuotas'])){
    $correctos +=1;
}else{
    echo "La cantidad de cuotas ingresada no es valida<br/>";
}

if($simulador->ValidacionPrimeracuota($_POST['primera-cuota'])){
    $correctos +=1;
}else{
    echo "seleccione un dia del mes actual<br/>";
}

if($simulador->ValidacionMesesDeNoPago($_POST['mesesNoPago'])){
    $correctos +=1;
}else{
    echo "No seleccionemas de dos meses<br/>";
}

?>

<?php if ($correctos == 6): ?>
    <div class="container">
        <div class="col-md-6">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Cuotas/Monto</th>
                    <th>$<?php echo number_format(($_POST['montoCredito']), 0, ",", "."); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th><?php echo $_POST['cuotas']; ?></th>
                    <td>$<?php echo number_format((($_POST['montoCredito']*1.08)/$_POST['cuotas']), 0, ",", "."); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>