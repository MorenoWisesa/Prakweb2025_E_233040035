<?php

abstract class Animal {
    public $name = 'Kucing';

    // wajib dimiliki oleh child nya
    public abstract function run();
}