<?php


namespace App\Services;

use App\Services\GenObjectCarService;
use App\Services\InsrCarPolisService;
use App\Services\InsrCarPolisDetailService;
use App\Services\InsrTJHService;
use App\Services\InsuranceRateService;
use App\Services\GenCustomerService;
use App\Services\GenCustPersonalService;
use App\Services\GenMerkService;
use App\Services\GenCategoryService;
use App\Services\InsrUsingPurposesService;
use App\Services\InsrInsuranceBranchService;
use App\Services\TimelineService;
use DateTime;
use stdClass;

class SimulasiUpgradeService
{
    protected $genObjectCarService;
    protected $insrCarPolisService;
    protected $insrCarPolisDetailService;
    protected $corAccountService;
    protected $genCustPersonalService;
    protected $genCustomerService;
    protected $insuranceRateService;
    protected $insrTJHService;
    protected $genMerkService;
    protected $genCategoryService;
    protected $insrUsingPurposesService;
    protected $insrInsuranceBranchService;
    protected $paramCarConditionService;
    protected $pengajuanUpgradeAsuransiService;
    protected $polisTahunanService;
    protected $filePengajuanUpgradeService;
    protected $timelineService;

    public function __construct(
        GenObjectCarService $genObjectCarService,
        InsrCarPolisService $insrCarPolisService,
        InsrCarPolisDetailService $insrCarPolisDetailService,
        CorAccountService $corAccountService,
        GenCustPersonalService $genCustPersonalService,
        GenCustomerService $genCustomerService,
        InsuranceRateService $insuranceRateService,
        InsrTJHService $insrTJHService,
        GenMerkService $genMerkService,
        GenCategoryService $genCategoryService,
        InsrUsingPurposesService $insrUsingPurposesService,
        InsrInsuranceBranchService $insrInsuranceBranchService,
        ParamCarConditionService $paramCarConditionService,
        PengajuanUpgradeAsuransiService $pengajuanUpgradeAsuransiService,
        PolisTahunanService $polisTahunanService,
        FilePengajuanUpgradeService $filePengajuanUpgradeService,
        TimelineService $timelineService
        )
    {
        $this->genObjectCarService = $genObjectCarService;
        $this->insrCarPolisService = $insrCarPolisService;
        $this->insrCarPolisDetailService = $insrCarPolisDetailService;
        $this->corAccountService = $corAccountService;
        $this->genCustPersonalService = $genCustPersonalService;
        $this->genCustomerService = $genCustomerService;
        $this->insuranceRateService = $insuranceRateService;
        $this->insrTJHService = $insrTJHService;
        $this->genMerkService = $genMerkService;
        $this->genCategoryService = $genCategoryService;
        $this->insrUsingPurposesService = $insrUsingPurposesService;
        $this->insrInsuranceBranchService = $insrInsuranceBranchService;
        $this->paramCarConditionService = $paramCarConditionService;
        $this->pengajuanUpgradeAsuransiService = $pengajuanUpgradeAsuransiService;
        $this->polisTahunanService = $polisTahunanService;
        $this->filePengajuanUpgradeService = $filePengajuanUpgradeService;
        $this->timelineService = $timelineService;
    }

    public function getCustomerDataForSimulasiUpgrade($request)
    {
        //car
        $car = $this->genObjectCarService->getByNomorKontrak($request);
        $carMerk = $this->genMerkService->getByMerkId($car->MerkId);
        $carCategory = $this->genCategoryService->getByCategoryId($car->CategoryId);
        $carCondition = $this->paramCarConditionService->getByCode($car->Kondisi);

        //Personal Info
        $coreAccount = $this->corAccountService->getByNomorKontrak($request);
        $customer = $this->genCustomerService->getByCustId($coreAccount->CustId);

        //insurance
        $insr = $this->insrCarPolisService->getByNomorKontrak($request);
        $insrDetail = $this->insrCarPolisDetailService->getByPolisId($insr->PolisID);
        $insrBranch = $this->insrInsuranceBranchService->getByBranchId($insrDetail[0]->BranchID);
        $polisTahunan = [];
        //Insurance Rate
        foreach($insrDetail as $insrd) {
            $polis = new stdClass;
            $polis->tahun = $insrd->PolisYear;
            $polis->jenisAsuransi = $insrd->TypeName;
            $polis->periodePolisDari = date("Y-m-d", strtotime($insrd->InsuredFrom));
            $polis->periodePolisSampai = date("Y-m-d", strtotime($insrd->InsuredTo));

            $from = new DateTime($insrd->InsuredFrom);
            $to = new DateTime($insrd->InsuredTo);
            $now = new DateTime();

            if($to < $now) {
                continue;
            }
            else if($from < $now) {
                $polis->prorata = $now->diff($from)->format("%a");
            } else {
                $polis->prorata = 0;
            }

            //find better way
            $polis->RSCC = 0;
            $polis->TJH = 0;
            $polis->bencanaAlam = 0;
            $polis->aksesoris = 0;
            $polis->totalPremiPertanggungan = 0;
            $polis->totalPremiPerluasan = 0;

            $polis->penyusutan = $insrd->InsuredValue/$coreAccount->HargaBarang*100;
            $polis->nilaiPertanggungan = $insrd->InsuredValue;
            $polis->rate = $this->insuranceRateService->getInsuranceRate($insrd->BranchID,$car->UseFor,$car->Kondisi,$car->CategoryId,$insrd->InsuredValue);

            $polisTahunan[] = $polis;
        }

        $emptyTjh = new stdClass;
        $emptyTjh->BranchID = "0";
        $emptyTjh->CompanyPremium = "0";
        $emptyTjh->CustomerPremium = "0";
        $emptyTjh->TJHID = "0";
        $emptyTjh->TJHName = "0";

        $rateTjh = [];
        $rateTjh[] = $emptyTjh;
        $rateTjh = array_merge($rateTjh,$this->insrTJHService->getByBranchId($insrDetail[0]->BranchID)->toArray());


        //Form
        $formSimulasi = new stdClass;
        $formSimulasi->tanggalPengajuan = date("Y-m-d");
        $formSimulasi->perihalUpgrade = "Upgrade Asuransi";
        $formSimulasi->nomorRekening = $coreAccount->NoRek;
        $formSimulasi->nomorPin = $coreAccount->NoPin;
        $formSimulasi->tanggalRealisasi = date("Y-m-d", strtotime($coreAccount->RealisasiDate));
        $formSimulasi->tahunRealisasi = date("Y", strtotime($coreAccount->RealisasiDate));
        $formSimulasi->nama = $customer->CustName;
        $formSimulasi->produk = "CS Mobil";
        $formSimulasi->otr = $coreAccount->HargaBarang;
        $formSimulasi->merkKendaraan = $carMerk->MerkName;
        $formSimulasi->modelKendaraan = $car->Type;
        $formSimulasi->kategoriKendaraan = $carCategory->CategoryName;
        $formSimulasi->tahunKendaraan = $car->Tahun;
        $formSimulasi->jenisPenggunaan = $insr->Purpose;
        $formSimulasi->maskapaiAsuransi = $insrBranch->BranchName;
        $formSimulasi->kondisi = $carCondition->text;
        $formSimulasi->noPolis = $insrDetail[0]->PolisNo;
        $formSimulasi->noPolisi = $car->NoPolisi;
        $formSimulasi->coverMundur = false;
        $formSimulasi->survey = false;
        $formSimulasi->upgradeAllRisk = false;
        $formSimulasi->alamatPengiriman = $customer->CustMailAddr;

        return [
            'formSimulasi' => $formSimulasi,
            'rateTjh' => $rateTjh,
            'polisTahunan' => $polisTahunan,
        ];
    }

    public function getListSimulasiUpgrade($request) {
        if(!empty($request->isMaskapai) && $request->isMaskapai) {
            $data = $this->pengajuanUpgradeAsuransiService->maskapai();
        } else {
            $data = $this->pengajuanUpgradeAsuransiService->all();
        }

        $countPengajuan = $this->getTotalCountPengajuan();

        return [
            'pengajuanSimulasi' => $data,
            'countPengajuan' => $countPengajuan
        ];
    }

    public function getDetailSimulasiUpgrade($request) {
        $pengajuanSimulasi = $this->pengajuanUpgradeAsuransiService->getById($request->route('id'));
        $polisTahunan = $this->polisTahunanService->getByPengajuanUpgradeAsuransiId($request->route('id'));
        $file = $this->filePengajuanUpgradeService->getByPengajuanUpgradeAsuransiId($request->route('id'));
        $timeline = $this->timelineService->getByPengajuanUpgradeAsuransiId($request->route('id'));

        return [
            'pengajuanSimulasi' => $pengajuanSimulasi,
            'polisTahunan' => $polisTahunan,
            'file' => $file,
            'timeline' => $timeline
        ];
    }

    public function getTotalCountPengajuan() {
        $countPengajuan = $this->pengajuanUpgradeAsuransiService->getCount();
        return $countPengajuan;
    }

    public function exportToExcel() {
        return '';
    }

    public function uploadFile($request) {

    }

    public function addComment($request) {

    }

}
