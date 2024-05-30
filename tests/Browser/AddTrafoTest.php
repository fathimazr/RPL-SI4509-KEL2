<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddTrafoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $today = now();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('www.gridgeoalert.com')
                    ->type('employee_id', 'manager1')
                    ->type('password', 'manager1pass')
                    ->press('LOG IN')
                    ->assertPathIs('/')        
                    ->visit('/trafo')
                    ->press('Add New Transformator')
                    ->assertPathIs('/trafo-register')
                    ->type('trafo_id', '1106')
                    ->select('brand')
                    ->select('city')
                    ->select('phase', 'Phase 3 Transformator')
                    ->type('latitude', '123456')
                    ->type('longitude', '421213')
                    ->type('capacity', '193128')
                    ->type('installation_date', '31122024')
                    ->select('category')
                    ->press('Save')
                    ->press('Yes, Save')
                    ;
        });
    }
}