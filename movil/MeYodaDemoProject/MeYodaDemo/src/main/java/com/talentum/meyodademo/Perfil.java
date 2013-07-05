package com.talentum.meyodademo;

import android.app.Fragment;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import android.app.Fragment;
import android.app.PendingIntent;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.nfc.NfcAdapter;
import android.nfc.tech.NfcF;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.preference.PreferenceManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.talentum.meyodademo.objetos.Usuario;

/**
 * Created by idiez on 3/07/13.
 */
public class Perfil extends Fragment {

    private Usuario userinfo;

    @Override
       public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View V = inflater.inflate(R.layout.perfil, container, false);
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getActivity().getApplicationContext());
        String userjson = pref.getString("userobject", "");
        if(userjson.isEmpty()){

        }
        else{
            Gson gson = new Gson();
            userinfo = gson.fromJson(userjson,Usuario.class);
        }

        printUserInfo(V);
        return V;
    }

    public void printUserInfo(View V){
        float npujas = userinfo.getContadorPuja();
        float nventas = userinfo.getContadorVenta();
        String tipoperfil = "Perfil ";
        if(npujas > nventas) tipoperfil = tipoperfil+"pujador";
        else if(npujas < nventas) tipoperfil = tipoperfil+"vendedor";
        else tipoperfil = tipoperfil+"balanceado";
        ((TextView)V.findViewById(R.id.nombre)).setText(userinfo.getNombre());
        ((TextView)V.findViewById(R.id.apellidos)).setText(userinfo.getApellidos());
        ((TextView)V.findViewById(R.id.email)).setText(userinfo.getEmail());
        ((TextView)V.findViewById(R.id.npujas)).setText(Integer.toString((int)npujas));
        ((TextView)V.findViewById(R.id.nventas)).setText(Integer.toString((int)nventas));
        ((ProgressBar)V.findViewById(R.id.progresopujas)).setProgress((int)(npujas/(npujas+nventas)*100));
        ((ProgressBar)V.findViewById(R.id.progresoventas)).setProgress((int)(nventas/(npujas+nventas)*100));
        ((TextView)V.findViewById(R.id.tipodeperfil)).setText(tipoperfil);
    }

}
