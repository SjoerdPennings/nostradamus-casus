<?php
use App\Classes\ProductTypes\Product;

describe('Product', function () {
    describe('#tick', function () {
        context ('normale Items', function () {
            it ('update normal itemsvoor de verkoopdatum', function () {
                $item = Product::of('normal', 10, 5); // quality, sell in X days

                $item->tick();

                expect($item->kwaliteit)->toBe(9);
                expect($item->verkopenVoor)->toBe(4);
            });

            it ('update normal itemsop de verkoopdatum', function () {
                $item = Product::of('normal', 10, 0);

                $item->tick();

                expect($item->kwaliteit)->toBe(8);
                expect($item->verkopenVoor)->toBe(-1);
            });

            it ('update normal items na de verkoopdatum', function () {
                $item = Product::of('normal', 10, -5);

                $item->tick();

                expect($item->kwaliteit)->toBe(8);
                expect($item->verkopenVoor)->toBe(-6);
            });

            it ('update normal items with a quality of 0', function () {
                $item = Product::of('normal', 0, 5);

                $item->tick();

                expect($item->kwaliteit)->toBe(0);
                expect($item->verkopenVoor)->toBe(4);
            });
        });
    });
});
