<?php

namespace App\Services;
use App\Repositories\PageRespository;

class PageEditorService 
{
    protected $pageRepo;

    public function __construct()
    {
        $this->pageRepo = new PageRespository;
    }
    public function store($request) {
        return $this->pageRepo->update($request);
    }
}