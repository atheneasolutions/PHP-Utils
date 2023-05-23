<?php

namespace athenea\utils\random;

if (! function_exists('Athenea\Utils\Random\guidv4')) {
    function guidv4(?string $data = null)
    {
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

if (! function_exists('Athenea\Utils\Random\secure_random_string')) {
    function secure_random_string($length) {
        $random_string = '';
        for($i = 0; $i < $length; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $random_string .= $character;
        }
        return $random_string;
    }
}