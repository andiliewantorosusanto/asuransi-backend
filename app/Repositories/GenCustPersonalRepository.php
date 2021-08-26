<?php


namespace App\Repositories;


use App\Models\GenCustPersonal;
use App\Traits\baseRepositoryTrait;

class GenCustPersonalRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(GenCustPersonal $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterCustId($query, $custId)
    {
        return $query->where('CustId',$custId);
    }
}
