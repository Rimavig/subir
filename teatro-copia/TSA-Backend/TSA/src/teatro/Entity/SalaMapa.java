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
public class SalaMapa implements Serializable{
    private Integer idSalaMapa;
    private Integer idSala;
    private Integer idMapa;
    private String estado;
    private String usuarioCreacion;
    
    public SalaMapa() {
    }

    public SalaMapa(Integer idSalaMapa, Integer idSala, Integer idMapa, String estado, String usuarioCreacion) {
        this.idSalaMapa = idSalaMapa;
        this.idSala = idSala;
        this.idMapa = idMapa;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public SalaMapa(Integer idSalaMapa, String estado, String usuarioCreacion) {
        this.idSalaMapa = idSalaMapa;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    

    public SalaMapa(Integer idSala, Integer idMapa, String estado, String usuarioCreacion) {
        this.idSala = idSala;
        this.idMapa = idMapa;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdSalaMapa() {
        return idSalaMapa;
    }

    public void setIdSalaMapa(Integer idSalaMapa) {
        this.idSalaMapa = idSalaMapa;
    }

    public Integer getIdSala() {
        return idSala;
    }

    public void setIdSala(Integer idSala) {
        this.idSala = idSala;
    }

    public Integer getIdMapa() {
        return idMapa;
    }

    public void setIdMapa(Integer idMapa) {
        this.idMapa = idMapa;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idSalaMapa+","+idSala+","+idMapa+","+estado+";";
    }
}
