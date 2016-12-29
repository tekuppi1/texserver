<?php function dialog(){ ?>
<div id="booklist_dialog" class="modal modal-fixed-footer">
<!-- ============================================ -->
<!-- 出品確認ダイアログ画面 -->
<!-- ============================================ -->

<!--↓　自由に変えてちょ！ ↓-->
<div class="book">
    <img src="/texserver/img/4864100829.jpg" class="book-picture">
</div>

<table>
    <tr><td>タイトル：</td><td>「夢をかなえるゾウ」</td></tr>
    <tr><td>大学：</td><td>その他</td></tr>
    <tr><td>学部：</td><td>小説</td></tr>
</table>

<div class="question">本当に取り引きを完了しますか？</div>
<div class="center margin-bottom">
    <button class="btn waves-effect waves-light amber darken-4" type="submit">Yes</button>
    <button class="btn waves-effect waves-light blue hide_booklist_dialog modal-action modal-close waves-effect">No</button>
</div>
<!--↑　自由に変えてちょ！ ↑-->

<!-- ============================================ -->
</div>
<?php } ?>