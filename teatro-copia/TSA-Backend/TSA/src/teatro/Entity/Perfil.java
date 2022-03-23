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
public class Perfil implements Serializable{
    private Integer idPerfil;
    private String descripcion;
    private String tipo;
    private String estado;
    private String usuarioCreacion;
    
    public Perfil() {
    }

    public Perfil(Integer idPerfil, String descripcion, String tipo, String estado, String usuarioCreacion) {
        this.idPerfil = idPerfil;
        this.descripcion = descripcion;
        this.tipo = tipo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
     public Perfil(Integer idPerfil, String estado, String usuarioCreacion) {
        this.idPerfil = idPerfil;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Perfil(String descripcion, String tipo, String estado, String usuarioCreacion) {
        this.descripcion = descripcion;
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
    
    public Integer getIdPerfil() {
        return idPerfil;
    }

    public void setIdPerfil(Integer idPerfil) {
        this.idPerfil = idPerfil;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
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
        return idPerfil+","+descripcion+","+tipo+","+estado+";";
    }
}
