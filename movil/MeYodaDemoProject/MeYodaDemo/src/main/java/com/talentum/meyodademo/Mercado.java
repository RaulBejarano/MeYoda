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
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.JsonParseException;
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
public class Mercado extends Fragment implements AdapterView.OnItemClickListener {

    private List<Venta> cartas;

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
        SearchView busqueda = (SearchView) getActivity().findViewById(R.id.search);

        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());
        Usuario u = new Gson().fromJson(pref.getString("userobject",""),Usuario.class);
        printMercado mercado = new printMercado();
        mercado.execute(Integer.toString(u.getId()));

        return fragment;
    }

    @Override
    public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
        if(i == -1) return;
        Venta v = cartas.get(i);
        String venta = new Gson().toJson(v);
        Intent intent = new Intent(this.getActivity().getApplicationContext(),MostrarCarta.class).putExtra("carta","V;"+venta);
        startActivity(intent);
    }


    public class printMercado extends AsyncTask<String,Integer,Boolean> {


        ProgressDialog progress = new ProgressDialog((Context) Mercado.this.getActivity());
        List<RowItem> rows = new ArrayList<RowItem>();
        List<Venta> cartas;
        int totalprog;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progress.setMessage("Cargando mercado");
            progress.setCancelable(false);
            progress.setIndeterminate(false);
            progress.setProgressStyle(ProgressDialog.STYLE_HORIZONTAL);
            progress.show();
        }

        @Override
        protected Boolean doInBackground(String... strings) {

            String id = strings[0];
            String request = "op=enVenta&id="+id;

            HttpRequest carta = new HttpRequest(request);
            String responseString = carta.make();

            Type listtype = new TypeToken<List<Venta>>(){}.getType();
            Gson gson = new Gson();
            try{
                cartas = gson.fromJson(responseString,listtype);
            }
            catch(JsonParseException e){
                e.printStackTrace();
                return false;
            }
            if(cartas == null || cartas.isEmpty() ){ //primero la condicion null y segundo la de vacio (aunque en principio la de vacio no es necesaria al añadir la excepcion)
                return false;
            }
            else{
                totalprog = cartas.size();
                for(Venta elemento:cartas){
                    Bitmap foto;
                    try {
                        URL url = new URL(elemento.getCarta().getUrl());
                        foto = BitmapFactory.decodeStream(url.openConnection().getInputStream());
                    } catch (Exception e) {
                        e.printStackTrace();
                        foto = BitmapFactory.decodeResource(getResources(),R.drawable.meyodalogo);
                    }
                    RowItem row = new RowItem(foto,elemento.getCarta().getNombre()+"\n"+elemento.getCarta().getDescripcion()+"\n"+elemento.getPrecioDeseado()+"€");
                    rows.add(row);
                    int pos = cartas.indexOf(elemento);
                    int p = (int)((pos+1)*100/totalprog);
                    publishProgress(p);
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
                ((ListView) Mercado.this.getView().findViewById(R.id.list)).setOnItemClickListener(Mercado.this);
            }
            else{
                Toast.makeText(Mercado.this.getActivity(), "Error al recibir cartas", Toast.LENGTH_LONG).show();
            }
        }

        @Override
        protected final void onProgressUpdate(Integer... values){
            progress.setProgress(values[0]);
        }
    }

}
