<div id="back"></div>
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="vistas/img/plantilla/logo.png" class="img-responsive" >
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresar al sistema</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">


          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>

        </div>

        <?php
          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();
        ?>
      </form>

    


  
      </p>
    </div>

  </div>

</div>