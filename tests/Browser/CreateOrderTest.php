<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Menu;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateOrderTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_admin_can_create_order()
    {
        // Create menu items for the modal
        $menu1 = Menu::create([
            'name' => 'Nasi Lemak',
            'price' => 6.50,
            'description' => 'Delicious traditional rice dish',
            'image' => 'null'
        ]);

        $menu2 = Menu::create([
            'name' => 'Mee Goreng',
            'price' => 7.50,
            'description' => 'Delicious traditional noodle dish',
            'image' => 'null'
        ]);


        $this->browse(function (Browser $browser) use ($menu1) {
            $browser->visit('/orders/create')
                ->type('input[name="table_no"]', '10')
                ->select('order_status', 'Pending')
                ->press('Add Menu Items') // Opens the modal

                // Wait until the modal is visible and interact with it
                ->whenAvailable('#menuModal', function (Browser $modal) use ($menu1) {
                    $modal->type('@quantity-'.$menu1->id, '2')
                        ->press('@add-'.$menu1->id); // Add menu item
                })

                // Submit the form
                ->press('Submit Order')
                ->pause(1000) // allow processing time
                ->assertPathIs('/order') // or wherever it redirects
                ->assertSee('Order created successfully');
        });
    }
}
