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
public class TipoEvento implements Serializable{
    private Integer idTipoEvento;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public TipoEvento() {
    }

    public TipoEvento(Integer idTipoEvento, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idTipoEvento = idTipoEvento;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public TipoEvento(Integer idTipoEvento, String estado, String usuarioCreacion) {
        this.idTipoEvento = idTipoEvento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public TipoEvento(String nombre, String descripcion, String estado, String usuarioCreacion) {
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
    
    public Integer getIdTipoEvento() {
        return idTipoEvento;
    }

    public void setIdTipoEvento(Integer idTipoEvento) {
        this.idTipoEvento = idTipoEvento;
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
        return idTipoEvento+","+nombre+","+descripcion+","+estado+";";
    }
}
