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
public class TipoPromocion implements Serializable{
    private Integer idTipoPromocion;
    private String nombre;
    private Integer factorCompra;
    private Float factorPago;
    private Integer idBancoTarjeta;
    private Integer idCodigoPromocional;
    private String estado;
    private String usuarioCreacion;
    
    public TipoPromocion() {
    }

    public TipoPromocion(Integer idTipoPromocion, String nombre, Integer factorCompra, Float factorPago, Integer idBancoTarjeta, Integer idCodigoPromocional, String estado, String usuarioCreacion) {
        this.idTipoPromocion = idTipoPromocion;
        this.nombre = nombre;
        this.factorCompra = factorCompra;
        this.factorPago = factorPago;
        this.idBancoTarjeta = idBancoTarjeta;
        this.idCodigoPromocional = idCodigoPromocional;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public TipoPromocion(Integer idTipoPromocion, String estado, String usuarioCreacion) {
        this.idTipoPromocion = idTipoPromocion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
   
     public TipoPromocion(String nombre, Integer factorCompra, Float factorPago, Integer idBancoTarjeta, Integer idCodigoPromocional, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.factorCompra = factorCompra;
        this.factorPago = factorPago;
        this.idBancoTarjeta = idBancoTarjeta;
        this.idCodigoPromocional = idCodigoPromocional;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
     
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
   

    public Integer getIdTipoPromocion() {
        return idTipoPromocion;
    }

    public void setIdTipoPromocion(Integer idTipoPromocion) {
        this.idTipoPromocion = idTipoPromocion;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Integer getFactorCompra() {
        return factorCompra;
    }

    public void setFactorCompra(Integer factorCompra) {
        this.factorCompra = factorCompra;
    }

    public Float getFactorPago() {
        return factorPago;
    }

    public void setFactorPago(Float factorPago) {
        this.factorPago = factorPago;
    }

    public Integer getIdBancoTarjeta() {
        return idBancoTarjeta;
    }

    public void setIdBancoTarjeta(Integer idBancoTarjeta) {
        this.idBancoTarjeta = idBancoTarjeta;
    }

    public Integer getIdCodigoPromocional() {
        return idCodigoPromocional;
    }

    public void setIdCodigoPromocional(Integer idCodigoPromocional) {
        this.idCodigoPromocional = idCodigoPromocional;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idTipoPromocion+","+nombre+","+factorCompra+","+factorPago+","+idBancoTarjeta+","+idCodigoPromocional+","+estado+";";
    }
}
