<?php

namespace Athenea\Utils\Array;

if (! function_exists('Athenea\Utils\Array\array_find')) {
    /**
     * Donada una array i una funció, retorna el primer element pel qual l'evaluació de la funció amb aquell element doni cert
     * 
     * @param array $xs array a buscar l'element
     * @param callable $f funció que s'evaluarà per cada elemnt
     * @return mixed primer element que l'evaluació de la funció dona true
     */
    function array_find(array $xs, callable $f){
        foreach ($xs as $x) {
            if (call_user_func($f, $x) === true)
                return $x;
            }
            return null;
    }
}

if (! function_exists('Athenea\Utils\Array\array_is_assoc')) {
    function array_is_assoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}