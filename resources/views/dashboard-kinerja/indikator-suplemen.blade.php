@foreach ($data["suplemen"] as $iks)
    <a href="/dashboard-kinerja?satker={{ $data["satker"] }}&periode={{ $data["periode"] }}&indikator={{ $iks["kode_indikator"] }}&view={{ $data["view"] }}" style="text-decoration: none; color: inherit;">
        <div class="kotak-flex-indikator bg-abu-abu border-kiri-{{ $iks["warna"] }}">
            <div class="kotak-flex-s" style="background-color:grey;">
                <p class="font-besar putih"><b>{{ $iks["kode_indikator"] }}</b></p>
            </div>
            <div class="kotak-flex-nama-indikator">
                @if ($iks["warna"] === "abu-tua")
                    <div class="font-standar">{{ $iks["nama_indikator"] }}</div>
                @else
                    <div class="font-standar"><b>{{ $iks["nama_indikator"] }}</b></div>
                @endif
                @if ($iks["target_setahun"] === "0.00")
                    <div class="font-mini {{ $iks["warna"] }}">Tidak Ada Target (NA)</div>
                @else
                    <div class="font-mini {{ $iks["warna"] }}">{{ $iks["keterangan"] }} ({{ $iks["satuan_indikator"] }}) </div>
                @endif
            </div>
            <div class="kotak-flex-realisasi">
                <div class="font-standar {{ $iks["warna"] }}"><b>{{ $iks["realisasi_setahun"] }}</b></div>
                
                @if ($iks["target_setahun"] === "0.00")
                    <div class="font-mini">NA</div>
                @else
                    <div class="font-mini">{{ $iks["target_setahun"] }}</div>
                @endif
            </div>
            <div class="kotak-flex-icon  bg-putih border-{{ $iks["warna"] }}">
                <i class="{{ $iks["icon"] }}"></i>
            </div>
        </div>
    </a>
@endforeach