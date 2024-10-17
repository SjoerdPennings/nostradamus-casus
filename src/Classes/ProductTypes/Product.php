<?php

namespace App\Classes\ProductTypes;

use App\Classes\ProductClass;

class Product extends ProductClass
{
    public function tick()
    {
        if ($this->kwaliteit > 0) {
            $this->kwaliteit--;
        }

        $this->verkopenVoor--;

        //Als de verkoopdatum is verstreken, verlaag de kwaliteit met 2.
        if ($this->verkopenVoor < 0) {
            if ($this->kwaliteit > 0) {
                $this->kwaliteit--;
            }
        }
    }
}
