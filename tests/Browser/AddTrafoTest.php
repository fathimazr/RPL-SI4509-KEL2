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
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('www.gridgeoalert.com')
                    ->type('employee_id', 'manager1')
                    ->type('password', 'manager1pass')
                    ->press('LOG IN')                
                    ->visit('/trafo')
                    ->press('Add New Transformator')
                    ->assertPathIs('/trafo-register')
                    ->type('trafo_id', '1106')
                    ->select('brand')
                    ->type('city', 'Bandung')
                    ->select('phase', 'Phase 3 Transformator')
                    ->type('latitude', 'Bandung')
                    ->type('longitude', 'Bandung')
                    ->type('capacity', 'Bandung')
                    ->type('installation_date')
                    ->press('Save')
                    ->press('Yes, Save')
                    ;
        });
    }
}