<?php

namespace App\Units\%UnitName%\_Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Model;
use GenericResource;

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


    public function all(Request $request)
    {      

      $per_page = $request->per_page ?? 25;
      $search = $request->search ?? null;
      $order_by = $request->order_by ?? 'created_at';
      $sort = $request->sort ?? 'DESC';
      $filter = (object) $request->filter ?? null;

      $model = Model::search($search)
                      ->filter($filter)
                      ->orderBy($order_by, $sort);
      
      $model = $model->paginate($per_page);

      return GenericResource::collection($model);
    }
    

    public function find($id)
    {
      return new GenericResource(Model::withAll()->find($id));
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

        return response()->json($model);
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
                
                return response()->json($model);
            }
        
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
                return response()->json(true);
            }        
    }
}
