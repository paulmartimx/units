<?php

namespace App\Units\%UnitName%\_Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Model;

class %UnitName%Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('%UnitHint%::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('%UnitHint%::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->except(['_token']);

        $model = Model::create($input);

        push_success('Agregado con éxito');
        return redirect()->route('%UnitHint%.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Model::find($id);
        return view('%UnitHint%::edit', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Model::find($id);
        return view('%UnitHint%::edit', compact('model'));
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

        $model = Model::find($id);
        $input = $request->except(['_token']);

        if($model)
            {
                $model->update($input);
                push_success('Actualizado con éxito');
            }

        return redirect()->route('%UnitHint%.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Model::find($id);

        if($model)
            {
                $model->delete();
                push_success('Eliminado con éxito');
            }

        return redirect()->route('%UnitHint%.index');
    }
}
