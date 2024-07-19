<?php
if(empty($_GET['indikator']))
    { 
        $query_satker = "SELECT DISTINCT satker FROM kinerja_indikator where status='utama' ORDER BY satker;";
        $result_satker = mysqli_query($conn, $query_satker);
        while ($data_satker = mysqli_fetch_array($result_satker, MYSQLI_ASSOC)) {
        
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
                
                <div class="item border-abu-abu" style="--clr: <?php echo $pilihanwarna; ?>; --val: <?php echo $rataratacapaian; ?>"><div class="label"><?php echo substr("$data_satker[satker]", 2, 2); ?></div><div class="value"><?php echo $rataratacapaian; ?></div></div>
        
                <?php
            };  
    }
else 
    {
        $indikator = $_GET['indikator']; 
        $query_satker = "SELECT DISTINCT satker FROM kinerja_indikator where kode_indikator='$indikator' ORDER BY satker;";
        $result_satker = mysqli_query($conn, $query_satker);
        while ($data_satker = mysqli_fetch_array($result_satker, MYSQLI_ASSOC)) {
        
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
                
                <div class="item border-abu-abu" style="--clr: <?php echo $pilihanwarna; ?>; --val: <?php echo $rataratacapaian; ?>"><div class="label"><?php echo substr("$data_satker[satker]", 2, 2); ?></div><div class="value"><?php echo $rataratacapaian; ?></div></div>
        
                <?php
            };  
    }
?>