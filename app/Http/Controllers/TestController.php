<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Rules\IcdCode;
use App\Rules\TestCode;
use App\Services\CategoryService;
use App\Services\TestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestController
{
    /**
     * @param TestService $testService
     * @param CategoryService $categoryService
     */
    public function __construct(
        protected TestService $testService,
        protected CategoryService $categoryService
    )
    {
    }

    /**
     * @return View
     */
    public function index() : View
    {
        $categories = $this->categoryService->all();
        $tests = $this->testService->all()->load('categories');
        return view('Tests', compact('categories', 'tests'));
    }


    /**
     * @return View
     */
    public function create() : View
    {
        $categories = $this->categoryService->all();
        return view('CreateTest', compact('categories'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'test_code' => ['required', new TestCode],
            'icd_code' => ['required', new IcdCode],
            'categories' => 'required|array',
        ]);

        $test = $this->testService->create($data);

        $test->categories()->attach($request->input('categories'));

        return response()->json(['message' => 'Test created successfully', 'test' => $test], 201);
    }


    /**
     * @param $id
     * @return View
     */
    public function edit($id) : View
    {
        $test = $this->testService->getById($id);
        $categories = Category::all();

        return view('TestEdit', compact('test', 'categories'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'test_code' => ['required', new TestCode],
            'icd_code' => ['required', new IcdCode],
            'categories' => 'required|array',
        ]);

        $test = $this->testService->update($data, $id);
        $test->categories()->sync($data['categories']);


        return response()->json(['message' => 'Test updated successfully', 'test' => $test], 201);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $this->testService->delete($id);

        return redirect()->route('tests.index');
    }
}
