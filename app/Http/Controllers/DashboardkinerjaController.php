<?php

namespace App\Http\Controllers;

use App\Models\angka_kinerja;
use App\Models\bulan;
use App\Models\IndikatorKinerja;
use App\Models\OperatorEntri;
use App\Models\satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class DashboardkinerjaController extends Controller
{
    public function bupesta()
    {
        return redirect('bupesta.php');
    }

    public function index()
    {
        // dd(request('view'));
        #DASAR
        $data = [];
        $data["judul"] = "Dashboard Kinerja";
        $data["listsatker"] = satker::all();

        $data["satker"] = request('satker');
        $data["periode"] = request('periode');
        $data["view"] = request('view');
        if ($data["satker"] == null) {
            $data["satker"] = '1100';
        }
        if ($data["periode"] == null) {

            $data["periode"] = $this->getPeriode();
        }
        if ($data["view"] == null) {
            $data["view"] = 'ProgresBar';
        }
        $satkerpilih =  DB::table('satkers')
            ->select('nama_satker')
            ->where('kode_satker', '=', $data["satker"])
            ->get();
        $data["satkerpilih"] = $satkerpilih[0]->nama_satker;
        $data["indikator"] = request('indikator');
        $detailindikator = DB::table('angka_kinerjas')
            ->select('detail_indikator')
            ->where('satker', '=', $data["satker"])
            ->where('kode_indikator', '=', $data["indikator"])
            ->get();
        if ($data["indikator"] == null or $data["indikator"] == 'capkin') {
            $data["indikator"] = 'capkin';
            $data["detail_indikator"] = 'Rata-Rata Capaian Kinerja';
            $data["statusindikator"] = 'capkin';
        } else {
            $data["detail_indikator"] = $detailindikator[0]->detail_indikator;
            $statusindikator = DB::table('indikator_kinerjas')
                ->select('status')
                ->where('kode_indikator', '=', $data["indikator"])
                ->get();
            $data["statusindikator"] = $statusindikator[0]->status;
        };

        # OLAHAN DATA

        ## DATA 7 INDIKATOR
        $datautama = DB::table('indikator_kinerjas')
            ->select('indikator_kinerjas.*', 'angka_kinerjas.*')
            ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
            ->where('indikator_kinerjas.status', '=', "utama")
            ->where('angka_kinerjas.satker', '=', $data["satker"])
            ->get();
        $data["utama"] = [];
        $data["capaian_satker"] = 0;
        $count_capkin_satker = 0;
        $target = 0;
        $realisasi = 0;
        for ($i = 0; $i < (count($datautama)); $i++) {
            if ($data["periode"] == 'th') {
                $hitungdulu = $datautama[$i]->realisasi_setahun / $datautama[$i]->target_setahun * 100;
                if ($hitungdulu >= 120) {
                    $hitungdulu = 120;
                };
                if ($datautama[$i]->realisasi_setahun >= 120) {
                    $realisasi = number_format(120, 2);
                } else {
                    $realisasi = $datautama[$i]->realisasi_setahun;
                };
                $target = $datautama[$i]->target_setahun;
                $count_capkin_satker = $count_capkin_satker + 1;
            } elseif ($data["periode"] == 'tr1') {
                if ($datautama[$i]->target_tr_1 == 0) {
                    $hitungdulu = 0;
                } else {
                    $hitungdulu = $datautama[$i]->realisasi_tr_1 / $datautama[$i]->target_tr_1 * 100;
                    $count_capkin_satker = $count_capkin_satker + 1;
                };
                if ($hitungdulu >= 120) {
                    $hitungdulu = 120;
                };
                if ($datautama[$i]->realisasi_tr_1 >= 120) {
                    $realisasi = number_format(120, 2);
                } else {
                    $realisasi = $datautama[$i]->realisasi_tr_1;
                };
                $target = $datautama[$i]->target_tr_1;
            } elseif ($data["periode"] == 'tr2') {
                if ($datautama[$i]->target_tr_2 == 0) {
                    $hitungdulu = 0;
                } else {
                    $hitungdulu = $datautama[$i]->realisasi_tr_2 / $datautama[$i]->target_tr_2 * 100;
                    $count_capkin_satker = $count_capkin_satker + 1;
                };
                if ($hitungdulu >= 120) {
                    $hitungdulu = 120;
                };
                if ($datautama[$i]->realisasi_tr_2 >= 120) {
                    $realisasi = number_format(120, 2);
                } else {
                    $realisasi = $datautama[$i]->realisasi_tr_2;
                };
                $target = $datautama[$i]->target_tr_2;
            } elseif ($data["periode"] == 'tr3') {
                if ($datautama[$i]->target_tr_3 == 0) {
                    $hitungdulu = 0;
                } else {
                    $hitungdulu = $datautama[$i]->realisasi_tr_3 / $datautama[$i]->target_tr_3 * 100;
                    $count_capkin_satker = $count_capkin_satker + 1;
                };
                if ($hitungdulu >= 120) {
                    $hitungdulu = 120;
                };
                if ($datautama[$i]->realisasi_tr_3 >= 120) {
                    $realisasi = number_format(120, 2);
                } else {
                    $realisasi = $datautama[$i]->realisasi_tr_3;
                };
                $target = $datautama[$i]->target_tr_3;
            };
            switch (true) {
                case $hitungdulu >= 120:
                    $pilihanwarna = "emas";
                    $pilihanicon = "fa-solid fa-medal font-super-besar emas";
                    $pilihanketerangan = "Target Terlampaui Maksimal";
                    break;
                case $hitungdulu > 100:
                    $pilihanwarna = "biru";
                    $pilihanicon = "fa-solid fa-star font-super-besar biru";
                    $pilihanketerangan = "Target Terlampaui";
                    break;
                case $hitungdulu == 100:
                    $pilihanwarna = "hijau";
                    $pilihanicon = "fa-solid fa-star font-super-besar hijau";
                    $pilihanketerangan = "Target Tercapai";
                    break;
                default:
                    $pilihanwarna = "merah";
                    $pilihanicon = "fa-regular fa-star font-super-besar merah";
                    $pilihanketerangan = "Target Belum Tercapai";
                    break;
            };
            $data["capaian_satker"] = $data["capaian_satker"] + $hitungdulu;
            $data["utama"][] = [
                'kode_indikator' => $datautama[$i]->kode_indikator,
                'nama_indikator' => $datautama[$i]->nama_indikator,
                'detail_indikator' => $datautama[$i]->detail_indikator,
                'satuan_indikator' => $datautama[$i]->satuan,
                'target_setahun' => $target,
                'realisasi_setahun' => $realisasi,
                'persen_realisasi' => $hitungdulu,
                'warna' => $pilihanwarna,
                'icon' => $pilihanicon,
                'keterangan' => $pilihanketerangan
            ];
            // if ($data["periode"] == 'th') {
            //     $data["utama"][] = [
            //         'kode_indikator' => $datautama[$i]->kode_indikator,
            //         'nama_indikator' => $datautama[$i]->nama_indikator,
            //         'detail_indikator' => $datautama[$i]->detail_indikator,
            //         'satuan_indikator' => $datautama[$i]->satuan,
            //         'target_setahun' => $datautama[$i]->target_setahun,
            //         'realisasi_setahun' => $realisasi,
            //         'persen_realisasi' => $hitungdulu,
            //         'warna' => $pilihanwarna,
            //         'icon' => $pilihanicon,
            //         'keterangan' => $pilihanketerangan
            //     ];
            // } elseif ($data["periode"] == 'tr1') {
            //     $data["utama"][] = [
            //         'kode_indikator' => $datautama[$i]->kode_indikator,
            //         'nama_indikator' => $datautama[$i]->nama_indikator,
            //         'detail_indikator' => $datautama[$i]->detail_indikator,
            //         'satuan_indikator' => $datautama[$i]->satuan,
            //         'target_setahun' => $datautama[$i]->target_tr_1,
            //         'realisasi_setahun' => $datautama[$i]->realisasi_tr_1,
            //         'persen_realisasi' => $hitungdulu,
            //         'warna' => $pilihanwarna,
            //         'icon' => $pilihanicon,
            //         'keterangan' => $pilihanketerangan
            //     ];
            // } elseif ($data["periode"] == 'tr2') {
            //     $data["utama"][] = [
            //         'kode_indikator' => $datautama[$i]->kode_indikator,
            //         'nama_indikator' => $datautama[$i]->nama_indikator,
            //         'detail_indikator' => $datautama[$i]->detail_indikator,
            //         'satuan_indikator' => $datautama[$i]->satuan,
            //         'target_setahun' => $datautama[$i]->target_tr_2,
            //         'realisasi_setahun' => $datautama[$i]->realisasi_tr_2,
            //         'persen_realisasi' => $hitungdulu,
            //         'warna' => $pilihanwarna,
            //         'icon' => $pilihanicon,
            //         'keterangan' => $pilihanketerangan
            //     ];
            // } elseif ($data["periode"] == 'tr3') {
            //     $data["utama"][] = [
            //         'kode_indikator' => $datautama[$i]->kode_indikator,
            //         'nama_indikator' => $datautama[$i]->nama_indikator,
            //         'detail_indikator' => $datautama[$i]->detail_indikator,
            //         'satuan_indikator' => $datautama[$i]->satuan,
            //         'target_setahun' => $datautama[$i]->target_tr_3,
            //         'realisasi_setahun' => $datautama[$i]->realisasi_tr_3,
            //         'persen_realisasi' => $hitungdulu,
            //         'warna' => $pilihanwarna,
            //         'icon' => $pilihanicon,
            //         'keterangan' => $pilihanketerangan
            //     ];
            // };
        }

        ## DATA CAPAIAN KINERJA
        $count_capkin_satker = max($count_capkin_satker, 1);
        $data["capaian_satker"] = number_format(($data["capaian_satker"] / $count_capkin_satker), 2);
        switch (true) {
            case $data["capaian_satker"] >= 120:
                $data["warna_capaian_satker"] = "#E4BB05";
                break;
            case $data["capaian_satker"] > 100:
                $data["warna_capaian_satker"] = "#659cef";
                break;
            case $data["capaian_satker"] == 100:
                $data["warna_capaian_satker"] = "#4FCF05";
                break;
            default:
                $data["warna_capaian_satker"] = "#EF6565";
                break;
        };


        ## DATA 10 INDIKATOR SUPLEMEN
        $datasuplemen = DB::table('indikator_kinerjas')
            ->select('indikator_kinerjas.*', 'angka_kinerjas.*')
            ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
            ->where('indikator_kinerjas.status', '=', "suplemen")
            ->where('angka_kinerjas.satker', '=', $data["satker"])
            ->orderBy('indikator_kinerjas.id')
            ->get();
        $data["suplemen"] = [];
        for ($i = 0; $i < (count($datasuplemen)); $i++) {
            switch (true) {
                case $datasuplemen[$i]->target_setahun == 0:
                    $pilihanwarna = "abu-tua";
                    $pilihanicon = "fa-regular fa-star font-super-besar abu-abu";
                    $pilihanketerangan = "Tidak Ada Target";
                    break;
                default:
                    if ($data["periode"] == 'th') {
                        $hitungdulu = $datasuplemen[$i]->realisasi_setahun / $datasuplemen[$i]->target_setahun * 100;
                    } elseif ($data["periode"] == 'tr1') {
                        if ($datasuplemen[$i]->target_tr_1 == 0) {
                            $hitungdulu = 0;
                        } else {
                            $hitungdulu = $datasuplemen[$i]->realisasi_tr_1 / $datasuplemen[$i]->target_setahun * 100;
                        };
                    } elseif ($data["periode"] == 'tr2') {
                        if ($datasuplemen[$i]->target_tr_2 == 0) {
                            $hitungdulu = 0;
                        } else {
                            $hitungdulu = $datasuplemen[$i]->realisasi_tr_2 / $datasuplemen[$i]->target_setahun * 100;
                        }
                    } elseif ($data["periode"] == 'tr3') {
                        if ($datasuplemen[$i]->target_tr_3 == 0) {
                            $hitungdulu = 0;
                        } else {
                            $hitungdulu = $datasuplemen[$i]->realisasi_tr_3 / $datasuplemen[$i]->target_setahun * 100;
                        }
                    };
                    switch (true) {
                        case $hitungdulu >= 120:
                            $pilihanwarna = "emas";
                            $pilihanicon = "fa-solid fa-medal font-super-besar emas";
                            $pilihanketerangan = "Target Terlampaui Maksimal";
                            break;
                        case $hitungdulu > 100:
                            $pilihanwarna = "biru";
                            $pilihanicon = "fa-solid fa-star font-super-besar biru";
                            $pilihanketerangan = "Target Terlampaui";
                            break;
                        case $hitungdulu == 100:
                            $pilihanwarna = "hijau";
                            $pilihanicon = "fa-solid fa-star font-super-besar hijau";
                            $pilihanketerangan = "Target Tercapai";
                            break;
                        default:
                            $pilihanwarna = "merah";
                            $pilihanicon = "fa-regular fa-star font-super-besar merah";
                            $pilihanketerangan = "Target Belum Tercapai";
                            break;
                    }
                    break;
            };
            if ($data["periode"] == 'th') {
                $data["suplemen"][] = [
                    'kode_indikator' => $datasuplemen[$i]->kode_indikator,
                    'nama_indikator' => $datasuplemen[$i]->nama_indikator,
                    'detail_indikator' => $datasuplemen[$i]->detail_indikator,
                    'satuan_indikator' => $datasuplemen[$i]->satuan,
                    'target_setahun' => $datasuplemen[$i]->target_setahun,
                    'realisasi_setahun' => $datasuplemen[$i]->realisasi_setahun,
                    'persen_realisasi' => $hitungdulu,
                    'warna' => $pilihanwarna,
                    'icon' => $pilihanicon,
                    'keterangan' => $pilihanketerangan
                ];
            } elseif ($data["periode"] == 'tr1') {
                $data["suplemen"][] = [
                    'kode_indikator' => $datasuplemen[$i]->kode_indikator,
                    'nama_indikator' => $datasuplemen[$i]->nama_indikator,
                    'detail_indikator' => $datasuplemen[$i]->detail_indikator,
                    'satuan_indikator' => $datasuplemen[$i]->satuan,
                    'target_setahun' => $datasuplemen[$i]->target_setahun,
                    'realisasi_setahun' => $datasuplemen[$i]->realisasi_tr_1,
                    'persen_realisasi' => $hitungdulu,
                    'warna' => $pilihanwarna,
                    'icon' => $pilihanicon,
                    'keterangan' => $pilihanketerangan
                ];
            } elseif ($data["periode"] == 'tr2') {
                $data["suplemen"][] = [
                    'kode_indikator' => $datasuplemen[$i]->kode_indikator,
                    'nama_indikator' => $datasuplemen[$i]->nama_indikator,
                    'detail_indikator' => $datasuplemen[$i]->detail_indikator,
                    'satuan_indikator' => $datasuplemen[$i]->satuan,
                    'target_setahun' => $datasuplemen[$i]->target_setahun,
                    'realisasi_setahun' => $datasuplemen[$i]->realisasi_tr_2,
                    'persen_realisasi' => $hitungdulu,
                    'warna' => $pilihanwarna,
                    'icon' => $pilihanicon,
                    'keterangan' => $pilihanketerangan
                ];
            } elseif ($data["periode"] == 'tr3') {
                $data["suplemen"][] = [
                    'kode_indikator' => $datasuplemen[$i]->kode_indikator,
                    'nama_indikator' => $datasuplemen[$i]->nama_indikator,
                    'detail_indikator' => $datasuplemen[$i]->detail_indikator,
                    'satuan_indikator' => $datasuplemen[$i]->satuan,
                    'target_setahun' => $datasuplemen[$i]->target_setahun,
                    'realisasi_setahun' => $datasuplemen[$i]->realisasi_tr_3,
                    'persen_realisasi' => $hitungdulu,
                    'warna' => $pilihanwarna,
                    'icon' => $pilihanicon,
                    'keterangan' => $pilihanketerangan
                ];
            };
        };

        # PROGRESSBAR
        switch (true) {
            case $data["indikator"] == 'capkin':
                $data["datasatker"] = [];
                for ($i = 0; $i < (count($data["listsatker"])); $i++) {
                    $data["capaian_kinerja"] = 0;
                    $datacapaian = DB::table('indikator_kinerjas')
                        ->select('indikator_kinerjas.kode_indikator', 'indikator_kinerjas.status', 'angka_kinerjas.*')
                        ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
                        ->where('indikator_kinerjas.status', '=', "utama")
                        ->where('angka_kinerjas.satker', '=', $data["listsatker"][$i]->kode_satker)
                        ->get();
                    $count_capkin = 0;
                    for ($j = 0; $j < (count($datacapaian)); $j++) {
                        if ($data["periode"] == 'th') {
                            $capkin = $datacapaian[$j]->realisasi_setahun / $datacapaian[$j]->target_setahun * 100;
                            if ($capkin >= 120) {
                                $capkin = 120;
                            };
                            $data["capaian_kinerja"] = $data["capaian_kinerja"] + $capkin;
                            $count_capkin = $count_capkin + 1;
                        } elseif ($data["periode"] == 'tr1') {
                            if ($datacapaian[$j]->target_tr_1 == 0) {
                                $capkin = 0;
                            } else {
                                $capkin = $datacapaian[$j]->realisasi_tr_1 / $datacapaian[$j]->target_tr_1 * 100;
                                $count_capkin = $count_capkin + 1;
                            };
                            if ($capkin >= 120) {
                                $capkin = 120;
                            };
                            $data["capaian_kinerja"] = $data["capaian_kinerja"] + $capkin;
                        } elseif ($data["periode"] == 'tr2') {
                            if ($datacapaian[$j]->target_tr_2 == 0) {
                                $capkin = 0;
                            } else {
                                $capkin = $datacapaian[$j]->realisasi_tr_2 / $datacapaian[$j]->target_tr_2 * 100;
                                $count_capkin = $count_capkin + 1;
                            };
                            if ($capkin >= 120) {
                                $capkin = 120;
                            };
                            $data["capaian_kinerja"] = $data["capaian_kinerja"] + $capkin;
                        } elseif ($data["periode"] == 'tr3') {
                            if ($datacapaian[$j]->target_tr_3 == 0) {
                                $capkin = 0;
                            } else {
                                $capkin = $datacapaian[$j]->realisasi_tr_3 / $datacapaian[$j]->target_tr_3 * 100;
                                $count_capkin = $count_capkin + 1;
                            };
                            if ($capkin >= 120) {
                                $capkin = 120;
                            };
                            $data["capaian_kinerja"] = $data["capaian_kinerja"] + $capkin;
                        };
                    };
                    if ($count_capkin == 0) {
                        $data["capaian_kinerja"] = 0;
                    } else {
                        $data["capaian_kinerja"] = number_format(($data["capaian_kinerja"] / $count_capkin), 2);
                    };
                    switch (true) {
                        case $data["capaian_kinerja"] >= 120:
                            $pilihanwarna = "#E4BB05";
                            break;
                        case $data["capaian_kinerja"] > 100:
                            $pilihanwarna = "#659cef";
                            break;
                        case $data["capaian_kinerja"] == 100:
                            $pilihanwarna = "#4FCF05";
                            break;
                        default:
                            $pilihanwarna = "#EF6565";
                            break;
                    }
                    $data["datasatker"][] = [
                        "kode_satker" => $data["listsatker"][$i]->kode_satker,
                        "nama_satker" => $data["listsatker"][$i]->nama_satker,
                        "target_satker" => 100,
                        "capkin_satker" => $data["capaian_kinerja"],
                        "realkum_tr1" => 0,
                        "realkum_tr2" => 0,
                        "realkum_tr3" => 0,
                        "realkum_tr4" => 0,
                        "realisasi_tr1" => 0,
                        "realisasi_tr2" => 0,
                        "realisasi_tr3" => 0,
                        "realisasi_tr4" => 0,
                        "warna" => $pilihanwarna
                    ];
                    $data["capaian_kinerja"] = 0;
                };
                break;
            case $data["indikator"] != 'capkin':
                $data["datasatker"] = [];
                for ($i = 0; $i < (count($data["listsatker"])); $i++) {
                    $capin = 0;
                    $datacapaian = DB::table('indikator_kinerjas')
                        ->select('indikator_kinerjas.kode_indikator', 'indikator_kinerjas.status', 'angka_kinerjas.*')
                        ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
                        ->where('indikator_kinerjas.kode_indikator', '=', $data["indikator"])
                        ->where('angka_kinerjas.satker', '=', $data["listsatker"][$i]->kode_satker)
                        ->get();
                    if ($datacapaian[0]->target_setahun != 0) {
                        if ($data["periode"] == 'th') {
                            $capin = $datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100;
                            $capin_tr1 = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr2 = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr3 = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                        } elseif ($data["periode"] == 'tr1') {
                            $capin = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr1 = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr2 = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr3 = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                        } elseif ($data["periode"] == 'tr2') {
                            $capin = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr1 = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr2 = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr3 = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                        } elseif ($data["periode"] == 'tr3') {
                            $capin = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr1 = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr2 = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr3 = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                        };


                        if ($data["periode"] == 'th') {

                            $capin = $datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100;
                            $capin_tr1 = $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr2 = $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100;
                            $capin_tr3 = $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100;
                        } elseif ($data["periode"] == 'tr1') {
                            $capin = ($datacapaian[0]->target_tr_1 == 0) ? 0 : $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_1 * 100;
                            $capin_tr1 = ($datacapaian[0]->target_tr_1 == 0) ? 0 : $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_1 * 100;
                            $capin_tr2 = ($datacapaian[0]->target_tr_1 == 0) ? 0 : $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_1 * 100;
                            $capin_tr3 = ($datacapaian[0]->target_tr_1 == 0) ? 0 : $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_1 * 100;
                        } elseif ($data["periode"] == 'tr2') {
                            $capin = ($datacapaian[0]->target_tr_2 == 0) ? 0 : $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_2 * 100;
                            $capin_tr1 = ($datacapaian[0]->target_tr_2 == 0) ? 0 : $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_2 * 100;
                            $capin_tr2 = ($datacapaian[0]->target_tr_2 == 0) ? 0 : $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_2 * 100;
                            $capin_tr3 = ($datacapaian[0]->target_tr_2 == 0) ? 0 : $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_2 * 100;
                        } elseif ($data["periode"] == 'tr3') {
                            $capin = ($datacapaian[0]->target_tr_3 == 0) ? 0 : $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_3 * 100;
                            $capin_tr1 = ($datacapaian[0]->target_tr_3 == 0) ? 0 : $datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_3 * 100;
                            $capin_tr2 = ($datacapaian[0]->target_tr_3 == 0) ? 0 : $datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_3 * 100;
                            $capin_tr3 = ($datacapaian[0]->target_tr_3 == 0) ? 0 : $datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_3 * 100;
                        };


                        switch (true) {
                            case $capin >= 120:
                                $pilihanwarna = "#E4BB05";
                                break;
                            case $capin > 100:
                                $pilihanwarna = "#659cef";
                                break;
                            case $capin == 100:
                                $pilihanwarna = "#4FCF05";
                                break;
                            default:
                                $pilihanwarna = "#EF6565";
                                break;
                        }
                        $data["datasatker"][] = [
                            "kode_satker" => $data["listsatker"][$i]->kode_satker,
                            "nama_satker" => $data["listsatker"][$i]->nama_satker,
                            "target_satker" => $datacapaian[0]->target_setahun,
                            "capkin_satker" => $capin,
                            "realkum_tr1" => 0,
                            "realkum_tr2" => 0,
                            "realkum_tr3" => 0,
                            "realkum_tr4" => 0,
                            "realisasi_tr1" => $capin_tr1,
                            "realisasi_tr2" => $capin_tr2,
                            "realisasi_tr3" => $capin_tr3,
                            "realisasi_tr4" => 0,
                            "warna" => $pilihanwarna
                        ];
                        $capin = 0;

                        // ambil data untuk tampil di hover

                        switch (true) {
                            case $data["indikator"] == 'i1':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i2':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%x.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%y.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i3':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%x.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%x.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i4':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%x.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 4)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%y.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i5':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 2)
                                    ->where('kinerja_bulanans.detail_indikator', 'like', '%x.%')
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 4)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i6':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            case $data["indikator"] == 'i7':
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_sub1_indikator', '=', 1)
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                            default:
                                $hover_capaian = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                $hover_target = DB::table('kinerja_bulanans')
                                    ->select('kinerja_bulanans.*')
                                    ->where('kinerja_bulanans.kode_indikator', '=', $data["indikator"])
                                    ->where('kinerja_bulanans.kode_satker', '=', $data["listsatker"][$i]->kode_satker)
                                    ->get();
                                break;
                        }
                        $realisasi_tr1 = $hover_capaian[0]->realisasi_b1 + $hover_capaian[0]->realisasi_b2 + $hover_capaian[0]->realisasi_b3;
                        $realisasi_tr2 = $hover_capaian[0]->realisasi_b1 + $hover_capaian[0]->realisasi_b2 + $hover_capaian[0]->realisasi_b3 + $hover_capaian[0]->realisasi_b4 + $hover_capaian[0]->realisasi_b5 + $hover_capaian[0]->realisasi_b6;
                        $realisasi_tr3 = $hover_capaian[0]->realisasi_b1 + $hover_capaian[0]->realisasi_b2 + $hover_capaian[0]->realisasi_b3 + $hover_capaian[0]->realisasi_b4 + $hover_capaian[0]->realisasi_b5 + $hover_capaian[0]->realisasi_b6 + $hover_capaian[0]->realisasi_b7 + $hover_capaian[0]->realisasi_b8 + $hover_capaian[0]->realisasi_b9;
                        $realisasi_tr4 = $hover_capaian[0]->realisasi_b1 + $hover_capaian[0]->realisasi_b2 + $hover_capaian[0]->realisasi_b3 + $hover_capaian[0]->realisasi_b4 + $hover_capaian[0]->realisasi_b5 + $hover_capaian[0]->realisasi_b6 + $hover_capaian[0]->realisasi_b7 + $hover_capaian[0]->realisasi_b8 + $hover_capaian[0]->realisasi_b9 + +$hover_capaian[0]->realisasi_b10 + $hover_capaian[0]->realisasi_b11 + $hover_capaian[0]->realisasi_b12;

                        if ($realisasi_tr1 === 0) {
                            $realisasi_tr1 = $hover_capaian[0]->realisasi_tr_1;
                        }
                        if ($realisasi_tr2 === 0) {
                            $realisasi_tr2 = $hover_capaian[0]->realisasi_tr_2;
                        }
                        if ($realisasi_tr3 === 0) {
                            $realisasi_tr3 = $hover_capaian[0]->realisasi_tr_3;
                        }
                        if ($realisasi_tr4 === 0) {
                            $realisasi_tr4 = $hover_capaian[0]->realisasi_setahun;
                        }
                        $data["datahover"][] = [
                            "kode_satker" => $data["listsatker"][$i]->kode_satker,
                            "nama_satker" => $data["listsatker"][$i]->nama_satker,
                            "satuan" => $hover_target[0]->satuan_lain,
                            "target_tr1" => $hover_target[0]->target_tr_1,
                            "target_tr2" => $hover_target[0]->target_tr_2,
                            "target_tr3" => $hover_target[0]->target_tr_3,
                            "target_tr4" => $hover_target[0]->target_tr_4,
                            // "realisasi_tr1" => $hover_capaian[0]->realisasi_tr_1,
                            // "realisasi_tr2" => $hover_capaian[0]->realisasi_tr_2,
                            // "realisasi_tr3" => $hover_capaian[0]->realisasi_tr_3,
                            // "realisasi_tr4" => $hover_capaian[0]->realisasi_setahun,
                            "realisasi_tr1" => $realisasi_tr1,
                            "realisasi_tr2" => $realisasi_tr2,
                            "realisasi_tr3" => $realisasi_tr3,
                            "realisasi_tr4" => $realisasi_tr4,
                        ];
                    };
                };
                break;
        };

        # TABEL
        switch (true) {
            case $data["indikator"] == 'capkin':
                $data["datatabel"] = [];
                for ($i = 0; $i < (count($data["listsatker"])); $i++) {
                    $data["capaian_kinerja_tr_1"] = 0;
                    $data["capaian_kinerja_tr_2"] = 0;
                    $data["capaian_kinerja_tr_3"] = 0;
                    $data["capaian_kinerja_tr_4"] = 0;
                    $data["capaian_kinerja_targetth_tr_1"] = 0;
                    $data["capaian_kinerja_targetth_tr_2"] = 0;
                    $data["capaian_kinerja_targetth_tr_3"] = 0;
                    $data["capaian_kinerja_targetth_tr_4"] = 0;
                    $datacapaian = DB::table('indikator_kinerjas')
                        ->select('indikator_kinerjas.kode_indikator', 'indikator_kinerjas.status', 'angka_kinerjas.*')
                        ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
                        ->where('indikator_kinerjas.status', '=', "utama")
                        ->where('angka_kinerjas.satker', '=', $data["listsatker"][$i]->kode_satker)
                        ->get();
                    $count_tr_1 = 0;
                    $count_tr_2 = 0;
                    $count_tr_3 = 0;
                    for ($j = 0; $j < count($datacapaian); $j++) {
                        if ($datacapaian[$j]->target_tr_1 == 0) {
                            $capkin_kum_tr_1 = 0;
                        } else {
                            $capkin_kum_tr_1 = $datacapaian[$j]->realisasi_tr_1 / $datacapaian[$j]->target_tr_1 * 100;
                            $count_tr_1++;
                        }
                        if ($capkin_kum_tr_1 >= 120) {
                            $capkin_kum_tr_1 = 120;
                        }
                        $data["capaian_kinerja_tr_1"] = $data["capaian_kinerja_tr_1"] + $capkin_kum_tr_1;

                        if ($datacapaian[$j]->target_tr_2 == 0) {
                            $capkin_kum_tr_2 = 0;
                        } else {
                            $capkin_kum_tr_2 = $datacapaian[$j]->realisasi_tr_2 / $datacapaian[$j]->target_tr_2 * 100;
                            $count_tr_2++;
                        }
                        if ($capkin_kum_tr_2 >= 120) {
                            $capkin_kum_tr_2 = 120;
                        }
                        $data["capaian_kinerja_tr_2"] = $data["capaian_kinerja_tr_2"] + $capkin_kum_tr_2;

                        if ($datacapaian[$j]->target_tr_3 == 0) {
                            $capkin_kum_tr_3 = 0;
                        } else {
                            $capkin_kum_tr_3 = $datacapaian[$j]->realisasi_tr_3 / $datacapaian[$j]->target_tr_3 * 100;
                            $count_tr_3++;
                        }
                        if ($capkin_kum_tr_3 >= 120) {
                            $capkin_kum_tr_3 = 120;
                        }
                        $data["capaian_kinerja_tr_3"] = $data["capaian_kinerja_tr_3"] + $capkin_kum_tr_3;

                        if ($datacapaian[$j]->target_setahun == 0) {
                            $capkin_kum_tr_4 = 0;
                            $capkin_targetth_tr_1 = 0;
                            $capkin_targetth_tr_2 = 0;
                            $capkin_targetth_tr_3 = 0;
                            $capkin_targetth_tr_4 = 0;
                        } else {
                            $capkin_kum_tr_4 = $datacapaian[$j]->realisasi_setahun / $datacapaian[$j]->target_setahun * 100;
                            $capkin_targetth_tr_1 = $datacapaian[$j]->realisasi_tr_1 / $datacapaian[$j]->target_setahun * 100;
                            $capkin_targetth_tr_2 = $datacapaian[$j]->realisasi_tr_2 / $datacapaian[$j]->target_setahun * 100;
                            $capkin_targetth_tr_3 = $datacapaian[$j]->realisasi_tr_3 / $datacapaian[$j]->target_setahun * 100;
                            $capkin_targetth_tr_4 = $datacapaian[$j]->realisasi_setahun / $datacapaian[$j]->target_setahun * 100;
                        }

                        if ($capkin_kum_tr_4 >= 120) {
                            $capkin_kum_tr_4 = 120;
                        }
                        $data["capaian_kinerja_tr_4"] = $data["capaian_kinerja_tr_4"] + $capkin_kum_tr_4;

                        if ($capkin_targetth_tr_1 >= 120) {
                            $capkin_targetth_tr_1 = 120;
                        }
                        $data["capaian_kinerja_targetth_tr_1"] = $data["capaian_kinerja_targetth_tr_1"] + $capkin_targetth_tr_1;

                        if ($capkin_targetth_tr_2 >= 120) {
                            $capkin_targetth_tr_2 = 120;
                        }
                        $data["capaian_kinerja_targetth_tr_2"] = $data["capaian_kinerja_targetth_tr_2"] + $capkin_targetth_tr_2;

                        if ($capkin_targetth_tr_3 >= 120) {
                            $capkin_targetth_tr_3 = 120;
                        }
                        $data["capaian_kinerja_targetth_tr_3"] = $data["capaian_kinerja_targetth_tr_3"] + $capkin_targetth_tr_3;

                        if ($capkin_targetth_tr_4 >= 120) {
                            $capkin_targetth_tr_4 = 120;
                        }
                        $data["capaian_kinerja_targetth_tr_4"] = $data["capaian_kinerja_targetth_tr_4"] + $capkin_targetth_tr_4;
                    }

                    // Memastikan nilai minimal untuk count_tr_1, count_tr_2, dan count_tr_3 adalah 1
                    $count_tr_1 = max($count_tr_1, 1);
                    $count_tr_2 = max($count_tr_2, 1);
                    $count_tr_3 = max($count_tr_3, 1);

                    $data["capaian_kinerja_tr_1"] = number_format(($data["capaian_kinerja_tr_1"] / $count_tr_1), 2);
                    $data["capaian_kinerja_tr_2"] = number_format(($data["capaian_kinerja_tr_2"] / $count_tr_2), 2);
                    $data["capaian_kinerja_tr_3"] = number_format(($data["capaian_kinerja_tr_3"] / $count_tr_3), 2);
                    $data["capaian_kinerja_tr_4"] = number_format(($data["capaian_kinerja_tr_4"] / 7), 2);
                    $data["capaian_kinerja_targetth_tr_1"] = number_format(($data["capaian_kinerja_targetth_tr_1"] / $count_tr_1), 2);
                    $data["capaian_kinerja_targetth_tr_2"] = number_format(($data["capaian_kinerja_targetth_tr_2"] / $count_tr_2), 2);
                    $data["capaian_kinerja_targetth_tr_3"] = number_format(($data["capaian_kinerja_targetth_tr_3"] / $count_tr_3), 2);
                    $data["capaian_kinerja_targetth_tr_4"] = number_format(($data["capaian_kinerja_targetth_tr_4"] / 7), 2);

                    switch (true) {
                        case $data["capaian_kinerja_tr_4"] >= 120:
                            $pilihanwarna = "#E4BB05";
                            break;
                        case $data["capaian_kinerja_tr_4"] > 100:
                            $pilihanwarna = "#659cef";
                            break;
                        case $data["capaian_kinerja_tr_4"] == 100:
                            $pilihanwarna = "#4FCF05";
                            break;
                        default:
                            $pilihanwarna = "#EF6565";
                            break;
                    }
                    $data["datatabel"][] = [
                        "kode_satker" => $data["listsatker"][$i]->kode_satker,
                        "nama_satker" => $data["listsatker"][$i]->nama_satker,
                        "satuan" => $datacapaian[0]->satuan,
                        // "satuan" => "persen",
                        "capkin_kumulatif_1" => $data["capaian_kinerja_tr_1"],
                        "capkin_kumulatif_2" => $data["capaian_kinerja_tr_2"],
                        "capkin_kumulatif_3" => $data["capaian_kinerja_tr_3"],
                        "capkin_kumulatif_4" => $data["capaian_kinerja_tr_4"],
                        "capkin_target_tahun_1" => $data["capaian_kinerja_targetth_tr_1"],
                        "capkin_target_tahun_2" => $data["capaian_kinerja_targetth_tr_2"],
                        "capkin_target_tahun_3" => $data["capaian_kinerja_targetth_tr_3"],
                        "capkin_target_tahun_4" => $data["capaian_kinerja_targetth_tr_4"],
                        "warna" => $pilihanwarna
                    ];
                    $data["capaian_kinerja"] = 0;
                };
                break;
            case $data["indikator"] != 'capkin':
                $data["datatabel"] = [];
                for ($i = 0; $i < (count($data["listsatker"])); $i++) {
                    $capin = 0;
                    $datacapaian = DB::table('indikator_kinerjas')
                        ->select('indikator_kinerjas.kode_indikator', 'indikator_kinerjas.status', 'angka_kinerjas.*')
                        ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
                        ->where('indikator_kinerjas.kode_indikator', '=', $data["indikator"])
                        ->where('angka_kinerjas.satker', '=', $data["listsatker"][$i]->kode_satker)
                        ->get();
                    if ($datacapaian[0]->target_setahun != 0) {
                        if ($datacapaian[0]->target_tr_1 == 0) {
                            $capaian_kinerja_tr_1 = number_format(0, 2);
                        } else {
                            $capaian_kinerja_tr_1 = ($datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_1 * 100);
                            if ($capaian_kinerja_tr_1 >= 120) {
                                $capaian_kinerja_tr_1 = number_format(120, 2);
                            } else {
                                $capaian_kinerja_tr_1 = number_format(($datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_tr_1 * 100), 2);
                            };
                        };
                        if ($datacapaian[0]->target_tr_2 == 0) {
                            $capaian_kinerja_tr_2 = number_format(0, 2);
                        } else {
                            $capaian_kinerja_tr_2 = ($datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_2 * 100);
                            if ($capaian_kinerja_tr_2 >= 120) {
                                $capaian_kinerja_tr_2 = number_format(120, 2);
                            } else {
                                $capaian_kinerja_tr_2 = number_format(($datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_tr_2 * 100), 2);
                            };
                        };
                        if ($datacapaian[0]->target_tr_3 == 0) {
                            $capaian_kinerja_tr_3 = number_format(0, 2);
                        } else {
                            $capaian_kinerja_tr_3 = ($datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_3 * 100);
                            if ($capaian_kinerja_tr_3 >= 120) {
                                $capaian_kinerja_tr_3 = number_format(120, 2);
                            } else {
                                $capaian_kinerja_tr_3 = number_format(($datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_tr_3 * 100), 2);
                            };
                        };
                        $capaian_kinerja_tr_4 = ($datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100);
                        if ($capaian_kinerja_tr_4 >= 120) {
                            $capaian_kinerja_tr_4 = number_format(120, 2);
                        } else {
                            $capaian_kinerja_tr_4 = number_format(($datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100), 2);
                        };
                        $capaian_kinerja_targetth_tr_1 = ($datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100);
                        if ($capaian_kinerja_targetth_tr_1 >= 120) {
                            $capaian_kinerja_targetth_tr_1 = number_format(120, 2);
                        } else {
                            $capaian_kinerja_targetth_tr_1 = number_format(($datacapaian[0]->realisasi_tr_1 / $datacapaian[0]->target_setahun * 100), 2);
                        };
                        $capaian_kinerja_targetth_tr_2 = ($datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100);
                        if ($capaian_kinerja_targetth_tr_2 >= 120) {
                            $capaian_kinerja_targetth_tr_2 = number_format(120, 2);
                        } else {
                            $capaian_kinerja_targetth_tr_2 = number_format(($datacapaian[0]->realisasi_tr_2 / $datacapaian[0]->target_setahun * 100), 2);
                        };
                        $capaian_kinerja_targetth_tr_3 = ($datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100);
                        if ($capaian_kinerja_targetth_tr_3 >= 120) {
                            $capaian_kinerja_targetth_tr_3 = number_format(120, 2);
                        } else {
                            $capaian_kinerja_targetth_tr_3 = number_format(($datacapaian[0]->realisasi_tr_3 / $datacapaian[0]->target_setahun * 100), 2);
                        };
                        $capaian_kinerja_targetth_tr_4 = ($datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100);
                        if ($capaian_kinerja_targetth_tr_4 >= 120) {
                            $capaian_kinerja_targetth_tr_4 = number_format(120, 2);
                        } else {
                            $capaian_kinerja_targetth_tr_4 = number_format(($datacapaian[0]->realisasi_setahun / $datacapaian[0]->target_setahun * 100), 2);
                        };

                        switch (true) {
                            case $capin >= 120:
                                $pilihanwarna = "#E4BB05";
                                break;
                            case $capin > 100:
                                $pilihanwarna = "#659cef";
                                break;
                            case $capin == 100:
                                $pilihanwarna = "#4FCF05";
                                break;
                            default:
                                $pilihanwarna = "#EF6565";
                                break;
                        }
                        $data["datatabel"][] = [
                            "kode_satker" => $data["listsatker"][$i]->kode_satker,
                            "nama_satker" => $data["listsatker"][$i]->nama_satker,
                            // "satuan" => "persen",
                            "satuan" => $datacapaian[0]->satuan,
                            "pk_target_1" => $datacapaian[0]->target_tr_1,
                            "pk_target_2" => $datacapaian[0]->target_tr_2,
                            "pk_target_3" => $datacapaian[0]->target_tr_3,
                            "pk_target_4" => $datacapaian[0]->target_setahun,
                            "pk_realisasi_1" => $datacapaian[0]->realisasi_tr_1,
                            "pk_realisasi_2" => $datacapaian[0]->realisasi_tr_2,
                            "pk_realisasi_3" => $datacapaian[0]->realisasi_tr_3,
                            "pk_realisasi_4" => $datacapaian[0]->realisasi_setahun,
                            "capkin_kumulatif_1" => $capaian_kinerja_tr_1,
                            "capkin_kumulatif_2" => $capaian_kinerja_tr_2,
                            "capkin_kumulatif_3" => $capaian_kinerja_tr_3,
                            "capkin_kumulatif_4" => $capaian_kinerja_tr_4,
                            "capkin_target_tahun_1" => $capaian_kinerja_targetth_tr_1,
                            "capkin_target_tahun_2" => $capaian_kinerja_targetth_tr_2,
                            "capkin_target_tahun_3" => $capaian_kinerja_targetth_tr_3,
                            "capkin_target_tahun_4" => $capaian_kinerja_targetth_tr_4,
                            "warna" => $pilihanwarna
                        ];
                        $capin = 0;
                    };
                };
                break;
        };

        //INFO PENTING
        if ($data["indikator"] == 'capkin') {
            $link = DB::table('indikator_kinerjas')
                ->select('kode_kegiatan')
                ->where('kode_indikator', '=', "i1")
                ->get();

            $data["linkkegiatan"] = $link[0]->kode_kegiatan;

            $data["infopenting"] = DB::table('infopentings')
                ->select('*')
                ->where('kode_indikator', '=', "capkin")
                ->get();
        } else {
            $link = DB::table('indikator_kinerjas')
                ->select('kode_kegiatan')
                ->where('kode_indikator', '=', $data["indikator"])
                ->get();

            $data["linkkegiatan"] = $link[0]->kode_kegiatan;

            $data["infopenting"] = DB::table('infopentings')
                ->select('*')
                ->where('kode_indikator', '=', $data["indikator"])
                ->get();
        };

        // dd($data);

        return view('dashboard-kinerja.dashboard-kinerja', compact('data'));
    }

    public function crud()
    {
        $data = [];
        $data["judul"] = "CRUD Dashboard Kinerja";
        $data["listsatker"] = satker::all();

        $data["satker"] = request('satker');
        if ($data["satker"] == null) {
            $data["satker"] = '1100';
        }
        $data["indikator"] = request('indikator');
        $detailindikator = DB::table('indikator_kinerjas')
            ->select('detail_indikator')
            ->where('kode_indikator', '=', $data["indikator"])
            ->get();
        if ($data["indikator"] == null) {
            $data["indikator"] = 'capkin';
            $data["detail_indikator"] = 'Rata-Rata Capaian Kinerja';
        } else {
            $data["detail_indikator"] = $detailindikator[0]->detail_indikator;
        };

        $data["datasatker"] = DB::table('indikator_kinerjas')
            ->select('indikator_kinerjas.*', 'angka_kinerjas.*')
            ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
            ->where('angka_kinerjas.satker', '=', $data["satker"])
            ->get();
        return view('dashboard-kinerja.crud', compact('data'));
    }

    public function updatenilai(Request $request, $id)
    {
        DB::table('angka_kinerjas')
            ->where('satker', '=', $id)
            ->where('kode_indikator', '=', $request->kode_indikator)
            ->update([
                'target_setahun'        => $request->target_setahun,
                'realisasi_setahun'     => $request->realisasi_setahun,
                'target_tr_1'           => $request->target_tr_1,
                'realisasi_tr_1'        => $request->realisasi_tr_1,
                'target_tr_2'           => $request->target_tr_2,
                'realisasi_tr_2'        => $request->realisasi_tr_2,
                'target_tr_3'           => $request->target_tr_3,
                'realisasi_tr_3'        => $request->realisasi_tr_3
            ]);
        return redirect('/crud-dashboard-kinerja?satker=' . $id)->with('success', 'Terupdate');
    }

    public function input()
    {
        $data = [];
        $data["judul"] = "Input Dashboard Kinerja";
        $data["listsatker"] = satker::all();
        $data["listbulan"] = bulan::all();

        $data["satker"] = request('satker');
        $data["tahun"] = request('tahun');
        $data["bulan"] = request('bulan');
        $data["indikator"] = request('indikator');
        if ($data["satker"] == null) {
            $data["satker"] = '1100';
        }
        if ($data["tahun"] == null) {
            $data["tahun"] = date("Y");
        }
        if ($data["bulan"] == null) {
            $data["bulan"] = date("m");
        }
        if ($data["indikator"] == null) {
            $data["indikator"] = '1';
        }
        return view('dashboard-kinerja.input.input', compact('data'));
    }

    public function entri()
    {
        // $matchThese = ['nip_pegawai' => auth()->user()->nip_pegawai];
        // $OperatorEntri =  OperatorEntri::where($matchThese)->get();
        // // dd($OperatorEntri);
        // if ($OperatorEntri->isEmpty()) {
        //     // return redirect()->back();
        //     return redirect()->intended('home');
        // }
        // dd(auth()->user()->kode_satker);
        // dd($OperatorEntri);
        $data = [];
        $data["judul"] = "Input Dashboard Kinerja";
        $data["listsatker"] = satker::all();
        $data["listbulan"] = bulan::all();

        $data["satker"] = request('satker');
        $data["tahun"] = request('tahun');
        $data["bulan"] = request('bulan');
        $data["indikator"] = request('indikator');
        if ($data["satker"] == null) {
            $data["satker"] = '1100';
        }
        if ($data["tahun"] == null) {
            $data["tahun"] = date("Y");
        }
        if ($data["bulan"] == null) {
            $data["bulan"] = date("m");
        }
        if ($data["indikator"] == null) {
            $data["indikator"] = '1';
        }
        // if (auth()->user()->kode_satker != '1100') {
        //     $data["satker"] = auth()->user()->kode_satker;
        // };
        $data["datasatker"] = DB::table('indikator_kinerjas')
            ->select('indikator_kinerjas.*', 'angka_kinerjas.*')
            ->leftJoin('angka_kinerjas', 'indikator_kinerjas.kode_indikator', '=', 'angka_kinerjas.kode_indikator')
            ->where('angka_kinerjas.satker', '=', $data["satker"])
            ->get();
        $data["databulanan"] = DB::table('kinerja_bulanans')
            ->where('kinerja_bulanans.kode_satker', '=', $data["satker"])
            ->where('kinerja_bulanans.status', '=', "utama")
            ->get();
        $data["datasuplemen"] = DB::table('kinerja_bulanans')
            ->where('kinerja_bulanans.kode_satker', '=', $data["satker"])
            ->where('kinerja_bulanans.status', '=', "suplemen")
            ->get();
        // dd($data);
        return view('dashboard-kinerja.entri-kinerja.entri-kinerja', compact('data'));
    }

    public function showdataentri($satker)
    {
        $databulanan = DB::table('kinerja_bulanans')
            ->where('kinerja_bulanans.kode_satker', '=', $satker)
            ->get();
        return response()->json([
            'data' => $databulanan
        ]);
    }

    public function update(Request $request, $id)
    {
        dd($request);
        $satker = DB::table('kinerja_bulanans')
            ->select('kode_satker')
            ->where('kinerja_bulanans.id', '=', $id)
            ->first();
        $kode_indikator = DB::table('kinerja_bulanans')
            ->select('kode_indikator', 'kode_sub1_indikator', 'status')
            ->where('kinerja_bulanans.id', '=', $id)
            ->first();

        // dd(($request->realisasi_b1));

        if ($kode_indikator->status == 'utama') {
            $indikator = 1;
            $realisasi_tr_1 = $this->formatToEnglishDecimal($request->realisasi_b1) + $this->formatToEnglishDecimal($request->realisasi_b2) + $this->formatToEnglishDecimal($request->realisasi_b3);
            $realisasi_tr_2 = $realisasi_tr_1 + $this->formatToEnglishDecimal($request->realisasi_b4) + $this->formatToEnglishDecimal($request->realisasi_b5) + $this->formatToEnglishDecimal($request->realisasi_b6);
            $realisasi_tr_3 = $realisasi_tr_2 + $this->formatToEnglishDecimal($request->realisasi_b7) + $this->formatToEnglishDecimal($request->realisasi_b8) + $this->formatToEnglishDecimal($request->realisasi_b9);
            $realisasi_tr_4 = $realisasi_tr_3 + $this->formatToEnglishDecimal($request->realisasi_b10) + $this->formatToEnglishDecimal($request->realisasi_b11) + $this->formatToEnglishDecimal($request->realisasi_b12);
            if ($kode_indikator->kode_sub1_indikator == 1) {
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->update([
                        'target_setahun' => $this->formatToEnglishDecimal($request->target_tr_4),
                        'realisasi_setahun' => $realisasi_tr_4,
                        'target_tr_1' => $this->formatToEnglishDecimal($request->target_tr_1),
                        'realisasi_tr_1' => $realisasi_tr_1,
                        'target_tr_2' => $this->formatToEnglishDecimal($request->target_tr_2),
                        'realisasi_tr_2' => $realisasi_tr_2,
                        'target_tr_3' => $this->formatToEnglishDecimal($request->target_tr_3),
                        'realisasi_tr_3' => $realisasi_tr_3
                    ]);
            };
            DB::table('kinerja_bulanans')
                ->where('id', '=', $id)
                ->update([
                    'target_tr_1' => $this->formatToEnglishDecimal($request->target_tr_1),
                    'target_tr_2' => $this->formatToEnglishDecimal($request->target_tr_2),
                    'target_tr_3' => $this->formatToEnglishDecimal($request->target_tr_3),
                    'target_tr_4' => $this->formatToEnglishDecimal($request->target_tr_4),
                    'realisasi_b1' => $this->formatToEnglishDecimal($request->realisasi_b1),
                    'realisasi_b2' => $this->formatToEnglishDecimal($request->realisasi_b2),
                    'realisasi_b3' => $this->formatToEnglishDecimal($request->realisasi_b3),
                    'realisasi_b4' => $this->formatToEnglishDecimal($request->realisasi_b4),
                    'realisasi_b5' => $this->formatToEnglishDecimal($request->realisasi_b5),
                    'realisasi_b6' => $this->formatToEnglishDecimal($request->realisasi_b6),
                    'realisasi_b7' => $this->formatToEnglishDecimal($request->realisasi_b7),
                    'realisasi_b8' => $this->formatToEnglishDecimal($request->realisasi_b8),
                    'realisasi_b9' => $this->formatToEnglishDecimal($request->realisasi_b9),
                    'realisasi_b10' => $this->formatToEnglishDecimal($request->realisasi_b10),
                    'realisasi_b11' => $this->formatToEnglishDecimal($request->realisasi_b11),
                    'realisasi_b12' => $this->formatToEnglishDecimal($request->realisasi_b12),
                    'realisasi_tr_1' => $realisasi_tr_1,
                    'realisasi_tr_2' => $realisasi_tr_2,
                    'realisasi_tr_3' => $realisasi_tr_3,
                    'realisasi_setahun' => $realisasi_tr_4
                ]);
            if ($kode_indikator->kode_indikator == 'i2') {
                if ($kode_indikator->kode_sub1_indikator == '3') {
                    $sub_i2 = DB::table('kinerja_bulanans')
                        ->select('*')
                        ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                        ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                        ->get();
                    $target_x_tr_1 = 0;
                    $target_x_tr_2 = 0;
                    $target_x_tr_3 = 0;
                    $target_x_tr_4 = 0;
                    $realisasi_x_b1 = 0;
                    $realisasi_x_b2 = 0;
                    $realisasi_x_b3 = 0;
                    $realisasi_x_b4 = 0;
                    $realisasi_x_b5 = 0;
                    $realisasi_x_b6 = 0;
                    $realisasi_x_b7 = 0;
                    $realisasi_x_b8 = 0;
                    $realisasi_x_b9 = 0;
                    $realisasi_x_b10 = 0;
                    $realisasi_x_b11 = 0;
                    $realisasi_x_b12 = 0;
                    for ($i = 2; $i < 7; $i++) {
                        $target_x_tr_1 = $target_x_tr_1 + $sub_i2[$i]->target_tr_1;
                        $target_x_tr_2 = $target_x_tr_2 + $sub_i2[$i]->target_tr_2;
                        $target_x_tr_3 = $target_x_tr_3 + $sub_i2[$i]->target_tr_3;
                        $target_x_tr_4 = $target_x_tr_4 + $sub_i2[$i]->target_tr_4;
                        $realisasi_x_b1 = $realisasi_x_b1 + $sub_i2[$i]->realisasi_b1;
                        $realisasi_x_b2 = $realisasi_x_b2 + $sub_i2[$i]->realisasi_b2;
                        $realisasi_x_b3 = $realisasi_x_b3 + $sub_i2[$i]->realisasi_b3;
                        $realisasi_x_b4 = $realisasi_x_b4 + $sub_i2[$i]->realisasi_b4;
                        $realisasi_x_b5 = $realisasi_x_b5 + $sub_i2[$i]->realisasi_b5;
                        $realisasi_x_b6 = $realisasi_x_b6 + $sub_i2[$i]->realisasi_b6;
                        $realisasi_x_b7 = $realisasi_x_b7 + $sub_i2[$i]->realisasi_b7;
                        $realisasi_x_b8 = $realisasi_x_b8 + $sub_i2[$i]->realisasi_b8;
                        $realisasi_x_b9 = $realisasi_x_b9 + $sub_i2[$i]->realisasi_b9;
                        $realisasi_x_b10 = $realisasi_x_b10 + $sub_i2[$i]->realisasi_b10;
                        $realisasi_x_b11 = $realisasi_x_b11 + $sub_i2[$i]->realisasi_b11;
                        $realisasi_x_b12 = $realisasi_x_b12 + $sub_i2[$i]->realisasi_b12;
                    };
                    $realisasi_x_tr_1 = $realisasi_x_b1 + $realisasi_x_b2 + $realisasi_x_b3;
                    $realisasi_x_tr_2 = $realisasi_x_tr_1 + $realisasi_x_b4 + $realisasi_x_b5 + $realisasi_x_b6;
                    $realisasi_x_tr_3 = $realisasi_x_tr_2 + $realisasi_x_b7 + $realisasi_x_b8 + $realisasi_x_b9;
                    $realisasi_x_tr_4 = $realisasi_x_tr_3 + $realisasi_x_b10 + $realisasi_x_b11 + $realisasi_x_b12;
                    DB::table('kinerja_bulanans')
                        ->where('id', '=', $sub_i2[1]->id)
                        ->update([
                            'target_tr_1' => $target_x_tr_1,
                            'target_tr_2' => $target_x_tr_2,
                            'target_tr_3' => $target_x_tr_3,
                            'target_tr_4' => $target_x_tr_4,
                            'realisasi_b1' => $realisasi_x_b1,
                            'realisasi_b2' => $realisasi_x_b2,
                            'realisasi_b3' => $realisasi_x_b3,
                            'realisasi_b4' => $realisasi_x_b4,
                            'realisasi_b5' => $realisasi_x_b5,
                            'realisasi_b6' => $realisasi_x_b6,
                            'realisasi_b7' => $realisasi_x_b7,
                            'realisasi_b8' => $realisasi_x_b8,
                            'realisasi_b9' => $realisasi_x_b9,
                            'realisasi_b10' => $realisasi_x_b10,
                            'realisasi_b11' => $realisasi_x_b11,
                            'realisasi_b12' => $realisasi_x_b12,
                            'realisasi_tr_1' => $realisasi_x_tr_1,
                            'realisasi_tr_2' => $realisasi_x_tr_2,
                            'realisasi_tr_3' => $realisasi_x_tr_3,
                            'realisasi_setahun' => $realisasi_x_tr_4
                        ]);
                } else {
                    $sub_i2 = DB::table('kinerja_bulanans')
                        ->select('*')
                        ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                        ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                        ->get();
                    $target_x_tr_1 = 0;
                    $target_x_tr_2 = 0;
                    $target_x_tr_3 = 0;
                    $target_x_tr_4 = 0;
                    for ($i = 8; $i < 13; $i++) {
                        $target_x_tr_1 = $target_x_tr_1 + $sub_i2[$i]->target_tr_1;
                        $target_x_tr_2 = $target_x_tr_2 + $sub_i2[$i]->target_tr_2;
                        $target_x_tr_3 = $target_x_tr_3 + $sub_i2[$i]->target_tr_3;
                        $target_x_tr_4 = $target_x_tr_4 + $sub_i2[$i]->target_tr_4;
                    };
                    DB::table('kinerja_bulanans')
                        ->where('id', '=', $sub_i2[7]->id)
                        ->update([
                            'target_tr_1' => $target_x_tr_1,
                            'target_tr_2' => $target_x_tr_2,
                            'target_tr_3' => $target_x_tr_3,
                            'target_tr_4' => $target_x_tr_4,
                        ]);
                };
                $update_i2 = DB::table('kinerja_bulanans')
                    ->select('*')
                    ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                    ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                    ->get();
                $target_i2_tr1 = $update_i2[1]->target_tr_1 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr2 = $update_i2[1]->target_tr_2 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr3 = $update_i2[1]->target_tr_3 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr4 = $update_i2[1]->target_tr_4 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr1 = $update_i2[1]->realisasi_tr_1 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr2 = $update_i2[1]->realisasi_tr_2 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr3 = $update_i2[1]->realisasi_tr_3 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr4 = $update_i2[1]->realisasi_setahun / $update_i2[7]->target_tr_4 * 100;
                DB::table('kinerja_bulanans')
                    ->where('id', '=', $update_i2[0]->id)
                    ->update([
                        'target_tr_1' => $target_i2_tr1,
                        'target_tr_2' => $target_i2_tr2,
                        'target_tr_3' => $target_i2_tr3,
                        'target_tr_4' => $target_i2_tr4,
                        'realisasi_tr_1' => $realisasi_i2_tr1,
                        'realisasi_tr_2' => $realisasi_i2_tr2,
                        'realisasi_tr_3' => $realisasi_i2_tr3,
                        'realisasi_setahun' => $realisasi_i2_tr4,
                    ]);
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', 'i2')
                    ->update([
                        'target_tr_1' => $target_i2_tr1,
                        'target_tr_2' => $target_i2_tr2,
                        'target_tr_3' => $target_i2_tr3,
                        'target_setahun' => $target_i2_tr4,
                        'realisasi_tr_1' => $realisasi_i2_tr1,
                        'realisasi_tr_2' => $realisasi_i2_tr2,
                        'realisasi_tr_3' => $realisasi_i2_tr3,
                        'realisasi_setahun' => $realisasi_i2_tr4,
                    ]);
            };
            if (($kode_indikator->kode_indikator == 'i3') or ($kode_indikator->kode_indikator == 'i4') or ($kode_indikator->kode_indikator == 'i5')) {
                $sub_indikator = DB::table('kinerja_bulanans')
                    ->select('*')
                    ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                    ->where('kinerja_bulanans.kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->get();
                $target_i_tr1 = $sub_indikator[1]->target_tr_1 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr2 = $sub_indikator[1]->target_tr_2 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr3 = $sub_indikator[1]->target_tr_3 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr4 = $sub_indikator[1]->target_tr_4 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr1 = $sub_indikator[1]->realisasi_tr_1 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr2 = $sub_indikator[1]->realisasi_tr_2 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr3 = $sub_indikator[1]->realisasi_tr_3 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr4 = $sub_indikator[1]->realisasi_setahun / $sub_indikator[2]->target_tr_4 * 100;
                DB::table('kinerja_bulanans')
                    ->where('id', '=', $sub_indikator[0]->id)
                    ->update([
                        'target_tr_1' => $target_i_tr1,
                        'target_tr_2' => $target_i_tr2,
                        'target_tr_3' => $target_i_tr3,
                        'target_tr_4' => $target_i_tr4,
                        'realisasi_tr_1' => $realisasi_i_tr1,
                        'realisasi_tr_2' => $realisasi_i_tr2,
                        'realisasi_tr_3' => $realisasi_i_tr3,
                        'realisasi_setahun' => $realisasi_i_tr4,
                    ]);
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->update([
                        'target_tr_1' => $target_i_tr1,
                        'target_tr_2' => $target_i_tr2,
                        'target_tr_3' => $target_i_tr3,
                        'target_setahun' => $target_i_tr4,
                        'realisasi_tr_1' => $realisasi_i_tr1,
                        'realisasi_tr_2' => $realisasi_i_tr2,
                        'realisasi_tr_3' => $realisasi_i_tr3,
                        'realisasi_setahun' => $realisasi_i_tr4,
                    ]);
            };
        } else {
            $indikator = 2;
            $datasuplmen = DB::table('kinerja_bulanans')
                ->select('*')
                ->where('kinerja_bulanans.id', '=', $id)
                ->first();
            DB::table('kinerja_bulanans')
                ->where('id', '=', $id)
                ->update([
                    'target_tr_4' => $this->formatToEnglishDecimal($request->target_tr_4),
                    'realisasi_tr_1' => $this->formatToEnglishDecimal($request->realisasi_tr_1),
                    'realisasi_tr_2' => $this->formatToEnglishDecimal($request->realisasi_tr_2),
                    'realisasi_tr_3' => $this->formatToEnglishDecimal($request->realisasi_tr_3),
                    'realisasi_setahun' => $this->formatToEnglishDecimal($request->realisasi_setahun),
                ]);
            DB::table('angka_kinerjas')
                ->where('satker', '=', $datasuplmen->kode_satker)
                ->where('kode_indikator', '=', $datasuplmen->kode_indikator)
                ->update([
                    'target_setahun' => $this->formatToEnglishDecimal($request->target_tr_4),
                    'realisasi_tr_1' => $this->formatToEnglishDecimal($request->realisasi_tr_1),
                    'realisasi_tr_2' => $this->formatToEnglishDecimal($request->realisasi_tr_2),
                    'realisasi_tr_3' => $this->formatToEnglishDecimal($request->realisasi_tr_3),
                    'realisasi_setahun' => $this->formatToEnglishDecimal($request->realisasi_setahun),
                ]);
        };

        return redirect('/entri-kinerja?satker=' . $satker->kode_satker . '&indikator=' . $indikator)->with(['id' => $id]);
    }

    function getPeriode($date = null)
    {
        if ($date === null) {
            $dateObject = new \DateTime();
        } else {
            $dateObject = new \DateTime($date);
        }

        $month = $dateObject->format('n');

        if ($month >= 1 && $month <= 3) {
            return 'tr1';
        } elseif ($month >= 4 && $month <= 6) {
            return 'tr2';
        } elseif ($month >= 7 && $month <= 9) {
            return 'tr3';
        } elseif ($month >= 10 && $month <= 12) {
            return 'tr4';
        } else {
            return 'unknown'; // Jika tanggal tidak berada di periode yang didefinisikan
        }
    }

    function formatToEnglishDecimal($number)
    {
        // Remove the thousand separators (dots)
        $number = str_replace('.', '', $number);

        // Replace the decimal comma with a dot
        $number = str_replace(',', '.', $number);

        return floatval($number);
    }

    public function updatekinerja(Request $request)
    {
        // dd($request);
        $satker = DB::table('kinerja_bulanans')
            ->select('kode_satker')
            ->where('kinerja_bulanans.id', '=', $request->id)
            ->first();
        $kode_indikator = DB::table('kinerja_bulanans')
            ->select('*')
            ->where('kinerja_bulanans.id', '=', $request->id)
            ->first();

        if ($request->target_tr_1 == null) {
            $target_tr_1 = $kode_indikator->target_tr_1;
        } else {
            $target_tr_1 = $request->target_tr_1;
        };
        if ($request->target_tr_2 == null) {
            $target_tr_2 = $kode_indikator->target_tr_2;
        } else {
            $target_tr_2 = $request->target_tr_2;
        };
        if ($request->target_tr_3 == null) {
            $target_tr_3 = $kode_indikator->target_tr_3;
        } else {
            $target_tr_3 = $request->target_tr_3;
        };
        if ($request->target_tr_4 == null) {
            $target_tr_4 = $kode_indikator->target_tr_4;
        } else {
            $target_tr_4 = $request->target_tr_4;
        };
        if ($request->realisasi_b1 == null) {
            $realisasi_b1 = $kode_indikator->realisasi_b1;
        } else {
            $realisasi_b1 = $request->realisasi_b1;
        };
        if ($request->realisasi_b2 == null) {
            $realisasi_b2 = $kode_indikator->realisasi_b2;
        } else {
            $realisasi_b2 = $request->realisasi_b2;
        };
        if ($request->realisasi_b3 == null) {
            $realisasi_b3 = $kode_indikator->realisasi_b3;
        } else {
            $realisasi_b3 = $request->realisasi_b3;
        };
        if ($request->realisasi_b4 == null) {
            $realisasi_b4 = $kode_indikator->realisasi_b4;
        } else {
            $realisasi_b4 = $request->realisasi_b4;
        };
        if ($request->realisasi_b5 == null) {
            $realisasi_b5 = $kode_indikator->realisasi_b5;
        } else {
            $realisasi_b5 = $request->realisasi_b5;
        };
        if ($request->realisasi_b6 == null) {
            $realisasi_b6 = $kode_indikator->realisasi_b6;
        } else {
            $realisasi_b6 = $request->realisasi_b6;
        };
        if ($request->realisasi_b7 == null) {
            $realisasi_b7 = $kode_indikator->realisasi_b7;
        } else {
            $realisasi_b7 = $request->realisasi_b7;
        };
        if ($request->realisasi_b8 == null) {
            $realisasi_b8 = $kode_indikator->realisasi_b8;
        } else {
            $realisasi_b8 = $request->realisasi_b8;
        };
        if ($request->realisasi_b9 == null) {
            $realisasi_b9 = $kode_indikator->realisasi_b9;
        } else {
            $realisasi_b9 = $request->realisasi_b9;
        };
        if ($request->realisasi_b10 == null) {
            $realisasi_b10 = $kode_indikator->realisasi_b10;
        } else {
            $realisasi_b10 = $request->realisasi_b10;
        };
        if ($request->realisasi_b11 == null) {
            $realisasi_b11 = $kode_indikator->realisasi_b11;
        } else {
            $realisasi_b11 = $request->realisasi_b11;
        };
        if ($request->realisasi_b12 == null) {
            $realisasi_b12 = $kode_indikator->realisasi_b12;
        } else {
            $realisasi_b12 = $request->realisasi_b12;
        };

        if ($kode_indikator->status == 'utama') {
            $indikator = 1;
            $realisasi_tr_1 = $realisasi_b1 + $realisasi_b2 + $realisasi_b3;
            $realisasi_tr_2 = $realisasi_tr_1 + $realisasi_b4 + $realisasi_b5 + $realisasi_b6;
            $realisasi_tr_3 = $realisasi_tr_2 + $realisasi_b7 + $realisasi_b8 + $realisasi_b9;
            $realisasi_tr_4 = $realisasi_tr_3 + $realisasi_b10 + $realisasi_b11 + $realisasi_b12;
            if ($kode_indikator->kode_sub1_indikator == 1) {
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->update([
                        'target_setahun' => $target_tr_4,
                        'realisasi_setahun' => $realisasi_tr_4,
                        'target_tr_1' => $target_tr_1,
                        'realisasi_tr_1' => $realisasi_tr_1,
                        'target_tr_2' => $target_tr_2,
                        'realisasi_tr_2' => $realisasi_tr_2,
                        'target_tr_3' => $target_tr_3,
                        'realisasi_tr_3' => $realisasi_tr_3
                    ]);
            };
            DB::table('kinerja_bulanans')
                ->where('id', '=', $request->id)
                ->update([
                    'target_tr_1' => $target_tr_1,
                    'target_tr_2' => $target_tr_2,
                    'target_tr_3' => $target_tr_3,
                    'target_tr_4' => $target_tr_4,
                    'realisasi_b1' => $realisasi_b1,
                    'realisasi_b2' => $realisasi_b2,
                    'realisasi_b3' => $realisasi_b3,
                    'realisasi_b4' => $realisasi_b4,
                    'realisasi_b5' => $realisasi_b5,
                    'realisasi_b6' => $realisasi_b6,
                    'realisasi_b7' => $realisasi_b7,
                    'realisasi_b8' => $realisasi_b8,
                    'realisasi_b9' => $realisasi_b9,
                    'realisasi_b10' => $realisasi_b10,
                    'realisasi_b11' => $realisasi_b11,
                    'realisasi_b12' => $realisasi_b12,
                    'realisasi_tr_1' => $realisasi_tr_1,
                    'realisasi_tr_2' => $realisasi_tr_2,
                    'realisasi_tr_3' => $realisasi_tr_3,
                    'realisasi_setahun' => $realisasi_tr_4
                ]);
            if ($kode_indikator->kode_indikator == 'i2') {
                if ($kode_indikator->kode_sub1_indikator == '3') {
                    $sub_i2 = DB::table('kinerja_bulanans')
                        ->select('*')
                        ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                        ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                        ->get();
                    $target_x_tr_1 = 0;
                    $target_x_tr_2 = 0;
                    $target_x_tr_3 = 0;
                    $target_x_tr_4 = 0;
                    $realisasi_x_b1 = 0;
                    $realisasi_x_b2 = 0;
                    $realisasi_x_b3 = 0;
                    $realisasi_x_b4 = 0;
                    $realisasi_x_b5 = 0;
                    $realisasi_x_b6 = 0;
                    $realisasi_x_b7 = 0;
                    $realisasi_x_b8 = 0;
                    $realisasi_x_b9 = 0;
                    $realisasi_x_b10 = 0;
                    $realisasi_x_b11 = 0;
                    $realisasi_x_b12 = 0;
                    for ($i = 2; $i < 7; $i++) {
                        $target_x_tr_1 = $target_x_tr_1 + $sub_i2[$i]->target_tr_1;
                        $target_x_tr_2 = $target_x_tr_2 + $sub_i2[$i]->target_tr_2;
                        $target_x_tr_3 = $target_x_tr_3 + $sub_i2[$i]->target_tr_3;
                        $target_x_tr_4 = $target_x_tr_4 + $sub_i2[$i]->target_tr_4;
                        $realisasi_x_b1 = $realisasi_x_b1 + $sub_i2[$i]->realisasi_b1;
                        $realisasi_x_b2 = $realisasi_x_b2 + $sub_i2[$i]->realisasi_b2;
                        $realisasi_x_b3 = $realisasi_x_b3 + $sub_i2[$i]->realisasi_b3;
                        $realisasi_x_b4 = $realisasi_x_b4 + $sub_i2[$i]->realisasi_b4;
                        $realisasi_x_b5 = $realisasi_x_b5 + $sub_i2[$i]->realisasi_b5;
                        $realisasi_x_b6 = $realisasi_x_b6 + $sub_i2[$i]->realisasi_b6;
                        $realisasi_x_b7 = $realisasi_x_b7 + $sub_i2[$i]->realisasi_b7;
                        $realisasi_x_b8 = $realisasi_x_b8 + $sub_i2[$i]->realisasi_b8;
                        $realisasi_x_b9 = $realisasi_x_b9 + $sub_i2[$i]->realisasi_b9;
                        $realisasi_x_b10 = $realisasi_x_b10 + $sub_i2[$i]->realisasi_b10;
                        $realisasi_x_b11 = $realisasi_x_b11 + $sub_i2[$i]->realisasi_b11;
                        $realisasi_x_b12 = $realisasi_x_b12 + $sub_i2[$i]->realisasi_b12;
                    };
                    $realisasi_x_tr_1 = $realisasi_x_b1 + $realisasi_x_b2 + $realisasi_x_b3;
                    $realisasi_x_tr_2 = $realisasi_x_tr_1 + $realisasi_x_b4 + $realisasi_x_b5 + $realisasi_x_b6;
                    $realisasi_x_tr_3 = $realisasi_x_tr_2 + $realisasi_x_b7 + $realisasi_x_b8 + $realisasi_x_b9;
                    $realisasi_x_tr_4 = $realisasi_x_tr_3 + $realisasi_x_b10 + $realisasi_x_b11 + $realisasi_x_b12;
                    DB::table('kinerja_bulanans')
                        ->where('id', '=', $sub_i2[1]->id)
                        ->update([
                            'target_tr_1' => $target_x_tr_1,
                            'target_tr_2' => $target_x_tr_2,
                            'target_tr_3' => $target_x_tr_3,
                            'target_tr_4' => $target_x_tr_4,
                            'realisasi_b1' => $realisasi_x_b1,
                            'realisasi_b2' => $realisasi_x_b2,
                            'realisasi_b3' => $realisasi_x_b3,
                            'realisasi_b4' => $realisasi_x_b4,
                            'realisasi_b5' => $realisasi_x_b5,
                            'realisasi_b6' => $realisasi_x_b6,
                            'realisasi_b7' => $realisasi_x_b7,
                            'realisasi_b8' => $realisasi_x_b8,
                            'realisasi_b9' => $realisasi_x_b9,
                            'realisasi_b10' => $realisasi_x_b10,
                            'realisasi_b11' => $realisasi_x_b11,
                            'realisasi_b12' => $realisasi_x_b12,
                            'realisasi_tr_1' => $realisasi_x_tr_1,
                            'realisasi_tr_2' => $realisasi_x_tr_2,
                            'realisasi_tr_3' => $realisasi_x_tr_3,
                            'realisasi_setahun' => $realisasi_x_tr_4
                        ]);
                } else {
                    $sub_i2 = DB::table('kinerja_bulanans')
                        ->select('*')
                        ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                        ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                        ->get();
                    $target_x_tr_1 = 0;
                    $target_x_tr_2 = 0;
                    $target_x_tr_3 = 0;
                    $target_x_tr_4 = 0;
                    for ($i = 8; $i < 13; $i++) {
                        $target_x_tr_1 = $target_x_tr_1 + $sub_i2[$i]->target_tr_1;
                        $target_x_tr_2 = $target_x_tr_2 + $sub_i2[$i]->target_tr_2;
                        $target_x_tr_3 = $target_x_tr_3 + $sub_i2[$i]->target_tr_3;
                        $target_x_tr_4 = $target_x_tr_4 + $sub_i2[$i]->target_tr_4;
                    };
                    DB::table('kinerja_bulanans')
                        ->where('id', '=', $sub_i2[7]->id)
                        ->update([
                            'target_tr_1' => $target_x_tr_1,
                            'target_tr_2' => $target_x_tr_2,
                            'target_tr_3' => $target_x_tr_3,
                            'target_tr_4' => $target_x_tr_4,
                        ]);
                };
                $update_i2 = DB::table('kinerja_bulanans')
                    ->select('*')
                    ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                    ->where('kinerja_bulanans.kode_indikator', '=', 'i2')
                    ->get();
                $target_i2_tr1 = $update_i2[1]->target_tr_1 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr2 = $update_i2[1]->target_tr_2 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr3 = $update_i2[1]->target_tr_3 / $update_i2[7]->target_tr_4 * 100;
                $target_i2_tr4 = $update_i2[1]->target_tr_4 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr1 = $update_i2[1]->realisasi_tr_1 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr2 = $update_i2[1]->realisasi_tr_2 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr3 = $update_i2[1]->realisasi_tr_3 / $update_i2[7]->target_tr_4 * 100;
                $realisasi_i2_tr4 = $update_i2[1]->realisasi_setahun / $update_i2[7]->target_tr_4 * 100;
                DB::table('kinerja_bulanans')
                    ->where('id', '=', $update_i2[0]->id)
                    ->update([
                        'target_tr_1' => $target_i2_tr1,
                        'target_tr_2' => $target_i2_tr2,
                        'target_tr_3' => $target_i2_tr3,
                        'target_tr_4' => $target_i2_tr4,
                        'realisasi_tr_1' => $realisasi_i2_tr1,
                        'realisasi_tr_2' => $realisasi_i2_tr2,
                        'realisasi_tr_3' => $realisasi_i2_tr3,
                        'realisasi_setahun' => $realisasi_i2_tr4,
                    ]);
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', 'i2')
                    ->update([
                        'target_tr_1' => $target_i2_tr1,
                        'target_tr_2' => $target_i2_tr2,
                        'target_tr_3' => $target_i2_tr3,
                        'target_setahun' => $target_i2_tr4,
                        'realisasi_tr_1' => $realisasi_i2_tr1,
                        'realisasi_tr_2' => $realisasi_i2_tr2,
                        'realisasi_tr_3' => $realisasi_i2_tr3,
                        'realisasi_setahun' => $realisasi_i2_tr4,
                    ]);
            };
            if (($kode_indikator->kode_indikator == 'i3') or ($kode_indikator->kode_indikator == 'i4') or ($kode_indikator->kode_indikator == 'i5')) {
                $sub_indikator = DB::table('kinerja_bulanans')
                    ->select('*')
                    ->where('kinerja_bulanans.kode_satker', '=', $satker->kode_satker)
                    ->where('kinerja_bulanans.kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->get();
                $target_i_tr1 = $sub_indikator[1]->target_tr_1 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr2 = $sub_indikator[1]->target_tr_2 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr3 = $sub_indikator[1]->target_tr_3 / $sub_indikator[2]->target_tr_4 * 100;
                $target_i_tr4 = $sub_indikator[1]->target_tr_4 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr1 = $sub_indikator[1]->realisasi_tr_1 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr2 = $sub_indikator[1]->realisasi_tr_2 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr3 = $sub_indikator[1]->realisasi_tr_3 / $sub_indikator[2]->target_tr_4 * 100;
                $realisasi_i_tr4 = $sub_indikator[1]->realisasi_setahun / $sub_indikator[2]->target_tr_4 * 100;
                DB::table('kinerja_bulanans')
                    ->where('id', '=', $sub_indikator[0]->id)
                    ->update([
                        'target_tr_1' => $target_i_tr1,
                        'target_tr_2' => $target_i_tr2,
                        'target_tr_3' => $target_i_tr3,
                        'target_tr_4' => $target_i_tr4,
                        'realisasi_tr_1' => $realisasi_i_tr1,
                        'realisasi_tr_2' => $realisasi_i_tr2,
                        'realisasi_tr_3' => $realisasi_i_tr3,
                        'realisasi_setahun' => $realisasi_i_tr4,
                    ]);
                DB::table('angka_kinerjas')
                    ->where('satker', '=', $satker->kode_satker)
                    ->where('kode_indikator', '=', $kode_indikator->kode_indikator)
                    ->update([
                        'target_tr_1' => $target_i_tr1,
                        'target_tr_2' => $target_i_tr2,
                        'target_tr_3' => $target_i_tr3,
                        'target_setahun' => $target_i_tr4,
                        'realisasi_tr_1' => $realisasi_i_tr1,
                        'realisasi_tr_2' => $realisasi_i_tr2,
                        'realisasi_tr_3' => $realisasi_i_tr3,
                        'realisasi_setahun' => $realisasi_i_tr4,
                    ]);
            };
        } else {
            $indikator = 2;
            $datasuplmen = DB::table('kinerja_bulanans')
                ->select('*')
                ->where('kinerja_bulanans.id', '=', $request->id)
                ->first();
            DB::table('kinerja_bulanans')
                ->where('id', '=', $request->id)
                ->update([
                    'target_tr_4' => $this->formatToEnglishDecimal($request->target_tr_4),
                    'realisasi_tr_1' => $this->formatToEnglishDecimal($request->realisasi_tr_1),
                    'realisasi_tr_2' => $this->formatToEnglishDecimal($request->realisasi_tr_2),
                    'realisasi_tr_3' => $this->formatToEnglishDecimal($request->realisasi_tr_3),
                    'realisasi_setahun' => $this->formatToEnglishDecimal($request->realisasi_setahun),
                ]);
            DB::table('angka_kinerjas')
                ->where('satker', '=', $datasuplmen->kode_satker)
                ->where('kode_indikator', '=', $datasuplmen->kode_indikator)
                ->update([
                    'target_setahun' => $this->formatToEnglishDecimal($request->target_tr_4),
                    'realisasi_tr_1' => $this->formatToEnglishDecimal($request->realisasi_tr_1),
                    'realisasi_tr_2' => $this->formatToEnglishDecimal($request->realisasi_tr_2),
                    'realisasi_tr_3' => $this->formatToEnglishDecimal($request->realisasi_tr_3),
                    'realisasi_setahun' => $this->formatToEnglishDecimal($request->realisasi_setahun),
                ]);
        };

        return redirect('/entri-kinerja?satker=' . $satker->kode_satker . '&indikator=' . $indikator)->with(['id' => $request->id]);
    }

    public function inputanalisistriwulanan(Request $request)
    {
        DB::table('analisis_triwulans')
            ->insert([
                'id_kinerja_bulanan' => $request->id,
                'periode' => $request->periodetr,
                'analisis_triwulan' => $request->analisis_triwulan,
                'created_by' => 'adrian.devano',
                'created_at' => date("Y-m-d H:i:s", strtotime('now'))
            ]);
        return redirect('/entri-kinerja');
    }
}
