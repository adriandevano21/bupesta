<table id="tabeliku" class="table table-bordered" style="font-size: 12pt">
    <thead class="border-black" style="background: #3ecbff !important">
        <tr>
            <th rowspan="3" style="background: black !important"></th>
            <th rowspan="3" style="background: #3ecbff !important">Tujuan/Sasaran/Indikator</th>
            <th rowspan="3" style="background: #3ecbff !important">Satuan</th>
            <th colspan="20">Perjanjian Kinerja</th>
            <th colspan="7">Capaian Kinerja</th>
            <th rowspan="3" style="background: black !important"></th>
        </tr>
        <tr>
            <th colspan="4">Target Kumulatif</th>
            <th colspan="16">Realisasi Kumulatif</th>
            <th colspan="3">Kumulatif</th>
            <th colspan="4">Terhadap target setahun</th>
        </tr>
        <tr>
            <th>TW I</th>
            <th>TW II</th>
            <th>TW III</th>
            <th>TW IV</th>
            <th>Januari</th>
            <th>Februari</th>
            <th>Maret</th>
            <th>TW I</th>
            <th>April</th>
            <th>Mei</th>
            <th>Juni</th>
            <th>TW II</th>
            <th>Juli</th>
            <th>Agustus</th>
            <th>September</th>
            <th>TW III</th>
            <th>Oktober</th>
            <th>November</th>
            <th>Desember</th>
            <th>TW IV</th>
            <th>TW I</th>
            <th>TW II</th>
            <th>TW III</th>
            <th>TW I</th>
            <th>TW II</th>
            <th>TW III</th>
            <th>TW IV</th>
        </tr>
    </thead>
    <tbody class="border-black">
        @foreach ($data['databulanan'] as $databulanan)
            @if ($databulanan->kode_sub1_indikator === '1')
                @if (
                    $databulanan->kode_indikator === 'i1' or
                        $databulanan->kode_indikator === 'i6' or
                        $databulanan->kode_indikator === 'i7')
                    <tr style="font-weight: bold;">
                        <td style="background: black !important">
                            <button type="submit" hidden>
                                <a href="" class="btn btn-warning border-black"
                                    style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                            </button>
                        </td>
                        <td>
                            <p style="text-align: justify">{{ $databulanan->detail_indikator }}</p>
                        </td>
                        <td>{{ $databulanan->satuan }}</td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_1 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_1 }}','target_tr_1','Target Kumulatif Triwulan 1')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_2 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_2 }}','target_tr_2','Target Kumulatif Triwulan 2')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_3 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_3 }}','target_tr_3','Target Kumulatif Triwulan 3')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_4 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_4 }}','target_tr_4','Target Kumulatif Triwulan 4')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b1')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b1 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b1 }}','realisasi_b1','Realisasi Bulan Januari')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b1')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b2')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b2 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b2 }}','realisasi_b2','Realisasi Bulan Februari')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b2')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b3')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b3 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b3 }}','realisasi_b3','Realisasi Bulan Maret')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b3')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col">
                                {{ $databulanan->realisasi_tr_1 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Input Analisis Pencapaian Triwulan 1">
                                        <a onclick="showEntriAnalisisTr('{{ $databulanan->id }}','','analisis_tr1','Input Analisis Realisasi Triwulan 1')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Analisis Pencapaian Triwulan 1">
                                        <a onclick="showAnalisisTr('{{ $databulanan->id }}','analisis_tr1','Analisis Realisasi Triwulan 1')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-eye"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b4')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b4 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b4 }}','realisasi_b4','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b4')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b5')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b5 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b5 }}','realisasi_b5','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b5')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b6')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b6 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b6 }}','realisasi_b6','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b6')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col">
                                {{ $databulanan->realisasi_tr_2 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Input Analisis Pencapaian Triwulan 2">
                                        <a onclick="showEntriAnalisisTr('{{ $databulanan->id }}','{{ $databulanan->realisasi_tr_1 }}','analisis_tr2','Input Analisis Realisasi Triwulan 2')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Analisis Pencapaian Triwulan 2">
                                        <a onclick="showAnalisisTr('{{ $databulanan->id }}','analisis_tr2','Analisis Realisasi Triwulan 2')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-eye"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b7')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b7 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b7 }}','realisasi_b7','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b7')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b8')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b8 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b8 }}','realisasi_b8','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b8')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b9')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b9 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b9 }}','realisasi_b9','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b9')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col">
                                {{ $databulanan->realisasi_tr_3 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Input Analisis Pencapaian Triwulan 3">
                                        <a onclick="showEntriAnalisisTr('{{ $databulanan->id }}','{{ $databulanan->realisasi_tr_1 }}','analisis_tr3','Input Analisis Realisasi Triwulan 3')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Analisis Pencapaian Triwulan 3">
                                        <a onclick="showAnalisisTr('{{ $databulanan->id }}','analisis_tr3','Analisis Realisasi Triwulan 3')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-eye"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b10')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b10 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b10 }}','realisasi_b10','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b10')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b11')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b11 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b11 }}','realisasi_b11','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b11')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b12')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b12 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b12 }}','realisasi_b12','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b12')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col">
                                {{ $databulanan->realisasi_setahun }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Input Analisis Pencapaian Triwulan 4">
                                        <a onclick="showEntriAnalisisTr('{{ $databulanan->id }}','{{ $databulanan->realisasi_tr_1 }}','analisis_tr4','Input Analisis Realisasi Setahun')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Analisis Pencapaian Triwulan 4">
                                        <a onclick="showAnalisisTr('{{ $databulanan->id }}','analisis_tr4','Analisis Realisasi Triwulan 4')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-eye"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($databulanan->target_tr_1 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_2 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_3 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_4 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_4 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_4 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($databulanan->target_tr_4 == 0)
                                {{ number_format(0, 2) }}
                            @elseif (($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100 > 120)
                                {{ number_format(120, 2) }}
                            @else
                                {{ number_format(($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100, 2) }}
                            @endif
                        </td>
                        <td style="background: black !important">
                            <input style="font-size: 8pt" type="text" name="id" id="id"
                                class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                                oninput="setCustomValidity('')" hidden>
                        </td>
                    </tr>
                @else
                    <tr style="font-weight: bold;">
                        <td style="background: black !important">
                        </td>
                        <td>
                            <p style="text-align: justify">{{ $databulanan->detail_indikator }}</p>
                        </td>
                        <td>{{ $databulanan->satuan }}</td>
                        <td>
                            {{ $databulanan->target_tr_1 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_2 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_3 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_4 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b1 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b2 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b3 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_1">{{ $databulanan->realisasi_tr_1 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b4 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b5 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b6 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_2">{{ $databulanan->realisasi_tr_2 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b7 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b8 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b9 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_3">{{ $databulanan->realisasi_tr_3 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b10 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b11 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b12 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_4">{{ $databulanan->realisasi_setahun }}</p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_1">
                                @if ($databulanan->target_tr_1 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_2">
                                @if ($databulanan->target_tr_2 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_3">
                                @if ($databulanan->target_tr_3 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_1">
                                @if ($databulanan->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_2">
                                @if ($databulanan->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_3">
                                @if ($databulanan->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_4">
                                @if ($databulanan->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td style="background: black !important">
                            <input style="font-size: 8pt" type="text" name="id" id="id"
                                class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                                oninput="setCustomValidity('')" hidden>
                        </td>
                    </tr>
                @endif
            @elseif ($databulanan->kode_sub1_indikator === '2')
                @if ($databulanan->kode_indikator === 'i2')
                    <tr style="font-weight: bold;">
                        <td style="background: black !important">
                        </td>
                        <td>
                            <p style="text-align: justify; margin-left: 2vw">{{ $databulanan->detail_indikator }}</p>
                        </td>
                        <td>{{ $databulanan->satuan }}</td>
                        <td>
                            {{ $databulanan->target_tr_1 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_2 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_3 }}
                        </td>
                        <td>
                            {{ $databulanan->target_tr_4 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b1 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b2 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b3 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_1">{{ $databulanan->realisasi_tr_1 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b4 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b5 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b6 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_2">{{ $databulanan->realisasi_tr_2 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b7 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b8 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b9 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_3">{{ $databulanan->realisasi_tr_3 }}</p>
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b10 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b11 }}
                        </td>
                        <td>
                            {{ $databulanan->realisasi_b12 }}
                        </td>
                        <td>
                            <p id="realisasi_tr_4">{{ $databulanan->realisasi_setahun }}</p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_1"></p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_2"></p>
                        </td>
                        <td>
                            <p id="capkin_kum_tw_3"></p>
                        </td>
                        <td>
                            <p id="capkin_tw_1"></p>
                        </td>
                        <td>
                            <p id="capkin_tw_2"></p>
                        </td>
                        <td>
                            <p id="capkin_tw_3"></p>
                        </td>
                        <td>
                            <p id="capkin_tw_4"></p>
                        </td>
                        <td style="background: black !important">
                            <input style="font-size: 8pt" type="text" name="id" id="id"
                                class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                                oninput="setCustomValidity('')" hidden>
                        </td>
                    </tr>
                @else
                    <tr>

                        <td style="background: black !important">
                            <button type="submit" hidden>
                                <a href="" class="btn btn-warning border-black"
                                    style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                            </button>
                        </td>
                        <td>
                            <p style="text-align: justify; margin-left: 2vw">{{ $databulanan->detail_indikator }}
                            </p>
                        </td>
                        <td>{{ $databulanan->satuan }}</td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_1 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_1 }}','target_tr_1','Target Kumulatif Triwulan 1')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_2 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_2 }}','target_tr_2','Target Kumulatif Triwulan 2')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_3 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_3 }}','target_tr_3','Target Kumulatif Triwulan 3')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                {{ $databulanan->target_tr_4 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Target">
                                        <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_4 }}','target_tr_4','Target Kumulatif Triwulan 4')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b1')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b1 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b1 }}','realisasi_b1','Realisasi Bulan Januari')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b1')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b2')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b2 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b2 }}','realisasi_b2','Realisasi Bulan Februari')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b2')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b3')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b3 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b3 }}','realisasi_b3','Realisasi Bulan Maret')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b3')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <p id="realisasi_tr_1">{{ $databulanan->realisasi_tr_1 }}</p>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b4')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b4 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b4 }}','realisasi_b4','Realisasi Bulan April')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b4')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b5')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b5 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b5 }}','realisasi_b5','Realisasi Bulan Mei')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b5')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b6')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b6 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b6 }}','realisasi_b6','Realisasi Bulan Juni')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b6')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <p id="realisasi_tr_2">{{ $databulanan->realisasi_tr_2 }}</p>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b7')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b7 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b7 }}','realisasi_b7','Realisasi Bulan Juli')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b7')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b8')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b8 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b8 }}','realisasi_b8','Realisasi Bulan Agustus')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b8')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b9')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b9 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b9 }}','realisasi_b9','Realisasi Bulan September')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b9')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <p id="realisasi_tr_3">{{ $databulanan->realisasi_tr_3 }}</p>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b10')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b10 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b10 }}','realisasi_b10','Realisasi Bulan Oktober')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b10')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b11')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b11 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b11 }}','realisasi_b11','Realisasi Bulan November')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b11')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="background: #fffd98 !important">
                            <div class="col">
                                @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b12')
                                    <input style="font-size: 1pt" type="text" id="fokus1">
                                @endif
                                {{ $databulanan->realisasi_b12 }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Update Realisasi">
                                        <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b12 }}','realisasi_b12','Realisasi Bulan Desember')"
                                            class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                                class="fas fa-edit"></i></a>
                                    </button>
                                    @foreach ($data['pengajuan'] as $pengajuan)
                                        @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b12')
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Lihat Bukti Dukung">
                                                <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                    target="_blank" class="btn btn-primary"
                                                    style="padding: 5px 7px; font-size: 10px"><i
                                                        class="fas fa-file-alt"></i></a>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        @if ($databulanan->kode_indikator === 'i1' or $databulanan->kode_indikator === 'i7')
                            <td>
                                <p id="realisasi_tr_4">{{ $databulanan->realisasi_setahun }}</p>
                            </td>
                            <td>
                                <p id="capkin_kum_tw_1">
                                    @if ($databulanan->target_tr_1 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_1) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_kum_tw_2">
                                    @if ($databulanan->target_tr_2 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_2) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_kum_tw_3">
                                    @if ($databulanan->target_tr_3 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_3) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_tw_1">
                                    @if ($databulanan->target_tr_4 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_1 / $databulanan->target_tr_4) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_tw_2">
                                    @if ($databulanan->target_tr_4 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_2 / $databulanan->target_tr_4) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_tw_3">
                                    @if ($databulanan->target_tr_4 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_tr_3 / $databulanan->target_tr_4) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p id="capkin_tw_4">
                                    @if ($databulanan->target_tr_4 == 0)
                                        {{ number_format(0, 2) }}
                                    @elseif (($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100 > 120)
                                        {{ number_format(120, 2) }}
                                    @else
                                        {{ number_format(($databulanan->realisasi_setahun / $databulanan->target_tr_4) * 100, 2) }}
                                    @endif
                                </p>
                            </td>
                            <td style="background: black !important">
                                <input style="font-size: 8pt" type="text" name="id" id="id"
                                    class="form-control numberInput" value="{{ old('id', $databulanan->id) }}"
                                    required oninput="setCustomValidity('')" hidden>
                            </td>
                        @else
                            <td>
                                <p id="realisasi_tr_4">{{ $databulanan->realisasi_setahun }}</p>
                            </td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: #9d9d9d !important"></td>
                            <td style="background: black !important">
                                <input style="font-size: 8pt" type="text" name="id" id="id"
                                    class="form-control numberInput" value="{{ old('id', $databulanan->id) }}"
                                    required oninput="setCustomValidity('')" hidden>
                            </td>
                        @endif
                    </tr>
                @endif
            @elseif ($databulanan->kode_sub1_indikator === '3')
                <tr>
                    <td style="background: black !important">
                        <button type="submit" hidden>
                            <a href="" class="btn btn-warning border-black"
                                style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                        </button>
                    </td>
                    <td>
                        <p style="text-align: justify; margin-left: 4vw">{{ $databulanan->detail_indikator }}</p>
                    </td>
                    <td>{{ $databulanan->satuan }}</td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_1 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_1 }}','target_tr_1','Target Kumulatif Triwulan 1')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_2 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_2 }}','target_tr_2','Target Kumulatif Triwulan 2')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_3 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_3 }}','target_tr_3','Target Kumulatif Triwulan 3')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_4 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_4 }}','target_tr_4','Target Kumulatif Triwulan 4')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b1')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b1 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b1 }}','realisasi_b1','Realisasi Bulan Januari')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b1')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b2')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b2 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b2 }}','realisasi_b2','Realisasi Bulan Februari')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b2')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b3')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b3 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b3 }}','realisasi_b3','Realisasi Bulan Maret')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b3')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <p id="realisasi_tr_1">{{ $databulanan->realisasi_tr_1 }}</p>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b4')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b4 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b4 }}','realisasi_b4','Realisasi Bulan April')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b4')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b5')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b5 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b5 }}','realisasi_b5','Realisasi Bulan April')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b5')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b6')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b6 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b6 }}','realisasi_b6','Realisasi Bulan Mei')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b6')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <p id="realisasi_tr_2">{{ $databulanan->realisasi_tr_2 }}</p>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b7')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b7 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b7 }}','realisasi_b7','Realisasi Bulan April')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b7')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b8')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b8 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b8 }}','realisasi_b8','Realisasi Bulan Agusuts')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b8')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b9')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b9 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b9 }}','realisasi_b9','Realisasi Bulan September')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b9')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <p id="realisasi_tr_3">{{ $databulanan->realisasi_tr_3 }}</p>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b10')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b10 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b10 }}','realisasi_b10','Realisasi Bulan Oktober')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b10')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b11')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b11 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b11 }}','realisasi_b11','Realisasi Bulan November')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b11')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            @if ($databulanan->id == session('id') and session('kolom') == 'realisasi_b12')
                                <input style="font-size: 1pt" type="text" id="fokus1">
                            @endif
                            {{ $databulanan->realisasi_b12 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Update Realisasi">
                                    <a onclick="showEntriRealisasi('{{ $databulanan->id }}','{{ $databulanan->realisasi_b12 }}','realisasi_b12','Realisasi Bulan Desember')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                                @foreach ($data['pengajuan'] as $pengajuan)
                                    @if ($pengajuan->id_kinerja_bulanan == $databulanan->id and $pengajuan->periode == 'realisasi_b12')
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat Bukti Dukung">
                                            <a href="{{ asset('uploads/' . $pengajuan->filebuktidukung) }}"
                                                target="_blank" class="btn btn-primary"
                                                style="padding: 5px 7px; font-size: 10px"><i
                                                    class="fas fa-file-alt"></i></a>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <p id="realisasi_tr_4">{{ $databulanan->realisasi_setahun }}</p>
                    </td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: black !important">
                        <input style="font-size: 8pt" type="text" name="id" id="id"
                            class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                            oninput="setCustomValidity('')" hidden>
                    </td>
                </tr>
            @elseif ($databulanan->kode_sub1_indikator === '4')
                <tr>

                    <td style="background: black !important">
                        <button type="submit" hidden>
                            <a href="" class="btn btn-warning border-black"
                                style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                        </button>
                    </td>
                    <td>
                        <p style="text-align: justify; margin-left: 2vw">{{ $databulanan->detail_indikator }}</p>
                    </td>
                    <td>{{ $databulanan->satuan }}</td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_1 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_1 }}','target_tr_1','Target Kumulatif Triwulan 1')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_2 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_2 }}','target_tr_2','Target Kumulatif Triwulan 2')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_3 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_3 }}','target_tr_3','Target Kumulatif Triwulan 3')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_4 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_4 }}','target_tr_4','Target Kumulatif Triwulan 4')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: black !important">
                        <input style="font-size: 8pt" type="text" name="id" id="id"
                            class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                            oninput="setCustomValidity('')" hidden>
                    </td>
                </tr>
            @elseif ($databulanan->kode_sub1_indikator === '7')
                <tr style="font-weight: bold;">
                    <td style="background: black !important">
                        <button type="submit" hidden>
                            <a href="" class="btn btn-warning border-black"
                                style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                        </button>
                    </td>
                    <td>
                        <p style="text-align: justify">{{ $databulanan->detail_indikator }}</p>
                    </td>
                    <td>{{ $databulanan->satuan }}</td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: black !important">
                        <input style="font-size: 8pt" type="number" step="0.01" name="id"
                            id="id" class="form-control" value="{{ old('id', $databulanan->id) }}"
                            required oninput="setCustomValidity('')" hidden>
                    </td>
                </tr>
            @else
                <tr>
                    <td style="background: black !important">
                        <button type="submit" hidden>
                            <a href="" class="btn btn-warning border-black"
                                style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                        </button>
                    </td>
                    <td>
                        <p style="text-align: justify; margin-left: 4vw">{{ $databulanan->detail_indikator }}</p>
                    </td>
                    <td>{{ $databulanan->satuan }}</td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_1 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_1 }}','target_tr_1','Target Kumulatif Triwulan 1')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_2 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_2 }}','target_tr_2','Target Kumulatif Triwulan 2')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_3 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_3 }}','target_tr_3','Target Kumulatif Triwulan 3')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #fffd98 !important">
                        <div class="col">
                            {{ $databulanan->target_tr_4 }}
                        </div>
                        <div class="row">
                            <div class="col">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Target">
                                    <a onclick="showEntriTarget('{{ $databulanan->id }}','{{ $databulanan->target_tr_4 }}','target_tr_4','Target Kumulatif Triwulan 4')"
                                        class="btn btn-primary" style="padding: 5px 7px; font-size: 10px"><i
                                            class="fas fa-edit"></i></a>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: #9d9d9d !important"></td>
                    <td style="background: black !important">
                        <input style="font-size: 8pt" type="text" name="id" id="id"
                            class="form-control numberInput" value="{{ old('id', $databulanan->id) }}" required
                            oninput="setCustomValidity('')" hidden>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
