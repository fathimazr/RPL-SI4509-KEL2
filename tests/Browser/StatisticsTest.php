<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StatisticsTest extends DuskTestCase
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
                    ->assertPathIs('/')
                    ->visit('/stats')
                    ->press('Weekly')
                    ->press('Alerting')
                    ->press('Maintenance')
                    ->press('Maintenance Punctuality')
                    ;
        });
    }
}
