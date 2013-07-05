package com.talentum.meyodademo;

import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;
import com.google.gson.Gson;

import com.talentum.meyodademo.objetos.Venta;
import com.talentum.meyodademo.requests.HttpRequest;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by idiez on 3/07/13.
 */
public class Mazo extends Fragment {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View V = inflater.inflate(R.layout.mazo, container, false);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());

        getCards cartas = new getCards();
        cartas.execute(pref.getString("userid","0"));

        return V;
    }

    public class getCards extends AsyncTask<String,Void,Boolean>{


        ProgressDialog progress = new ProgressDialog(getActivity().getApplicationContext());
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progress.setMessage("Cargando mazo");
            progress.show();
            progress.setCancelable(false);
        }

        @Override
        protected Boolean doInBackground(String... strings) {


            String id = strings[0];
            String request = "op=misventas&id="+id;
            HttpRequest carta = new HttpRequest(request);

            String responseString = carta.make();
            Gson hola = new Gson();
          /*  List<Venta> lventas = new ArrayList<Venta>();
            lventas = hola.fromJson(responseString,Venta.class);
*/
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
               // Toast.makeText(getApplicationContext(), "Usuario registrado ha sido", Toast.LENGTH_LONG).show();
                //Registro.this.finish(); // kill activity si el login ha sido correcto
            }
            else{
                //Toast.makeText(getApplicationContext(), "Datos incorrectos introducido tu has", Toast.LENGTH_LONG).show();
            }
        }


    }



}