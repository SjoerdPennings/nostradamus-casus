<?php

namespace App\Classes\ProductTypes;

use App\Classes\ProductClass;

class Kloosterbier extends ProductClass
{
    public function tick()
    {
        //Kloosterbier verliest dubbel zoveel kwaliteit per tick als een normaal product.
        if ($this->kwaliteit > 0) {
            $this->kwaliteit -= 2;
        }

        $this->verkopenVoor--;

        //Als de verkoopdatum is verstreken, verlaag de kwaliteit met 4.
        if ($this->verkopenVoor < 0) {
            if ($this->kwaliteit > 0) {
                $this->kwaliteit -= 2;
            }
        }
    }
}
