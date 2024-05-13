<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TPerformanceTest extends DuskTestCase
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
                    ->visit('/trafo/add-performance/1')
                    // ->type('Voltage', '112')
                    // ->type('Current', '453')
                    // ->type('Temperature', '254')
                    // ->select('Blackout Status', 'Blackout')
                    ->press('Save')
                    ->press('Yes, Save')                   
                    ;
        });
    }
}