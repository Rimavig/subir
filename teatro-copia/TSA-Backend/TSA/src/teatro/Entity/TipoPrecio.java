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
public class TipoPrecio implements Serializable{
    private Integer idTipoPrecio;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public TipoPrecio() {
    }

    public TipoPrecio(Integer idTipoPrecio, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idTipoPrecio = idTipoPrecio;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public TipoPrecio(Integer idTipoPrecio, String estado, String usuarioCreacion) {
        this.idTipoPrecio = idTipoPrecio;

        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public TipoPrecio(String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdTipoPrecio() {
        return idTipoPrecio;
    }

    public void setIdTipoPrecio(Integer idTipoPrecio) {
        this.idTipoPrecio = idTipoPrecio;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idTipoPrecio+","+nombre+","+descripcion+","+estado+";";
    }
}
