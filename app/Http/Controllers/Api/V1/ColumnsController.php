<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddColumnRequest;

class ColumnsController extends  Controller
{
    /**
     * Since this is sample project will avoid all repositores and caching all queries will be runned from Controller
     */
    public function indexAll()
    {
        $columns  = \App\Models\Column::all();

        return response()->json($columns);
    }

    public function addColumn(AddColumnRequest $request)
    {
        if(\App\Models\Column::create(['title' => $request->get('title')]))
            return $this->indexAll();
        else
            return  response()->json(['message' => 'There was a problem with creating a new column'], 404);
    }

    public function removeColumn($columnId)
    {
        if(!$columnId)
            return  response()->json(['message' => 'Column id is required'], 404);

        if(\App\Models\Column::where(['id' => $columnId])->delete())
            return $this->indexAll();
        else
            return  response()->json(['message' => 'There was a problem with deleting'], 404);
    }
}
