<?php
include "ust.php"; // Sayfanın üst kısmını ekliyoruz
?>

<table>
  <thead>
    <tr>
      <th>Kategori</th> <!-- Kategori başlığı -->
      <th>Barkod</th> <!-- Barkod başlığı -->
      <th>Ürün Adı</th> <!-- Ürün adı başlığı -->
      <th>Fiyat</th> <!-- Fiyat başlığı -->
      <th>Marka</th> <!-- Marka başlığı -->
    </tr>
  </thead>
  <tbody>
    <?php
    // Veritabanından 'urun' tablosundaki verileri çekmek için sorgu hazırlıyoruz
    $sorgu = $db->prepare('SELECT * FROM urun'); // SQL sorgusu
    $sorgu->execute(); // Sorguyu çalıştır

    // Sorgu sonucundaki her bir satırı döngü ile işliyoruz
    while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
      /* Aşağıdaki satırlar veritabanından gelen satır verisini ekrana basmak için kullanılır
      echo "<pre>";
      print_r($satir); // Satır verisini yazdır
      echo "</pre>";*/
    ?>
      <tr>
        <td><?php echo $satir['urun_kategori_id']; ?></td> <!-- Kategori ID'sini yazdır -->
        <td><?php echo $satir['urun_barkod']; ?></td> <!-- Barkod bilgisini yazdır -->
        <td>
          <a href="urun_detay.php?id=<?php echo $satir['urun_id']; ?>"> <!-- Ürün detay sayfasına bağlantı -->
            <?php echo $satir['urun_adi']; ?> <!-- Ürün adını yazdır -->
          </a>
        </td>
        <td><?php echo $satir['urun_fiyat']; ?></td> <!-- Fiyat bilgisini yazdır -->
        <td><?php echo $satir['urun_marka']; ?></td> <!-- Marka bilgisini yazdır -->
      </tr>
    <?php
    } // while döngüsünün sonu
    ?>
  </tbody>
</table>

<?php
include "alt.php"; // Sayfanın alt kısmını ekliyoruz
?>
