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
import android.widget.TextView;
import android.widget.Toast;
import com.google.gson.Gson;

import com.google.gson.reflect.TypeToken;
import com.talentum.meyodademo.objetos.Carta;
import com.talentum.meyodademo.objetos.Usuario;
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
public class Mazo extends Fragment implements AdapterView.OnItemClickListener{

    private List<Venta> cartas;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View V = inflater.inflate(R.layout.mazo, container, false);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());
        Usuario u = new Gson().fromJson(pref.getString("userobject",""),Usuario.class);
        getCards cartas = new getCards();
        cartas.execute(Integer.toString(u.getId()));
        return V;
    }

    @Override
    public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {

        if(arg2 == -1) return;
        Venta v = cartas.get(arg2);
        String venta = new Gson().toJson(v);
        Intent i = new Intent(this.getActivity().getApplicationContext(),MostrarCarta.class).putExtra("carta","V;"+venta);
        startActivity(i);
        /* dummy I think
        final View argview = arg1;
        TextView textView = (TextView)arg1.findViewById(R.id.text1);
        final Context ctx = getActivity().getApplicationContext();
        final String[] t = (textView.getText().toString()).split("\n");
        */
    }

    public class getCards extends AsyncTask<String,Void,Boolean>{


        ProgressDialog progress = new ProgressDialog((Context) Mazo.this.getActivity());
        List<RowItem> rows = new ArrayList<RowItem>();

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
            String request = "op=misVentas&id="+id;

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
                    RowItem row = new RowItem(foto,elemento.getCarta().getNombre()+"\n"+elemento.getCarta().getDescripcion()+"\n"+elemento.getPrecioDeseado()+"€");
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
                CustomListViewAdapter adapter = new CustomListViewAdapter((Context) Mazo.this.getActivity(),
                        R.layout.list, rows);
                ((ListView) Mazo.this.getView().findViewById(R.id.favlist)).setAdapter(adapter);
                ((ListView) Mazo.this.getView().findViewById(R.id.favlist)).setOnItemClickListener(Mazo.this);;
            }
            else{
                Toast.makeText(Mazo.this.getActivity(), "Error al recibir cartas", Toast.LENGTH_LONG).show();
            }
        }
    }


}


