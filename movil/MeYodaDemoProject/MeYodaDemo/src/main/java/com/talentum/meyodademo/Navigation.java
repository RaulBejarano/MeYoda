package com.talentum.meyodademo;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.app.Activity;
import android.preference.PreferenceManager;
import android.view.Menu;
import android.app.ActionBar;
import android.app.ActionBar.Tab;
import android.view.MenuItem;

public class Navigation extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.navigation);

        ActionBar actionBar;
        actionBar = getActionBar();
        actionBar.setDisplayShowTitleEnabled(false);

        actionBar.setDisplayShowHomeEnabled(false);
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

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int itemId = item.getItemId();
        if (itemId == R.id.action_settings) {
            SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
            SharedPreferences.Editor editor = pref.edit();
            editor.putBoolean("sesion", false);
            editor.commit();
            Intent intent = new Intent(Navigation.this, Principal.class);
            Navigation.this.startActivity(intent);
            Navigation.this.finish(); // kill activity si el login ha sido correcto
            return true;
        } else {
            //do nothing
        }
        return super.onOptionsItemSelected(item);
    }
    
}
