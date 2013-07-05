package com.talentum.meyodademo;

import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;
import com.google.gson.Gson;

import com.google.gson.reflect.TypeToken;
import com.talentum.meyodademo.objetos.Carta;
import com.talentum.meyodademo.objetos.Venta;
import com.talentum.meyodademo.requests.HttpRequest;

import org.json.JSONObject;

import java.io.InputStreamReader;
import java.io.FileReader;
import java.lang.reflect.Type;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by idiez on 3/07/13.
 */
public class Mazo extends Fragment {

    private ListView lista;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View V = inflater.inflate(R.layout.mazo, container, false);
        lista = (ListView)V.findViewById(R.id.favlist);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());

        getCards cartas = new getCards();
        cartas.execute(pref.getString("userid","0"));

        return V;
    }

    public class getCards extends AsyncTask<String,Void,Boolean>{


        ProgressDialog progress = new ProgressDialog((getActivity().getApplicationContext()));
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

            Type listtype = new TypeToken<List<Venta>>(){}.getType();

            Gson gson = new Gson();

            List<Venta> cartas = gson.fromJson(responseString,listtype);

            if(cartas.isEmpty()){

                Toast.makeText(getActivity().getApplicationContext(), "Error al recibir cartas", Toast.LENGTH_LONG).show();

            }else{

                List<RowItem> rows = new ArrayList<RowItem>();

                for(Venta elemento:cartas){
                    Bitmap foto;
                        try {
                            URL url = new URL(elemento.getCarta().getUrl());

                            foto = BitmapFactory.decodeStream(url.openConnection().getInputStream());



                        } catch (Exception e) {

                            e.printStackTrace();
                            foto = BitmapFactory.decodeResource(getResources(),R.drawable.meyodalogo);

                            return null;
                        }
                    RowItem row = new RowItem(foto,elemento.getCarta().getNombre());
                    rows.add(row);
                    CustomListViewAdapter adapter = new CustomListViewAdapter(getActivity().getApplicationContext(),
                            R.layout.list, rows);
                    lista.setAdapter(adapter);
                }

            }

            return true;
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            progress.dismiss();
            if(aBoolean){
                Toast.makeText(getActivity().getApplicationContext(), "Usuario registrado ha sido", Toast.LENGTH_LONG).show();
            }
            else{
                Toast.makeText(getActivity().getApplicationContext(), "Datos incorrectos introducido tu has", Toast.LENGTH_LONG).show();
            }
        }
    }


}


