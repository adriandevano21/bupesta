<?php
$query_iks = "SELECT * FROM kinerja_indikator where status='suplemen' and satker='$satker' ORDER BY LPAD(lower(kode_indikator), 6, 0) asc;";
$result_iks = mysqli_query($conn, $query_iks);
while ($data_iks = mysqli_fetch_array($result_iks, MYSQLI_ASSOC)) {

    switch (true) {
      case $data_iks['target_setahun'] == 0 :
        $pilihanwarna = "abu-tua";
        $pilihanicon = "fa-regular fa-star font-super-besar abu-abu";
        $pilihanketerangan = "Tidak Ada Target";
        break;
      default:
        $hitungdulu = $data_iks['realisasi_setahun'] / $data_iks['target_setahun'] * 100;  
        switch (true) {
          case $hitungdulu >= 120 :
            $pilihanwarna = "emas";
            $pilihanicon = "fa-solid fa-medal font-super-besar emas";
            $pilihanketerangan = "Target Terlampaui Maksimal";
            break;
          case $hitungdulu > 100 :
            $pilihanwarna = "biru";
            $pilihanicon = "fa-solid fa-star font-super-besar biru";
            $pilihanketerangan = "Target Terlampaui";
            break;
          case $hitungdulu == 100 :
            $pilihanwarna = "hijau";
            $pilihanicon = "fa-solid fa-star font-super-besar hijau";
            $pilihanketerangan = "Target Tercapai";
            break;
          default:
            $pilihanwarna = "merah";
            $pilihanicon = "fa-regular fa-star font-super-besar merah";
            $pilihanketerangan = "Target Belum Tercapai";
            break;
        }
        break;
    }    
    ?>
    <a href="/dashboard-kinerja.php?satker=<?php echo $satker; ?>&indikator=<?php echo $data_iks['kode_indikator']; ?>" style="text-decoration: none; color: inherit;">
        <div class="kotak-flex-indikator bg-abu-abu border-kiri-<?php echo $pilihanwarna; ?>">
          <div class="kotak-flex-s" style="background-color:grey;">
            <p class="font-besar putih"><b><?php echo $data_iks['kode_indikator']; ?></b></p>
          </div>
          <div class="kotak-flex-nama-indikator">
            <div class="font-standar"><?php if ($pilihanwarna!="abu-tua") { echo "<b>"; } ?><?php echo $data_iks['nama_indikator']; ?><?php if ($pilihanwarna!="abu-tua") { echo "</b>"; } ?></div><div class="font-mini <?php echo $pilihanwarna; ?>"><?php echo $pilihanketerangan; ?> (<?php echo $data_iks['satuan']; ?>)</div>
          </div>
          <div class="kotak-flex-realisasi">
            <div class="font-standar <?php echo $pilihanwarna; ?>"><b><?php echo $data_iks['realisasi_setahun']; ?></b></div><div class="font-mini"><?php echo $data_iks['target_setahun']; ?></div>
          </div>
          <div class="kotak-flex-icon  bg-putih border-<?php echo $pilihanwarna; ?>">
            <i class="<?php echo $pilihanicon; ?>"></i>
          </div>
        </div>  
    </a>
<?php } ?>