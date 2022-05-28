<?php

namespace App\Services;
use App\Repositories\PageRespository;

class PageEditorService 
{
    protected $pageRepo;

    public function __construct(PageRespository $pageRespository)
    {
        $this->pageRepo = $pageRespository;
    }
    public function store($request) {
        return $this->pageRepo->update($request);
    }
}