<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;
use Response;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    //
    public function store(StoreCategoryRequest $request){
    	Category::create($request->validated());
        
        return Response::json(['status' => "success"], 200); 
    }
    public function getCategories(){
        return new CategoryCollection(Category::all());
    }
    public function getCategory(Category $category){
    	
        return new CategoryResource($category);

    }
    public function update(Category $category,UpdateCategoryRequest $request){
    	$category->name = $request->name;
    	$category->save();
        return new CategoryResource($category);

    }
    public function destroy(Category $category){
    	$category->delete();
        return Response::json(['status' => "success"], 200); 
    }

}
