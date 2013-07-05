<div id="registerDiv">
  <form id="registerForm" class="form-horizontal" style="text-align:center;" method="post" action="">
    <div class="control-group">
      <input type="text" name="nombre" placeholder="Nombre" required="required" >          
    </div>
    <div class="control-group">
      <input type="text" name="apellidos" placeholder="Apellidos" required="required">          
    </div>
    <div class="control-group">
      <input type="text" name="email" placeholder="Email" required="required">          
    </div>                    
    <div class="control-group">
      <p><input type="password" name="pss" placeholder="Contrase&ntilde;a" required="required"></p>           
      <input type="password" name="pss2" placeholder="Confirmar" required="required">
    </div>
    <p style="text-align:center;margin: 10px;">
      <button class="btn btn-inverse borderedtext" name="nuevoRegistro">Reg&iacute;strate</button>
    </p>
    <br>

    <div class="yodamessage" onclick="loginClick();return false;">
      <h4>¿Ya tienes cuenta?</h4>
      <p>¡Inicia tu sesión!</p>
<!--       <a onclick="loginClick();return false;">&iquest;Ya tienes cuenta? Inicia Sesi&oacute;n</a> -->
    </div>          
  </form>

</div>
