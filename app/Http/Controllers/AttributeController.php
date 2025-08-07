<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{
    protected Attribute $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    public function index()
    {
        return view('attribute.index');
    }

    public function create()
    {
        return view('attribute.create');
    }

    public function store()
    {

    }

    public function edit()
    {
        return view('attribute.edit');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function forceDestroy()
    {

    }

    public function restore()
    {

    }
}
