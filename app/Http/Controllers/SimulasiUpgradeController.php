<?php


namespace App\Http\Controllers;


use App\Requests\SimulasiUpgrade\GetByNomorKontrakRequest;
use App\Requests\SimulasiUpgrade\InsertPolisTahunanRequest;
use App\Requests\SimulasiUpgrade\InsertAsuransiRequest;
use App\Services\FilePengajuanUpgradeService;
use App\Services\SimulasiUpgradeService;
use App\Services\PengajuanUpgradeAsuransiService;
use App\Services\PolisTahunanService;
use App\Traits\responseTrait;
use Illuminate\Http\Request;
use PDF;

class SimulasiUpgradeController extends Controller
{
    use responseTrait;

    protected $simulasiUpgradeService;
    protected $pengajuanUpgradeAsuransiService;
    protected $polisTahunanService;
    protected $filePengajuanUpgradeService;

    public function __construct(SimulasiUpgradeService $simulasiUpgradeService,
    PengajuanUpgradeAsuransiService $pengajuanUpgradeAsuransiService,
    PolisTahunanService $polisTahunanService,
    FilePengajuanUpgradeService $filePengajuanUpgradeService
    )
    {
        $this->simulasiUpgradeService = $simulasiUpgradeService;
        $this->pengajuanUpgradeAsuransiService = $pengajuanUpgradeAsuransiService;
        $this->polisTahunanService = $polisTahunanService;
        $this->filePengajuanUpgradeService = $filePengajuanUpgradeService;
    }

    public function getByNomorKontrak(GetByNomorKontrakRequest $request)
    {
        $response = $this->simulasiUpgradeService->getCustomerDataForSimulasiUpgrade($request);
        return $this->response($response, 'Success', 'Simulasi data retrieved');
    }

    public function getListSimulasiUpgrade(Request $request)
    {
        $response = $this->simulasiUpgradeService->getListSimulasiUpgrade($request);
        return $this->response($response,'Success','List Proses Pembayaran Retrieved');
    }

    public function getDetailSimulasiUpgrade(Request $request)
    {
        $response = $this->simulasiUpgradeService->getDetailSimulasiUpgrade($request);
        return $this->response($response,'Success','Detail Simulasi Upgrade Retrieved');
    }

    public function insertSimulasi(InsertAsuransiRequest $request)
    {
        $response = $this->pengajuanUpgradeAsuransiService->store($request);
        return $this->response($response, 'Success', 'Upgrade Asuransi Inserted');
    }

    public function insertPolisTahunan(InsertPolisTahunanRequest $request)
    {
        $response = $this->polisTahunanService->store($request);
        return $this->response($response, 'Success', 'Polis Tahunan Inserted');
    }

    public function insertMassPolisTahunan(Request $request)
    {
        $response = $this->polisTahunanService->storeMass($request);
        return $this->response($response, 'Success', 'Polis Tahunan Inserted');
    }

    public function printPdf(Request $request)
    {
        $data = $this->simulasiUpgradeService->getDetailSimulasiUpgrade($request);
        $pdf = PDF::loadView('users.index',$data)->setPaper('a4', 'landscape');
        return $pdf->download('pdfview.pdf');
    }

    public function uploadFile(Request $request)
    {
        $response = $this->filePengajuanUpgradeService->uploadFile($request);
        return $this->response($response, 'Success', 'File Uploaded');
    }

    public function changeStatus(Request $request)
    {
        $response = $this->pengajuanUpgradeAsuransiService->changeStatus($request);
        return $this->response($response, 'Success', 'Status Changed');
    }
}
