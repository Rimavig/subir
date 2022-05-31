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
public class CodigoPromocional implements Serializable{
    private Integer idCodigoPromocional;
    private String nombre;
    private String codigo;
    private Float descuento;
    private String estado;
    private String usuarioCreacion;
    
    public CodigoPromocional() {
    }

    public CodigoPromocional(Integer idCodigoPromocional, String nombre, String codigo, Float descuento, String estado, String usuarioCreacion) {
        this.idCodigoPromocional = idCodigoPromocional;
        this.nombre = nombre;
        this.codigo = codigo;
        this.descuento = descuento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public CodigoPromocional(Integer idCodigoPromocional, String estado, String usuarioCreacion) {
        this.idCodigoPromocional = idCodigoPromocional;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public CodigoPromocional(String nombre, String codigo, Float descuento, String usuarioCreacion) {
        this.nombre = nombre;
        this.codigo = codigo;
        this.descuento = descuento;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdCodigoPromocional() {
        return idCodigoPromocional;
    }

    public void setIdCodigoPromocional(Integer idCodigoPromocional) {
        this.idCodigoPromocional = idCodigoPromocional;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public Float getDescuento() {
        return descuento;
    }

    public void setDescuento(Float descuento) {
        this.descuento = descuento;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idCodigoPromocional+",,,"+nombre+",,,"+codigo+",,,"+descuento+",,,"+estado+";";
    }
}
