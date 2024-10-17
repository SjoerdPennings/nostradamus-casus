<?php
use App\Classes\ProductTypes\WitteWijn;

describe('WitteWijn', function () {
    describe('#tick', function () {
        context('Witte Wijn', function () {
            /*
                "Witte Wijn", net zoals Rode Wijn, lopen op in kwaliteit als de verkoopVoor
                datum dichterbij komt; Kwaliteit verhoogt met 2 wanneer er 10 of minder dagen
                te gaan zijn en met 3 wanneer er 5 of minder dagen te gaan zijn. Wanneer de verkoopVoor
                datum is gepasseerd keldert de waarde naar 0
             */
            it ('update Wtte Wijn items long voor de verkoopdatum', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, 11);

                $item->tick();

                expect($item->kwaliteit)->toBe(11);
                expect($item->verkopenVoor)->toBe(10);
            });

            it ('update Wtte Wijn items dicht bij de verkoopdatum', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, 10);

                $item->tick();

                expect($item->kwaliteit)->toBe(12);
                expect($item->verkopenVoor)->toBe(9);
            });

            it ('update Wtte Wijn items dicht bij de verkoopdatum op de maximale kwaliteit', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 50, 10);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(9);
            });

            it ('update Wtte Wijn items dicht bij de verkoopdatum', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(13); // goes up by 3
                expect($item->verkopenVoor)->toBe(4);
            });

            it ('update Wtte Wijn items dicht bij de verkoopdatum op de maximale kwaliteit', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 50, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(4);
            });

            it ('update Wtte Wijn items met slechts 1 dag te gaan', function () {
                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, 1);

                $item->tick();

                expect($item->kwaliteit)->toBe(13);
                expect($item->verkopenVoor)->toBe(0);
            });

            it ('update Wtte Wijn items met slechts 1 dag te gaan op de maximale kwaliteit', function () {

                $item = WitteWijn::of('Witte Wijn - Chardonnay', 50, 1);

                $item->tick();

                expect($item->kwaliteit)->toBe(50);
                expect($item->verkopenVoor)->toBe(0);
            });

            it ('update Wtte Wijn items op de verkoopdatum', function () {

                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update Wtte Wijn items na de verkoopdatum', function () {

                $item = WitteWijn::of('Witte Wijn - Chardonnay', 10, -1);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(-2);
            });

        });
    });
});
