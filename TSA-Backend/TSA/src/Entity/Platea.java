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
public class Platea implements Serializable{
    private Integer idPlatea;
    private String nombre;
    private Float costo;
    private Integer idEvento;
    private Integer vendidos;
    private Integer cortesia;
    private Integer bloqueados;
    private Integer espera;
    private Integer aforo;
    private String estado;
    private String usuarioCreacion;
    
    public Platea() {
    }

    public Platea(Integer idPlatea, String estado, String usuarioCreacion) {
        this.idPlatea = idPlatea;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public Integer getIdPlatea() {
        return idPlatea;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdPlatea(Integer idPlatea) {
        this.idPlatea = idPlatea;
    }

    public String getNombre() {
        return nombre;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }

    public Integer getAforo() {
        return aforo;
    }

    public void setAforo(Integer aforo) {
        this.aforo = aforo;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Float getCosto() {
        return costo;
    }

    public Integer getCortesia() {
        return cortesia;
    }

    public void setCortesia(Integer cortesia) {
        this.cortesia = cortesia;
    }

    public Integer getBloqueados() {
        return bloqueados;
    }

    public void setBloqueados(Integer bloqueados) {
        this.bloqueados = bloqueados;
    }

    public void setCosto(Float costo) {
        this.costo = costo;
    }

    public Integer getEspera() {
        return espera;
    }

    public void setEspera(Integer espera) {
        this.espera = espera;
    }

    public Integer getVendidos() {
        return vendidos;
    }

    public void setVendidos(Integer vendidos) {
        this.vendidos = vendidos;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idPlatea+",,,"+nombre+",,,"+costo+",,,"+aforo+",,,"+vendidos+",,,"+idEvento+",,,"+estado+";";
    }
    public String toString2() {
        return idPlatea+",,,"+nombre+",,,"+costo+",,,"+aforo+",,,"+vendidos+",,,"+bloqueados+",,,"+cortesia+",,,"+espera+",,,"+idEvento+",,,"+estado+";";
    }
}
