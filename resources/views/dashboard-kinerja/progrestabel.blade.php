<table class="table-sortable" id="tabel" style="text-align: center">
    {{-- <thead>
        <tr>
            <th rowspan="3">Satker</th>
            <th colspan="6">Perjanjian Kinerja</th>
            <th colspan="4">Capaian Kinerja</th>
        </tr>
        <tr>
            <th rowspan="2">Target</th>
            <th rowspan="2">Realisasi</th>
            <th colspan="4">Realisasi Kumulatif</th>
            <th colspan="4">Terhadap Target Setahun</th>
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
    </thead> --}}
    @if ( $data["statusindikator"] == 'utama' )
        <thead>
            <tr>
                <th style="font-size: 0.6vw">(1)</th>
                <th style="font-size: 0.6vw">(2)</th>
                <th style="font-size: 0.6vw">(3)</th>
                <th style="font-size: 0.6vw">(4)</th>
                <th style="font-size: 0.6vw">(5)</th>
                <th style="font-size: 0.6vw">(6)</th>
                <th style="font-size: 0.6vw">(7)</th>
                <th style="font-size: 0.6vw">(8)</th>
                <th style="font-size: 0.6vw">(9)</th>
                <th style="font-size: 0.6vw">(10)</th>
                <th style="font-size: 0.6vw">(11)</th>
                <th style="font-size: 0.6vw">(12)</th>
                <th style="font-size: 0.6vw">(13)</th>
                <th style="font-size: 0.6vw">(14)</th>
                <th style="font-size: 0.6vw">(15)</th>
                <th style="font-size: 0.6vw">(16)</th>
                <th style="font-size: 0.6vw">(17)</th>
                <th style="font-size: 0.6vw">(18)</th>
            </tr>
            <tr>
                <th rowspan="3">Satker</th>
                <th rowspan="3">Satuan</th>
                <th colspan="8">Perjanjian Kinerja</th>
                <th colspan="8">Capaian Kinerja</th>
            </tr>
            <tr>
                <th colspan="4">Target Kumulatif</th>
                <th colspan="4">Realisasi Kumulatif</th>
                <th colspan="4">Kumulatif</th>
                <th colspan="4">Terhadap Target Setahun</th>
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

        <tbody>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] !== '1100' )
                    <tr>
                        <td style="text-align: left">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td>{{ $datatable["satuan"] }}</td>
                        <td>{{ $datatable["pk_target_1"] }}</td>
                        <td>{{ $datatable["pk_target_2"] }}</td>
                        <td>{{ $datatable["pk_target_3"] }}</td>
                        <td>{{ $datatable["pk_target_4"] }}</td>
                        <td>{{ $datatable["pk_realisasi_1"] }}</td>
                        <td>{{ $datatable["pk_realisasi_2"] }}</td>
                        <td>{{ $datatable["pk_realisasi_3"] }}</td>
                        <td>{{ $datatable["pk_realisasi_4"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>

        <tfoot>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] === '1100' )
                    <tr>
                        <td style="text-align: left; background: {{ $datatable["warna"] }}">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["satuan"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_target_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_target_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_target_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_target_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_realisasi_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_realisasi_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_realisasi_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_realisasi_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tfoot>
    @elseif ( $data["statusindikator"] == 'suplemen' )
        <thead>
            <tr>
                <th style="font-size: 0.6vw">(1)</th>
                <th style="font-size: 0.6vw">(2)</th>
                <th style="font-size: 0.6vw">(3)</th>
                <th style="font-size: 0.6vw">(4)</th>
                <th style="font-size: 0.6vw">(5)</th>
                <th style="font-size: 0.6vw">(6)</th>
                <th style="font-size: 0.6vw">(7)</th>
                <th style="font-size: 0.6vw">(8)</th>
                <th style="font-size: 0.6vw">(9)</th>
                <th style="font-size: 0.6vw">(10)</th>
                <th style="font-size: 0.6vw">(11)</th>
            </tr>
            <tr>
                <th rowspan="3">Satker</th>
                <th rowspan="3">Satuan</th>
                <th rowspan="3">Target</th>
                <th colspan="8">Capaian Kinerja</th>
            </tr>
            <tr>
                <th colspan="4">Kumulatif</th>
                <th colspan="4">Terhadap Target Setahun</th>
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

        <tbody>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] !== '1100' )
                    <tr>
                        <td style="text-align: left">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td>{{ $datatable["satuan"] }}</td>
                        <td>{{ $datatable["pk_target_4"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>

        <tfoot>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] === '1100' )
                    <tr>
                        <td style="text-align: left; background: {{ $datatable["warna"] }}">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["satuan"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["pk_target_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tfoot>
    @else
        <thead>
            <tr>
                <th style="font-size: 0.6vw">(1)</th>
                <th style="font-size: 0.6vw">(2)</th>
                <th style="font-size: 0.6vw">(3)</th>
                <th style="font-size: 0.6vw">(4)</th>
                <th style="font-size: 0.6vw">(5)</th>
                <th style="font-size: 0.6vw">(6)</th>
                <th style="font-size: 0.6vw">(7)</th>
                <th style="font-size: 0.6vw">(8)</th>
                <th style="font-size: 0.6vw">(9)</th>
                <th style="font-size: 0.6vw">(10)</th>
            </tr>
            <tr>
                <th rowspan="3">Satker</th>
                <th rowspan="3">Satuan</th>
                <th colspan="8">Capaian Kinerja</th>
            </tr>
            <tr>
                <th colspan="4">Kumulatif</th>
                <th colspan="4">Terhadap Target Setahun</th>
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

        <tbody>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] !== '1100' )
                    <tr>
                        <td style="text-align: left">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td>{{ $datatable["satuan"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td>{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td>{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>

        <tfoot>
            @foreach ($data["datatabel"] as $datatable)
                @if ( $datatable["kode_satker"] === '1100' )
                    <tr>
                        <td style="text-align: left; background: {{ $datatable["warna"] }}">{{ $datatable["kode_satker"] }} {{ $datatable["nama_satker"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["satuan"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_kumulatif_4"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_1"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_2"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_3"] }}</td>
                        <td style="background: {{ $datatable["warna"] }}">{{ $datatable["capkin_target_tahun_4"] }}</td>
                    </tr>
                @endif
            @endforeach
        </tfoot>
    @endif
</table>

<script>
  /**
   * Sorts a HTML table.
   *
   * @param {HTMLTableElement} table The tabel to sort
   * @param {number} column The index of the column to sort
   * @param {boolean} asc Determins it the sorting will be in ascending
   */

  function sortTableByColumn(table, column, asc = true) {
      const dirModifier = asc ? 1 : -1;
      const tBody = table.tBodies[0];
      const rows = Array.from(tBody.querySelectorAll("tr"));

      // sort each row
      const sortedRows = rows.sort((a, b) => {
          const aColText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
          const bColText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

          if (isNaN(parseFloat(aColText)) && isNaN(parseFloat(bColText))) {
              return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
          }
          return +aColText > +bColText ? (1 * dirModifier) : (-1 * dirModifier);
      });

      // Remove all existing TRs from the table
      while (tBody.firstChild) {
          tBody.removeChild(tBody.firstChild);
      }

      // Re-add the newly sorted rows
      tBody.append(...sortedRows);

      // Remember how the column is currently sorted 
      table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
      table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
      table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);

  }


  document.querySelectorAll(".table-sortable th").forEach(headerCell => {
      headerCell.addEventListener("click", () => {
          const tableElement = headerCell.parentElement.parentElement.parentElement;
          const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
          const currentIsAscending = headerCell.classList.contains("th-sort-asc");

          sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
      });
  });

</script>