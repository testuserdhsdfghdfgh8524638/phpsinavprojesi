<?php
include "ust.php"; // Üst kısımda yer alan başlık dosyasını ekleriz

// Eğer URL'den 'id' parametresi gelmemişse, varsayılan olarak 0 atanır
if (!isset($_GET['id'])) {
    $_GET['id'] = 0; // 'id' yoksa 0 değerini ata
    // Varsayılan ürün bilgilerini içeren dizi oluştur
    $satir = array(
        'property1' => 0, // Ürün ID (0: Yeni ürün)
        'property2' => '' // Kategori ID (boş değer)
    );
} else {
    // 'id' parametresi varsa, veritabanından ürün bilgilerini çek
    $sorgu = $db->prepare('SELECT * FROM urun WHERE urun_id=?'); // SQL sorgusu hazırla
    $sorgu->execute(array($_GET['id'])); // Sorguyu çalıştır ve 'id' değerini parametre olarak ver
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC); // Sonuçları dizi olarak al
}
?>

<form action="urun_kaydet.php" method="POST"> <!-- Ürün kaydetme formu -->
    <input type="hidden" name="urun_id" value="<?php echo $satir['property1'] ?>"> <!-- Ürün ID'sini gizli input olarak gönder -->

    <div>
        <label for="urun_kategori_id">Kategori ID</label>
        <input type="text" id="urun_kategori_id" name="urun_kategori_id" value="<?php echo $satir['property2'] ?>"> <!-- Kategori ID'si için input -->
    </div>

    <input type="submit" value="Kaydet"> <!-- Formu gönder butonu -->
</form>

<?php
include "alt.php"; // Alt kısımda yer alan footer dosyasını ekleriz
?>
