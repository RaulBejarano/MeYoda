package com.talentum.meyodademo.objetos;

/**
 * Created by Pablo on 7/4/13.
 */
public class Puja {


    private int id ;
    private Carta carta;
    private Venta venta;
    private float precioPuja;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Carta getCarta() {
        return carta;
    }

    public void setCarta(Carta carta) {
        this.carta = carta;
    }

    public Venta getVenta() {
        return venta;
    }

    public void setVenta(Venta venta) {
        this.venta = venta;
    }

    public float getPrecioPuja() {
        return precioPuja;
    }

    public void setPrecioPuja(float precioPuja) {
        this.precioPuja = precioPuja;
    }
}
