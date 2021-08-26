<?php


namespace App\Services;


use App\Repositories\TimelineRepository;
use App\Traits\paginatorTrait;

class TimelineService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(TimelineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByPengajuanUpgradeAsuransiId($id)
    {
        return $this->repository->getByPengajuanUpgradeAsuransiId($id);
    }
}
