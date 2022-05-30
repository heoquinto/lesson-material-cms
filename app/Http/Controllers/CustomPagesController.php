<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PageEditorService;
use App\Services\PublishPagesService;

class CustomPagesController extends Controller
{   
    protected $pageEditor;
    protected $publishPages;

    public function __construct()
    {
        $this->pageEditor = new PageEditorService;    
        $this->publishPages = new PublishPagesService;    
    }
    
    function store(Request $request) {
        return $this->pageEditor->store($request);
    }

    public function loadPages($pageId) {
        $publishPages = $this->publishPages->load($pageId);
        if($publishPages) {
            return view('published.index', ['publishPages' => $publishPages]);
        }

        abort(404);
    }
}
