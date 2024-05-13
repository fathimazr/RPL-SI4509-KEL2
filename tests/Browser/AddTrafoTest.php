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
                    ->assertPathIs('/trafo/create')
                    // ->type('Trafo ID', '1106')
                    // ->type('Brand', 'Mitsubishi')
                    // ->type('City', 'Bandung')
                    // // ->select('Phase', 'Phase 3 Transformator')
                    // ->type('latitude', 'Bandung')
                    // ->type('longitude', 'Bandung')
                    // ->type('Capacity', 'Bandung')
                    // ->type('Installation Date', 'Bandung')
                    ->press('Save')
                    ->press('Yes, Save')
                    ;
        });
    }
}