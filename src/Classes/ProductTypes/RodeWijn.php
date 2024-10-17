<?php

namespace App\Classes\ProductTypes;

use App\Classes\ProductClass;

class RodeWijn extends ProductClass
{
    public function tick()
    {
        //Verhoog de kwaliteit met 1.
        if ($this->kwaliteit < 50) {
            $this->kwaliteit++;
        }

        $this->verkopenVoor--;

        //Als de verkoopdatum is verstreken, verhoog de kwaliteit met 1.
        if ($this->verkopenVoor < 0) {
            if ($this->kwaliteit < 50) {
                $this->kwaliteit++;
            }
        }
    }
}
