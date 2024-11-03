<?php
include "baglan.php"; // Veritabanı bağlantısını sağlamak için baglan.php dosyasını dahil et

echo "<pre>";
print_r($_POST); // POST ile gelen verileri yazdır
echo "</pre>";

// Eğer gerekli POST değişkenleri tanımlıysa
if (isset(
    $_POST['property1'], // Bu alanın varlığı kontrol ediliyor
    $_POST['property2']  // Bu alanın varlığı kontrol ediliyor
)) {
    // Veritabanında güncelleme yapmak için SQL sorgusu oluştur
    $SQL = "UPDATE ayar SET
    property1=:property1, // property1 alanı güncelleniyor
    property2=:property2"; // property2 alanı güncelleniyor

    // Güncelleme için gerekli değerleri içeren dizi oluştur
    $SQL_array = array(
        'property1' => $_POST['property1'], // POST'dan gelen property1 değeri alınıyor
        'property2' => $_POST['property2']  // POST'dan gelen property2 değeri alınıyor
    );

    // Eğer şifre alanı boş değilse güncellemeye ekle
    if ($_POST['ayar_msifre'] != "") {
        $SQL .= ",ayar_msifre=:ayar_msifre"; // SQL sorgusuna şifre alanı ekleniyor
        $SQL_array['ayar_msifre'] = $_POST['ayar_msifre']; // Şifre değeri diziye ekleniyor
    }
    $SQL .= " WHERE ayar_id=1"; // Güncellenecek kaydın koşulu belirtiliyor

    // SQL sorgusunu hazırlama
    $sorgu = $db->prepare($SQL);
    // Sorguyu çalıştır ve sonucu al
    $sonuc = $sorgu->execute($SQL_array);

    //print_r($sorgu->errorInfo()); // Eğer hata varsa hata bilgisini yazdır
}

// İşlem sonucuna göre ayar sayfasına yönlendir
header("Location:ayar.php?sonuc=" . $sonuc);
?>
