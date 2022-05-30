<?php

namespace App\Services;
use App\Repositories\PageRespository;

class PublishPagesService 
{
    protected $pageRepo;

    public function __construct(PageRespository $pageRespository)
    {
        $this->pageRepo = $pageRespository;
    }

    public function load($pageId) {
        return $this->pageRepo->findPage($pageId);
    }
}