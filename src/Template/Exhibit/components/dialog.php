<?php function dialog(){ ?>
<div id="exhibit_dialog" class="modal modal-fixed-footer">
<!-- ============================================ -->
<!-- 出品確認ダイアログ画面 -->
<!-- ============================================ -->

<!--↓　自由に変えてちょ！ ↓-->
            <form action="#">
                <font face="游明朝">
                <div class="book">
                    <img src="/texserver/img/4061272748.jpg" class="book-picture">
                </div>
                <div id="exhibit_dialog_content" >
                    <p class="title">
                        <B>タイトル：</B>
                            「100万回生きたねこ」
                    </p>
                    <p class="title">
                        <B>大学：</B>
                        その他
                    </p>
                    <p class="title">
                        <B>学部：</B>
                        小説
                    </p>
                </div>
                <div class="question">本当に出品しますか？</div>
                <div class="center margin-bottom">
                        <button class="btn waves-effect waves-light amber darken-4" type="submit">Yes
					    </button>
                        <button class="btn waves-effect waves-light blue hide_exhibit_dialog modal-action modal-close waves-effect">No</button>
				</div>
                </font>
            </form>
<!--↑　自由に変えてちょ！ ↑-->

<!-- ============================================ -->
</div>
<?php } ?>