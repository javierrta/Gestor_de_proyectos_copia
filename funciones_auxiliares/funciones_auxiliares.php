<?php

    function fLimpiar_Fecha( $fecha ){
        
        if ($fecha == "0000-00-00"){
            return '';
        } else {
            return $fecha;
        }
    }