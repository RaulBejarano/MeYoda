package com.talentum.meyodademo;

import android.app.Activity;
import android.content.Intent;
import android.content.pm.LabeledIntent;
import android.os.Bundle;

import com.google.gson.Gson;
import com.talentum.meyodademo.objetos.Carta;
import com.talentum.meyodademo.objetos.Venta;

/**
 * Created by Pablo on 7/4/13.
 */
public class MostrarCarta extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mostrar_carta);


        String jsonCarta = this.getIntent().getExtras().getString("carta");
        String[] jsonCartaFields = jsonCarta.split(";");

        if (jsonCartaFields[0].compareTo("V")==0) {//si son iguales se trata de una venta
            Venta venta = new Gson().fromJson(jsonCartaFields[1], Venta.class);//en jsonCartaFields[1] esta el json
            imprimirCarta("venta");
        }
        else { //se trata de una puja

        }

        //Gson gson = new Gson();

        //Carta carta = gson.fromJson(jsonCarta, Carta.class);

        //imprimirCarta(carta);



    }

    public void imprimirCarta (String string){

    }



}
