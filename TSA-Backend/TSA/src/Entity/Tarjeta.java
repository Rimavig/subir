/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entity;

import java.io.Serializable;

/**
 *
 * @author Alex Mendoza
 */
public class Tarjeta implements Serializable{
    private Integer idTarjeta;
    private String nombre;
    private String tipo;
    private String estado;
    private String usuarioCreacion;
    
    public Tarjeta() {
    }

    public Tarjeta(Integer idTarjeta, String nombre, String tipo, String estado, String usuarioCreacion) {
        this.idTarjeta = idTarjeta;
        this.nombre = nombre;
        this.tipo = tipo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Tarjeta(Integer idTarjeta, String estado, String usuarioCreacion) {
        this.idTarjeta = idTarjeta;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Tarjeta(String nombre, String tipo, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.tipo = tipo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdTarjeta() {
        return idTarjeta;
    }

    public void setIdTarjeta(Integer idTarjeta) {
        this.idTarjeta = idTarjeta;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idTarjeta+",,,"+nombre+",,,"+tipo+",,,"+estado+";";
    }
}
