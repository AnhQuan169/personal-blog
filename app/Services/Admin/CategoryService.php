<?php

namespace App\Services\Admin;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function listCategories()
    {
        return $this->model->orderBy('id', 'desc')->pluck('title', 'id');
    }

    public function getCategories($request)
    {
        $categories= $this->model->query();
        $limit = config('api.pagination.per_page');

        if ($request->keyword) {
            $categories->where('id', $request->keyword)->orderBy('id', 'desc')->paginate($limit);
        }

        return $categories->orderBy('id', 'desc')->paginate($limit);
    }

    public function store($request)
    {
        try {
            $this->model->create([
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
                'status' => $request->status
            ]);

            return true;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
