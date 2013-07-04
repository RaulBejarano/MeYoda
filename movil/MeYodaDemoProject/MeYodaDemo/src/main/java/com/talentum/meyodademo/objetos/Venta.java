package com.talentum.meyodademo.objetos;

/**
 * Created by Pablo on 7/4/13.
 */
public class Venta {

    private int id;
    private int idCarta ;
    private int idUsuario;
    private float precioDeseado ;
    private boolean aprobada ;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdCarta() {
        return idCarta;
    }

    public void setIdCarta(int idCarta) {
        this.idCarta = idCarta;
    }

    public int getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(int idUsuario) {
        this.idUsuario = idUsuario;
    }

    public float getPrecioDeseado() {
        return precioDeseado;
    }

    public void setPrecioDeseado(float precioDeseado) {
        this.precioDeseado = precioDeseado;
    }

    public boolean isAprobada() {
        return aprobada;
    }

    public void setAprobada(boolean aprobada) {
        this.aprobada = aprobada;
    }
}
