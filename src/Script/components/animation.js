//--------------------------
// アニメーションメソッド
//--------------------------

/**
 * フェードインクラスの付加
 * @param {string} name - 適用するタグ名
 */
export function addFadein(name){
  $(name).addClass("fadein");
  $(name).removeClass("fadeout");
}

/**
 * フェードインクラスの付加
 * @param {string} name - 適用するタグ名
 */
export function addFadeout(name){
  $(name).addClass("fadeout");
  $(name).removeClass("fadein");
}