<?php


namespace App\Services;


use App\Repositories\InsrInsuranceBranchRepository;
use App\Traits\paginatorTrait;

class InsrInsuranceBranchService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(InsrInsuranceBranchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByBranchId($branchId)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterBranchId($query,$branchId);
        $result = $query->first();

        return $result;
    }
}
