<?php
include "baglan.php"; // Veritabanı bağlantısını sağlamak için "baglan.php" dosyası ekleniyor.

// "ayar" tablosundaki tüm ayarları seçmek için bir SQL sorgusu hazırlanıyor.
$ayar = $db->prepare("SELECT * FROM ayar");
$ayar->execute(); // Sorgu çalıştırılıyor.
$ayar = $ayar->fetch(PDO::FETCH_ASSOC); // Sonuçlar tek bir satır olarak çekiliyor.

// Sayfa sınıfını kontrol eden fonksiyon; eğer mevcut sayfa, belirtilen sayfayı içeriyorsa 'active' sınıfını ekliyor.
function MenuClass($sayfa, $class = 'active')
{
  if (strpos($_SERVER['SCRIPT_NAME'], $sayfa)) // Mevcut sayfa adı kontrol ediliyor.
    echo $class; // Uygun sınıf döndürülüyor.
}
?>

<table>
  <tr>
    <th>Property 1</th> <!-- Property1 için başlık -->
    <th>Property 2</th> <!-- Property2 için başlık -->
  </tr>
  <tr>
    <td><?php echo $ayar['property1']; ?></td> <!-- Property1 değeri gösteriliyor -->
    <td><?php echo $ayar['property2']; ?></td> <!-- Property2 değeri gösteriliyor -->
  </tr>
</table>
