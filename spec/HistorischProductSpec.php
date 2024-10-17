<?php

use App\Classes\ProductTypes\HistorischProduct;

describe('HistorischProduct', function () {
    describe('#tick', function () {
        context('Historische items', function () {
            it ('update historische items voor de verkoopdatum', function () {
                $item = HistorischProduct::of('BBQ - Afkoop drank', 10, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(10);
                expect($item->verkopenVoor)->toBe(5);
            });

            it ('update historische items op de verkoopdatum', function () {
                $item = HistorischProduct::of('BBQ - Afkoop drank', 10, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(10);
                expect($item->verkopenVoor)->toBe(5);
            });

            it ('update historische items na de verkoopdatum', function () {
                $item = HistorischProduct::of('BBQ - Afkoop drank', 10, -1);

                $item->tick();

                expect($item->kwaliteit)->toBe(10);
                expect($item->verkopenVoor)->toBe(-1);
            });
        });
    });
});
