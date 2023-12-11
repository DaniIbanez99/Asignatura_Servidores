<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalesTakeliController extends Controller
{
    public function getanimales(){
        $animales = ['Takeli', 'Leon', 'Gazela', 'Hiena', 'Simba'];

        return reponse() -> json(['mensaje' => 'Estos son animales', 'datos' => $animales]);
    }
}
