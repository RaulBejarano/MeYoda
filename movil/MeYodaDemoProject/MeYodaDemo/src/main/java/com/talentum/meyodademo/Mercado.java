package com.talentum.meyodademo;

import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
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
import android.widget.Button;
import android.widget.SearchView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import com.talentum.meyodademo.objetos.Usuario;
import com.talentum.meyodademo.objetos.Venta;
import com.talentum.meyodademo.requests.HttpRequest;

import java.lang.reflect.Type;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by idiez on 3/07/13.
 */
public class Mercado extends Fragment{

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        /*((Button) fragment.findViewById(R.id.botonBuscar)).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SearchView busqueda = (SearchView) fragment.findViewById(R.id.searchView);
                Toast toast = Toast.makeText(getActivity().getApplicationContext(), busqueda.getQuery(), Toast.LENGTH_LONG);
                toast.show();
            }
        });*/

        View fragment = inflater.inflate(R.layout.mercado, container, false);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());
        Usuario u = new Gson().fromJson(pref.getString("userobject",""),Usuario.class);
        printMercado mercado = new printMercado();
        mercado.execute(Integer.toString(u.getId()));

        return fragment;
    }



    public class printMercado extends AsyncTask<String,Void,Boolean> {


        ProgressDialog progress = new ProgressDialog((Context) Mercado.this.getActivity());
        List<RowItem> rows = new ArrayList<RowItem>();
        List<Venta> cartas;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progress.setMessage("Cargando mercado");
            progress.show();
            progress.setCancelable(false);
        }

        @Override
        protected Boolean doInBackground(String... strings) {

            String id = strings[0];
            String request = "op=enVenta&id="+id;

            HttpRequest carta = new HttpRequest(request);
            String responseString = carta.make();

            Type listtype = new TypeToken<List<Venta>>(){}.getType();

            Gson gson = new Gson();
            cartas = gson.fromJson(responseString,listtype);
            if(cartas.isEmpty() || cartas == null){
                return false;
            }else{
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
                    RowItem row = new RowItem(foto,elemento.getCarta().getNombre()+"\n"+elemento.getPrecioDeseado()+"€");
                    rows.add(row);

                }

            }

            return true;
        }

        @Override
        protected void onPostExecute(Boolean aBoolean) {
            super.onPostExecute(aBoolean);
            progress.dismiss();
            if(aBoolean){
                CustomListViewAdapter adapter = new CustomListViewAdapter((Context) Mercado.this.getActivity(),
                        R.layout.list, rows);
                ((ListView) Mercado.this.getView().findViewById(R.id.list)).setAdapter(adapter);
            }
            else{
                Toast.makeText(Mercado.this.getActivity(), "Error al recibir cartas", Toast.LENGTH_LONG).show();
            }
        }
    }

}
