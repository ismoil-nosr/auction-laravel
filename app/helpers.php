<?php

use App\Models\Category;

function getCats()
{
    return Category::get();
}