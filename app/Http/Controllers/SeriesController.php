<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends BaseCrud
{
    public function __construct()
    {
        $this->class = Serie::class;
    }
}
