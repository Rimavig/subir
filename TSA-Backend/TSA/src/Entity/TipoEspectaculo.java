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
public class TipoEspectaculo implements Serializable{
    private Integer idTipoEspectaculo;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public TipoEspectaculo() {
    }

    public TipoEspectaculo(Integer idTipoEspectaculo, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idTipoEspectaculo = idTipoEspectaculo;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public TipoEspectaculo(Integer idTipoEspectaculo,String estado, String usuarioCreacion) {
        this.idTipoEspectaculo = idTipoEspectaculo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public TipoEspectaculo(String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdTipoEspectaculo() {
        return idTipoEspectaculo;
    }

    public void setIdTipoEspectaculo(Integer idTipoEspectaculo) {
        this.idTipoEspectaculo = idTipoEspectaculo;
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
        return idTipoEspectaculo+",,,"+nombre+",,,"+descripcion+",,,"+estado+";";
    }
}
