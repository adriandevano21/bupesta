<table id="tabeliks" class="table table-bordered" style="font-size: 12pt">
    <thead class="border-black" style="background: #3ecbff !important">
        <tr>
            <th rowspan="3" style="background: black !important"></th>
            <th rowspan="3" style="background: #3ecbff !important">Tujuan/Sasaran/Indikator</th>
            <th rowspan="3" style="background: #3ecbff !important">Satuan</th>
            <th colspan="5">Perjanjian Kinerja</th>
            <th colspan="4">Capaian Kinerja</th>
            <th rowspan="3" style="background: black !important"></th>
        </tr>
        <tr>
            <th rowspan="2">Target</th>
            <th colspan="4">Realisasi Kumulatif</th>
            <th colspan="4">Terhadap Target</th>
        </tr>
        <tr>
            <th>TW I</th>
            <th>TW II</th>
            <th>TW III</th>
            <th>TW IV</th>
            <th>TW I</th>
            <th>TW II</th>
            <th>TW III</th>
            <th>TW IV</th>
        </tr>
    </thead>
    <tbody class="border-black">
        @foreach ($data['datasuplemen'] as $datasuplemen)
            @if ($datasuplemen->target_tr_4 != 0)
                <tr style="font-weight: bold;">
                    <form method="POST" action="/update-data/{{ $datasuplemen->id }}" enctype="multipart/form-data">
                        @csrf
                        <td style="background: black !important">
                            <button type="submit" hidden>
                                <a href="" class="btn btn-warning border-black"
                                    style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                            </button>
                        </td>
                        <td>
                            <p style="text-align: justify">{{ $datasuplemen->detail_indikator }}</p>
                        </td>
                        <td>{{ $datasuplemen->satuan }}</td>
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text" name="target_tr_4"
                                class="form-control numberInput"
                                value="{{ old('target_tr_4', $datasuplemen->target_tr_4) }}">
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text" name="realisasi_tr_1" id="realisasi_tr_1"
                                class="form-control numberInput"
                                value="{{ old('realisasi_tr_1', $datasuplemen->realisasi_tr_1) }}"
                                oninput="setCustomValidity('')">
                        </td>
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text" name="realisasi_tr_2" id="realisasi_tr_2"
                                class="form-control numberInput"
                                value="{{ old('realisasi_tr_2', $datasuplemen->realisasi_tr_2) }}"
                                oninput="setCustomValidity('')">
                        </td>
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text" name="realisasi_tr_3" id="realisasi_tr_3"
                                class="form-control numberInput"
                                value="{{ old('realisasi_tr_3', $datasuplemen->realisasi_tr_3) }}"
                                oninput="setCustomValidity('')">
                        </td>
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text" name="realisasi_setahun" id="realisasi_setahun"
                                class="form-control numberInput"
                                value="{{ old('realisasi_setahun', $datasuplemen->realisasi_setahun) }}"
                                oninput="setCustomValidity('')">
                        </td>
                        <td>
                            <p id="capkin_tw_1">
                                @if ($datasuplemen->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($datasuplemen->realisasi_tr_1 / $datasuplemen->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($datasuplemen->realisasi_tr_1 / $datasuplemen->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                            <input disabled style="font-size: 8pt" type="text"
                                id="{{ $datasuplemen->id == $id ? 'fokus1' : '' }}" name="target_tr_4"
                                class="form-control numberInput"
                                value="{{ old('target_tr_4', $datasuplemen->target_tr_4) }}">
                        </td>
                        <td>
                            <p id="capkin_tw_2">
                                @if ($datasuplemen->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($datasuplemen->realisasi_tr_2 / $datasuplemen->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($datasuplemen->realisasi_tr_2 / $datasuplemen->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_3">
                                @if ($datasuplemen->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($datasuplemen->realisasi_tr_3 / $datasuplemen->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($datasuplemen->realisasi_tr_3 / $datasuplemen->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td>
                            <p id="capkin_tw_4">
                                @if ($datasuplemen->target_tr_4 == 0)
                                    {{ number_format(0, 2) }}
                                @elseif (($datasuplemen->realisasi_setahun / $datasuplemen->target_tr_4) * 100 > 120)
                                    {{ number_format(120, 2) }}
                                @else
                                    {{ number_format(($datasuplemen->realisasi_setahun / $datasuplemen->target_tr_4) * 100, 2) }}
                                @endif
                            </p>
                        </td>
                        <td style="background: black !important">
                            <input style="font-size: 8pt" type="text" name="id" id="id"
                                class="form-control numberInput" value="{{ old('id', $datasuplemen->id) }}" required
                                oninput="setCustomValidity('')" hidden>
                        </td>
                    </form>
                </tr>
            @else
                <tr style="font-weight: bold;">
                    <form method="POST" action="/update-data/{{ $datasuplemen->id }}" enctype="multipart/form-data">
                        @csrf
                        <td style="background: black !important">
                            <button type="submit" hidden>
                                <a href="" class="btn btn-warning border-black"
                                    style="padding: 0.3vw 0.3vw; font-size: 1vw"><i class="fas fa-save"></i></a>
                            </button>
                        </td>
                        <td>
                            <p style="text-align: justify">{{ $datasuplemen->detail_indikator }}</p>
                        </td>
                        <td>{{ $datasuplemen->satuan }}</td>
                        <td style="background: #fffd98 !important">
                            <input style="font-size: 8pt" type="text"
                                id="{{ $datasuplemen->id == $id ? 'fokus1' : '' }}" name="target_tr_4"
                                class="form-control numberInput"
                                value="{{ old('target_tr_4', $datasuplemen->target_tr_4) }}" required>
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
                    </form>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
