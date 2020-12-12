<?php

use Carbon\Carbon;

function rupiah($number, $decimal = 2)
{
    return number_format($number, $decimal);
}

function tanggal($date)
{
    // return Carbon::parse($date)->formatLocalized('%d %B %Y');
    return Carbon::parse($date)->format('d-m-Y');
}
