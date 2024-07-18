<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Poppins Google -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <!-- Icon Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Fitral CSS -->
    <link rel="stylesheet" href="{{ asset('fitral/') }}/style/dashboard-simple.css">
    <link rel="stylesheet" href="{{ asset('fitral/') }}/style/sidebar.css">
    <link rel="stylesheet" href="{{ asset('fitral/') }}/style/load.css">
    <script src="{{ asset('fitral/') }}/style/load.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('fitral/') }}/img/favicon.png">
    <title>BuPeSta - {{ $data['judul'] }}</title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-61TSDP49BB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-61TSDP49BB');
    </script>

</head>

<body>
    <div class="full-hitam">
        <div class="phone"></div>
        <div class="mess">silahkan putar browser perangkat anda menjadi horizontal</div>
    </div>

    <div id="loading">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <div id="page">

        <div class="layar-penuh">
            <div class="kotak-flex-menu">
                @include('layout.sidebardashboard')
            </div>
            <div class="kotak-isi">
                <div class="kotak-flex-judul font-besar">
                    <div class="kotak-judul">
                        <a>
                            <b>Dashboard Kinerja BPS Provinsi/Kabupaten/Kota se-Aceh Tahun 2024</b>
                        </a>
                    </div>
                </div>
                <div class="kotak-flex-tengah">
                    <div class="kotak-flex-24-satker">
                        <div class="kotak-flex-24-satker-judul font-standar">
                            {{ $data['detail_indikator'] }}
                        </div>
                        <input type="radio" class="radio" name="pilihan-tampil" value="ProgresBar"
                            onclick="getvalue()" id="ProgresBar"
                            {{ $data['view'] === 'ProgresBar' ? 'checked' : '' }}><label for="ProgresBar"
                            class="label-radio font-standar">Progres Bar</label>
                        <input type="radio" class="radio" name="pilihan-tampil" value="ProgresTabel"
                            onclick="getvalue()" id="ProgresTabel"
                            {{ $data['view'] === 'ProgresTabel' ? 'checked' : '' }}><label for="ProgresTabel"
                            class="label-radio font-standar">Tabel</label>
                        <input type="radio" class="radio" name="pilihan-tampil" value="ProgresInfo"
                            onclick="getvalue()" id="ProgresInfo"
                            {{ $data['view'] === 'ProgresInfo' ? 'checked' : '' }}><label for="ProgresInfo"
                            class="label-radio font-standar">Info Penting</label>

                        <div class="isi-progres-bar">
                            <div class="simple-bar-chart bg-putih">
                                @include('dashboard-kinerja.progresbar')
                                <div class="legenda">
                                    <div class="bg-merah kotak-legenda"></div>
                                    <div class="font-agak-mini">&nbsp Belum Tercapai &nbsp&nbsp</div>
                                    <div class="bg-hijau kotak-legenda"></div>
                                    <div class="font-agak-mini">&nbsp Tercapai &nbsp&nbsp</div>
                                    <div class="bg-biru kotak-legenda"></div>
                                    <div class="font-agak-mini">&nbsp Terlampaui &nbsp&nbsp</div>
                                    <div class="bg-emas kotak-legenda border-abu-abu"></div>
                                    <div class="font-agak-mini">&nbsp Terlampaui Maksimal &nbsp&nbsp</div>
                                </div>
                            </div>
                        </div>
                        <div class="isi-progres-tabel">
                            <div class="table-container">
                                @include('dashboard-kinerja.progrestabel')
                            </div>
                        </div>
                        <div class="isi-progres-info">
                            <div class="info-container bg-putih">
                                @include('dashboard-kinerja.infopenting')
                            </div>
                        </div>
                    </div>
                    <div class="kotak-flex-suplemen">
                        <div class="kotak-flex-indikator-2-kolom putih font-besar" style="background-color:grey;">10
                            Indikator Suplemen (Target Tahunan)</div>
                        @include('dashboard-kinerja.indikator-suplemen')
                    </div>
                </div>
                <div class="kotak-flex-kanan bg-abu-abu">
                    <div class="kotak-flex-satker font-standar">
                        <form action="dashboard-kinerja" method="GET">
                            <div style="margin-bottom: 0.2vw">
                                <label for="satker" class="font-standar">Satker &nbsp&nbsp&nbsp:</label>
                                <select onchange="this.form.submit();" name="satker" id="satker"
                                    class="font-standar">
                                    @foreach ($data['listsatker'] as $listsatker)
                                        <option value="{{ $listsatker->kode_satker }}" class="font-standar"
                                            {{ $data['satker'] === $listsatker->kode_satker ? 'selected' : '' }}>
                                            {{ $listsatker->nama_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="periode" class="font-standar" style="padding-top: 0.4vw">Periode &nbsp:</label>
                            <select onchange="this.form.submit();" name="periode" id="periode" class="font-standar">
                                <option value="tr1" class="font-standar"
                                    {{ $data['periode'] === 'tr1' ? 'selected' : '' }}>Triwulan 1</option>
                                <option value="tr2" class="font-standar"
                                    {{ $data['periode'] === 'tr2' ? 'selected' : '' }}>Triwulan 2</option>
                                <option value="tr3" class="font-standar"
                                    {{ $data['periode'] === 'tr3' ? 'selected' : '' }}>Triwulan 3</option>
                                <option value="th" class="font-standar"
                                    {{ $data['periode'] === 'th' ? 'selected' : '' }}>Tahunan</option>
                            </select>
                            <input type="text" name="indikator" id="indikator" value="{{ $data['indikator'] }}"
                                hidden>
                            <input type="text" name="view" id="view" value="{{ $data['view'] }}" hidden>
                        </form>
                    </div>
                    <a href="/dashboard-kinerja?satker={{ $data['satker'] }}&periode={{ $data['periode'] }}&indikator=capkin&view={{ $data['view'] }}"
                        style="text-decoration: none; color: inherit;">
                        <div class="kotak-flex-judul-pie bg-putih">
                            <div class="judul-capkin-pie font-semi-besar">Rata-rata Capaian Kinerja (%)</div>
                            <!-- <div class="judul-capkin-pie font-semi-besar"><b>2024</b></div> -->
                        </div>
                        <div class="kotak-flex-pie bg-putih">
                            <div class="capkin-pie">
                                @if ($data['capaian_satker'] >= 100)
                                    <div class="pie no-round" style="--p:100;--c:lightgrey;"></div>
                                    <div class="pie animate"
                                        style="--p:100;--c:{{ $data['warna_capaian_satker'] }};"><span
                                            style="font-size: 1.5vw;display:inline-grid;vertical-align:bottom; font-weight:bold">{{ $data['capaian_satker'] }}</span>
                                    </div>
                                    <div class="panah animate"
                                        style="--p:100;--c:{{ $data['warna_capaian_satker'] }};"></div>
                                    <div class="pangkal animate" style="--c:{{ $data['warna_capaian_satker'] }};">
                                    </div>
                                @else
                                    <div class="pie no-round" style="--p:100;--c:lightgrey;"></div>
                                    <div class="pie animate"
                                        style="--p:{{ $data['capaian_satker'] }};--c:{{ $data['warna_capaian_satker'] }};">
                                        <span
                                            style="font-size: 1.5vw;display:inline-grid;vertical-align:bottom; font-weight:bold">{{ $data['capaian_satker'] }}</span>
                                    </div>
                                    <div class="panah animate"
                                        style="--p:{{ $data['capaian_satker'] }};--c:{{ $data['warna_capaian_satker'] }};">
                                    </div>
                                    <div class="pangkal animate" style="--c:{{ $data['warna_capaian_satker'] }};">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="kotak-flex-iku ">
                        <div class="kotak-flex-indikator-utama putih font-besar" style="background-color:grey;">
                            7&nbsp&nbspIndikator Kinerja Utama</div>
                        @include('dashboard-kinerja.indikator-utama')
                    </div>
                </div>
                <div class="kotak-flex-footer bg-abu-abu">
                    <div class="kotak-footer">
                        <a>
                            <i class="fa-solid fa-mug-hot">&nbsp Tim Pengolahan dan TI - BPS Provinsi Aceh</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getvalue() {
            document.getElementById("view").value = event.target.value;
            var view = event.target.value;
            window.location.href =
                "/dashboard-kinerja?satker={{ $data['satker'] }}&periode={{ $data['periode'] }}&indikator={{ $data['indikator'] }}&view=" +
                view + "";
        }
    </script>

</body>

</html>
