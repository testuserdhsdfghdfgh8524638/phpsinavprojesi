<?php
  include "ust.php"; // Sayfanın üst kısmını ekliyoruz
?>

<form action="ayar_kaydet.php" method="POST"> <!-- Form başlangıcı, veriler ayar_kaydet.php dosyasına gönderilecek -->
  <div>
    <label for="property1">Başlık</label> <!-- Başlık için etiket -->
    <input type="text" id="property1" name="property1" value="<?php echo $ayar['property1']; ?>" placeholder="Web sayfanızın başlığını giriniz"> 
    <!-- property1 değeri, ayar dizisinden çekilir -->
  </div>

  <div>
    <label for="property2">Açıklama</label> <!-- Açıklama için etiket -->
    <input type="text" id="property2" name="property2" value="<?php echo $ayar['property2']; ?>" placeholder="Web sayfanızı tanıtan birkaç cümle giriniz"> 
    <!-- property2 değeri, ayar dizisinden çekilir -->
  </div>

  <input type="submit" value="Kaydet"> <!-- Formu göndermek için buton -->
</form>

<?php
  include "alt.php"; // Sayfanın alt kısmını ekliyoruz
?>
