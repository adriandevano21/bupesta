<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>BuPeSta - {{ $data['judul'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('fitral/') }}/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('fitral/') }}/style/loading.css">
    <link rel="stylesheet" href="{{ asset('fitral/') }}/style/sidebar-all.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/5.0.0/css/fixedColumns.dataTables.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('file/') }}/bootstrap-4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('file/') }}/select2.min.css">
    <link rel="stylesheet" href="{{ asset('file/') }}/select2-bootstrap4.min.css">

    {{-- Style Datatable --}}
    <style>
        th,
        td {
            font-size: 11px;
            text-align: center !important;
            vertical-align: top;
        }

        div.dataTables_wrapper {
            margin: 0 auto;
        }

        @media (min-width: 1600px) {
            .container {
                max-width: 90vw !important;
            }
        }
    </style>
</head>

<body>
    <div id="loading-overlay">
        <div class="spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
    <?php $id = Session::get('id'); ?>
    <div class="wrapper">
        <aside id="sidebar">
            @include('layout.sidebar')
        </aside>
        <div class="main">
            <div class="container mt-4">
                <h6><b>Form Kinerja Satuan Kerja Tahun {{ $data['tahun'] }}</b></h6>
                <hr>
            </div>
            <div class="container" style="font-size: 10px">
                <form action="entri-kinerja" method="GET">
                    <div class="row mt-2" id="main">
                        <div class="col-auto" style="width: 170px">
                            <input type="text" readonly class="form-control-plaintext" style="font-weight: bold"
                                id="satker" value="Pilih Satuan Kerja">
                        </div>
                        <div class="col-auto" style="width: 400px;">
                            <select onchange="this.form.submit();" name="satker" id="satker"
                                class="form-control select2" style="font-size: 10px"
                                aria-label="Default select example">
                                {{-- @if (auth()->user()->kode_satker === '1100')
                                    @foreach ($data['listsatker'] as $listsatker)
                                        <option value="{{ $listsatker->kode_satker }}" class="font-standar"
                                            {{ $data['satker'] === $listsatker->kode_satker ? 'selected' : '' }}>
                                            {{ $listsatker->nama_satker }}</option>
                                    @endforeach
                                @else
                                    @foreach ($data['listsatker'] as $listsatker)
                                        @if (auth()->user()->kode_satker === $listsatker->kode_satker)
                                            <option value="{{ $listsatker->kode_satker }}" class="font-standar"
                                                {{ $data['satker'] === $listsatker->kode_satker ? 'selected' : '' }}>
                                                {{ $listsatker->nama_satker }}</option>
                                        @endif
                                    @endforeach
                                @endif --}}
                                @foreach ($data['listsatker'] as $listsatker)
                                    <option value="{{ $listsatker->kode_satker }}" class="font-standar"
                                        {{ $data['satker'] === $listsatker->kode_satker ? 'selected' : '' }}>
                                        {{ $listsatker->nama_satker }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-auto" style="width: 170px">
                            <input type="text" readonly class="form-control-plaintext" style="font-weight: bold"
                                id="indikator" value="Indikator Kinerja">
                        </div>
                        <div class="col-auto" style="width: 400px">
                            <select onchange="this.form.submit();" name="indikator" id="indikator"
                                class="form-control select2" style="font-size: 10px"
                                aria-label="Default select example">
                                <option value="1" {{ $data['indikator'] === '1' ? 'selected' : '' }}
                                    class="font-standar">Utama</option>
                                <option value="2" {{ $data['indikator'] === '2' ? 'selected' : '' }}
                                    class="font-standar">Suplemen</option>
                            </select>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-auto">
                    <div class="row mt-2">
                        <div class="col-auto" style="width: auto">
                            @if ($data['indikator'] === '1')
                                @include('dashboard-kinerja.entri-kinerja.iku')
                            @else
                                @include('dashboard-kinerja.entri-kinerja.iks')
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    {{-- Target --}}
    <div class="modal fade" id="update-target-kinerja" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #3ecbff">
                    <h5 class="modal-title" id="exampleModalLabel">Update Target Kinerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/update-kinerja" enctype="multipart/form-data" id="form-update-target">
                    @csrf
                    <div class="modal-body">
                        <input style="font-size: 8pt" type="text" name="id" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" disabled>
                            {{-- <label nama="keterangan" id="keterangan1"></label> --}}
                            <input type="text" class="form-control" name="periode" id="periode-target">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Bukti Dukung</label>
                            <input class="form-control" type="file" id="formFile">
                        </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update!!!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Realisasi --}}
    <div class="modal fade" id="update-realisasi-kinerja" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #3ecbff">
                    <h5 class="modal-title" id="exampleModalLabel">Update Realisasi Kinerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/update-kinerja" enctype="multipart/form-data"
                    id="form-update-realisasi">
                    @csrf
                    <div class="modal-body">
                        <input style="font-size: 8pt" type="text" name="id" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" disabled>
                            {{-- <label nama="keterangan" id="keterangan1"></label> --}}
                            <input type="text" class="form-control" name="periode" id="periode-realisasi">
                        </div>
                        <div class="mb-3">
                            <label for="formFile-BuktiDukung" class="form-label">Upload Bukti Dukung</label>
                            <input class="form-control" type="file" id="formFile-BuktiDukung">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update!!!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Analisis Triwulanan --}}
    <div class="modal fade" id="update-analisis-tr" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #3ecbff">
                    <h5 class="modal-title" id="exampleModalLabel">Input Analisis Triwulanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/analisis-triwulanan" enctype="multipart/form-data"
                    id="form-update-analtri">
                    @csrf
                    <div class="modal-body">
                        <input style="font-size: 8pt" type="text" name="id" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" disabled>
                            {{-- <label nama="keterangan" id="keterangan1"></label> --}}
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        {{-- <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Bukti Dukung</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update!!!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/fixedColumns.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Select2 -->
    <script src="{{ asset('file/') }}/select2.full.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('file/') }}/sweetalert2.min.js"></script>

    <!-- DataTabel -->
    <script>
        var table = $('#tabeliku').DataTable({
            "columnDefs": [{
                    width: '0.1vw',
                    targets: 0
                },
                {
                    width: '12vw',
                    targets: 1
                },
                {
                    width: '5.5vw',
                    targets: 2
                },
                {
                    width: '5.5vw',
                    targets: 3
                },
                {
                    width: '5.5vw',
                    targets: 4
                },
                {
                    width: '5.5vw',
                    targets: 5
                },
                {
                    width: '5.5vw',
                    targets: 6
                },
                {
                    width: '5.5vw',
                    targets: 7
                },
                {
                    width: '5.5vw',
                    targets: 8
                },
                {
                    width: '5.5vw',
                    targets: 9
                },
                {
                    width: '5.5vw',
                    targets: 10
                },
                {
                    width: '5.5vw',
                    targets: 11
                },
                {
                    width: '5.5vw',
                    targets: 12
                },
                {
                    width: '5.5vw',
                    targets: 13
                },
                {
                    width: '5.5vw',
                    targets: 14
                },
                {
                    width: '5.5vw',
                    targets: 15
                },
                {
                    width: '5.5vw',
                    targets: 16
                },
                {
                    width: '5.5vw',
                    targets: 17
                },
                {
                    width: '5.5vw',
                    targets: 18
                },
                {
                    width: '5.5vw',
                    targets: 19
                },
                {
                    width: '5.5vw',
                    targets: 20
                },
                {
                    width: '5.5vw',
                    targets: 21
                },
                {
                    width: '5.5vw',
                    targets: 22
                },
                {
                    width: '5.5vw',
                    targets: 23
                },
                {
                    width: '5.5vw',
                    targets: 24
                },
                {
                    width: '5.5vw',
                    targets: 25
                },
                {
                    width: '5.5vw',
                    targets: 26
                },
                {
                    width: '5.5vw',
                    targets: 27
                },
                {
                    width: '5.5vw',
                    targets: 28
                },
                {
                    width: '5.5vw',
                    targets: 29
                },
            ],
            "processing": true,
            "scrollY": '45vh',
            "scrollCollapse": true,
            "paging": false,
            "ordering": false,
            "scrollX": true,
            "paging": false,
            "fixedColumns": {
                start: 3
            }
        });

        var table2 = $('#tabeliks').DataTable({
            "columnDefs": [{
                    width: '0.1vw',
                    targets: 0
                },
                {
                    width: '12vw',
                    targets: 1
                },
                {
                    width: '5.5vw',
                    targets: 2
                },
                {
                    width: '5.5vw',
                    targets: 3
                },
                {
                    width: '5.5vw',
                    targets: 4
                },
                {
                    width: '5.5vw',
                    targets: 5
                },
                {
                    width: '5.5vw',
                    targets: 6
                },
                {
                    width: '5.5vw',
                    targets: 7
                },
                {
                    width: '5.5vw',
                    targets: 8
                },
                {
                    width: '5.5vw',
                    targets: 9
                },
                {
                    width: '5.5vw',
                    targets: 10
                },
                {
                    width: '5.5vw',
                    targets: 11
                },
            ],
            "processing": true,
            "scrollY": '45vh',
            "scrollCollapse": true,
            "paging": false,
            "ordering": false,
            "scrollX": true,
            "paging": false,
            "fixedColumns": {
                start: 3
            }
        });
    </script>

    <!-- Loading Page -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loadingOverlay = document.getElementById("loading-overlay");
            const content = document.getElementById("content");

            // Simulate a loading delay (e.g., fetch data or wait for images to load)
            setTimeout(() => {
                loadingOverlay.style.opacity = '0';
                setTimeout(() => {
                    loadingOverlay.style.display = 'none';
                }, 500);
            }, 10); // Adjust the delay as needed
        });
    </script>

    <!-- Tooltip Icon -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <!-- Tanda Ribuan -->
    {{-- <script>
        function formatNumber(num) {
            return num.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function handleInputEvent(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');
            if (value.includes(',')) {
                let parts = value.split(',');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                value = parts.join(',');
            } else {
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            e.target.value = value;
        }

        function handleBlurEvent(e) {
            let value = e.target.value.replace(/\./g, '').replace(',', '.');
            let num = parseFloat(value);
            if (!isNaN(num)) {
                e.target.value = formatNumber(num);
            } else {
                e.target.value = '';
            }
        }

        document.querySelectorAll('.numberInput').forEach(function(element) {
            // Format the value initially if it exists
            let initialValue = parseFloat(element.value.replace(',', '.'));
            if (!isNaN(initialValue)) {
                element.value = formatNumber(initialValue);
            }

            element.addEventListener('input', handleInputEvent);
            element.addEventListener('blur', handleBlurEvent);
        });

        document.getElementById('submitButton').addEventListener('click', function() {
            let dataToSubmit = {};
            document.querySelectorAll('.numberInput').forEach(function(element, index) {
                // Get the value and convert to English format
                let value = element.value.replace(/\./g, '').replace(',', '.');
                dataToSubmit[`numberInput${index + 1}`] = parseFloat(value);
            });

            // Here you can send dataToSubmit to your server
            console.log(dataToSubmit);
        });
    </script> --}}

    <!-- Modal Update Kinerja -->
    <script>
        function showEntriTarget(id, tr, periode, ket_periode) {
            console.log(id, tr, periode, ket_periode);
            $("#update-target-kinerja").modal('show');
            $("#form-update-target [name='id']").val(id);
            $("#form-update-target [id='periode-target']").val(tr);
            $("#form-update-target [name='keterangan']").val(ket_periode);
            document.getElementById("periode-target").setAttribute("name", periode);
        }

        function showEntriRealisasi(id, tr, periode, ket_periode) {
            console.log(id, tr, periode, ket_periode);
            $("#update-realisasi-kinerja").modal('show');
            $("#form-update-realisasi [name='id']").val(id);
            $("#form-update-realisasi [id='periode-realisasi']").val(tr);
            $("#form-update-realisasi [name='keterangan']").val(ket_periode);
            document.getElementById("periode-realisasi").setAttribute("name", periode);
        }

        function showEntriAnalisisTr(id, tr, periode, ket_periode) {
            console.log(id, tr, periode, ket_periode);
            $("#update-analisis-tr").modal('show');
            $("#form-update-analtri [name='id']").val(id);
            $("#form-update-analtri [id='periode-analtri']").val(tr);
            $("#form-update-analtri [name='keterangan']").val(ket_periode);
            document.getElementById("periode-analtri").setAttribute("name", periode);
        }
    </script>

</body>

</html>
