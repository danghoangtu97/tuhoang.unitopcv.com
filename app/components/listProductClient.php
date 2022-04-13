<?php

namespace App\components; 

use App\Models\category;
use App\Models\product;

class listProductClient
{
    function listProduct($slug)
    {
        $category = category::where('slug', $slug)->first();

        if ($category->parent_id == 0) {
            $listCategory = category::where('slug', 'LIKE', "%$slug%")->get();

            $listCategoryId = [];

            foreach ($listCategory as $category) {
                $listCategoryId[] = $category->id;
            }

            $listProduct = product::whereIn('category_id', $listCategoryId)->simplePaginate(6);
        } else {
            $listProduct = product::where('category_id', $category->id)->simplePaginate(6);
        }

        return $listProduct;
    }
}
