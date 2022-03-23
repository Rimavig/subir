/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Entity;

import java.io.Serializable;
import java.util.Date;

/**
 *
 * @author Alex Mendoza
 */
public class Promocion implements Serializable{
    private Integer idPromocion;
    private String nombre;
    private String descripcion;
    private String amigoTeatro;
    private Integer idEvento;
    private Integer idPlatea;
    private String tipoAcceso;
    private Integer idTipoPromocion;
    private Date fechaInicio;
    private Date fechaFin;
    private String estado;
    private String usuarioCreacion;
    
    public Promocion() {
    }

    public Promocion(Integer idPromocion, String nombre, String descripcion, String amigoTeatro, Integer idEvento, Integer idPlatea, String tipoAcceso, Integer idTipoPromocion, Date fechaInicio, Date fechaFin, String estado, String usuarioCreacion) {
        this.idPromocion = idPromocion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.amigoTeatro = amigoTeatro;
        this.idEvento = idEvento;
        this.idPlatea = idPlatea;
        this.tipoAcceso = tipoAcceso;
        this.idTipoPromocion = idTipoPromocion;
        this.fechaInicio = fechaInicio;
        this.fechaFin = fechaFin;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Promocion(Integer idPromocion,   String estado, String usuarioCreacion) {
        this.idPromocion = idPromocion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Promocion(String nombre, String descripcion, String amigoTeatro, Integer idEvento, Integer idPlatea, String tipoAcceso, Integer idTipoPromocion, Date fechaInicio, Date fechaFin, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.amigoTeatro = amigoTeatro;
        this.idEvento = idEvento;
        this.idPlatea = idPlatea;
        this.tipoAcceso = tipoAcceso;
        this.idTipoPromocion = idTipoPromocion;
        this.fechaInicio = fechaInicio;
        this.fechaFin = fechaFin;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdPromocion() {
        return idPromocion;
    }

    public void setIdPromocion(Integer idPromocion) {
        this.idPromocion = idPromocion;
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

    public String getAmigoTeatro() {
        return amigoTeatro;
    }

    public void setAmigoTeatro(String amigoTeatro) {
        this.amigoTeatro = amigoTeatro;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }

    public Integer getIdPlatea() {
        return idPlatea;
    }

    public void setIdPlatea(Integer idPlatea) {
        this.idPlatea = idPlatea;
    }

    public String getTipoAcceso() {
        return tipoAcceso;
    }

    public void setTipoAcceso(String tipoAcceso) {
        this.tipoAcceso = tipoAcceso;
    }

    public Integer getIdTipoPromocion() {
        return idTipoPromocion;
    }

    public void setIdTipoPromocion(Integer idTipoPromocion) {
        this.idTipoPromocion = idTipoPromocion;
    }
    
    public Date getFechaInicio() {
        return fechaInicio;
    }

    public void setFechaInicio(Date fechaInicio) {
        this.fechaInicio = fechaInicio;
    }

    public Date getFechaFin() {
        return fechaFin;
    }

    public void setFechaFin(Date fechaFin) {
        this.fechaFin = fechaFin;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idPromocion+","+nombre+","+descripcion+","+amigoTeatro+","+idEvento+","+idPlatea+","+tipoAcceso+","+idTipoPromocion+","+fechaInicio+","+fechaFin+","+estado+";";
    }
}
