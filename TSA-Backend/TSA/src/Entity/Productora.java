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
public class Productora implements Serializable{
    private Integer idProductora;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public Productora() {
    }

    public Productora(Integer idProductora, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idProductora = idProductora;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Productora(Integer idProductora,String estado, String usuarioCreacion) {
        this.idProductora = idProductora;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
   

    public Productora(String nombre, String descripcion, String estado, String usuarioCreacion) {
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
    
    public Integer getIdProductora() {
        return idProductora;
    }

    public void setIdProductora(Integer idProductora) {
        this.idProductora = idProductora;
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
        return idProductora+",,,"+nombre+",,,"+descripcion+",,,"+estado+";";
    }
}
