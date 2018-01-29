<?php

/** @mainpage
 * 商品検索フォームモジュール
 */

/**
 * @file
 * @brief 商品検索フォームモジュール
 *
 * フォームから入力された値を条件して商品検索APIを、検索した結果を表示するクラス
 * 検索結果に対して、カテゴリーによる絞り込みと、並び順の変更ができます。
 *
 * PHP version 5
 */

require_once("../common.php");

/**
 * @class
 * @brief 商品検索フォームモジュール
 *
 * 検索APIを利用して、フォームから入力された値を利用して検索した結果を表示するクラス
 * 検索結果に対して、カテゴリーによる絞り込みと、並び順の変更ができます。
 * phpのページに、数行のphpコードを書くことでブログパーツのように
 * 商品の検索フォームを表示させることができます。
 *
 *
 */
class ItemSearchFormModule
{
    /**
     * @brief カテゴリーID一覧
     *
     * 商品カテゴリの一覧です。
     * キーにカテゴリID、値にカテゴリ名が入っています。
     * @access private
     * @var array
     */
    private $_categories = array(
                                 "1" => "すべてのカテゴリから",
                                 "13457" => "ファッション",
                                 "2498" => "食品",
                                 "2500" => "ダイエット、健康",
                                 "2501" => "コスメ、香水",
                                 "2502" => "パソコン、周辺機器",
                                 "2504" => "AV機器、カメラ",
                                 "2505" => "家電",
                                 "2506" => "家具、インテリア",
                                 "2507" => "花、ガーデニング",
                                 "2508" => "キッチン、生活雑貨、日用品",
                                 "2503" => "DIY、工具、文具",
                                 "2509" => "ペット用品、生き物",
                                 "2510" => "楽器、趣味、学習",
                                 "2511" => "ゲーム、おもちゃ",
                                 "2497" => "ベビー、キッズ、マタニティ",
                                 "2512" => "スポーツ",
                                 "2513" => "レジャー、アウトドア",
                                 "2514" => "自転車、車、バイク用品",
                                 "2516" => "CD、音楽ソフト",
                                 "2517" => "DVD、映像ソフト",
                                 "10002" => "本、雑誌、コミック"
                                 );
    /**
     * @brief ソート方法一覧
     *
     * 検索結果のソート方法の一覧です。
     * キーに検索用パラメータ、値にソート方法が入っています。
     * @access private
     * @var array
     * 
     */
    private $_sortOrder = array(
                                "-score" => "おすすめ順",
                                "+price" => "商品価格が安い順",
                                "-price" => "商品価格が高い順",
                                "+name" => "ストア名昇順",
                                "-name" => "ストア名降順",
                                "-sold" => "売れ筋順"
                                );
    /**
     * @brief 引数を元に商品検索APIにアクセスし、結果を表示
     *
     * 引数を元に商品検索APIにアクセスし、その結果をhtmlに整形して表示します。
     * 引数$paramにリクエストパラメータ名=>値と書くことで検索条件を追加することができます。
     * 指定できるパラメータの一覧は
     * http://developer.yahoo.co.jp/webapi/shopping/shopping/v1/itemsearch.html
     * を参照してください。
     *
     * @param array $param　apiにアクセスする際の検索条件を指定します。
     *
     * $param = array(
     *     "appid"         => string アプリケーションID //必須,
     *     "query"         => string 検索キーワード     //必須,
     *     "category_id"   => int カテゴリID　//カテゴリIDによる商品の絞り込み検索,
     *     "affiliate_type"=> string アフィリエイトタイプ yid or vc,
     *     "affiliate_id"  => string アリフィリエイトIDを指定します,
     *     "sort"          => string ソート順を指定します
     * );
     *
     * Yahoo! JAPANアフィリエイトサンプル
     * new ItemSearchListModule(array(
     *                    "appid"          => "<あなたのアプリケーションID>",
     *                    "query"          => "スニーカー",
     *                    "affiliate_type" => "yid",
     *                    "affiliate_id"   => "EOipIudsX6dXJlfi8JXmsCA-",
     *                    "hits"           => 3
     * ));
     * バリューコマースアフィリエイトサンプル
     * new ItemSearchListModule(array(
     *                    "appid"          => "<あなたのアプリケーションID>",
     *                    "query"          => "スニーカー",
     *                    "affiliate_type" => "vc",
     *                    "affiliate_id"   => "http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=2219441&pid=874350257&vc_url=",
     *                    "hits"           => 3
     * ));
     */
    function __construct($param = array())
    {
        $results = array();
        
        $param["query"] = !empty($_GET["query"]) ? $_GET["query"]: $param["query"];
        $param["query"] = !empty($param["query"]) ? $param["query"] : "";

        $param["sort"] = !empty($_GET["sort"]) ? $_GET["sort"] : $param["sort"];
        $param["sort"] = !empty($param["sort"]) && array_key_exists($param["sort"], $this->_sortOrder)? $param["sort"] : "-score";
        
        $param["category_id"] = ctype_digit($_GET["category_id"]) ? $_GET["category_id"]:$param["category_id"];
        $param["category_id"] =  !empty($param["category_id"]) && array_key_exists($param["category_id"], $this->_categories) ? $param["category_id"] : 1;
        
        if ($param["query"] != "") {
            $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?". buildQuery($param);
            try {
                $xml = simplexml_load_file($url);
                if ($xml["totalResultsReturned"] != 0) {
                    $results = $xml->Result->Hit;
                }
            } catch (Exception $e) {
            }
        }
        
        $result = array();
        
        $result["sort"] = $param["sort"];
        $result["query"] = $param["query"];
        $result["category_id"] = $param['category_id'];
        $result["results"] = $results;

        ItemSearchFormModule::display($result);
    }
    
    /**
     * @brief htmlを組み立てて表示
     *
     * 引数に指定された値からhtmlに整形して出力します。
     *
     * @param array $param  html内で表示する値
     * 
     * $param = array(
     *     "sort" => string //ソート方法,
     *     "query" => string //検索キーワード,
     *     "category_id" => int //カテゴリーID,
     *     "results" => object //検索結果
     * );
     */
    function display($param=array())
    {
        $html = array();
        $html []= "<div class=\"YahooShoppingAPISDK\">"; 
        $html []= "<div class=\"ItemSearchFormModule\">";
        $html []= "<h1>商品検索</h1>";
        $html []= "<form action=\"". h($_SERVER['REQUEST_URI']). "\" class=\"Search\">";

        $html []= "<input type=\"text\" name=\"query\" value=\"". h($param["query"]) . "\" />";
        $html []= "<br />";
        $html []=  "<select name=\"category_id\">";
        foreach ($this->_categories as $id => $name) {
            $select = "";
            $select = ($param["category_id"] == $id)?"selected=\"selected\"":"";
            $html [] = "<option value=\"". h($id) . "\" ". $select .">". h($name) ."</option>";
        }
        $html []= "</select>";

        $html []= "<select name=\"sort\">";
        foreach ($this->_sortOrder as $key => $value) {
            $select = "";
            $select = ($param["sort"] == $key)?"selected=\"selected\"":"";
            $html [] = "<option value=\"" . h($key) . "\" ". $select .">". h($value) ."</option>";
        }
        $html []= "</select>";
        $html []= "<br />";

        $html []= "<input type=\"submit\" value=\"Yahooショッピングで検索\"/>";
        $html []= "</form>";

        foreach ($param["results"] as $result) {
            $html []= "<div class=\"Item\">";
            $html []= "<p><a href=\"". h($result->Image->Small) . "\"><img src=\"" . h($result->Image->Small) . "\" /></a></p>";
            $html []= "<h2><a href=\"" . h($result->Url) . "\">". h($result->Name) ."</a></h2>";
            if (!is_null($result->PriceLabel->SalePrice)) {
                $html []= "<p class=\"Price\">". h($result->Price). "円</p>";
            }
            $html []= "</div>";
        }

        $html [] = "</div>";
        $html [] = "</div>";
        echo join("\n", $html);
    }
}
?>