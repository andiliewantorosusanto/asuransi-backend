<?php


namespace App\Services;


use App\Repositories\InsrCarPolisDetailRepository;
use App\Traits\paginatorTrait;

class InsrCarPolisDetailService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(InsrCarPolisDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByPolisId($request)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterPolisId($query,$request);
        $result = $query->get();

        return $result;
    }
}
