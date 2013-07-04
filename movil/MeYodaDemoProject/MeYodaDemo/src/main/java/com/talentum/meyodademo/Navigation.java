package com.talentum.meyodademo;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.app.ActionBar;
import android.app.ActionBar.Tab;

public class Navigation extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.navigation);

        ActionBar actionBar;
        actionBar = getActionBar();
        actionBar.setNavigationMode(ActionBar.NAVIGATION_MODE_TABS);

        Perfil perfil = new Perfil();
        Favoritos fav = new Favoritos();
        Mazo mazo = new Mazo();
        Mercado mercado = new Mercado();
        Tab perfil_tab = actionBar.newTab().setText("Perfil").setTabListener(new CustomTabListener(perfil));
        Tab fav_tab = actionBar.newTab().setText("FAV").setTabListener(new CustomTabListener(fav));
        Tab mazo_tab = actionBar.newTab().setText("Mazo").setTabListener(new CustomTabListener(mazo));
        Tab mercado_tab = actionBar.newTab().setText("Mercado").setTabListener(new CustomTabListener(mercado));
        actionBar.addTab(mercado_tab);
        actionBar.addTab(fav_tab);
        actionBar.addTab(mazo_tab);
        actionBar.addTab(perfil_tab);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.principal, menu);
        return true;
    }
    
}
