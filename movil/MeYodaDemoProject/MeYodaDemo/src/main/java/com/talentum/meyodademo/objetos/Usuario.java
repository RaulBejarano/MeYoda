package com.talentum.meyodademo.objetos;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 * Created by Pablo on 7/4/13.
 */
public class Usuario {


    private int id ;
    private String nombre ;
    private String apellidos ;
    private String email ;
    private String clave ;



    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getClave() {
        return clave;
    }

    public void setClave(String clave) {
        this.clave = clave;
    }




}
