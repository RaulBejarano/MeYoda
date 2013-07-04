package com.talentum.meyodademo;

import android.app.Activity;
import android.content.DialogInterface;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 * Created by Pablo on 7/3/13.
 */
public class Registro extends Activity implements View.OnClickListener {

    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registro);

        Button botonEnviar = (Button) (findViewById(R.id.buttonEnviar));
        botonEnviar.setOnClickListener(this);

        EditText textoNombre = (EditText) (findViewById(R.id.campoNombre));

        EditText textoApellidos = (EditText) (findViewById(R.id.campoApellidos));

        EditText textoEmail = (EditText) (findViewById(R.id.campoEmail));

        EditText textoClave = (EditText) (findViewById(R.id.campoContrasena));

        EditText textoConfirmClave = (EditText) (findViewById(R.id.campoConfirmacion));

    }

    @Override
    public void onClick(View view) {

        String nombre = ((EditText)findViewById(R.id.campoNombre)).getText().toString();
        String apellidos = ((EditText)findViewById(R.id.campoApellidos)).getText().toString();
        String email =  ((EditText)findViewById(R.id.campoEmail)).getText().toString();
        String clave =  ((EditText)findViewById(R.id.campoContrasena)).getText().toString();
        String confirmClave = ((EditText)findViewById(R.id.campoConfirmacion)).getText().toString();


        if(nombre.length()==0||apellidos.length()==0||email.length()==0||clave.length()==0){
            Toast.makeText(Registro.this, "Error, campos vacios", Toast.LENGTH_LONG).show();
            return;
        }

        if(nombre.contains(" ")){
            Toast.makeText(Registro.this, "Error en el nombre", Toast.LENGTH_LONG).show();
            return;
        }

        if(apellidos.split(" ").length>2){
            Toast.makeText(Registro.this, "Error en los apellidos", Toast.LENGTH_LONG).show();
            return;
        }

        if(email.contains(" ")||!email.contains("@")||!email.contains(".")){
            Toast.makeText(Registro.this, "Error en el email", Toast.LENGTH_LONG).show();
            return;
        }


        if(clave.compareTo(confirmClave)!=0){
            Toast.makeText(Registro.this, "Las claves no coinciden", Toast.LENGTH_LONG).show();
        }

        String claveEncriptada = md5(clave);



    }

    public static final String md5(final String s) {
        try {
            // Create MD5 Hash
            MessageDigest digest = java.security.MessageDigest
                    .getInstance("MD5");
            digest.update(s.getBytes());
            byte messageDigest[] = digest.digest();

            // Create Hex String
            StringBuffer hexString = new StringBuffer();
            for (int i = 0; i < messageDigest.length; i++) {
                String h = Integer.toHexString(0xFF & messageDigest[i]);
                while (h.length() < 2)
                    h = "0" + h;
                hexString.append(h);
            }
            return hexString.toString();

        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }
        return "";
    }



    public void enviar(){


    }
}