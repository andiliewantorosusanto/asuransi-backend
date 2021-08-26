<?php


namespace App\Services;


use App\Repositories\GenObjectCarRepository;
use App\Traits\paginatorTrait;

class GenObjectCarService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(GenObjectCarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByNomorKontrak($request)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterNomorRekening($query,$request->nomorRekening);
        $query = $this->repository->filterNomorPin($query,$request->nomorPin);
        $result = $query->first();

        return $result;
    }
}
