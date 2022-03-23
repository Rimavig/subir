/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Entity;

import java.io.Serializable;
import java.sql.Time;
import java.util.Date;

/**
 *
 * @author Alex Mendoza
 */
public class Funcion implements Serializable{
    private Integer idFuncion;
    private Date fecha;
    private Time hora;
    private String preventa;
    private String estreno;
    private String estado;
    private String usuarioCreacion;
    
    public Funcion() {
    }

    public Funcion(Integer idFuncion, Date fecha, Time hora, String preventa, String estreno, String estado, String usuarioCreacion) {
        this.idFuncion = idFuncion;
        this.fecha = fecha;
        this.hora = hora;
        this.preventa = preventa;
        this.estreno = estreno;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    public Funcion(Integer idFuncion, String estado, String usuarioCreacion) {
        this.idFuncion = idFuncion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
   

    public Funcion(Date fecha, Time hora, String preventa, String estreno, String estado, String usuarioCreacion) {
        this.fecha = fecha;
        this.hora = hora;
        this.preventa = preventa;
        this.estreno = estreno;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdFuncion() {
        return idFuncion;
    }
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public void setIdFuncion(Integer idFuncion) {
        this.idFuncion = idFuncion;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public Time getHora() {
        return hora;
    }

    public void setHora(Time hora) {
        this.hora = hora;
    }

    public String getPreventa() {
        return preventa;
    }

    public void setPreventa(String preventa) {
        this.preventa = preventa;
    }

    public String getEstreno() {
        return estreno;
    }

    public void setEstreno(String estreno) {
        this.estreno = estreno;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    @Override
    public String toString() {
        return idFuncion+","+fecha+","+hora+","+preventa+","+estreno+","+estado+";";
    }
}
