
<div class="container">
  <div class="row">
    Login
    <?php echo form_open('auth/send_login'); ?>
    <div class="row">
      <div class="input-field col s6">
        <?php echo form_input('username') ?>
        <label for="first_name">Username</label>
      </div>

    </div>

    <div class="row">
      <div class="input-field col s12">
        <?php echo form_input('password') ?>
        <label for="password">Password</label>
      </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">Invia
      <i class="material-icons right">send</i>
    </button>
  <?php form_close(); ?>
</div>
</div>
