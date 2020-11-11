<?php

use App\Models\Category;
use Carbon\Carbon;
use Carbon\CarbonInterface;

function getCats()
{
    return Category::get();
}

function getLastHours(Carbon $date)
{
    return $date->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE], null, true, 2);
}