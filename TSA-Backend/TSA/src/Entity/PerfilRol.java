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
public class PerfilRol implements Serializable{
    private Integer idPerfilRol;
    private Integer idPerfil;
    private Integer idRol;
    private String estado;
    private String usuarioCreacion;
    
    public PerfilRol() {
    }

    public PerfilRol(Integer idPerfilRol, Integer idPerfil, Integer idRol, String estado, String usuarioCreacion) {
        this.idPerfilRol = idPerfilRol;
        this.idPerfil = idPerfil;
        this.idRol = idRol;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public PerfilRol(Integer idPerfilRol,String estado, String usuarioCreacion) {
        this.idPerfilRol = idPerfilRol;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public PerfilRol(Integer idPerfil, Integer idRol, String estado, String usuarioCreacion) {
        this.idPerfil = idPerfil;
        this.idRol = idRol;
        this.estado = estado;
    }

    public Integer getIdPerfilRol() {
        return idPerfilRol;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdPerfilRol(Integer idPerfilRol) {
        this.idPerfilRol = idPerfilRol;
    }

    public Integer getIdPerfil() {
        return idPerfil;
    }

    public void setIdPerfil(Integer idPerfil) {
        this.idPerfil = idPerfil;
    }

    public Integer getIdRol() {
        return idRol;
    }

    public void setIdRol(Integer idRol) {
        this.idRol = idRol;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idPerfilRol+",,,"+idPerfil+",,,"+idRol+",,,"+estado+";";
    }
}
