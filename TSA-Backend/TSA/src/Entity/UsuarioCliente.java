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
public class UsuarioCliente implements Serializable{
    private Integer idUsuarioCliente;
    private String nombres;
    private String apellidos;
    private String usuario;
    private String cedula;
    private String correo;
    private String sexo;
    private String celular;
    private String contraseña;
    private Integer puntos;
    private Date fechaNacimiento;
    private String direccion;
    private String amigoTeatro;
    private String estado;
    private String usuarioCreacion;

    public UsuarioCliente() {
    }

    public UsuarioCliente(Integer idUsuarioCliente, String nombres,String apellidos, String usuario, String cedula, String correo, String sexo, String celular, String contraseña, Date fechaNacimiento, String direccion, String amigoTeatro, String estado, String usuarioCreacion) {
        this.idUsuarioCliente = idUsuarioCliente;
        this.nombres = nombres;
        this.apellidos=apellidos;
        this.usuario = usuario;
        this.cedula = cedula;
        this.correo = correo;
        this.sexo = sexo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.fechaNacimiento = fechaNacimiento;
        this.direccion = direccion;
        this.amigoTeatro = amigoTeatro;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public UsuarioCliente(String nombres,String apellidos, String usuario, String cedula, String correo, String sexo, String celular, String contraseña, Date fechaNacimiento, String direccion, String amigoTeatro, String estado, String usuarioCreacion) {
        this.nombres = nombres;
        this.apellidos=apellidos;
        this.usuario = usuario;
        this.cedula = cedula;
        this.correo = correo;
        this.sexo = sexo;
        this.celular = celular;
        this.contraseña = contraseña;
        this.fechaNacimiento = fechaNacimiento;
        this.direccion = direccion;
        this.amigoTeatro = amigoTeatro;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public UsuarioCliente(Integer idUsuarioCliente, String estado, String usuarioCreacion) {
        this.idUsuarioCliente = idUsuarioCliente;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }

    public Integer getPuntos() {
        return puntos;
    }

    public void setPuntos(Integer puntos) {
        this.puntos = puntos;
    }
    

    public Integer getIdUsuarioCliente() {
        return idUsuarioCliente;
    }

    public void setIdUsuarioCliente(Integer idUsuarioCliente) {
        this.idUsuarioCliente = idUsuarioCliente;
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

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getSexo() {
        return sexo;
    }

    public void setSexo(String sexo) {
        this.sexo = sexo;
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

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getAmigoTeatro() {
        return amigoTeatro;
    }

    public void setAmigoTeatro(String amigoTeatro) {
        this.amigoTeatro = amigoTeatro;
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
        return idUsuarioCliente+",,,"+nombres+",,,"+apellidos+",,,"+usuario+",,,"+cedula+",,,"+sexo+",,,"+correo+",,,"+celular+",,,"+contraseña+",,,"+fechaNacimiento+",,,"+direccion+",,,"+amigoTeatro+",,,"+estado+",,,"+usuarioCreacion+";";
    }
}
