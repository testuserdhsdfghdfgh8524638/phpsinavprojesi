<?php
// Eğer şu anki sayfa 'urun_detay.php' ise
if (strpos($_SERVER['SCRIPT_NAME'], 'urun_detay.php')) {
    // Summernote eklentisini dahil et ve açıklama alanını başlat
    echo '<script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script>
      $(function () {
        // 'urun_aciklama' alanı için Summernote editorünü başlat
        $("#urun_aciklama").summernote({height: 250});
      });
    </script>';
}

// 'sonuc' GET parametresi varsa
if (isset($_GET['sonuc'])) {
?>
    <script>
      $(function() {
        // SweetAlert2 için Toast ayarlarını oluştur
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end', // Toast pozisyonu
          showConfirmButton: false, // Onay butonunu gizle
          timer: 3000 // 3 saniye sonra kapanacak
        });
        Toast.fire({
          <?php
          // 'sonuc' değeri başarılı mı?
          if ($_GET['sonuc']) {
          ?>
            icon: 'success', // Başarılı ikon
            title: 'Kayıt İşlemi Başarılı' // Başarılı mesajı
          <?php
          } else {
          ?>
            icon: 'error', // Hata ikon
            title: 'Hata Alındı Tekrar Deneyiniz' // Hata mesajı
          <?php
          }
          ?>
        });
      });
    </script>
<?php
}
?>

<script>
  $(function() {
    // DataTable'ı başlat ve ayarlarını yapılandır
    $("#example1").DataTable({
      "responsive": true, // Responsive yapı
      "lengthChange": false, // Uzunluk değiştirme özelliğini kapat
      "autoWidth": false, // Otomatik genişliği kapat
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] // Kullanılacak butonlar
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); // Butonları belirli bir yere yerleştir
  });
</script>
