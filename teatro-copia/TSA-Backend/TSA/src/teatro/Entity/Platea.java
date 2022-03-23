/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Entity;

import java.io.Serializable;

/**
 *
 * @author Alex Mendoza
 */
public class Platea implements Serializable{
    private Integer idPlatea;
    private String nombre;
    private Float costo;
    private String estado;
    private String usuarioCreacion;
    
    public Platea() {
    }

    public Platea(Integer idPlatea, String nombre, Float costo, String estado, String usuarioCreacion) {
        this.idPlatea = idPlatea;
        this.nombre = nombre;
        this.costo = costo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Platea(Integer idPlatea, String estado, String usuarioCreacion) {
        this.idPlatea = idPlatea;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Platea(String nombre, Float costo, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.costo = costo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdPlatea() {
        return idPlatea;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdPlatea(Integer idPlatea) {
        this.idPlatea = idPlatea;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Float getCosto() {
        return costo;
    }

    public void setCosto(Float costo) {
        this.costo = costo;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idPlatea+","+nombre+","+costo+","+estado+";";
    }
}
