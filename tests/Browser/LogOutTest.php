<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogOutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('www.gridgeoalert.com')
                    // ->clickLink('Log in')
                    // ->assertPathIs('/login')
                    ->type('employee_id', 'manager1')
                    ->type('password', 'manager1pass')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    // ->press('Log Out')
                    // ->press('Log Out')
                    ;
        });
    }
}