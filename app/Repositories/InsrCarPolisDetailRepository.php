<?php


namespace App\Repositories;


use App\Models\InsrCarPolisDetail;
use App\Traits\baseRepositoryTrait;

class InsrCarPolisDetailRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsrCarPolisDetail $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterPolisId($query, $polisId)
    {
        return $query->where('PolisID',$polisId);
    }

    // public function filterNomorPin($query,$nomorPin)
    // {
    //     return $query->where('NoPin',$nomorPin);
    // }

    // public function pagination($query, $limit)
    // {
    //     return $query->paginate($limit);
    // }

    // public function filterName($query, $name)
    // {
    //     return $query->where('name', 'like' ,'%'.$name.'%');
    // }
}
