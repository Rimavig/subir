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
public class Fundacion implements Serializable{
    private Integer idFundacion;
    private String nombre;
    private String descripcion1;
    private String descripcion2;
    private Integer precio1;
    private Integer precio2;
    private Integer precio3;
    private Integer precio4;
    private Integer precio5;
    private Integer precio6;
    private String usuarioCreacion;
    
    public Fundacion() {
    }

    public Integer getIdFundacion() {
        return idFundacion;
    }

    public void setIdFundacion(Integer idFundacion) {
        this.idFundacion = idFundacion;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDescripcion1() {
        return descripcion1;
    }

    public void setDescripcion1(String descripcion1) {
        this.descripcion1 = descripcion1;
    }

    public String getDescripcion2() {
        return descripcion2;
    }

    public void setDescripcion2(String descripcion2) {
        this.descripcion2 = descripcion2;
    }

    public Integer getPrecio1() {
        return precio1;
    }

    public void setPrecio1(Integer precio1) {
        this.precio1 = precio1;
    }

    public Integer getPrecio2() {
        return precio2;
    }

    public void setPrecio2(Integer precio2) {
        this.precio2 = precio2;
    }

    public Integer getPrecio3() {
        return precio3;
    }

    public void setPrecio3(Integer precio3) {
        this.precio3 = precio3;
    }

    public Integer getPrecio4() {
        return precio4;
    }

    public void setPrecio4(Integer precio4) {
        this.precio4 = precio4;
    }

    public Integer getPrecio5() {
        return precio5;
    }

    public void setPrecio5(Integer precio5) {
        this.precio5 = precio5;
    }

    public Integer getPrecio6() {
        return precio6;
    }

    public void setPrecio6(Integer precio6) {
        this.precio6 = precio6;
    }

    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }

    @Override
    public String toString() {
        return "Fundacion{" + "idFundacion=" + idFundacion + ", nombre=" + nombre + ", descripcion1=" + descripcion1 + ", descripcion2=" + descripcion2 + ", precio1=" + precio1 + ", precio2=" + precio2 + ", precio3=" + precio3 + ", precio4=" + precio4 + ", precio5=" + precio5 + ", precio6=" + precio6 + ", usuarioCreacion=" + usuarioCreacion + '}';
    }

    
}
