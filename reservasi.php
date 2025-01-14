<?php
if (@$_SESSION['username'] != "") {
?>
  <?php
  if (!isset($_GET['konf'])) {
  ?>
    <div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade">
            <span class="caption mb-3">Luxurious Rooms</span>
            <h1 class="mb-4">Pemesanan</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Pemesanan Kamar</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <form action="index.php?page=reservasi&konf=y" method="post" class="bg-white p-md-5 p-4 mb-5 border" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="kamar">Pilih Jenis Kamar</label>
                  <select required name="kamar" id="kamar" class="form-control" onchange="updateTarif(this.value)">
                    <option value="">--Pilih Kamar--</option>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM kamar");
                    foreach ($sql as $value) {
                    ?>
                      <option value="<?= $value['No_Kamar']; ?>"><?= $value['Jenis']; ?></option>
                    <?php
                    }
                    ?>
                  </select>

                </div>
              </div>

              <div id="dvkecamatan">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="ktp">KTP / Kartu Keluarga / SIM</label>
                    <input type="file" id="ktp" name="ktp" class="form-control" accept=".jpg,.jpeg,.png" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="tarif">Tarif</label>
                    <input type="text" name="tarif_display" id="tarif_display" readonly class="form-control">
                    <input type="hidden" name="tarif">
                  </div>
                </div>

              </div>
              <!-- Other form fields -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="nama">Nama</label>
                  <input required type="text" id="nama" name="nama" class="form-control" value="<?php echo $_SESSION['nama']; ?>" />
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Telepon</label>
                  <input required type="text" id="phone" name="nohp" class="form-control " value="<?php echo $_SESSION['no_hp']; ?>" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input required type="email" id="email" name="email" class="form-control " value="<?php echo $_SESSION['email']; ?>" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Tanggal Check In</label>
                  <input required type="date" id="checkin_date" name="checkin" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Tanggal Check Out</label>
                  <input required type="date" id="checkout_date" name="checkout" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="adults" class="font-weight-bold text-black">Jumlah Tamu</label>
                  <select name="jml_tamu" id="adults" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Catatan Tambahan</label>
                  <textarea name="pesan" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Cek" name="submit" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <!-- Contact Info Section -->
          </div>
        </div>
      </div>
    </div>
<?php
  } elseif (isset($_GET['konf'])) {
    include 'koneksi.php';

    // Ambil data dari form
    $kamar = $_POST['kamar'];
    $nama = $_POST['nama'];
    $telpon = $_POST['nohp'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jml_tamu = $_POST['jml_tamu'];
    $tarif = $_POST['tarif'];
    $pesan = $_POST['pesan'];
    $lama_menginap = (strtotime($checkout) - strtotime($checkin)) / 86400;

    // $kamar = $_POST['kamar'];

    // Ambil tarif berdasarkan kamar yang dipilih
    $sql_tarif = mysqli_query($conn, "SELECT Tarif FROM kamar WHERE No_Kamar = '$kamar'");
    $data_tarif = mysqli_fetch_assoc($sql_tarif);

    $tarif = $data_tarif['Tarif']; // Tarif kamar
    $lama_menginap = (strtotime($checkout) - strtotime($checkin)) / 86400; // Hitung lama menginap
    $total_biaya = $lama_menginap * $tarif * $jml_tamu; // Hitung total biaya

    // Validasi tanggal
    $today = date('Y-m-d');
    if ($lama_menginap <= 0) {
      echo "<script>alert('Data tidak valid! Lama menginap harus lebih dari 0.'); window.location.href='index.php?page=reservasi';</script>";
      exit;
    } elseif ($checkin < $today) {
      echo "<script>alert('Tidak bisa memesan kamar pada tanggal yang sudah lewat!'); window.location.href='index.php?page=reservasi';</script>";
      exit;
    }

    // Handle file upload
    if (isset($_FILES['ktp']) && $_FILES['ktp']['error'] == 0) {
      $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
      $file_ext = pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION);
      if (!in_array(strtolower($file_ext), $allowed_types)) {
        echo "<script>alert('File yang diunggah harus berupa JPG, JPEG, PNG, atau PDF!'); window.location.href='index.php?page=reservasi';</script>";
        exit;
      }

      $upload_dir = "images/pesanan/";
      $file_name = uniqid() . '.' . $file_ext;
      $file_path = $upload_dir . $file_name;

      if (move_uploaded_file($_FILES['ktp']['tmp_name'], $file_path)) {
        // File berhasil diunggah, lanjutkan ke penyimpanan database
      } else {
        echo "<script>alert('Gagal mengunggah file KTP!'); window.location.href='index.php?page=reservasi';</script>";
        exit;
      }
    } else {
      echo "<script>alert('File KTP wajib diunggah!'); window.location.href='index.php?page=reservasi';</script>";
      exit;
    }

    // Ambil ID Pelanggan dari session
    $id_pelanggan = $_SESSION['id_pelanggan'];  // Pastikan session ini sudah di-set saat login

    // Generate No_Faktur secara acak
    $no_faktur = strtoupper(uniqid('TRX', true));  // No_Faktur dimulai dengan 'TRX' dan diikuti dengan ID unik

    // Insert data ke database
    $query = "INSERT INTO transaksi (No_Faktur, No_Kamar, id_pelanggan, tgl_masuk, tgl_keluar, lama_menginap, Tarif, Nama, Telpon, Email, ktp_file, pesan)
              VALUES ('$no_faktur', '$kamar', '$id_pelanggan', '$checkin', '$checkout', '$lama_menginap', '$tarif', '$nama', '$telpon', '$email', '$file_name', '$pesan')";

    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Pemesanan berhasil!'); window.location.href='index.php?page=reservasi';</script>";
    } else {
      echo "<script>alert('Gagal menyimpan data pemesanan!'); window.location.href='index.php?page=reservasi';</script>";
    }
  }
} else {
  echo "<script>alert('Session expired! Please log in again.'); window.location.href='login.php';</script>";
}
?>

<script>
  function updateTarif(noKamar) {
    if (noKamar === "") {
      document.getElementById('tarif_display').value = '';
      document.getElementsByName('tarif')[0].value = '';
      return;
    }

    fetch(`get_tarif.php?no_kamar=${noKamar}`)
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          const tarif = data.tarif;
          document.getElementById('tarif_display').value = `Rp. ${parseInt(tarif).toLocaleString('id-ID')}`;
          document.getElementsByName('tarif')[0].value = tarif;
        } else {
          alert(data.message || 'Gagal mengambil tarif.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengambil tarif.');
      });
  }

</script>