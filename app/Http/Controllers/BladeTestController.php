<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeTestController extends Controller
{
    public function ifPost(Request $request)
    {
        return view(
            'blade-test.if.results',
            ['minutes' => $request->minutes]
        );
    }

    public function forPost(Request $request)
    {
        return view(
            'blade-test.for.results',
            ['number' => $request->number]
        );
    }
    
    public function foreachPost(Request $request)
    {
        $fruits = ['Manzanas', 'Peras', 'Melocotones', 'Fresas', 'Uvas'];
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $foods = ['carnita asada', 'pollito asado', 'pupusas', 'pastelitos'];

        $output = [];

        switch ($request->list) {
            case 'fruits':
                $output = $fruits;
                break;
            case 'vowels':
                $output = $vowels;
                break;
            case 'foods':
                $output = $foods;
                break;
        }

        return view(
            'blade-test.foreach.results',
            ['list' => $output]
        );
    }
    
    
    public function forelsePost(Request $request)
    {
        $fruits = ['Manzanas', 'Peras', 'Melocotones', 'Fresas', 'Uvas'];
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $foods = ['carnita asada', 'pollito asado', 'pupusas', 'pastelitos'];

        $output = [];

        switch ($request->list) {
            case 'fruits':
                $output = $fruits;
                break;
            case 'vowels':
                $output = $vowels;
                break;
            case 'foods':
                $output = $foods;
                break;
        }

        return view(
            'blade-test.forelse.results',
            ['list' => $output]
        );
    }
}
