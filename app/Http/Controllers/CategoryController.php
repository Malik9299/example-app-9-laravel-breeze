<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryNumber;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->perPage) {
            $request->request->add(['perPage' => 10]);
        }
        // $categories = Category::all();
        // DB::enableQueryLog();

        $categories = Category::with('categoryNumber')->orderBy('id', 'desc')->paginate($request->perPage);


        // dd(DB::getQueryLog());

        foreach ($categories as $key => $category) {
            if (isset($category->description)) {
                $categories[$key]['description'] = Str::limit($category->description ?? '', 50);
            }
        }
        if ($request->expectsJson()) {
            return response()->json(['categories' => $categories]);
        } else {
            return view('categories.index', compact('categories'));
        }
        // return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = new Category();
        $category->name = $request->categoryName;
        $category->description = $request->description;
        $category->is_active = $request->status;
        $category->save();

        $categoryNumber = new CategoryNumber();
        $categoryNumber->category_number = $request->categoryNumber;
        $categoryNumber->category()->associate($category); // Associate the category with categoryNumber
        $categoryNumber->save();


        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return redirect()->route('not_found_route')->with('error', 'Category not found.');
        // $category->load('categoryNumber', 'subCategory');
        // return view('categories.view', compact('category'));
        try {
            $category = Category::findOrFail($category->id)->load('categoryNumber', 'subCategory');
            return view('categories.view', compact('category'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('not_found_route')->with('error', 'Category not found.');
        }
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
        $category = Category::find($category->id);
        if ($category) {
            $category->categoryNumber()->delete();
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
}
