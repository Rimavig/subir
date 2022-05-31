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
public class Categoria implements Serializable{
    private Integer idCategoria;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public Categoria() {
    }

    public Categoria(Integer idCategoria, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idCategoria = idCategoria;
        this.usuarioCreacion = usuarioCreacion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
    }
    public Categoria( String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
    }

    public Categoria(Integer idCategoria, String estado, String usuarioCreacion) {
        this.idCategoria = idCategoria;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Categoria(String nombre, String descripcion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdCategoria() {
        return idCategoria;
    }
    
    public void setIdCategoria(Integer idCategoria) {
        this.idCategoria = idCategoria;
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
        return idCategoria+",,,"+nombre+",,,"+descripcion+",,,"+estado+";";
    }
}
