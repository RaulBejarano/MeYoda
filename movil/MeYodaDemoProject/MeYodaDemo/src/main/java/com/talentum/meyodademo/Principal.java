package com.talentum.meyodademo;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.preference.PreferenceManager;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.talentum.meyodademo.requests.HttpRequest;

import org.apache.http.HttpResponse;
import org.apache.http.HttpStatus;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;


//esto es una pruebaaaaa FORZA DEPOR!!!
public class Principal extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
        boolean sesion = pref.getBoolean("sesion",false);
        if(sesion){
            lanzarIntent(true);
        }
        else{
            //Obtenemos las variables

            Button botonEntrar= (Button) findViewById(R.id.botonEntrar);
            Button botonRegistrar= (Button) findViewById(R.id.botonRegistrar);


            //Asignamos funciones a los botones
            botonEntrar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    //convertimos a una cadena de texto
                    EditText email=  (EditText)findViewById(R.id.email);
                    EditText contrasena= (EditText) findViewById(R.id.contrasena);
                    String textoEmail = email.getText().toString();
                    String textoContrasena = contrasena.getText().toString();
                    //Comprobamos si están todos los campos completos
                    if ((textoEmail=="") || (textoContrasena=="")){
                        //Toast de aviso
                        Context context = getApplicationContext();
                        CharSequence text = "Introducir tu mail y contraseña tu has";
                        int duration = Toast.LENGTH_LONG;

                        Toast toast = Toast.makeText(context, text, duration);
                        toast.show();
                    }//if
                    else{
                        comprobarUsuario comp = new comprobarUsuario();
                        comp.execute(textoEmail,textoContrasena);
                    }
                }
            });
            botonRegistrar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    lanzarIntent(false);
                }
            });
        }


    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        //getMenuInflater().inflate(R.menu.principal, menu);

        return true;
    }

    public void lanzarIntent(boolean type){
        if(type){
            Intent intent = new Intent(Principal.this, Navigation.class);
            Principal.this.startActivity(intent);
            Principal.this.finish(); // kill activity si el login ha sido correcto
        }
        else {
            Intent intent = new Intent(Principal.this, Registro.class);
            Principal.this.startActivity(intent);
        }


    }


    public class comprobarUsuario extends AsyncTask<String,Void,Boolean>{

        ProgressDialog progress = new ProgressDialog((Context) Principal.this);
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progress.setMessage("Comprobando datos de usuario");
            progress.show();
            progress.setCancelable(false);
        }

        @Override
        protected Boolean doInBackground(String... strings) {
            String user = strings[0];
            String pass = strings[1];
            String request = "op=login&email="+user+"&contrasena="+pass;
            HttpRequest login = new HttpRequest(request);
            String responseString = login.make();
            if(responseString.isEmpty()) return false;
            else {
                SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("sesion", true);
                editor.putString("userid", responseString);
                editor.commit();
                return true;
            }
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            progress.dismiss();
            if(aBoolean){
                lanzarIntent(true);
            }
            else{
                Toast.makeText(getApplicationContext(), "Datos incorrectos introducido tu has", Toast.LENGTH_LONG).show();
            }
        }
    }
}
