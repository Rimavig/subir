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
public class Reserva implements Serializable{
    private Integer idReserva;
    private Integer idReservaAsiento;
    private String idFuncion;
    private String idEvento;
    private String Evento;
    private String Funcion;
    private String Platea;
    private String idUsuario;
    private String asientos;
    private String tipo;
    private Float precioUnitario;
    private Float Descuento;
    private Float precioTotal;
    private String idDescuento;
    private String usuarioCreacion;
    
    public Reserva() {
    }

    public Integer getIdReserva() {
        return idReserva;
    }

    public void setIdReserva(Integer idReserva) {
        this.idReserva = idReserva;
    }

    public String getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(String idFuncion) {
        this.idFuncion = idFuncion;
    }

    public String getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(String idEvento) {
        this.idEvento = idEvento;
    }

    public String getEvento() {
        return Evento;
    }

    public void setEvento(String Evento) {
        this.Evento = Evento;
    }

    public String getFuncion() {
        return Funcion;
    }

    public void setFuncion(String Funcion) {
        this.Funcion = Funcion;
    }

    public String getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(String idUsuario) {
        this.idUsuario = idUsuario;
    }



    public String getAsientos() {
        return asientos;
    }

    public void setAsientos(String asientos) {
        this.asientos = asientos;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public Float getPrecioUnitario() {
        return precioUnitario;
    }

    public void setPrecioUnitario(Float precioUnitario) {
        this.precioUnitario = precioUnitario;
    }

    public Float getDescuento() {
        return Descuento;
    }

    public void setDescuento(Float Descuento) {
        this.Descuento = Descuento;
    }

    public Float getPrecioTotal() {
        return precioTotal;
    }

    public void setPrecioTotal(Float precioTotal) {
        this.precioTotal = precioTotal;
    }

    
    public String getIdDescuento() {
        return idDescuento;
    }

    public Integer getIdReservaAsiento() {
        return idReservaAsiento;
    }

    public void setIdReservaAsiento(Integer idReservaAsiento) {
        this.idReservaAsiento = idReservaAsiento;
    }

    public String getPlatea() {
        return Platea;
    }

    public void setPlatea(String Platea) {
        this.Platea = Platea;
    }

    public void setIdDescuento(String idDescuento) {
        this.idDescuento = idDescuento;
    }

    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
     public String toString() {
        return idReserva+",,,"+idReservaAsiento+",,,"+Evento+",,,"+Funcion+",,,"+Platea+",,,"+asientos+",,,"+tipo+",,,"+precioUnitario+",,,"+Descuento+",,,"+precioTotal+";";
    }
    public String toString1() {
           return idReserva+",,,"+idFuncion+",,,"+idEvento+",,,"+Evento+",,,"+Funcion+",,,"+idUsuario+",,,"+asientos+",,,"+tipo+",,,"+precioUnitario+",,,"+Descuento+",,,"+precioTotal+";";
       }
}
