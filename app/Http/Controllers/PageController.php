<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    public function index(Request $request): JsonResponse
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
}
