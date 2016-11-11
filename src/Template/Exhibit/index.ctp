<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 出品画面 -->
<!-- ============================================ -->
<p>出品用ページ</p>

  <div class="container_exhibit">
    <form action="#">
      <p>
        <input name="group1" type="radio" id="test1" />
        <label for="test1">南山大学</label>
      </p>
      <p>
        <input name="group1" type="radio" id="test2" />
        <label for="test2">名古屋大学</label>
      </p>
      <p>
        <input class="group1" name="group1" type="radio" id="test3"  />
        <label for="test3">その他</label>
      </p>

      <div class="input-field col s12">
        <select>
          <option value="" disabled selected>学部を選んでください</option>
          <option value="1">経済学部</option>
          <option value="2">理工学部</option>
          <option value="3">工学部</option>
        </select>
        <label class="label-color">学部</label>
      </div>

      <div class="input-field col s12">
        <select>
          <option value="" disabled selected>カテゴリを選んでください</option>
          <option value="1">実用書</option>
          <option value="2">語学</option>
          <option value="3">共通科目</option>
        </select>
        <label class="label-color">カテゴリ</label>
      </div>

      <div class="input-field col s12">
        <input placeholder="ISBNを入力してください" id="ISBN" type="text" class="validate">
        <label for="ISBN">ISBN</label>
      </div>

      <div class="center margin-bottom">
        <button class="btn waves-effect waves-light amber darken-4" type="submit" name="action">送信</button>
      </div>
    </form>
  </div>



<!-- ============================================ -->
</div></div>
