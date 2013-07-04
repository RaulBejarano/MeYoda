package com.talentum.meyodademo;

import android.app.Activity;
import android.content.DialogInterface;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

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
        textoNombre.setOnClickListener(this);

        EditText textoApellidos = (EditText) (findViewById(R.id.campoApellidos));
        textoApellidos.setOnClickListener(this);

        EditText textoClave = (EditText) (findViewById(R.id.campoContrasena));
        textoClave.setOnClickListener(this);

        EditText textoConfirmClave = (EditText) (findViewById(R.id.campoConfirmacion));
        textoConfirmClave.setOnClickListener(this);

    }

    @Override
    public void onClick(View view) {
        String nombre = ((EditText)findViewById(R.id.campoNombre)).getText().toString();
        String apellidos = ((EditText)findViewById(R.id.campoApellidos)).getText().toString();
        String email =  ((EditText)findViewById(R.id.email)).getText().toString();
        String clave =  ((EditText)findViewById(R.id.campoContrasena)).getText().toString();
        String confirmClave = ((EditText)findViewById(R.id.campoConfirmacion)).getText().toString();


        if(clave.compareTo(confirmClave)!=0){

            Toast.makeText(Registro.this, "Las claves no coinciden", Toast.LENGTH_LONG).show();
        }

        if(nombre.contains(" ")){

            Toast.makeText(Registro.this, "Error en el nombre", Toast.LENGTH_LONG).show();

        }

        if(apellidos.split(" ").length>2){

            Toast.makeText(Registro.this, "Error en los apellidos", Toast.LENGTH_LONG).show();

        }

        if(email.contains(" ") || !email.contains("@")|| !email.contains(".")){

            Toast.makeText(Registro.this, "Error en el email", Toast.LENGTH_LONG).show();

        }
    }


    public void enviar(){


    }
}