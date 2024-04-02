<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Category::all();
    }

    /**
     * @param array $category
     * @return mixed
     */
    public function create(array $category): mixed
    {
        return Category::create($category);
    }

    /**
     * @param array $category
     * @param $id
     * @return mixed
     */
    public function update(array $category, $id): mixed
    {
        $updated_category = Category::findOrFail($id);
        $updated_category->update($category);
        return $updated_category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed
    {
        return Category::findOrFail($id);
    }
}
