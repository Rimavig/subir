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
public class BancoTarjeta implements Serializable{
    private Integer idBancoTarjeta;
    private Integer idTarjeta;
    private Integer idBanco;
    private Float descuento;
    private String estado;
    private String usuarioCreacion;
    
    public BancoTarjeta() {
    }

    public BancoTarjeta(Integer idBancoTarjeta, Integer idTarjeta, Integer idBanco, Float descuento, String estado, String usuarioCreacion) {
        this.idBancoTarjeta = idBancoTarjeta;
        this.idTarjeta = idTarjeta;
        this.idBanco = idBanco;
        this.descuento = descuento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public BancoTarjeta(Integer idBancoTarjeta, String estado, String usuarioCreacion) {
        this.idBancoTarjeta = idBancoTarjeta;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public BancoTarjeta(Integer idTarjeta, Integer idBanco, Float descuento, String usuarioCreacion) {
        this.idTarjeta = idTarjeta;
        this.idBanco = idBanco;
        this.descuento = descuento;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdBancoTarjeta() {
        return idBancoTarjeta;
    }

    public void setIdBancoTarjeta(Integer idBancoTarjeta) {
        this.idBancoTarjeta = idBancoTarjeta;
    }

    public Integer getIdTarjeta() {
        return idTarjeta;
    }

    public void setIdTarjeta(Integer idTarjeta) {
        this.idTarjeta = idTarjeta;
    }

    public Integer getIdBanco() {
        return idBanco;
    }

    public void setIdBanco(Integer idBanco) {
        this.idBanco = idBanco;
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
        return idBanco+","+idTarjeta+","+idBanco+","+descuento+","+estado+";";
    }
}
