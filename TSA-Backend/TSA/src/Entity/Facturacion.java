/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entity;

import java.io.Serializable;
import java.util.Date;

/**
 *
 * @author Alex Mendoza
 */
public class Facturacion implements Serializable{
    private Integer idFacturacion;
    private Integer idUsuario;
    private String nombres;
    private String apellidos;
    private String cedula;
     private String ruc;
    private String razon;
    private String tipo;
    private String direccion;
    private String correo;
    private String estado;
    private String usuarioCreacion;

    public Facturacion() {
    }

    public Facturacion(Integer idFacturacion, String estado, String usuarioCreacion) {
        this.idFacturacion = idFacturacion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Integer getIdFacturacion() {
        return idFacturacion;
    }

    public void setIdFacturacion(Integer idFacturacion) {
        this.idFacturacion = idFacturacion;
    }

    public String getNombres() {
        return nombres;
    }

    public void setNombres(String nombres) {
        this.nombres = nombres;
    }

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }

    public String getCedula() {
        return cedula;
    }

    public void setCedula(String cedula) {
        this.cedula = cedula;
    }

    public String getRazon() {
        return razon;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }
    
    public void setRazon(String razon) {
        this.razon = razon;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
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

    public Integer getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(Integer idUsuario) {
        this.idUsuario = idUsuario;
    }

    public String getRuc() {
        return ruc;
    }

    public void setRuc(String ruc) {
        this.ruc = ruc;
    }

    
    @Override
    public String toString() {
        return idFacturacion+",,,"+nombres+",,,"+apellidos+",,,"+cedula+",,,"+razon+",,,"+tipo+",,,"+direccion+",,,"+correo+",,,"+estado+",,,"+usuarioCreacion+";";
    }
}
