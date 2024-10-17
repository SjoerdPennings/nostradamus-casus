<?php
namespace App\Classes;

abstract class ProductClass {
    public $naam;

    public $kwaliteit;

    public $verkopenVoor;

    public function __construct($naam, $kwaliteit, $verkopenVoor)
    {
        $this->naam         = $naam;
        $this->kwaliteit    = $kwaliteit;
        $this->verkopenVoor = $verkopenVoor;
    }

    public static function of($naam, $kwaliteit, $verkopenVoor) {
        return new static($naam, $kwaliteit, $verkopenVoor);
    }

    public abstract function tick();
}
