<?php


namespace App\Repositories;


use App\Models\GenCustomer;
use App\Traits\baseRepositoryTrait;

class GenCustomerRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(GenCustomer $model)
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
