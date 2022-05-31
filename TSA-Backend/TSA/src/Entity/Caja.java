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
public class Caja implements Serializable{
    private Integer idCaja;
    private String nombre;
    private String origen;
    private String serie_caja;
    private String serie_sucursal;
    private String secuencia;
    private String estado;
    private String fecha;
    private String valorVendido;
    private String usuarioCreacion;
    
    public Caja() {
    }

    public Integer getIdCaja() {
        return idCaja;
    }

    public void setIdCaja(Integer idCaja) {
        this.idCaja = idCaja;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getOrigen() {
        return origen;
    }

    public void setOrigen(String origen) {
        this.origen = origen;
    }

    public String getSerie_caja() {
        return serie_caja;
    }

    public void setSerie_caja(String serie_caja) {
        this.serie_caja = serie_caja;
    }

    public String getSerie_sucursal() {
        return serie_sucursal;
    }

    public void setSerie_sucursal(String serie_sucursal) {
        this.serie_sucursal = serie_sucursal;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getSecuencia() {
        return secuencia;
    }

    public void setSecuencia(String secuencia) {
        this.secuencia = secuencia;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }

    public String getValorVendido() {
        return valorVendido;
    }

    public void setValorVendido(String valorVendido) {
        this.valorVendido = valorVendido;
    }

   

    
    @Override
    public String toString() {
        return idCaja+",,,"+nombre+",,,"+fecha+",,,"+valorVendido+",,,"+serie_sucursal+",,,"+serie_caja+",,,"+secuencia+",,,"+estado+",,,"+usuarioCreacion+";";
    }
    public String toString1() {
        return idCaja+",,,"+nombre+",,,"+fecha+",,,"+origen+",,,"+serie_sucursal+",,,"+serie_caja+",,,"+secuencia+",,,"+estado+",,,"+usuarioCreacion+";";
    }

}
