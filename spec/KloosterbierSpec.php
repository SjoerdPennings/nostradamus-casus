<?php
use App\Classes\ProductTypes\Kloosterbier;

describe('Kloosterbier', function () {
    describe('#tick', function () {
        context ("Kloosterbier items", function () {
            it ('update Conjured items voor de verkoopdatum', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 10, 10);

                $item->tick();

                expect($item->kwaliteit)->toBe(8);
                expect($item->verkopenVoor)->toBe(9);
            });

            it ('update Kloosterbier items op de minimale kwaliteit', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 0, 10);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(9);
            });

            it ('update Kloosterbier itemsop de verkoopdatum', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 10, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(6);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Kloosterbier itemsop de verkoopdatum op de minimale kwaliteit', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 0, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Kloosterbier items na de verkoopdatum', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 10, -10);

                $item->tick();

                expect($item->kwaliteit)->toBe(6);
                expect($item->verkopenVoor)->toBe(-11);
            });

            it ('update Kloosterbier items na de verkoopdatum op de minimale kwaliteit', function () {
                $item = Kloosterbier::of('Kloosterbier - Franziskaner', 0, -10);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(-11);
            });
        });
    });
});
