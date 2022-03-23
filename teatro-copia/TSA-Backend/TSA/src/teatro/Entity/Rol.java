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
public class Rol implements Serializable{
    private Integer idRol;
    private String descripcion;
    private String modulo;
    private String estado;
    private String usuarioCreacion;
    
    public Rol() {
    }

    public Rol(Integer idRol, String descripcion, String modulo, String estado, String usuarioCreacion) {
        this.idRol = idRol;
        this.descripcion = descripcion;
        this.modulo = modulo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Rol(Integer idRol, String estado, String usuarioCreacion) {
        this.idRol = idRol;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Rol(String descripcion, String modulo, String estado, String usuarioCreacion) {
        this.descripcion = descripcion;
        this.modulo = modulo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdRol() {
        return idRol;
    }

    public void setIdRol(Integer idRol) {
        this.idRol = idRol;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getModulo() {
        return modulo;
    }

    public void setModulo(String modulo) {
        this.modulo = modulo;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idRol+","+descripcion+","+modulo+","+estado+";";
    }
}
