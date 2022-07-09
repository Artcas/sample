<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCardRequest;

class CardController extends  Controller
{
    public function addCard(AddCardRequest $request)
    {
        if(\App\Models\Card::create(['title' => $request->get('title'), 'column_id' => $request->get('column_id')]))
            return response()->json([]);
        else
            return  response()->json(['message' => 'There was a problem with creating a new column'], 404);
    }

    public function remove($cardId)
    {
        if(!$cardId)
            return  response()->json(['message' => 'Card id is required'], 404);

        if(\App\Models\Card::where(['id' => $cardId])->delete())
            return response()->json([]);
        else
            return  response()->json(['message' => 'There was a problem with deleting'], 404);
    }
}
