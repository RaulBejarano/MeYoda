package com.talentum.meyodademo;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.talentum.meyodademo.requests.HttpRequest;

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
        final Context c = getApplicationContext();
        final ImageView check = (ImageView) findViewById(R.id.checkbox);
        TextWatcher w = new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i2, int i3) {


            }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i2, int i3) {

                Bitmap checkim = BitmapFactory.decodeResource(getResources(),R.drawable.checkbox);
                Bitmap error = BitmapFactory.decodeResource(getResources(),R.drawable.error);
                final String  clave =  ((EditText)findViewById(R.id.campoContrasena)).getText().toString();
                String confirmClave = ((EditText)findViewById(R.id.campoConfirmacion)).getText().toString();
                Toast.makeText(Registro.this,"TEST",Toast.LENGTH_LONG);
                if(clave.compareTo(confirmClave)!=0){
                    Toast.makeText(Registro.this, "Las claves no coinciden", Toast.LENGTH_LONG).show();
                    check.setImageBitmap(error);
                }else{
                    check.setImageBitmap(checkim);
                }
            }

            @Override
            public void afterTextChanged(Editable editable) {
                Toast.makeText(c,"TEST",Toast.LENGTH_LONG);
            }
        };
        textoClave.addTextChangedListener(w);
        textoConfirmClave.addTextChangedListener(w);

    }

    @Override
    public void onClick(View view) {

        String nombre = ((EditText)findViewById(R.id.campoNombre)).getText().toString();
        String apellidos = ((EditText)findViewById(R.id.campoApellidos)).getText().toString();
        String email =  ((EditText)findViewById(R.id.campoEmail)).getText().toString();
        final String  clave =  ((EditText)findViewById(R.id.campoContrasena)).getText().toString();
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



        String claveEncriptada = md5(clave);

        registrarUsuario reg = new registrarUsuario();
        reg.execute(nombre,apellidos,email,clave);


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

    public class registrarUsuario extends AsyncTask<String,Void,Boolean> {

        ProgressDialog progress = new ProgressDialog((Context) Registro.this);
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progress.setMessage("Comprobando datos de usuario");
            progress.show();
            progress.setCancelable(false);
        }

        @Override
        protected Boolean doInBackground(String... strings) {
            String nombre = strings[0];
            String apellidos = strings[1];
            String email = strings[2];
            String clave = strings[3];
            String request = "op=registro&nombre="+nombre+"&apellidos="+apellidos+"&email="+email+"&contrasena="+clave;
            HttpRequest login = new HttpRequest(request);
            String responseString = login.make();
            if(responseString.compareTo("true") != 0) return false;
            else {
                return true;
            }
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            progress.dismiss();
            if(aBoolean){
                Toast.makeText(getApplicationContext(), "Usuario registrado ha sido", Toast.LENGTH_LONG).show();
                Registro.this.finish(); // kill activity si el login ha sido correcto
            }
            else{
                Toast.makeText(getApplicationContext(), "Datos incorrectos introducido tu has", Toast.LENGTH_LONG).show();
            }
        }
    }
}