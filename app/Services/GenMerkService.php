<?php


namespace App\Services;


use App\Repositories\GenMerkRepository;
use App\Traits\paginatorTrait;

class GenMerkService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(GenMerkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByMerkId($merkId)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterMerkId($query,$merkId);
        $result = $query->first();

        return $result;
    }
}
