<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/web/login')
                    ->assertSee('Login to Cakeapp');
        });
    }

    public function testBasicLogin(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/web/login')
                ->type('email','Pradip.Pokhrel25@gmail.com')
                ->type('password','1234')
                ->click('#login')
                ->assertSee('Food Product:');

        });
    }
}
