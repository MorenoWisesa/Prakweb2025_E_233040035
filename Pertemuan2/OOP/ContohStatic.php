<?php

class ContohStatic {
    // cara penulisan unutk property
    public static $angka = 1;


    // cara penulisan Method
    public static function Hello() {
        return 'Hello';
    }
}


// mengakses static property
echo ContohStatic::$angka;
echo ContohStatic::Hello();
