<?php

use Carbon\Carbon;

if (!function_exists("isOverDueDate")) {
    function isOverDueDate($rent_date, $rent_status)
    {
        return Carbon::now()->gt($rent_date->addDays(6)) && ($rent_status !== 'returned');
    }
}

if (!function_exists("isDueDate")) {
    function isDueDate($rent_date, $rent_status)
    {
        return (Carbon::now()->format('d-m-Y') == $rent_date->addDays(5)->format('d-m-Y')) && ($rent_status !== 'returned');
    }
}
