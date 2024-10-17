<?php
use App\Classes\ProductTypes\RodeWijn;

describe('RodeWijn', function () {
    describe('#tick', function () {
        context('Rode Wijn items', function () {

            it ('update Rode Wijn items voor de verkoopdatum', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 10, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(11);
                expect($item->verkopenVoor)->toBe(4);
            });

            it ('update Rode Wijn items voor de verkoopdatum with maximum quality', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 50, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(4);
            });

            it ('update Rode Wijn items op de verkoopdatum', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 10, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(12);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Rode Wijn items op de verkoopdatum, nabij de maximale kwaliteit', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 49, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Rode Wijn items op de verkoopdatum met de maximale kwaliteit', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 50, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Rode Wijn items na de verkoopdatum', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 10, -10);

                $item->tick();

                expect($item->kwaliteit)->toBe(12);
                expect($item->verkopenVoor)->toBe(-11);
            });

             it ('update Rode Wijn items na de verkoopdatum met de maximale kwaliteit', function () {
                $item = RodeWijn::of('Rode Wijn - Merlot', 50, -10);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(-11);
            });

        });
    });
});
