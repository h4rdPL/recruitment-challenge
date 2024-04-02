<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryService->all();
        return view('categories', compact('categories'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('CreateCategory');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $category = $this->categoryService->create($data);

        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $category = $this->categoryService->getById($id);
        return view('CategoryEdit', compact('category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $this->categoryService->update($data, $id);

        return response()->json(['message' => 'Category updated successfully', 'category' => $data], 201);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $this->categoryService->delete($id);

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function getTestsByCategory(Category $category): JsonResponse
    {
        $tests = $category->tests()->get();

        return response()->json(['tests' => $tests], 200);
    }
}
