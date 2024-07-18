<p class="font-semi-besar"><b>Informasi Penting</b></p>
<hr>
<br>
@if ($data["indikator"] === "s1")
    <ul>
        <li><p class="font-standar"> <b>-</b> Data Respon Rate -> <a href="https://s.bps.go.id/RESPONRATE_ACEH" target="_blank">RESPON RATE ACEH</a></p></li>
        @foreach ($data["infopenting"] as $info)
            <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
        @endforeach
    </ul>
@elseif ($data["indikator"] === "capkin")
    <ul>
        @foreach ($data["infopenting"] as $info)
            <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
        @endforeach
    </ul>
@elseif ($data["indikator"] === "i1")
    <li class="font-standar">Realisasi Indikator ini berasal dari hasil Survei Kebutuhan Data (SKD)  masing-masing satker</li>
    <br>
    <ul>
        <li><p class="font-standar"> <b>-</b> <a href="https://bupesta.web.bps.go.id/detailkegiatan.php?kegiatan=9N08F80EzIK" target="_blank">KEGIATAN SKD</a></p></li>
        <li><p class="font-standar"> <b>-</b> <a href="https://skd.bps.go.id/SKD2024" target="_blank">DATA SKD</a></p></li>
    </ul>
    <br>
    <li class="font-standar">Terdapat indikator penunjang pada FRA untuk secara tidak langsung memonitor capaian indikator ini, yaitu</li>
    <br>
    <ul>
        <li><p class="font-standar"> <b>-</b> Jumlah publikasi statistik yang terbit tepat waktu</p></li>
        <li><p class="font-standar"> <b>-</b> Jumlah rilis data statistik yang tepat waktu</p></li>
        <li><p class="font-standar"> <b>-</b> Jumlah pengunjung eksternal yang mengakses data dan informasi statistik melalui website BPS</p></li>
    </ul>
@elseif ($data["indikator"] === "i2")
    <ul>
        @foreach ($data["infopenting"] as $info)
            <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
        @endforeach
        <li><p class="font-standar"> <b>-</b> <a href="/detailkegiatan.php?kegiatan={{ $data["linkkegiatan"] }}" target="_blank">Daftar Publikasi RSE Provinsi</a></p></li>
    </ul>
@elseif ($data["indikator"] === "i3")
<ul>
    @foreach ($data["infopenting"] as $info)
        <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
    @endforeach
        <li><p class="font-standar"> <b>-</b> <a href="/detailkegiatan.php?kegiatan={{ $data["linkkegiatan"] }}" target="_blank">Kegiatan Romantik</a></p></li>
        <li><p class="font-standar"> <b>-</b> <a href="https://romantik.web.bps.go.id/" target="_blank">Web Romantik</a></p></li>
</ul>
@elseif ($data["indikator"] === "i4")
<ul>
    @foreach ($data["infopenting"] as $info)
        <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
    @endforeach
        <li><p class="font-standar"> <b>-</b> <a href="/detailkegiatan.php?kegiatan={{ $data["linkkegiatan"] }}" target="_blank">Kegiatan Metadata</a></p></li>
        <li><p class="font-standar"> <b>-</b> <a href="https://indah.bps.go.id/" target="_blank">Web Indah</a></p></li>
</ul>
@elseif ($data["indikator"] === "i5")
<ul>
    @foreach ($data["infopenting"] as $info)
        <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
    @endforeach
        <li><p class="font-standar"> <b>-</b> <a href="/detailkegiatan.php?kegiatan={{ $data["linkkegiatan"] }}" target="_blank">Kegiatan Pembinaan Statistik</a></p></li>
        <li><p class="font-standar"> <b>-</b> <a href="https://s.bps.go.id/dok_pembinaan" target="_blank">Aplikasi Dokumentasi Pembinaan Statistik</a></p></li>
</ul>
@elseif ($data["indikator"] === "i6")
<ul>
    @foreach ($data["infopenting"] as $info)
        <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
    @endforeach
        <li><p class="font-standar"> <b>-</b> <a href="/detailkegiatan.php?kegiatan={{ $data["linkkegiatan"] }}" target="_blank">Kegiatan SAKIP</a></p></li>
</ul>
@elseif ($data["indikator"] === "i7")
    <li class="font-standar">Realisasi Indikator ini berasal dari hasil Survei Kebutuhan Data (SKD)  masing-masing satker</li>
    <br>
    <ul>
        <li><p class="font-standar"> <b>-</b> <a href="https://bupesta.web.bps.go.id/detailkegiatan.php?kegiatan=9N08F80EzIK" target="_blank">KEGIATAN SKD</a></p></li>
        <li><p class="font-standar"> <b>-</b> <a href="https://skd.bps.go.id/SKD2024" target="_blank">DATA SKD</a></p></li>
    </ul>
    <br>
    <li class="font-standar">Terdapat indikator penunjang pada FRA untuk secara tidak langsung memonitor capaian indikator ini, yaitu</li>
    <br>
    <ul>
        <li><p class="font-standar"> <b>-</b> Persentase sarana prasarana dalam kondisi baik</p></li>
        <li><p class="font-standar"> <b>-</b> Jumlah pengunjung langsung Pelayanan Statistik Terpadu (PST)</p></li>
    </ul>
@else
    <ul>
        <li><p class="font-standar"> <b>-</b> {{ $data["detail_indikator"] }}</p></li>
    @foreach ($data["infopenting"] as $info)
        <li><p class="font-standar"> <b>-</b> {{ $info->info }}</p></li>
    @endforeach
    </ul>
@endif
<br>