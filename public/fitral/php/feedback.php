<input type="checkbox" id="mycheckbox">
<label for="mycheckbox" class="feedback-label">FEEDBACK</label>
<form class="form" action="fitral/php/simpanfeedback.php" method="post">
  <div>
    <label for="fullname">Nama Lengkap</label>
    <input type="text" id="fullname" name="fullname" required>
  </div>
  <div>
    <label for="feedback">Kritik/Saran/Pertanyaan/Dll</label>
    <textarea id="feedback" name="feedback" required></textarea>
  </div>
  <div>
    <button type="submit">kirim</button>
  </div>
</form>