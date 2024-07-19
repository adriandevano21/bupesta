<table class="table-sortable">
      <thead>
        <tr><th rowspan="3">Satker</th>                                           <th colspan="6">Perjanjian Kinerja</th>                                                <th colspan="4">Capaian Kinerja</th></tr>
        <tr>                           <th rowspan="2">Satuan</th><th rowspan="2">Target</th>                <th colspan="4">Realisasi Kumulatif</th>            <th colspan="4">Terhadap Target Setahun</th></tr>
        <tr>                                                                                 <th>TW I</th><th>TW II</th><th>TW III</th><th>TW IV</th><th>TW I</th><th>TW II</th><th>TW III</th><th>TW IV</th></tr>
      </thead>
                 
      <tbody>
        <?php if(empty($_GET['indikator']))
            { 
            $query_satker = "SELECT DISTINCT satker FROM kinerja_indikator where status='utama' ORDER BY satker;";
            $result_satker = mysqli_query($conn, $query_satker);
            while ($data_satker = mysqli_fetch_array($result_satker, MYSQLI_ASSOC)) 
                    {
            
                    $totalpersen = array();
                    $query_iku = "SELECT * FROM kinerja_indikator where status='utama' and satker='$data_satker[satker]' ORDER BY kode_indikator;";
                    $result_iku = mysqli_query($conn, $query_iku);
                    while ($data_iku = mysqli_fetch_array($result_iku, MYSQLI_ASSOC)) {
                        $hitungdulu = $data_iku['realisasi_setahun'] / $data_iku['target_setahun'] * 100;
                        array_push($totalpersen, $hitungdulu);
                        };
                    $rataratacapaian = number_format((array_sum($totalpersen) / 7),0);
                    
                    switch (true) {
                      case $rataratacapaian >= 120 :
                        $pilihanwarna = "#E4BB05";
                        break;
                      case $rataratacapaian > 100 :
                        $pilihanwarna = "#659cef";
                        break;
                      case $rataratacapaian == 100 :
                        $pilihanwarna = "#4FCF05";
                        break;
                      default:
                        $pilihanwarna = "#EF6565";
                        break;
                        } ?>
                    
                    <tr><td><?php echo substr("$data_satker[satker]", 2, 2); ?></td><td><?php echo $rataratacapaian; ?></td></tr>
            
                    <?php
                    };  
            }
            else {
                
            }?>
        
      </tbody>
      
      <tfoot>
        <tr><td>1100 BPS Provinsi Aceh</td><td>Footer</td><td>Footer</td><td>Footer</td><td>Footer</td><td>Footer</td><th>Footer</th><th>Footer</th></tr>
      </tfoot>
</table>

<script>              /**
  * Sorts a HTML table.
  *
  * @param {HTMLTableElement} table The tabel to sort
  * @param {number} column The index of the column to sort
  * @param {boolean} asc Determins it the sorting will be in ascending
  */

  function sortTableByColumn(table, column, asc = true){
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));
    
    // sort each row
    const sortedRows = rows.sort((a, b) =>{
      const aColText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
      const bColText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

      if (isNaN(parseFloat(aColText)) && isNaN(parseFloat(bColText))) {
        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
      }
      return +aColText > +bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });
    
    // Remove all existing TRs from the table
    while(tBody.firstChild){
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