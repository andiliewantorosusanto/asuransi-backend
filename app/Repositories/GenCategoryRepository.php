<?php


namespace App\Repositories;


use App\Models\GenCategory;
use App\Traits\baseRepositoryTrait;

class GenCategoryRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(GenCategory $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterCategoryId($query, $categoryId)
    {
        return $query->where('categoryId',$categoryId);
    }
}
