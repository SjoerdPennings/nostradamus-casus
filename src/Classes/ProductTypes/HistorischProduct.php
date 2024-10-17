<?php

namespace App\Classes\ProductTypes;

use App\Classes\ProductClass;

class HistorischProduct extends ProductClass
{
    public function tick()
    {
        //Historische producten worden niet verkocht, en verliezen geen kwaliteit.
    }
}
