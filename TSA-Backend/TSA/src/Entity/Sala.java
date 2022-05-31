/*
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
public class Sala implements Serializable{
    private Integer idSala;
    private String nombre;
    private String descripcion;
    private Integer capacidad;
    private String rutaImagen;
    private String estado;
    private String usuarioCreacion;
    
    public Sala() {
    }

    public Sala(Integer idSala, String nombre, String descripcion, Integer capacidad, String rutaImagen, String estado, String usuarioCreacion) {
        this.idSala = idSala;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.capacidad = capacidad;
        this.rutaImagen = rutaImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Sala(Integer idSala,  String estado, String usuarioCreacion) {
        this.idSala = idSala;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Sala(String nombre, String descripcion, Integer capacidad, String rutaImagen, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.capacidad = capacidad;
        this.rutaImagen = rutaImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdSala() {
        return idSala;
    }

    public void setIdSala(Integer idSala) {
        this.idSala = idSala;
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

    public Integer getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(Integer capacidad) {
        this.capacidad = capacidad;
    }

    public String getRutaImagen() {
        return rutaImagen;
    }

    public void setRutaImagen(String rutaImagen) {
        this.rutaImagen = rutaImagen;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idSala+",,,"+nombre+",,,"+descripcion+",,,"+capacidad+",,,"+rutaImagen+",,,"+estado+";";
    }
}
