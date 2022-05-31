<?php

namespace App\Repositories;

use App\Models\Pages;

class PageRespository
{
    public function update($request)
    {
        return Pages::where('id', $request->input('id'))
            ->update([
                'content' => $request->input('html'),
                'css' => $request->input('css'),
                'styles' => $request->input('styles'),
                'components' => $request->input('components'),
            ]);
    }

    public function findPage($pageId)
    {
        return Pages::find($pageId);
    }

    public function deletePage($pageId)
    {
        return Pages::findOrFail($pageId)->delete();
    }
}
