<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddMaintananceTest extends DuskTestCase
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
                    ->visit('/maintenance')
                    ->assertSee('MAINTENANCE LOG')
                    ->press('Add Maintenance Data')
                    ->assertPathIs("/add-maintenance")
                    ->type('employee_id', 'manager1')
                    ->select('trafo_id', '1105')
                    ->type('maintenance_date','10122024')
                    ->type('maintenance_data','error maintanance 1105')
                    ->press('Next')
                    ->press('Yes, Save')
                    ;
        });
    }
}
