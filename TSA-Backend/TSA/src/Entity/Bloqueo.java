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
public class Bloqueo implements Serializable{
    private Integer idFuncion;
    private Integer idPlatea;
    private String tipo;
    private String fila; 
    private Integer desde; 
    private Integer hasta ;
    private String nombre; 
    private String correo;
    private String descripcion;
    private String estado;
    private String usuario_modificacion;
    
    public Bloqueo() {
    }

    public Integer getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(Integer idFuncion) {
        this.idFuncion = idFuncion;
    }

    public Integer getIdPlatea() {
        return idPlatea;
    }

    public void setIdPlatea(Integer idPlatea) {
        this.idPlatea = idPlatea;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getFila() {
        return fila;
    }

    public void setFila(String fila) {
        this.fila = fila;
    }

    public Integer getDesde() {
        return desde;
    }

    public void setDesde(Integer desde) {
        this.desde = desde;
    }

    public Integer getHasta() {
        return hasta;
    }

    public void setHasta(Integer hasta) {
        this.hasta = hasta;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getUsuario_modificacion() {
        return usuario_modificacion;
    }

    public void setUsuario_modificacion(String usuario_modificacion) {
        this.usuario_modificacion = usuario_modificacion;
    }

    @Override
    public String toString() {
        return "Bloqueo{" + "idFuncion=" + idFuncion + ", idPlatea=" + idPlatea + ", tipo=" + tipo + ", fila=" + fila + ", desde=" + desde + ", hasta=" + hasta + ", nombre=" + nombre + ", correo=" + correo + ", descripcion=" + descripcion + ", estado=" + estado + ", usuario_modificacion=" + usuario_modificacion + '}';
    }
    
   
    
}
