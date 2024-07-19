<?php
/* if(empty($_POST['ubah_satker'])){ $satker = '1100'; } else { $satker = $_POST['ubah_satker']; } */
$query_iku = "SELECT * FROM kinerja_indikator where status='utama' and satker='$satker' ORDER BY kode_indikator;";
$result_iku = mysqli_query($conn, $query_iku);
while ($data_iku = mysqli_fetch_array($result_iku, MYSQLI_ASSOC)) {

    $hitungdulu = $data_iku['realisasi_setahun'] / $data_iku['target_setahun'] * 100;
    
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
    ?>
    <a href="/dashboard-kinerja.php?satker=<?php echo $satker; ?>&indikator=<?php echo $data_iku['kode_indikator']; ?>" style="text-decoration: none; color: inherit;">
        <div class="kotak-flex-indikator bg-putih border-kiri-<?php echo $pilihanwarna; ?>">
          <div class="kotak-flex-s" style="background-color:grey;">
            <p class="font-super-besar putih"><b><?php echo $data_iku['kode_indikator']; ?></b></p>
          </div>
          <div class="kotak-flex-nama-indikator">
            <div class="font-standar"><b><?php echo $data_iku['nama_indikator']; ?></b></div><div class="font-mini <?php echo $pilihanwarna; ?>"><?php echo $pilihanketerangan; ?> (<?php echo $data_iku['satuan']; ?>)</div>
          </div>
          <div class="kotak-flex-realisasi">
            <div class="font-standar <?php echo $pilihanwarna; ?>"><b><?php echo $data_iku['realisasi_setahun']; ?></b></div><div class="font-mini"><?php echo $data_iku['target_setahun']; ?></div>
          </div>
          <div class="kotak-flex-icon  bg-putih border-<?php echo $pilihanwarna; ?>">
            <i class="<?php echo $pilihanicon; ?>"></i>
          </div>
        </div>
    </a>
<?php } ?>