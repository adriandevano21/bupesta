<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntrikinerjaController extends Controller
{
    public function pengajuanangka(Request $request)
    {
    }

    public function updatekinerja(Request $request)
    {
        dd($request);
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
                    'target_tr_4' => $request->target_tr_4,
                    'realisasi_tr_1' => $request->realisasi_tr_1,
                    'realisasi_tr_2' => $request->realisasi_tr_2,
                    'realisasi_tr_3' => $request->realisasi_tr_3,
                    'realisasi_setahun' => $request->realisasi_setahun,
                ]);
            DB::table('angka_kinerjas')
                ->where('satker', '=', $datasuplmen->kode_satker)
                ->where('kode_indikator', '=', $datasuplmen->kode_indikator)
                ->update([
                    'target_setahun' => $request->target_tr_4,
                    'realisasi_tr_1' => $request->realisasi_tr_1,
                    'realisasi_tr_2' => $request->realisasi_tr_2,
                    'realisasi_tr_3' => $request->realisasi_tr_3,
                    'realisasi_setahun' => $request->realisasi_setahun,
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
