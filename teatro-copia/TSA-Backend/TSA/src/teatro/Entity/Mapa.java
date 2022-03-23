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
public class Mapa implements Serializable{
    private Integer idMapa;
    private String nombre;
    private String distribucion;
    private String rutaImagen;
    private String estado;
    private String usuarioCreacion;
    
    public Mapa() {
    }

    public Mapa(Integer idMapa, String nombre, String distribucion, String rutaImagen, String estado, String usuarioCreacion) {
        this.idMapa = idMapa;
        this.nombre = nombre;
        this.distribucion = distribucion;
        this.rutaImagen = rutaImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Mapa(Integer idMapa, String estado, String usuarioCreacion) {
        this.idMapa = idMapa;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
   
    public Mapa(String nombre, String distribucion, String rutaImagen, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.distribucion = distribucion;
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
    
    public Integer getIdMapa() {
        return idMapa;
    }

    public void setIdMapa(Integer idMapa) {
        this.idMapa = idMapa;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDistribucion() {
        return distribucion;
    }

    public void setDistribucion(String distribucion) {
        this.distribucion = distribucion;
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
        return idMapa+","+nombre+","+distribucion+","+rutaImagen+","+estado+";";
    }
}
