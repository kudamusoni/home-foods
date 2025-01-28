<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

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
        //
    }
}
