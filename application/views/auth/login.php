
<div class="login-box">
  <div class="login-logo">
    <img style="width: 50%;" src="<?= base_url('assets/images/telkom.png'); ?>">
  </div>
  <hr>
  <!-- /.login-logo -->
  <?= $this->session->flashdata('message'); ?>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">LOGIN FASTELJAB V.01</p>

      <form action="<?= base_url('login/auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
           Register
        </a>
        <a href="#" class="btn btn-block btn-danger">
           Lupa Password
        </a>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->