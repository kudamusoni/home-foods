<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.products');
    }

    public function show(Product $product = null)  {
        return view('pages.public.product');
    }

    public function viewCreate()  {
        return view('pages.admin.product-create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    public function create(Request $request) {
        dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address.country' => 'required|exists:countries,iso_code',
            'address.line' => 'required|numeric|min:0',

        ]);
    }
}
