<?php


namespace App\Services;


use App\Repositories\GenCustomerRepository;
use App\Traits\paginatorTrait;

class GenCustomerService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(GenCustomerRepository $repository)
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
