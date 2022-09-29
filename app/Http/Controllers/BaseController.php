<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{

    protected $class;

    public function index(Request $request)
    {
        return $this->class::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()
        ->json($this->class::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $resource = $this->class::find($id);

        if(is_null($resource)){
            return response()->json([
                'msg' => 'Recurso não encontrado'
            ], 404);
        }

        return response()->json($resource, 200);

    }

    public function update(int $id, Request $request)
    {
        $resource = $this->class::find($id);
        if(is_null($resource)){
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $resource->fill($request->all());
        $resource->save();

        return $resource;

    }

    public function destroy(int $id)
    {

        $recursosRemovidos = $this->class::destroy($id);
        if($recursosRemovidos === 0){
            return response()->json([
                'msg' => 'Recurso não encontrado'
            ], 404);
        }
        return response()->json([
            'msg' => 'Recurso removido com sucesso'
        ], 200);

    }



}
