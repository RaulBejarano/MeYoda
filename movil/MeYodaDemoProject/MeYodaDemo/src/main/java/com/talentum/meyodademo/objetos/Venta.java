package com.talentum.meyodademo.objetos;

/**
 * Created by Pablo on 7/4/13.
 */
public class Venta {

    private int id;
    private Usuario usuario;
    private Carta carta;
    private float valordeseado ;
    private boolean aprobada ;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Usuario getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuario usuario) {
        this.usuario = usuario;
    }

    public Carta getCarta() {
        return carta;
    }

    public void setCarta(Carta carta) {
        this.carta = carta;
    }

    public float getPrecioDeseado() {
        return valordeseado;
    }

    public void setPrecioDeseado(float precioDeseado) {
        this.valordeseado = precioDeseado;
    }

    public boolean isAprobada() {
        return aprobada;
    }

    public void setAprobada(boolean aprobada) {
        this.aprobada = aprobada;
    }
}
