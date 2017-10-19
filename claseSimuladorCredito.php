<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 10/12/2017
 * Time: 9:28 AM
 */

class simuladorCredito{
    public function __construct()
    {
        echo "";
    }

    public function validarRut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);

        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';
        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function validarRenta($renta){
        if($renta >= 400000){
            return true;
        }else{
            return false;
        }
    }

    public function validarMontoCredito($monto){
        if($monto >= 100000 && $monto <= 100000000){
            return true;
        }else{
            return false;
        }
    }

    public function Validacioncuota ($cuota){
        if($cuota >= 4 && $cuota <= 60){
            return true;
        }else{
            return false;
        }
    }
    public function ValidacionPrimeracuota ($Primeracuota){
        $aux = preg_split('/-/', $Primeracuota);

        if(($aux[0][2].$aux[0][3]) == date('y') && $aux[1] == date('m')){
            return true;
        }else{
            return false;
        }
    }

    /*
    public function ValidacionMesesDeNoPago ($meses){
        $arr = array();
        $longitud = sizeof($meses);
        if($longitud > 2){
            return false;
        }else{
            foreach ($meses as $posicion => $mes){
                array_push($arr, $posicion);
            }
            if($arr[1] == $arr[0]+1){
                return false;
            }else{
                return true;
            }
        }
    }
    */
    public function ValidacionMesesDeNoPago ($meses){
        if(sizeof($meses) > 2)
        {
            return false;
        }else{
            return true;
        }
    }
}