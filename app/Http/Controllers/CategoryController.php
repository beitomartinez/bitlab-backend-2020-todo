<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = [
            ['De la casa', 3, 2],
            ['Del trabajo', 6, 4],
            ['Personales', 7, 1],
            ['Bitlab', 9, 5],
            ['Familiares', 12, 2],
        ];

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
        
        Category::create($request->all());

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
        $category = [
            'name' => 'Personales',
            'description' => 'Tareas personales de mi persona que quiero hacer para mi',
            'tasks_total' => 23,
            'tasks_completed' => 11,
            'tasks_uncompleted' => 12,
            'created_at' => 'Octubre 28'
        ];

        $tasks = [
            'Practicar guitarra',
            'Leer el libro que tengo pendiente',
            'Descansar al mediodía',
            'Hacer ejericicio por la mañana',
            'Tomar suficiente agua',
            'No desvelarme',
        ];

        return view('categories.show', compact('category', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'categories.edit',
            ['categoryId' => $id]
        );
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

        return $request->method();


        return "Aquí se recibe el form para editar la categoría con ID $id y "
            . " se actualiza";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Aquí se destruye la categoría con id $id";
    }
}
