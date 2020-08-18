<?php

namespace App\Http\Controllers;

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
        $categories = Category::select('id', 'name', 'description', 'image')->get();
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
    public function store(Request $request)
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
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
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
        $category = Category::findOrFail($id);

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
        // $category = Category::findOrFail($id);
        // $category->delete();

        // OPCION 2
        Category::destroy($id);

        $request->session()->flash('cat_destroyed', true);
        return redirect()->route('categories.index');
    }
}
