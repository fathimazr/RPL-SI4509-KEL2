<?php
namespace Tests;

use Carbon\Carbon;
use Laravel\Dusk\Browser;

class DuskBrowser extends Browser
{
    public function fillDate($selector, Carbon $date)
    {
        $dateString = $this->generateDateString($date);
        return $this->keys($selector, $dateString);
    }

    // ChromeDriver cannot cope with date inputs, so must remove the hyphens.
    // Also note that browser date format is locale-specific! We are using UK DD-MM-YYYY
    private function generateDateString(Carbon $date)
    {
        $date = $date->toDateString();
        $date = explode('-', $date);
        $date = array_reverse($date);
        return implode($date, '');
    }
}
