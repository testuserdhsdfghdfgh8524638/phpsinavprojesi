<?php
$UWAMPFOLDER="../"; // UwAmp klasör yolunu tanımlama

// RESİMİ PHP DOSYASINA KODLAMA
/*
$fp = fopen("favicon.ico",'r'); // favicon.ico dosyasını aç
$data = fread ($fp, filesize ("favicon.ico")); // Dosyanın içeriğini oku
fclose ($fp); // Dosyayı kapat
echo base64_encode($data); // Okunan veriyi Base64 formatına çevir ve yazdır
exit; // Çıkış yap
*/

if (isset($_REQUEST['getimg'])) // Eğer 'getimg' parametresi set edilmişse
{
    $IMAGE_PROPERTY1 = "örnek"; // Resim 1 için örnek veri
    $IMAGE_PROPERTY2 = "örnek"; // Resim 2 için örnek veri

    switch ($_GET['getimg']) // 'getimg' parametresine göre durum kontrolü
    {
        case 'folder':        
            header("Content-type: image/png"); // İçeriğin türünü belirt
            echo base64_decode($IMAGE_PROPERTY1); // Property1'den veriyi Base64 formatında çöz ve yazdır
            break;
        case 'title':        
            header("Content-type: image/png"); // İçeriğin türünü belirt
            echo base64_decode($IMAGE_PROPERTY2); // Property2'den veriyi Base64 formatında çöz ve yazdır
            break;
    }
    
    exit(); // İşlem tamamlandıktan sonra çıkış yap
}

?>

<!-- HTML yapısı kaldırıldı. Sadece PHP kısmı bırakıldı. -->
