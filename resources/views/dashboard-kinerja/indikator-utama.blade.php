@foreach ($data["utama"] as $iku)
    <a href="/dashboard-kinerja?satker={{ $data["satker"] }}&periode={{ $data["periode"] }}&indikator={{ $iku["kode_indikator"] }}&view={{ $data["view"] }}" style="text-decoration: none; color: inherit;">
        <div class="kotak-flex-indikator bg-putih border-kiri-{{ $iku["warna"] }}">
            <div class=" kotak-flex-s" style="background-color:grey;">
                <p class="font-super-besar putih"><b>{{ $iku["kode_indikator"] }}</b></p>
            </div>
            <div class="kotak-flex-nama-indikator">
                <div class="font-standar"><b>{{ $iku["nama_indikator"] }}</b></div>
                @if ($iku["target_setahun"] === "0.00")
                    <div class="font-mini {{ $iku["warna"] }}">Tidak Ada Target (NA)</div>
                @else
                    <div class="font-mini {{ $iku["warna"] }}">{{ $iku["keterangan"] }} ({{ $iku["satuan_indikator"] }}) </div>
                @endif
            </div>
            <div class="kotak-flex-realisasi">
                <div class="font-standar {{ $iku["warna"] }}"><b>{{ $iku["realisasi_setahun"] }}</b></div>
                @if ($iku["target_setahun"] === "0.00")
                    <div class="font-mini">NA</div>
                @else
                    <div class="font-mini">{{ $iku["target_setahun"] }}</div>
                @endif
            </div>
            <div class="kotak-flex-icon  bg-putih border-{{ $iku["warna"] }}">
                <i class="{{ $iku["icon"] }}"></i>
            </div>
        </div>
    </a>
@endforeach