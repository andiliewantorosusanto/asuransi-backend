<?php


namespace App\Repositories;


use App\Models\InsrInsuranceBranch;
use App\Traits\baseRepositoryTrait;

class InsrInsuranceBranchRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsrInsuranceBranch $model)
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
