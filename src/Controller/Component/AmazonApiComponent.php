<?php

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\Configure;

define("Associate_tag", Configure::read("Associate_tag")); // アソシエイトタグ
define("Access_Key_ID", Configure::read("Access_Key_ID")); // アクセスキー
define("Secret_Access_Key", Configure::read("Secret_Access_Key")); // シークレットキー

class AmazonApiComponent extends Component {

  /**
   * 情報取得のURLを生成
   * Keywords:検索ワード
   * option:その他必要なパラメータ
   */
  public function generateUrl($Keywords){
    // 正直よー分からん。あんま深く考えんとこ。
    $baseurl = "https://webservices.amazon.co.jp/onca/xml";
    $params = array();
    $params["Service"]          = "AWSECommerceService";
    $params["AWSAccessKeyId"]   = Access_Key_ID;
    $params["Version"]          = "2013-08-01";
    $params["Operation"]        = "ItemSearch";
    $params["SearchIndex"]      = "Books";
    $params["Keywords"]         = $Keywords;
    $params["AssociateTag"]     = Associate_tag;
    $params["ResponseGroup"]    = "ItemAttributes,Offers, Images";
    $params["MinimumPrice"]     = "100";
    $params["ItemPage"]         = "1";
    $base_request = "";
    foreach ($params as $k => $v) { $base_request .= "&" . $k . "=" . $v; }
    $base_request = $baseurl . "?" . substr($base_request, 1);
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    $base_request .= "&Timestamp=" . $params['Timestamp'];
    $base_request = "";
    foreach ($params as $k => $v) {
      $base_request .= '&' . $k . '=' . rawurlencode($v);
      $params[$k] = rawurlencode($v);
    }
    $base_request = $baseurl . "?" . substr($base_request, 1);
    $base_request = preg_replace("/.*\?/", "", $base_request);
    $base_request = str_replace("&", "\n", $base_request);
    ksort($params);
    $base_request = "";
    foreach ($params as $k => $v) { $base_request .= "&" . $k . "=" . $v; }
    $base_request = substr($base_request, 1);
    $base_request = str_replace("&", "\n", $base_request);
    $base_request = str_replace("\n", "&", $base_request);
    $parsed_url = parse_url($baseurl);
    $base_request = "GET\n" . $parsed_url['host'] . "\n" . $parsed_url['path'] . "\n" . $base_request;
    $signature = base64_encode(hash_hmac('sha256', $base_request, Secret_Access_Key, true));
    $signature = rawurlencode($signature);
    $base_request = "";
    foreach ($params as $k => $v) { $base_request .= "&" . $k . "=" . $v; }
    $base_request = $baseurl . "?" . substr($base_request, 1) . "&Signature=" . $signature;
    return $base_request;
  }

  /**
   * APIで通信
   * @param url: API接続したいurlパス
   * @return オブジェクト
   */
  public function callApi($url){

    // URLから取得するXML
    $xml = @simplexml_load_file($url);

    // 返すオブジェクト
    $returnObj = Array();

    // 成型
    $dataList = array();
    if( !isset($xml) || !isset($xml->Items) || !isset($xml->Items->Item) ) return null;
    foreach ($xml->Items->Item as $item) {
        $data = array();
        $data["ISBN"] = (string) @$item->ItemAttributes->ISBN;
        $data["ASIN"] = (string) @$item->ASIN;
        $data["Title"] = (string) @$item->ItemAttributes->Title;
        $data["Author"] = (string) @$item->ItemAttributes->Author;
        $data["Publisher"] = (string) @$item->ItemAttributes->Publisher;
        $data["PublicationDate"] = (string) @$item->ItemAttributes->PublicationDate;
        $data["DetailPageURL"] = (string) @$item->DetailPageURL;
        $dataList[] = $data;
    }
    $returnObj["TotalResults"] = @$xml->Items->TotalResults;
    $returnObj["dataList"] = @$dataList;
    return $returnObj;
  }

}
?>
