<?php

namespace App\Classes\ProductTypes;

use App\Classes\ProductClass;

class WitteWijn extends ProductClass
{
    public function tick()
    {
        //Pas de kwaliteit aan aan de hand van de verkoopdatum
        //1-5 dagen: Verhoog het met 3.
        //6-10 dagen: Verhoog het met 2.
        //11+ dagen: Verhoog het met 1.
        if ($this->kwaliteit < 50) {
            $this->kwaliteit++;

            if ($this->verkopenVoor < 11) {
                if ($this->kwaliteit < 50) {
                    $this->kwaliteit++;
                }
            }
            if ($this->verkopenVoor < 6) {
                if ($this->kwaliteit < 50) {
                    $this->kwaliteit++;
                }
            }
        }

        //Verlaag de verkoopdatum
        $this->verkopenVoor--;

        //Als de verkoopdatum is verstreken, verlaag de kwaliteit naar 0.
        if ($this->verkopenVoor < 0) {
            $this->kwaliteit = 0;
        }
    }
}
