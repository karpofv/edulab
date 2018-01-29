<?php
require_once("../common.php");//共通ファイル読み込み(使用する前に、appidを指定してください。)
$hits = array();
$query = $_POST[busc];

if ($query != "") {
    $query4url = rawurlencode($query);
    $url = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url";
    $xml = simplexml_load_file($url);
    if ($xml["totalResultsReturned"] != 0) {
        $hits = $xml->Result->Hit;
    }
}
?>
        <h5><a href="./index.php">Sitio de demostración de compras: muestra la lista de productos con el valor establecido - 「<?php echo h($query); ?>」
Resultados de búsqueda:</a></h5>
        <?php foreach ($hits as $hit) { ?>
            <div class="products-list">
                <div class="product-item">

                    <div><img src="<?php echo h($hit->Image->Medium); ?>"></div>

                    <a href="<?php echo h($hit->Url); ?>" title="<?php echo h($hit->Name); ?>"><?php echo h($hit->Name); ?></a>

                    <p><?php echo h($hit->PriceLabel->DefaultPrice); ?></p>
                    <a href="/mi-cuenta/" class="btn-excellent">Iniciar Sesion</a>
                </div>
            </div>
        <?php } ?>