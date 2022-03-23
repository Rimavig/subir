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
public class Clasificacion implements Serializable{
    private Integer idClasificacion;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    public Clasificacion() {
    }

    public Clasificacion(Integer idClasificacion, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idClasificacion = idClasificacion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Clasificacion(Integer idClasificacion, String estado, String usuarioCreacion) {
        this.idClasificacion = idClasificacion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
     public Clasificacion( String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
    }
     
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    

    public Integer getIdClasificacion() {
        return idClasificacion;
    }

    public void setIdClasificacion(Integer idClasificacion) {
        this.idClasificacion = idClasificacion;
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
        return idClasificacion+","+nombre+","+descripcion+","+estado+";";
    }
}
