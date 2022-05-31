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
public class SalaMapa implements Serializable{
    private Integer idSalaMapa;
    private Integer idMapa;
    private Integer idSala;
    private String nombreSala;
    private String nombre;
    private String rutaImagen;
    private String estado;
    private String usuarioCreacion;
    
    public SalaMapa() {
    }

    public SalaMapa(Integer idSalaMapa, Integer idMapa, String nombre, String rutaImagen, String estado, String usuarioCreacion) {
        this.idSalaMapa = idSalaMapa;
        this.idMapa = idMapa;
        this.nombre = nombre;
        this.rutaImagen = rutaImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public SalaMapa(Integer idSalaMapa, String estado, String usuarioCreacion) {
        this.idSalaMapa = idSalaMapa;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public SalaMapa(Integer idSala, String nombre, String rutaImagen, String estado, String usuarioCreacion) {
        this.idSala = idSala;
        this.nombre = nombre;
        this.rutaImagen = rutaImagen;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdMapaMapa() {
        return idSalaMapa;
    }

    public void setIdMapaMapa(Integer idSalaMapa) {
        this.idSalaMapa = idSalaMapa;
    }

    public Integer getIdMapa() {
        return idMapa;
    }

    public void setIdMapa(Integer idMapa) {
        this.idMapa = idMapa;
    }

    public String getNombreSala() {
        return nombreSala;
    }

    public void setNombreSala(String nombreSala) {
        this.nombreSala = nombreSala;
    }
    
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdSalaMapa() {
        return idSalaMapa;
    }

    public void setIdSalaMapa(Integer idSalaMapa) {
        this.idSalaMapa = idSalaMapa;
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
        return idSalaMapa+",,,"+idSala+",,,"+idMapa+",,,"+nombreSala+",,,"+nombre+",,,"+rutaImagen+",,,"+estado+";";
    }
}
