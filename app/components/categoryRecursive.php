<?php

namespace App\components;

use App\Models\category;

class categoryRecursive
{
    private $html;
    function __construct()
    {
        $this->html = ''; 
    }

    function categoryRecursiveAdd($parentId = 0, $text = '')  
    {
        $data = category::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= "<option value='" . $dataItem['id'] . "'>" . $text . $dataItem['name'] . "</option>";

            $this->categoryRecursiveAdd($dataItem->id, $text . '--');
        }
        return $this->html;
    }

    function categorySearch($parentId = 0, $text = '')  
    {
        $data = category::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= "<option value='" . $dataItem['slug'] . "'>" . $text . $dataItem['name'] . "</option>";

            $this->categorySearch($dataItem->id, $text . '--');
        }
        return $this->html;
    }

    function categoryRecursiveEdit($parentIdEdit, $parentId = 0, $text = '')
    {
        $data = category::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if (!empty($parentIdEdit) && $parentIdEdit == $dataItem['id']) {
                $this->html .= "<option selected value='" . $dataItem['id'] . "'>" . $text . $dataItem['name'] . "</option>";
            } else {
                $this->html .= "<option value='" . $dataItem['id'] . "'>" . $text . $dataItem['name'] . "</option>";
            }

            $this->categoryRecursiveEdit($parentIdEdit, $dataItem->id, $text . '--');
        }
        return $this->html;
    }
}
