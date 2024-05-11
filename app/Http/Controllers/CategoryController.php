<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        foreach ($categories as $key => $category) {
            if (isset($category->description)) {
                $categories[$key]['description'] = Str::limit($category->description ?? '', 50);
            }
        }
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $validationRules = Validator::make($request->all(), [
            'categoryName' => 'required|string|max:255', // Enforce maximum length of 2 characters
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
        ]);
        if ($validationRules->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validationRules)->withInput();
        } else {
            // Ensure that $request->status is either true or false before assigning it
            $isActive = $request->status === "Active" ? true : false;

            $category->update([
                'name' => $request->categoryName,
                'description' => $request->description,
                'is_active' => $isActive // Assign the validated boolean value
            ]);

            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
