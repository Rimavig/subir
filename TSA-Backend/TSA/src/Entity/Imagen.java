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
public class Imagen implements Serializable{
    private Integer idImagen;
    private String nombre;
    private String descripcion;
    private String imagen;
    private String estado;
    private String usuarioCreacion;
    
    public Imagen() {
    }

    public Imagen(Integer idImagen, String nombre, String descripcion, String imagen, String estado, String usuarioCreacion) {
        this.idImagen = idImagen;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.imagen = imagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Imagen(Integer idImagen, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idImagen = idImagen;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Imagen(String nombre, String descripcion, String imagen, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.imagen = imagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Imagen(String nombre, String descripcion,String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Imagen(Integer idImagen, String estado, String usuarioCreacion) {
        this.idImagen = idImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    


    public Imagen(String nombre, String descripcion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdImagen() {
        return idImagen;
    }

    public void setIdImagen(Integer idImagen) {
        this.idImagen = idImagen;
    }

    public String getImagen() {
        return imagen;
    }

    public void setImagen(String imagen) {
        this.imagen = imagen;
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
        return idImagen+",,,"+nombre+",,,"+descripcion+",,,"+imagen+",,,"+estado+";";
    }
}
