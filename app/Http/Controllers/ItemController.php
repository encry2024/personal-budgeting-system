<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    private Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    //
    public function index()
    {
        return view('items.index');
    }

    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->save();
    }

    public function update(Item $item, UpdateItemRequest $request)
    {

    }

    public function destroy(Item  $item)
    {

    }

    public function restore()
    {

    }
}
