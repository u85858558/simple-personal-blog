<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategoriesController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = Category::paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.categories.create');
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->posts()->count()) {
            return back()->withErrors(['error' => 'Не может удалить категорию']);
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    /**
     * @param CreateCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        Category::created($request->validated());

        return redirect()->route('admin.categories.index');
    }

    public function update(EditCategoryRequest $request): RedirectResponse
    {
        Category::updated($request->validated());

        return redirect()->route('admin.categories.index');
    }
}
