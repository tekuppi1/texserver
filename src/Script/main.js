/**
 * TexServerのスクリプトファイル
 */

import {texchart} from "./components/texchart";
import {addFadein, addFadeout} from "./components/animation";

//------------------------------------------------------------------------
// ページ読み込み時に実行したい処理
//------------------------------------------------------------------------
window.onload = function(){

  //$(".button-collapse").sideNav();

  // viweMain1.ctpで取得
  texchart(chartLabel, chartValue);

  /*↓出品画面のドロップダウン*/
  $('select').material_select();

  // 出品確認ダイアログの表示
  $('.show_exhibit_dialog').click(() => {
    console.log("show exhibit dialog");
    addFadein('#exhibit_dialog');
  });

  // 出品確認ダイアログの非表示
  $('.hide_exhibit_dialog').click(() => {
    console.log("hide exhibit dialog");
    addFadeout('#exhibit_dialog');
  });
}