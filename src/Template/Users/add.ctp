<div class="col-sm-12"><div class="card-panel">
<!-- ============================================ -->
<!-- アカウント追加画面 -->
<!-- ============================================ -->

<div class="users form">
<?= $this->Form->create($user) ?>
    <legend><?= __('Add Users') ?></legend>
    <div class="input-field col s12">
        <input class="validate" id="username" type="text" name="username"></input>
        <label for="username">UserName</label>
    </div>
    <div class="input-field col s12">
        <input class="validate" id="password" type="password" name="password"/>
        <label for="password">Password</label>
    </div>
    <input class="role" name="role" type="checkbox" id="admin" value="admin"/><label for="admin">admin</label>
    <button class="waves-effect waves-light btn pull-right" type="submit">ユーザー追加</button>
<?= $this->Form->end() ?>
</div>

<!-- ============================================ -->
</div></div>