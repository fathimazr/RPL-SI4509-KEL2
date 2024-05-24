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
                    ->type('voltage', '112')
                    ->pause(5000)
                    ->type('current', '453')
                    ->type('temperature', '254')
                    ->select('blackout_status', 'Blackout')
                    ->press('Save')
                    ->press('Yes, Save')                   
                    ;
        });
    }
}