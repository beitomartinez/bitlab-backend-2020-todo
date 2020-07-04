<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // procesos para almacenar el recurso tarea

        return redirect('tasks/stored');
    }
}