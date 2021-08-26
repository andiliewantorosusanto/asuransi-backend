<?php


namespace App\Services;


use App\Repositories\InsrTJHRepository;
use App\Traits\paginatorTrait;

class InsrTJHService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(InsrTJHRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByBranchId($branchId)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterBranchId($query,$branchId);
        $result = $query->get();

        return $result;
    }
}
