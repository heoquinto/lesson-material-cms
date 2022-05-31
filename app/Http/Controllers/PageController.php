<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $page;

    public function __construct()
    {
        $this->page = new PageService;
    }

    public function index(): JsonResponse
    {
        $pages = Page::select('id', 'title', 'url', 'created_at')->paginate(15);

        return response()->json($pages);
    }

    public function store(Request $request): JsonResponse
    {
        Page::create([
            'title' => $request->title,
            'url' => $request->url
        ]);

        return response()->json();
    }

    public function destroy($pageId)
    {
        return $this->page->delete($pageId);
    }
}
