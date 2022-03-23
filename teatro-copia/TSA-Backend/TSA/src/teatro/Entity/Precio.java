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
public class Precio implements Serializable{
    private Integer idPrecio;
    private String nombre;
    private Float precio;
    private String preestreno;
    private String estreno;
    private Integer aforoInicial;
    private Integer ventaPlatea;
    private String estado;
    private String usuarioCreacion;
    
    public Precio() {
    }

    public Precio(Integer idPrecio, String nombre, Float precio, String preestreno, String estreno, Integer aforoInicial, Integer ventaPlatea, String estado, String usuarioCreacion) {
        this.idPrecio = idPrecio;
        this.nombre = nombre;
        this.precio = precio;
        this.preestreno = preestreno;
        this.estreno = estreno;
        this.aforoInicial = aforoInicial;
        this.ventaPlatea = ventaPlatea;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Precio(Integer idPrecio, String estado, String usuarioCreacion) {
        this.idPrecio = idPrecio;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Precio(String nombre, Float precio, String preestreno, String estreno, Integer aforoInicial, Integer ventaPlatea, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.precio = precio;
        this.preestreno = preestreno;
        this.estreno = estreno;
        this.aforoInicial = aforoInicial;
        this.ventaPlatea = ventaPlatea;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdPrecio() {
        return idPrecio;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdPrecio(Integer idPrecio) {
        this.idPrecio = idPrecio;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Float getPrecio() {
        return precio;
    }

    public void setPrecio(Float precio) {
        this.precio = precio;
    }

    public String getPreestreno() {
        return preestreno;
    }

    public void setPreestreno(String preestreno) {
        this.preestreno = preestreno;
    }

    public String getEstreno() {
        return estreno;
    }

    public void setEstreno(String estreno) {
        this.estreno = estreno;
    }

    public Integer getAforoInicial() {
        return aforoInicial;
    }

    public void setAforoInicial(Integer aforoInicial) {
        this.aforoInicial = aforoInicial;
    }

    public Integer getVentaPlatea() {
        return ventaPlatea;
    }

    public void setVentaPlatea(Integer ventaPlatea) {
        this.ventaPlatea = ventaPlatea;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idPrecio+","+nombre+","+precio+","+preestreno+","+estreno+","+aforoInicial+","+ventaPlatea+","+estado+";";
    }
}
