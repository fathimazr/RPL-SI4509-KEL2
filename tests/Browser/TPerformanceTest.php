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
                    ->type('active_power','a')
                    ->type('reactive_power','a')
                    ->type('apparent_power','a')
                    ->type('voltage_thd','100')
                    ->type('current_thd','90')
                    ->type('total_power_losses','4500')
                    ->type('power_factor','b')
                    ->type('frequency','1312')
                    ->type('pressure','23')
                    ->type('k_factor','10')
                    ->type('individual_harmonics','80')
                    ->type('tripplen_harmonics','76')
                    ->type('power_factor','b')
                    ->type('power_losses','1123')
                    ->type('oil_pressure','20')
                    ->type('oil_temperature','231')
                    ->press('Save')
                    ->press('Yes, Save')                   
                    ;
        });
    }
}