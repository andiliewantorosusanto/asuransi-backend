<?php


namespace App\Services;


use App\Repositories\GenCustPersonalRepository;
use App\Traits\paginatorTrait;

class GenCustPersonalService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(GenCustPersonalRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCustId($custId)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterCustId($query,$custId);
        $result = $query->first();

        return $result;
    }
}
