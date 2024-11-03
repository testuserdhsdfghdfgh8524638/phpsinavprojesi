<?php
include "baglan.php"; // Veritabanı bağlantısı için baglan.php dosyasını dahil ediyoruz.

// POST isteği ile gönderilen gerekli verilerin varlığını kontrol ediyoruz.
if (isset(
    $_POST['property1'],       // İlk özellik (ID)
    $_POST['property2'],       // İkinci özellik (Kategori ID'si)
    $_POST['property3']        // Üçüncü özellik (Barkod)
)) {
    // Başarılı bir kontrol, istenilen veriler mevcut.
    
    // SQL sorgusunun başlangıcını tanımlıyoruz.
    $sorgu = 'property1 SET 
    kategori_id=:property2,
    barkod=:property3';

    // Kullanıcının girdiği verileri bir diziye kaydediyoruz.
    $sorguArray = array(
        'property2' => $_POST['property2'],
        'property3' => $_POST['property3']
    );

    // property1 kontrolü yaparak güncelleme veya ekleme sorgusu belirliyoruz.
    if ($_POST['property1'] > 0) {
        // Eğer property1 0'dan büyükse, güncelleme yapıyoruz.
        $sorgu = "UPDATE " . $sorgu . " WHERE id=:property1";
        $sorguArray['property1'] = $_POST['property1']; // Güncellenecek kaydın ID'sini ekliyoruz.
    } else {
        // property1 0 ise, yeni bir kayıt ekliyoruz.
        $sorgu = "INSERT INTO " . $sorgu;
    }

    // Hazırlanan sorguyu çalıştırıyoruz.
    $sorgu = $db->prepare($sorgu);
    $sonuc = $sorgu->execute($sorguArray); // Veritabanında sorguyu çalıştırıyoruz.

    // Eğer yeni bir kayıt ekleniyorsa, son eklenen kaydın ID'sini alıyoruz.
    if ($_POST['property1'] == 0)
        $_POST['property1'] = $db->lastInsertId(); // Son eklenen kaydın ID'sini alıyoruz.

    //print_r($sorgu->errorInfo()); // Eğer bir hata varsa, hata bilgilerini yazdırıyoruz.
}

// Kullanıcıyı detay sayfasına yönlendiriyoruz.
header("Location:detay.php?id=" . $_POST['property1'] . "&sonuc=" . $sonuc);

/* Aşağıdaki kod, hata kontrolü ve POST verilerini yazdırmak için kullanılabilir. */
 /*
else {
    echo "HATA"; // Eğer veriler yoksa hata mesajı gösteriyoruz.
}
echo "<pre>"; // POST verilerini daha okunabilir formatta göstermek için.
print_r($_POST); // Gönderilen POST verilerini yazdırıyoruz.
echo "</pre>"; // HTML öncesi satır sonu ekliyoruz.
*/
?>
