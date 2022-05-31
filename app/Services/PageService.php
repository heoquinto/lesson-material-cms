<?php

namespace App\Services;

use App\Repositories\PageRespository;

class PageService
{
    protected $pageRepo;

    public function __construct()
    {
        $this->pageRepo = new PageRespository;
    }

    public function delete($pageId)
    {
        return $this->pageRepo->deletePage($pageId);
    }
}
