<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Country;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function home() {
        $products = Product::all();
        return view('pages.public.home', [
            'products' => $products
        ]);
    }
    public function index()
    {
        $user = auth()->user();
        $products = Product::with('category')->get();
        return view('pages.admin.products', [
            'products' => ProductResource::collection($products)->resolve()
        ]);
    }

    public function show(Product $product)  {
        return view('pages.public.product', [
            'product' => (new ProductResource($product->load('category')))->resolve()
        ]);
    }

    public function viewCreate()  {
        return view('pages.admin.product-create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0', 'gte:cost_per_item'],
            'sale_price' => ['nullable', 'integer', 'min:0', 'lte:price', 'gte:cost_per_item'],
            'cost_per_item' => ['required', 'integer', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        try {
            DB::transaction(function () use ($data) {
                $user = auth()->user();

                $category = Category::where('name', $data['category'])->first();

                $product = Product::create([
                    'company_id' => $user->company_id,
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'],
                    'cost_per_item' => $data['cost_per_item'],
                    'quantity' => $data['quantity'],
                    'category_id' => $category->id,
                ]);

                return $product;
            });

            return response()->json([
                "message" => "Success: Product has been created"
            ]);
        } catch (\Throwable $e) {
            Logger($e->getMessage());
            return response('Error: Product creation failed', 500);
        }
    }

    public function viewEdit(Product $product)  {
        return view('pages.admin.product-edit', [
            'categories' => Category::all(['id', 'name']),
            'product' => (new ProductResource($product->load('category')))->resolve()
        ]);
    }

    public function edit(Request $request, Product $product) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0', 'gte:cost_per_item'],
            'sale_price' => ['nullable', 'integer', 'min:0', 'lte:price', 'gte:cost_per_item'],
            'cost_per_item' => ['required', 'integer', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        try {
            DB::transaction(function () use ($data, $product) {
                $category = Category::where('name', $data['category'])->first();

                $product->category_id = $category->id;
                $product->name = $data['name'];
                $product->description = $data['description'];
                $product->price = $data['price'];
                $product->sale_price = $data['sale_price'];
                $product->cost_per_item = $data['cost_per_item'];
                $product->quantity = $data['quantity'];

                $product->save();

                return $product;
            });

            return response()->json([
                "message" => "Success: Product has been update"
            ]);
        } catch (\Throwable $e) {
            Logger($e->getMessage());
            return response('Error: Product update failed', 500);
        }
    }
}
