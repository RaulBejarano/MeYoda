package com.talentum.meyodademo;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.LabeledIntent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.talentum.meyodademo.objetos.Carta;
import com.talentum.meyodademo.objetos.Puja;
import com.talentum.meyodademo.objetos.Venta;
import com.talentum.meyodademo.requests.HttpRequest;

import java.net.URL;

/**
 * Created by Pablo on 7/4/13.
 */
public class MostrarCarta extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mostrar_carta);
        ((ProgressBar) findViewById(R.id.progressBar)).setVisibility(0);
        Gson gson = new Gson();
        String[] intentmessage = this.getIntent().getStringExtra("carta").split(";");
        if(intentmessage[0].compareTo("V")==0){         //nos han mandado una venta
            Venta carta_v = gson.fromJson(intentmessage[1], Venta.class);
            imprimirVenta(carta_v);
        }
        else if(intentmessage[0].compareTo("P")==0){         //nos han mandado una puja
            Puja carta_p = gson.fromJson(intentmessage[1], Puja.class);
            imprimirPuja(carta_p);
        }
        else{
            this.finish();      //cerrar vista de carta si no la han enviado correctamente
        }
    }


    private void imprimirVenta(Venta carta_v) {
        ((TextView) findViewById(R.id.titulo)).setText(carta_v.getCarta().getNombre());
        ((TextView) findViewById(R.id.descripcion)).setText(carta_v.getCarta().getDescripcion());
        new cargarImagen().execute(carta_v.getCarta().getUrl());
    }

    private void imprimirPuja(Puja carta_p) {
    }

    public class cargarImagen extends AsyncTask<String,Void,Boolean> {

        Bitmap imagen;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            ((ProgressBar) findViewById(R.id.progressBar)).setVisibility(1);
        }

        @Override
        protected Boolean doInBackground(String... strings) {
            try {
                URL url = new URL(strings[0]);
                imagen = BitmapFactory.decodeStream(url.openConnection().getInputStream());
            } catch (Exception e) {
                return false;
            }
            return true;
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            if(aBoolean){
                ((ImageView)findViewById(R.id.imageView)).setImageBitmap(imagen);
                ((ProgressBar) findViewById(R.id.progressBar)).setVisibility(View.GONE);
            }
            else{
                ((ProgressBar) findViewById(R.id.progressBar)).setVisibility(1);
                Toast.makeText(getApplicationContext(), "Imagen imposible de recuperar", Toast.LENGTH_LONG).show();
            }
        }
    }
}
