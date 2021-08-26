<?php


namespace App\Repositories;


use App\Models\InsrTJH;
use App\Traits\baseRepositoryTrait;

class InsrTJHRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsrTJH $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterBranchId($query, $branchId)
    {
        return $query->where('branchId',$branchId);
    }
}
