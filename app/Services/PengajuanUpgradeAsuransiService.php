<?php


namespace App\Services;

use App\Models\FilePengajuanUpgrade;
use App\Repositories\PengajuanUpgradeAsuransiRepository;
use App\Repositories\TimelineRepository;
use App\Traits\paginatorTrait;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Storage;

class PengajuanUpgradeAsuransiService
{
    use paginatorTrait;

    protected $repository;
    protected $timelineRepository;
    protected $virtualAccountService;
    protected $filePengajuanUpgradeService;

    public function __construct(PengajuanUpgradeAsuransiRepository $repository,
    VirtualAccountService $virtualAccountService,
    FilePengajuanUpgradeService $filePengajuanUpgradeService,
    TimelineRepository $timelineRepository
    )
    {
        $this->repository = $repository;
        $this->virtualAccountService = $virtualAccountService;
        $this->filePengajuanUpgradeService = $filePengajuanUpgradeService;
        $this->timelineRepository = $timelineRepository;
    }

    public function store($request)
    {
        $dateExpired = new DateTime($request->tanggalPengajuan);
        $interval = new DateInterval('P5D');
        $dateExpired->add($interval);

        $dateExpired = $dateExpired->format('Y-m-dH:i:s');

        $va = $this->virtualAccountService->registerVA($request->nama,$request->totalBiaya,$dateExpired);
        $data = $request->all();

        $data['dateExpired'] = substr($dateExpired,0,10);
        $data['va'] = $va->noVA;
        $data['orderId'] = $va->orderId;

        return [
            'simulasi' => $this->repository->create($data)
        ];
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function maskapai()
    {
        return $this->repository->maskapaiOnly();
    }

    public function getCount()
    {
        return $this->repository->getCount();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function changeStatus($request)
    {
        //update
        $data = $request->all();
        $data['pengajuanUpgradeAsuransiId'] = $request->route('id');
        $this->timelineRepository->create($data);
        //$request->route('id')

        $update['komentar'] = $data['komentar'];
        $update['statusUpgradeId'] = $data['statusUpgradeId'];

        return $this->repository->update($request->route('id'),$update);

    }

}
