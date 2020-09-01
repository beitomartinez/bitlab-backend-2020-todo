<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tasks = Task::where([
            ['complete_date', '>=', now()],
            ['complete_date', '<=', now()->add(7, 'day')]
        ])->orderBy('complete_date')->get(['id', 'name']);

        return view('home', compact('tasks'));
    }
}
