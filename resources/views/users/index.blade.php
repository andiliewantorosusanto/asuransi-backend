<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    html {
        font-family: sans-serif;
        font-size: 10px;
        margin: 8px;
    }
    table {
        width: 100%;
    }
    td, th {
        text-align: left;
    }
    .title {
        background-color: #f0f3f5;
        text-align: center;
        padding: 0px;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered tr {
        border: 1px solid #dee2e6;
    }
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
</style>
</head>
<body class="border">
    <div class="title">
        FORM PERUBAHAN KONDISI PERTANGGUNGAN
    </div>
    <div style="padding:8px;">
        <table>
            <tr>
                <td><strong>Tanggal Pengajuan</strong></td>
                <td>{{$pengajuanSimulasi->tanggalPengajuan}}</td>
                <td></td><td></td>
            </tr>
            <tr>
                <td><strong>Perihal Upgrade</strong></td>
                <td>{{$pengajuanSimulasi->perihalUpgrade}}</td>
                <td><strong>Tanggal Realisasi</strong></td>
                <td>{{$pengajuanSimulasi->tanggalRealisasi}}</td>
            </tr>
            <tr>
                <td><strong>No Kontrak</strong></td>
                <td>{{$pengajuanSimulasi->nomorRekening}}{{$pengajuanSimulasi->nomorKontrak}}</td>
                <td><strong>Realisasi (Tahun)</strong></td>
                <td>{{$pengajuanSimulasi->tahunRealisasi}}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>{{$pengajuanSimulasi->nama}}</td>
                <td><strong>Produk</strong></td>
                <td>{{$pengajuanSimulasi->produk}}</td>
            </tr>
            <tr>
                <td><strong>OTR Awal</strong></td>
                <td>{{$pengajuanSimulasi->otr}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Merk / Type Kendaraan</strong></td>
                <td>{{$pengajuanSimulasi->merkKendaraan}}</td>
                <td><strong>Kategori Kendaraan</strong></td>
                <td>{{$pengajuanSimulasi->kategoriKendaraan}}</td>
            </tr>
            <tr>
                <td><strong>Tahun Kendaraan</strong></td>
                <td>{{$pengajuanSimulasi->tahunKendaraan}}</td>
                <td><strong>Jenis Penggunaan</strong></td>
                <td>{{$pengajuanSimulasi->jenisPengunaan}}</td>
            </tr>
            <tr>
                <td><strong>Maskapai Asuransi</strong></td>
                <td>{{$pengajuanSimulasi->maskapaiAsuransi}}</td>
                <td><strong>Kondisi</strong></td>
                <td>{{$pengajuanSimulasi->kondisi}}</td>
            </tr>
            <tr>
                <td><strong>No Polis</strong></td>
                <td>{{$pengajuanSimulasi->noPolis}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>No Polisi</strong></td>
                <td>{{$pengajuanSimulasi->noPolisi}}</td>
                <td><strong>Normal / CM</strong></td>
                <td>Normal</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Survey / Tidak Survey</strong></td>
                <td>Tidak Survey</td>
            </tr>
            <br>
            <tr>
                <td><strong>Upgrade Perluasan</strong></td>
                <td><strong>RSCC</strong></td>
                <td>{{number_format($pengajuanSimulasi->RSCC)}}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><strong>Bencana Alam</strong></td>
                <td>{{number_format($pengajuanSimulasi->bencanaAlam)}}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><strong>TJH</strong></td>
                <td>{{number_format($pengajuanSimulasi->TJH)}}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><strong>Aksesoris</strong></td>
                <td>{{number_format($pengajuanSimulasi->aksesoris)}}</td>
                <td></td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <td></td>
                @foreach ($polisTahunan as $p)
                    <td>  Tahun Ke-{{$p->tahun}} ({{$p->jenisAsuransi}})
                        <br>
                       <small>  ( {{($p->prorata >= 1) ? $p->prorata : $p->prorata}} )
                         {{$p->periodePolisDari}} -> {{$p->periodePolisSampai}}</small>
                    </td>
                @endforeach
                <td>Total Premi</td>
            </tr>
            <tr>
                <td>Penyusutan (%)</td>$
                @foreach ($polisTahunan as $p)
                  <td>{{$p->penyusutan}}</td>
                  @endforeach
                <td></td>
            </tr>
            <tr>
                <td>Nilai Pertanggungan</td>
                    @foreach ($polisTahunan as $p)
                        <td>{{number_format($p->nilaiPertanggungan)}}</td>
                    @endforeach
                <td></td>
            </tr>
            <tr class="bg-dark text-white">
                <td>Total Premi</td>
                    @foreach ($polisTahunan as $p)
                        <td>{{number_format($p->totalPremiPertanggungan)}}</td>
                    @endforeach
                <td>{{number_format($pengajuanSimulasi->totalPremiPertanggungan)}}</td>
            </tr>
            <tr>
                <td>RSCC</td>
                @foreach ($polisTahunan as $p)
                  <td>{{number_format($p->RSCC)}}</td>
                @endforeach
                <td></td>
            </tr>
            <tr>
                <td>Bencana Alam</td>
                @foreach ($polisTahunan as $p)
                  <td>{{number_format($p->bencanaAlam)}} <small>({{$p->bencanaAlamRate}}%)</small> </td>
                @endforeach
                <td></td>
              </tr>
              <tr>
                <td>TJH</td>
                @foreach ($polisTahunan as $p)
                  <td>{{number_format($p->TJH)}}</td>
                @endforeach
                <td></td>
              </tr>
              <tr>
                <td>Aksesoris</td>
                @foreach ($polisTahunan as $p)
                  <td>{{number_format($p->aksesoris)}} <small>({{$p->aksesorisRate}}%)</small> </td>
                @endforeach
                <td></td>
              </tr>
              <tr class="bg-dark text-white">
                <td>Total Premi</td>
                @foreach ($polisTahunan as $p)
                  <td>{{number_format($p->totalPremiPerluasan)}}</td>
                @endforeach
                <td>{{number_format($pengajuanSimulasi->totalPremiPerluasan)}}</td>
              </tr>
              <tr>
                @foreach ($polisTahunan as $p)
                  <td></td>
                @endforeach
                <td>Biaya Administrasi</td>
                <td>{{number_format($pengajuanSimulasi->biayaAdmin)}}</td>
              </tr>
              <tr>
                @foreach ($polisTahunan as $p)
                  <td></td>
                @endforeach
                <td>Total Yang Dibayarkan</td>
                <td>{{number_format($pengajuanSimulasi->totalBiaya)}}</td>
              </tr>
        </table>
        <div>
            <div>
                Alamat Pengiriman :
            </div>
            <div class="border p-2">
                {{$pengajuanSimulasi->alamatPengiriman}}
            </div>
        </div>
        <div>
            Keterangan :
            <ul>
                <li>
                    Pembayaran melalui no VA : <strong> {{$pengajuanSimulasi->va}} </strong>
                </li>
                <li>
                    Pembayaran dilakukan maksimal 5 hari setelah dikirimkan form perubahan kondisi pertanggungan, apabila dalam jangka waktu belum dilakukan pembayaran maka pengajuan upgrade dianggap batal
                </li>
            </ul>
        </div>
        <div>
            <div>
                Remarks :
            </div>
            <div class="border p-2">
                {{$pengajuanSimulasi->remarks}}
            </div>
        </div>
        <br><br><br>
        <table>
            <tr>
                <td>Konsumen</td>
                <td>Dibuat</td>
                <td>Diperiksa</td>
            </tr>

            <tr>
                <td>ttd</td>
                <td>ttd</td>
                <td>ttd</td>
            </tr>

            <tr>
                <td>Konsumen</td>
                <td>Staff</td>
                <td>Staff</td>
            </tr>
        </table>
    </div>
</body>
</html>
