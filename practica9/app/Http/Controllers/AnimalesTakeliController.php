<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalesTakeliController extends Controller
{
    public function getanimales(){
        $animales = ['Takeli', 'Leon', 'Gazela', 'Hiena', 'Simba'];

        return response() -> json(['mensaje' => 'Estos son animales', 'datos' => $animales]);
    }
}
