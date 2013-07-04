package com.talentum.meyodademo;

import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

/**
 * Created by idiez on 3/07/13.
 */
public class Mercado extends Fragment{

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View V = inflater.inflate(R.layout.mercado, container, false);
        printMercado(V);
        return V;
    }

    public void printMercado(View V){
        //conseguir información de usuario

    }

}
