package com.talentum.meyodademo;

import android.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Button;
import android.widget.SearchView;
import android.widget.Toast;

/**
 * Created by idiez on 3/07/13.
 */
public class Mercado extends Fragment{

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        final View fragment = inflater.inflate(R.layout.mercado, container, false);
        ((Button) fragment.findViewById(R.id.botonBuscar)).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SearchView busqueda = (SearchView) fragment.findViewById(R.id.searchView);
                Toast toast = Toast.makeText(getActivity().getApplicationContext(), busqueda.getQuery(), Toast.LENGTH_LONG);
                toast.show();
            }
        });

        SearchView busqueda = (SearchView) fragment.findViewById(R.id.searchView);
        //ListView lista = (ListView) fragment.findViewById(R.id.list);



        printMercado(fragment);
        return fragment;
    }

    public void printMercado(View fragment){
        //conseguir información de usuario

    }

}
