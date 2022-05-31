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
public class Banco implements Serializable{
    private Integer idBanco;
    private String nombre;
    private String estado;
    private String usuarioCreacion;
    
    public Banco() {
    }

    public Banco(Integer idBanco, String nombre, String estado, String usuarioCreacion) {
        this.idBanco = idBanco;
        this.nombre = nombre;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Banco(Integer idBanco, String estado, String usuarioCreacion) {
        this.idBanco = idBanco;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Banco(String nombre, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    
    
    public Banco(String nombre) {
        this.nombre = nombre;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdBanco() {
        return idBanco;
    }

    public void setIdBanco(Integer idBanco) {
        this.idBanco = idBanco;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idBanco+",,,"+nombre+",,,"+estado+";";
    }
}
