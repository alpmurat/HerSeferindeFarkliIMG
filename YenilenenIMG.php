<!--- Klasör adreslerini kendi sitenize göre uyarlamayı unutmayın 
2 türlü gösterim var hem site içinde bir fotoğraf olarak hemde background olarak-
Belirlediğiniz klasördeki tüm resimleri tarıyor ve hepsini rasgele olarak gösteriyor ->

<?php 
error_reporting(E_ALL & ~E_NOTICE);
 
//Resimlerin bulunduğu kalsör
$resim_klasor_adi = 'tema/img/';
 
 
 
//Klasördeki dosya listesinden random olarak birini seçme olayını yapıyoruz.
function images($resim_klasor_adi)
{
    //$resimler = array();
    $klasor_ac = dir($resim_klasor_adi);
    while (false !== ($k_a_f = $klasor_ac->read()))
    {
        if ($k_a_f != '.' && $k_a_f !='..') 
        {
            $resimler[] = $k_a_f;
        }
    }
    //srand(make_seed());
    $res = $resimler[rand(0,count($resimler))];
    if ($res == null) 
    { 
        return images($resim_klasor_adi);
    }
    else 
    { 
        return $res;
    }
}
 
//Klasörden gelen değeri kullanarak resmi gösterme
function resim_goster($resim)
{
    global $resim_klasor_adi;
    return 'tema/img/'.$resim.'';
}
  
  //Resimi ekranda gösterme
<img src="<?php echo resim_goster(images($resim_klasor_adi)); ?>">
 ?>



<style>
// Eğer background (Arkafon için göstermek isterseniz

.mbimg {
;
    background: url('<?php echo resim_goster(images($resim_klasor_adi)); ?>');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    height: 100vh;
}
</style>

<body class="mbimg">
