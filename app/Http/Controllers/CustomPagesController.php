<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PageEditorService;

class CustomPagesController extends Controller
{   
    protected $pageEditor;

    public function __construct(PageEditorService $pageEditorService)
    {
        $this->pageEditor = $pageEditorService;    
    }
    
    function store(Request $request) {
        return $this->pageEditor->store($request);
    }
}
