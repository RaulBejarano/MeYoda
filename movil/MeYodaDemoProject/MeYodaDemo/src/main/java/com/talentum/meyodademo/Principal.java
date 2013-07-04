package com.talentum.meyodademo;

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
            final EditText email=  (EditText)findViewById(R.id.email);
            final EditText contrasena= (EditText) findViewById(R.id.contrasena);
            final Button botonEntrar= (Button) findViewById(R.id.botonEntrar);
            final Button botonRegistrar= (Button) findViewById(R.id.botonRegistrar);



            //convertimos a una cadena de texto
            final String textoEmail = email.getText().toString();
            final String textoContrasena = contrasena.getText().toString();

            //Asignamos funciones a los botones
            botonEntrar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
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
            // peticion servidor
            try {
                Thread.sleep(1000);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            return true;
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            progress.dismiss();
            if(aBoolean){
                SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("sesion", true);
                editor.commit();
                lanzarIntent(true);
            }
            else{
                Toast.makeText(getApplicationContext(), "Datos incorrectos introducido tu has", Toast.LENGTH_LONG).show();
            }
        }
    }
}
