<div class="col-sm-12"><div class="card-panel">
<!-- ============================================ -->
<!-- ログイン画面 -->
<!-- ============================================ -->

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <legend><?= __('Login Users') ?></legend>
    <div class="input-field col s12">
        <input class="validate" id="username" type="text" name="username"></input>
        <label for="username">UserName</label>
    </div>
    <div class="input-field col s12">
        <input class="validate" id="password" type="password" name="password"/>
        <label for="password">Password</label>
    </div>
    <button class="waves-effect waves-light btn" type="submit">ログイン</button>
<?= $this->Form->end() ?>
</div>

<!-- ============================================ -->
</div></div>