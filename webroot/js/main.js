(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.addFadein = addFadein;
exports.addFadeout = addFadeout;
//--------------------------
// アニメーションメソッド
//--------------------------

/**
 * フェードインクラスの付加
 * @param {string} name - 適用するタグ名
 */
function addFadein(name) {
  $(name).addClass("fadein");
  $(name).removeClass("fadeout");
}

/**
 * フェードインクラスの付加
 * @param {string} name - 適用するタグ名
 */
function addFadeout(name) {
  $(name).addClass("fadeout");
  $(name).removeClass("fadein");
}

},{}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.texchart = texchart;
/**
 * ログのグラフ表示(chart.js使ってます)
 * @param {array} label - キー
 * @param {array} value - 値
 */

function texchart() {
  var label = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var value = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var datalabel = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;


  var ctx = document.getElementById("myChart");
  var setdata = {
    labels: label || ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
      label: datalabel || "閲覧履歴",
      borderColor: "rgba(75,192,192,1)",
      pointBorderColor: "rgba(75,192,192,1)",
      data: value || [1, 1, 1, 1, 1, 1, 1]
    }]
  };
  var options = {
    scales: {
      yAxes: [{ ticks: { beginAtZero: true } }]
    },
    animation: true
  };
  var myChart = new Chart(ctx, {
    type: 'line',
    data: setdata,
    options: options,
    animationSteps: 1000
  });

  console.log("texchart");
}

},{}],3:[function(require,module,exports){
"use strict";

var _texchart = require("./components/texchart");

var _animation = require("./components/animation");

//------------------------------------------------------------------------
// ページ読み込み時に実行したい処理
//------------------------------------------------------------------------
/**
 * TexServerのスクリプトファイル
 */

window.onload = function () {

  //$(".button-collapse").sideNav();

  // viweMain1.ctpで取得
  (0, _texchart.texchart)(chartLabel, chartValue);

  // 出品確認ダイアログの表示
  $('.show_exhibit_dialog').click(function () {
    console.log("show exhibit dialog");
    (0, _animation.addFadein)('#exhibit_dialog');
  });

  // 出品確認ダイアログの非表示
  $('.hide_exhibit_dialog').click(function () {
    console.log("hide exhibit dialog");
    (0, _animation.addFadeout)('#exhibit_dialog');
  });
};

},{"./components/animation":1,"./components/texchart":2}]},{},[3]);
