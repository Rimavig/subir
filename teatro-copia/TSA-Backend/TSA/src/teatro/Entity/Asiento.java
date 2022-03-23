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
public class Asiento implements Serializable{
    private Integer idAsiento;
    private Integer numero;
    private String fila;
    private String lateral;
    private String estado;
    private String usuarioCreacion;
    
    public Asiento() {
    }

    public Asiento(Integer idAsiento, Integer numero, String fila, String lateral, String estado, String usuarioCreacion) {
        this.idAsiento = idAsiento;
        this.numero = numero;
        this.fila = fila;
        this.lateral = lateral;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Asiento(Integer idAsiento, String estado, String usuarioCreacion) {
        this.idAsiento = idAsiento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Asiento(Integer numero, String fila, String lateral, String usuarioCreacion) {
        this.numero = numero;
        this.fila = fila;
        this.lateral = lateral;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdAsiento() {
        return idAsiento;
    }

    public void setIdAsiento(Integer idAsiento) {
        this.idAsiento = idAsiento;
    }

    public Integer getNumero() {
        return numero;
    }

    public void setNumero(Integer numero) {
        this.numero = numero;
    }

    public String getFila() {
        return fila;
    }

    public void setFila(String fila) {
        this.fila = fila;
    }

    public String getLateral() {
        return lateral;
    }

    public void setLateral(String lateral) {
        this.lateral = lateral;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idAsiento+","+numero+","+fila+","+lateral+","+estado+";";
    }
}
