<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Requests\Attribute\StoreAttributeRequest;
use App\Http\Requests\Attribute\UpdateAttributeRequest;
use App\Http\Requests\Attribute\DeleteAttributeRequest;

class AttributeController extends Controller
{
    // protected Attribute $attribute;

    // public function __construct(Attribute $attribute)
    // {
    //     $this->attribute = $attribute;
    // }

    public function index()
    {
        $attributes = Attribute::whereUserId($this->getCurrentUserId())->get();

        return view('attribute.index')->withAttributes($attributes);
    }

    public function create()
    {
        return view('attribute.create');
    }

    public function store(StoreAttributeRequest $storeAttributeRequest)
    {
        $attribute = new Attribute();
        $attribute->user_id = $this->getCurrentUserId();
        $attribute->name = $storeAttributeRequest->name;
        $attribute->type = $storeAttributeRequest->type;

        if ($attribute->save()) {
            return redirect()->back()
                ->with('message', 'Attribute "' . $attribute->name . '" was successfully created.')
                ->with('model', $attribute)
                ->with('messageColor', config('response.color.success'));
        }
    }

    public function edit(Attribute $attribute)
    {
        return view('attribute.edit');
    }

    public function update(Attribute $attribute, UpdateAttributeRequest $updateAttributeRequest)
    {

    }

    public function destroy(DeleteAttributeRequest $deleteAttributeRequest)
    {

    }

    public function forceDestroy(DeleteAttributeRequest $deleteAttributeRequest)
    {

    }

    public function restore()
    {

    }
}
