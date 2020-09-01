<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Task::where('created_by', auth()->id())->with('category');

        if (!is_null($request->keyword)) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('description', 'LIKE', "%{$request->keyword}%");
        }

        if (!is_null($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }
        
        if (!is_null($request->level)) {
            $query->where('level', $request->level);
        }
        
        if (!is_null($request->starts)) {
            $query->whereRaw("DATE(complete_date) >= '{$request->starts}'");
        }
        
        if (!is_null($request->ends)) {
            $query->whereRaw("DATE(complete_date) <= '{$request->ends}'");
        }
        
        $tasks = $query->get();
        // $tasks = $query->paginate(1);


        $categories = Category::where('user_id', auth()->id())->get();
        return view('tasks.index', compact('tasks', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->only([..]) equivale a:
        // [
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'level' => $request->level,
        //     'complete_date' => $request->complete_date,
        // ]

        Category::findOrFail($request->category_id);

        $myNewTask = new Task($request->only([
            'name',
            'description',
            'level',
            'complete_date'
        ]));

        $myNewTask->created_by = auth()->id();
        $myNewTask->category_id = $request->category_id;

        $myNewTask->save();

        return redirect()->route('tasks.show', $myNewTask->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('created_by', auth()->id())->findOrFail($id);
        
        return view('tasks.show', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::where([
            ['created_by', auth()->id()],
            ['state', '<', 2]
        ])->findOrFail($id);

        if ($task->state == 0) {
            $task->state = 1;
        } else {
            $task->state = 2;
            $task->completed_at = now();
        }

        $task->save();

        $request->session()->flash('task_updated', true);
        return redirect()->route('tasks.show', $id);
    }
}
