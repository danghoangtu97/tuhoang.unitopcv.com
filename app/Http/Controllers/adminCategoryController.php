<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\components\categoryRecursive;
use App\components\changeSlug;
use App\Http\Requests\storeCategoryRequest;
use App\Models\category;

class adminCategoryController extends Controller
{
    private $categoryRecursive;

    function __construct(categoryRecursive $categories)
    {
        $this->categoryRecursive = $categories;
    }

    function index()
    {
        $categories = category::where('parent_id', 0)->get();

        return view('admin.category.index', compact('categories'));
    }

    function create()
    {
        $htmlOption = $this->categoryRecursive->categoryRecursiveAdd();
        return view('admin.category.create', compact('htmlOption'));
    }

    function store(storeCategoryRequest $request)
    {
        $a = new changeSlug;
        $parent = category::where('id', $request->parent_id)->first();
        $name_slug = $a->seoUrl($request->name);
        if (!empty($parent)) {
            $slug = $a->seoUrl($parent->slug) . '-';
            $parent_name = $parent->name;
        } else {
            $slug = '';
            $parent_name = '';
        }
        category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>  $slug . $name_slug, 
            'parent_name' => $parent_name,
        ]);

        return redirect()->route('category.index')->with('status', 'Đã tạo danh mục mới thành công');
    }

    function edit($id)
    {
        $category = category::find($id);
        $htmlOption = $this->categoryRecursive->categoryRecursiveEdit($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    function update($id, Request $request)
    {
        $a = new changeSlug;
        $parent = category::where('id', $request->parent_id)->first();
        $name_slug = $a->seoUrl($request->name);
        if (!empty($parent)) {
            $slug = $a->seoUrl($parent->slug) . '-';
            $parent_name = $parent->name;
        } else {
            $slug = '';
            $parent_name = '';
        }
        category::find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>  $slug . $name_slug,
            'parent_name' => $parent_name, 
        ]);

        return redirect()->route('category.index')->with('status', 'Đã cập nhật danh mục mới thành công');
    }

    function delete($id)
    {
        category::find($id)->delete();

        return redirect()->route('category.index')->with('status', 'Đã xóa danh mục thành công');
    }
}
