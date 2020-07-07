<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function __invoke()
    {
        return 'Desde aquí, se enviaría el status por correo';
    }
}
