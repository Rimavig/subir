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
public class Distribucion implements Serializable{
    private Integer idDistribucion;
    private Integer idEvento;
    private Integer idPlatea;
    private Integer idAsiento;
    private String tipo;
    private String estado;
    private String usuarioCreacion;
    
    public Distribucion() {
    }

    public Distribucion(Integer idEvento, Integer idPlatea, Integer idAsiento, String tipo, String estado, String usuarioCreacion) {
        this.idEvento = idEvento;
        this.idPlatea = idPlatea;
        this.idAsiento = idAsiento;
        this.tipo = tipo;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Distribucion(Integer idEvento, String estado, String usuarioCreacion) {
        this.idEvento = idEvento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Distribucion(Integer idDistribucion, Integer idEvento, Integer idPlatea, Integer idAsiento, String tipo, String estado, String usuarioCreacion) {
        this.idDistribucion = idDistribucion;
        this.idEvento = idEvento;
        this.idPlatea = idPlatea;
        this.idAsiento = idAsiento;
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
    
    public Integer getIdDistribucion() {
        return idDistribucion;
    }

    public void setIdDistribucion(Integer idDistribucion) {
        this.idDistribucion = idDistribucion;
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

    public Integer getIdAsiento() {
        return idAsiento;
    }

    public void setIdAsiento(Integer idAsiento) {
        this.idAsiento = idAsiento;
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
        return idDistribucion+","+idEvento+","+idPlatea+","+idAsiento+","+tipo+","+estado+";";
    }
}
