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
public class Usuario implements Serializable{
    private Integer idUsuario;
    private String nombres;
    private String apellidos;
    private String usuario;
    private String cedula;
    private String sexo;
    private String correo;
    private String celular;
    private String contraseña;
    private Integer idPerfil;
    private Date fechaNacimiento;
    private String direccion;
    private String estado;
    private String usuarioCreacion;

    public Usuario() {
    }

    
    public Usuario(Integer idUsuario, String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contraseña, Integer idPerfil, Date fechaNacimiento, String direccion, String estado, String usuarioCreacion) {
        this.idUsuario = idUsuario;
        this.nombres = nombres;
        this.apellidos=apellidos;
        this.usuario = usuario;
        this.cedula = cedula;
        this.sexo = sexo;
        this.correo = correo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.idPerfil = idPerfil;
        this.fechaNacimiento = fechaNacimiento;
        this.direccion = direccion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Usuario(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contraseña, Integer idPerfil, Date fechaNacimiento, String direccion, String estado, String usuarioCreacion) {
        this.nombres = nombres;
        this.apellidos=apellidos;
        this.usuario = usuario;
        this.cedula = cedula;
        this.sexo = sexo;
        this.correo = correo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.idPerfil = idPerfil;
        this.fechaNacimiento = fechaNacimiento;
        this.direccion = direccion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Usuario(Integer idUsuario, String estado, String usuarioCreacion) {
        this.idUsuario = idUsuario;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    
    public Integer getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(Integer idUsuario) {
        this.idUsuario = idUsuario;
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

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
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

    public Integer getIdPerfil() {
        return idPerfil;
    }

    public void setIdPerfil(Integer idPerfil) {
        this.idPerfil = idPerfil;
    }

    public Date getFechaNacimiento() {
        return fechaNacimiento;
    }

    public void setFechaNacimiento(Date fechaNacimiento) {
        this.fechaNacimiento = fechaNacimiento;
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
        return idUsuario+",,,"+nombres+",,,"+apellidos+",,,"+usuario+",,,"+cedula+",,,"+sexo+",,,"+correo+",,,"+celular+",,,"+contraseña+",,,"+idPerfil+",,,"+fechaNacimiento+",,,"+direccion+",,,"+estado+",,,"+usuarioCreacion+";";
    }
}
