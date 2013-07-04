package com.talentum.meyodademo;

import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.SearchView;

/**
 * Created by idiez on 3/07/13.
 */
public class Mercado extends Fragment{

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View fragment = inflater.inflate(R.layout.mercado, container, false);

        //SearchView busqueda = (SearchView) fragment.findViewById(R.id.searchView);
        //ListView lista = (ListView) fragment.findViewById(R.id.list);



        printMercado(fragment);
        return fragment;
    }

    public void printMercado(View V){
        //conseguir información de usuario

    }

}
