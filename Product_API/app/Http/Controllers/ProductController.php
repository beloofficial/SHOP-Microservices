<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Category;
use Response;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
   
    public function store(StoreProductRequest $request)
    {
    	$product = Product::create($request->validated());
    	$product->categories()->sync($request->categories);

        return Response::json(['status' => "success"], 200); 
    }
    public function getProducts()
    {

    	return new ProductCollection(Product::paginate(4));
    }
    public function getProduct(Product $product)
    {
    	return new ProductResource($product);
    }
    public function update(Product $product,UpdateProductRequest $request)
    {
    	$product->price = $request->price;
    	$product->save();
        return new ProductResource($product);
    }
    public function destroy(Product $product)
    {
    	$product->delete();
        return Response::json(['status' => "success"], 200);
    }
    public function getProductsByCategory(Category $category)
    {
        
        if(isset($_GET['page']))

    	   return new ProductCollection($category->products->forPage($_GET['page'], 4) );
        else
            return new ProductCollection($category->products->forPage(1, 4) );
    }
}
