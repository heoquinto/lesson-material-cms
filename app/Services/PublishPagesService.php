<?php

namespace App\Services;
use App\Repositories\PageRespository;

class PublishPagesService 
{
    protected $pageRepo;

    public function __construct()
    {
        $this->pageRepo = new PageRespository;
    }

    public function load($pageId) {
        return $this->pageRepo->findPage($pageId);
    }
}