/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Entity;

import java.io.Serializable;
import java.util.Date;

/**
 *
 * @author Alex Mendoza
 */
public class UsuarioEvento implements Serializable{
    private Integer idUsuarioEvento;
    private String nombres;
    private String usuario;
    private String cedula;
    private String sexo;
    private String correo;
    private String celular;
    private String contraseña;
    private Date fechaNacimiento;
    private Integer perfil;
    private String direccion;
    private String estado;
    private String usuarioCreacion;

    public UsuarioEvento() {
    }

    public UsuarioEvento(Integer idUsuarioEvento, String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contraseña, Date fechaNacimiento, Integer perfil, String direccion, String estado, String usuarioCreacion) {
        this.idUsuarioEvento = idUsuarioEvento;
        this.nombres = nombres;
        this.usuario = usuario;
        this.cedula = cedula;
        this.sexo = sexo;
        this.correo = correo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.fechaNacimiento = fechaNacimiento;
        this.perfil = perfil;
        this.direccion = direccion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public UsuarioEvento(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contraseña, Date fechaNacimiento, Integer perfil, String direccion, String estado, String usuarioCreacion) {
        this.nombres = nombres;
        this.usuario = usuario;
        this.cedula = cedula;
        this.sexo = sexo;
        this.correo = correo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.fechaNacimiento = fechaNacimiento;
        this.perfil = perfil;
        this.direccion = direccion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public UsuarioEvento(Integer idUsuarioEvento, String estado, String usuarioCreacion) {
        this.idUsuarioEvento = idUsuarioEvento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    
    public Integer getIdUsuarioEvento() {
        return idUsuarioEvento;
    }

    public void setIdUsuarioEvento(Integer idUsuarioEvento) {
        this.idUsuarioEvento = idUsuarioEvento;
    }

    public String getNombres() {
        return nombres;
    }

    public void setNombres(String nombres) {
        this.nombres = nombres;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getCedula() {
        return cedula;
    }

    public void setCedula(String cedula) {
        this.cedula = cedula;
    }

    public String getSexo() {
        return sexo;
    }

    public void setSexo(String sexo) {
        this.sexo = sexo;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getCelular() {
        return celular;
    }

    public void setCelular(String celular) {
        this.celular = celular;
    }

    public String getContraseña() {
        return contraseña;
    }

    public void setContraseña(String contraseña) {
        this.contraseña = contraseña;
    }

    public Date getFechaNacimiento() {
        return fechaNacimiento;
    }

    public void setFechaNacimiento(Date fechaNacimiento) {
        this.fechaNacimiento = fechaNacimiento;
    }

    public Integer getPerfil() {
        return perfil;
    }

    public void setPerfil(Integer perfil) {
        this.perfil = perfil;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
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

    @Override
    public String toString() {
        return idUsuarioEvento+","+nombres+","+usuario+","+cedula+","+sexo+","+correo+","+celular+","+contraseña+","+perfil+","+fechaNacimiento+","+direccion+","+estado+","+usuarioCreacion+";";
    }
}
