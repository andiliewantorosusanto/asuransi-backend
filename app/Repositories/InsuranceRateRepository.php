<?php


namespace App\Repositories;


use App\Models\InsuranceRate;
use App\Traits\baseRepositoryTrait;

class InsuranceRateRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsuranceRate $model)
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

    public function filterPurposeId($query, $purposeId)
    {
        return $query->where('purposeId',$purposeId);
    }

    public function filterCondition($query, $condition)
    {
        return $query->where('condition',$condition);
    }

    public function filterCategoryId($query, $categoryId)
    {
        return $query->where('categoryId',$categoryId);
    }

    public function filterTsiRange($query, $tsi)
    {
        return $query->where('TSIFrom','<=',$tsi)->where('TSITo','>=',$tsi);
    }
}
