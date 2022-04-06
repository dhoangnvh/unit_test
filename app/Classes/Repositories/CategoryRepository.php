<?php

namespace App\Classes\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function create($data)
    {
        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return $category;
    }

    public function update($data, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
