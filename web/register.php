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
      <p><input type="password" name="pss" id="pss" placeholder="Contrase&ntilde;a" required="required"></p>           
      <p style="position:relative;">
        <input type="password" name="pss2" id="pss2" placeholder="Confirmar" required="required">
        <span id="checkPasswords" class="badge badge-important" style="position:absolute;padding:10px;margin-left:10px;"><i class="icon-remove icon-white"></i></span>
      </p>
    </div>
    <p style="text-align:center;margin: 10px;margin-top:40px;">
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
<script type="text/javascript">

    var pss1 = $('#pss').val();
    var pss2 = $('#pss2').val();

    function checkPasswords(pss1,pss2){


      if (pss1 == pss2) {
        console.log('Equal');
        $('#checkPasswords').removeClass('badge-important').addClass('badge-success');
        $('#checkPasswords').html('<i class="icon-ok icon-white"></i>');

      }else{
        $('#checkPasswords').removeClass('badge-success').addClass('badge-important');
        $('#checkPasswords').html('<i class="icon-remove icon-white"></i>');        
      }
    }

    $('#pss').keyup(function(){
      console.log($(this).val());
      pss1 = $('#pss').val();
      pss2 = $('#pss2').val();      
      checkPasswords(pss1,pss2);
    });
    $('#pss2').keyup(function(){
      console.log($(this).val());    
      pss1 = $('#pss').val();
      pss2 = $('#pss2').val();        
      checkPasswords(pss1,pss2);
    });     
</script>
