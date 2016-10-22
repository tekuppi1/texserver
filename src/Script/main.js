/**
 * TexServerのスクリプトファイル
 */

import {texchart} from "./components/texchart";

//------------------------------------------------------------------------
// ページ読み込み時に実行したい処理
//------------------------------------------------------------------------
window.onload = function(){

  //$(".button-collapse").sideNav();

  //viweMain1.ctpで取得
  texchart(chartLabel, chartValue);
}