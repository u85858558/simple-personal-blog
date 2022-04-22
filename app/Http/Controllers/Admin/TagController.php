<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TagController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tag = Tag::paginate(20);

        return view('admin.tag.index', compact('tag'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.tag.create');
    }

    /**
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag): View|Factory|Application
    {
        return view('admin.tag.edit', compact('tag'));
    }
}
