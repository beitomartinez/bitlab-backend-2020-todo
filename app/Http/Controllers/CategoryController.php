<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', 2)->select(
            'id', 'name', 'description', 'image'
        )->withCount(
            'tasks', 'pendingTasks', 'processingTasks', 'completedTasks'
        )->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // OPCION 1
        // $newCategory = new Category();
        // $newCategory->name = $request->name;
        // $newCategory->description = $request->description;
        // $newCategory->color = $request->color;
        // $newCategory->save();

        // OPCION 2
        // $newCategory = Category::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'color' => $request->color
        // ]);
        
        $newCategory = new Category($request->only([
            'name', 'description', 'color'
        ]));

        $newCategory->image = basename(
            Storage::put('categories-images', $request->image)
        );

        $newCategory->user_id = 2;

        $newCategory->save();

        $request->session()->flash('cat_stored', true);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::where('user_id', 2)->with(
            'tasks',
            'tasks.user:id,name',
            // 'tasks.user'
        )->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function showCompletedTasks (Request $request, $id)
    {
        // $category = Category::with([
        //     'tasks' => function ($query) {
        //         $query->where('state', 2);
        //     }
        // ])->findOrFail($id);
        
        $category = Category::where('user_id', 2)->with('completedTasks')
            ->findOrFail($id);

        return view('categories.show-completed', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('user_id', 2)->findOrFail($id);
        return view('categories.edit', compact('category'));
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
        $category = Category::where('user_id', 2)->findOrFail($id);

        // OPCION 1
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->color = $request->color;
        // $category->save();

        $category->fill($request->only(['name', 'description', 'color']));

        if ($request->hasFile('image')) {
            $category->image = basename(
                $request->file('image')->store('categories-images')
            );
        }

        $category->save();

        $request->session()->flash('cat_updated', true);
        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // OPCION 1
        $category = Category::where('user_id', 2)->findOrFail($id);
        $category->delete();

        // OPCION 2
        // Category::destroy($id);

        $request->session()->flash('cat_destroyed', true);
        return redirect()->route('categories.index');
    }
}
