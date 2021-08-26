<?php


namespace App\Services;


use App\Repositories\FilePengajuanUpgradeRepository;
use App\Traits\paginatorTrait;
use Illuminate\Support\Facades\Storage;

class FilePengajuanUpgradeService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(FilePengajuanUpgradeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function uploadFile($request)
    {
        $file = $request->file('file')->storeAs('public/files',uniqid().'.'.$request->file('file')->extension());
        $file = asset(Storage::url($file));

        $f['pengajuanUpgradeAsuransiId'] = $request->route('id');
        $f['nama'] = $request->file('file')->getClientOriginalName();
        $f['extension'] = $request->file('file')->extension();
        $f['url'] = $file;

        return $this->repository->store($f);
    }

    public function getByPengajuanUpgradeAsuransiId($id)
    {
        return $this->repository->getByPengajuanUpgradeAsuransiId($id);
    }
}
