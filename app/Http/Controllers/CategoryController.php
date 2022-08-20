<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\SaveCategoryRequest;

class CategoryController extends Controller
{
	public function index()
	{
		/*$projects = Project::get();*/
		return view('categories.index', [
			'category' => Category::get()
		]);
	}

    public function show(Category $category)
    {

    	return view('projects.index', [
    		'newProject' => new Project,
    		'category' => $category,
    		'projects' => $category->projects()->with('category')->latest()->paginate()
    	]);
    }
    public function create()
    {
    	return view('categories.create', [
    		/*'category' => $category*/
    	]);
    }

    public function store(SaveCategoryRequest $request)
    {
    	Category::create( $request->validated());
    	return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
    	return view('categories.edit', [
    		'category' => $category
    		]);
    }

    public function update(Category $category, SaveCategoryRequest $request)
    {
    	$category -> update($request->validated());
    	return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
    	return redirect()->route('categories.index');
    }
}
