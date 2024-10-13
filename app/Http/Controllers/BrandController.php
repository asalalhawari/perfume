<?php

// app/Http/Controllers/BrandController.php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Brand::create($request->all());
        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate(['name' => 'required']);
        $brand->update($request->all());
        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
