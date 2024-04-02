<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    /**
     * @param $category
     * @param $id
     * @return mixed
     */
    public function edit($category, $id): mixed
    {
        return $this->categoryRepository->update($category, $id);

    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->categoryRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed
    {
        return $this->categoryRepository->getById($id);
    }

    /**
     * @param array $category
     * @return mixed
     */
    public function create(array $category): mixed
    {
        return $this->categoryRepository->create($category);
    }

    /**
     * @param array $category
     * @param $id
     * @return mixed
     */
    public function update(array $category, $id): mixed
    {
        return $this->categoryRepository->update($category, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $category = Category::findOrFail($id);

        $category->tests()->detach();

        $category->delete();

        return $category;
    }
}
