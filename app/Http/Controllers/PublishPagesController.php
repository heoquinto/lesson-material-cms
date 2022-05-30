<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublishPagesService;

class PublishPagesController extends Controller
{
    //
    protected $publishPages;

    public function __construct(PublishPagesService $publishPagesService)
    {
        $this->publishPages = $publishPagesService;    
    }
    
    public function loadPages($pageId) {
        $publishPages = $this->publishPages->load($pageId);
        if($publishPages) {
            return view('published.index', ['publishPages' => $publishPages]);
        }

        abort(404);
    }
}
