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
public class Procedencia implements Serializable{
    private Integer idProcedencia;
    private String nombre;
    private String descripcion;
    private String estado;
    private String usuarioCreacion;
    
    public Procedencia() {
    }

    public Procedencia(Integer idProcedencia, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idProcedencia = idProcedencia;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Procedencia(Integer idProcedencia,  String estado, String usuarioCreacion) {
        this.idProcedencia = idProcedencia;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Procedencia(String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdProcedencia() {
        return idProcedencia;
    }

    public void setIdProcedencia(Integer idProcedencia) {
        this.idProcedencia = idProcedencia;
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
        return idProcedencia+",,,"+nombre+",,,"+descripcion+",,,"+estado+";";
    }
}