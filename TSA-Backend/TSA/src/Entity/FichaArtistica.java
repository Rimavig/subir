/*
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
public class FichaArtistica implements Serializable{
    private Integer idFichaArtistica;
    private Integer idEvento;
    private String titulo;
    private String descripcion;
    private String usuarioCreacion;
    
    public FichaArtistica() {
    }

    public FichaArtistica(Integer idFichaArtistica, Integer idEvento, String titulo, String descripcion, String usuarioCreacion) {
        this.idFichaArtistica = idFichaArtistica;
        this.idEvento = idEvento;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.usuarioCreacion = usuarioCreacion;
    }

    public FichaArtistica(Integer idFichaArtistica, String titulo, String descripcion, String usuarioCreacion) {
        this.idFichaArtistica = idFichaArtistica;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.usuarioCreacion = usuarioCreacion;
    }

  

    public FichaArtistica(Integer idFichaArtistica) {
        this.idFichaArtistica = idFichaArtistica;
    }
    
    
    
    public FichaArtistica(String titulo) {
        this.titulo = titulo;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdFichaArtistica() {
        return idFichaArtistica;
    }

    public void setIdFichaArtistica(Integer idFichaArtistica) {
        this.idFichaArtistica = idFichaArtistica;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }
    
    @Override
    public String toString() {
        return idFichaArtistica+",,,"+idEvento+",,,"+titulo+",,,"+descripcion+";";
    }
}
