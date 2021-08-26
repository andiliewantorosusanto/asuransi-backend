<?php


namespace App\Services;


use App\Repositories\InsuranceRateRepository;
use App\Traits\paginatorTrait;

class InsuranceRateService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(InsuranceRateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getInsuranceRate($branchId,$purposeId,$condition,$categoryId,$tsiRange)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterBranchId($query,$branchId);
        $query = $this->repository->filterPurposeId($query,$purposeId);
        $query = $this->repository->filterCondition($query,$condition);
        $query = $this->repository->filterCategoryId($query,$categoryId);
        $query = $this->repository->filterTsiRange($query,$tsiRange);
        $result = $query->get();

        return $result;
    }
}
