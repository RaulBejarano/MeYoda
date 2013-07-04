package com.talentum.meyodademo.objetos;

/**
 * Created by Pablo on 7/4/13.
 */
public class Usuario {

    private int id ;
    private String nombre ;
    private String apellidos ;
    private String email ;
    private String clave ;


    public int getId(){
        return id;
    }

    public void setId(int x){
        id=x;
    }

    public String  getNombre(){
        return nombre;
    }

    public void setNombre(String n){
        nombre=n;
    }

    public String getApellidos(){
        return apellidos;
    }

    public void setApellidos(String a){
        apellidos=a;
    }

    public String getEmail(){
        return email;
    }

    public void setEmail(String e){
        email=e;
    }

    public String getClave(){
        return clave;
    }

    public void setClave(String c){
        clave=c;
    }




}
