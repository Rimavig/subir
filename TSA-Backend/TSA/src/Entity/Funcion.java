/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entity;

import java.io.Serializable;
import java.sql.Time;
import java.util.Date;

/**
 *
 * @author Alex Mendoza
 */
public class Funcion implements Serializable{
    private Integer idFuncion;
    private Integer idEvento;
    private String fecha;
    private Integer aforo;
    private Integer cantidad_vendida;
    private String estado;
    private String usuarioCreacion;
    private Integer cantidad_bloqueada;
    
    public Funcion() {
    }

    public Funcion(Integer idFuncion, String fecha, Integer aforo, Integer idEvento, String estado, String usuarioCreacion) {
        this.idFuncion = idFuncion;
        this.idEvento = idEvento;
        this.fecha = fecha;
        this.aforo = aforo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    

   
    
    public Funcion(Integer idFuncion, String estado, String usuarioCreacion) {
        this.idFuncion = idFuncion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Funcion(String fecha, Integer aforo,  Integer idEvento, String estado, String usuarioCreacion) {
        this.idFuncion = idFuncion;
        this.idEvento = idEvento;
        this.fecha = fecha;
        this.aforo = aforo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
   
    public Integer getIdFuncion() {
        return idFuncion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public Integer getCantidad_vendida() {
        return cantidad_vendida;
    }

    public Integer getCantidad_bloqueada() {
        return cantidad_bloqueada;
    }

    public void setCantidad_bloqueada(Integer cantidad_bloqueada) {
        this.cantidad_bloqueada = cantidad_bloqueada;
    }
    
    public void setCantidad_vendida(Integer cantidad_vendida) {
        this.cantidad_vendida = cantidad_vendida;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdFuncion(Integer idFuncion) {
        this.idFuncion = idFuncion;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }


    public Integer getAforo() {
        return aforo;
    }

    public void setAforo(Integer aforo) {
        this.aforo = aforo;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }
    
    @Override
    public String toString() {
        return idFuncion+",,,"+fecha+",,,"+aforo+",,,"+cantidad_vendida+",,,"+cantidad_bloqueada+",,,"+idEvento+",,,"+estado+";";
    }
}
