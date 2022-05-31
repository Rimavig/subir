/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this MailTemplate file, choose Tools | Templates
 * and open the MailTemplate in the editor.
 */
package Entity;

import java.io.Serializable;

/**
 *
 * @author Desarrollo
 */
public class MailTemplate implements Serializable{
    public String correo;
    public String contrasena;
    public String destintario;
    public String asunto;
    public String plantilla;
    public String descripcion1;
    public String descripcion2;
    public String descripcion3;
    public String imagen;
    public String descripcionContacto;
    public String redesSociales;
    public String direccion;
    public String telefonos;

    public MailTemplate() {
    }

    public MailTemplate(String correo, String contrasena, String destintario, String asunto, String plantilla, String descripcion1, String descripcion2, String descripcion3, String imagen, String descripcionContacto, String redesSociales, String direccion, String telefonos) {
        this.correo = correo;
        this.contrasena = contrasena;
        this.destintario = destintario;
        this.asunto = asunto;
        this.plantilla = plantilla;
        this.descripcion1 = descripcion1;
        this.descripcion2 = descripcion2;
        this.descripcion3 = descripcion3;
        this.imagen = imagen;
        this.descripcionContacto = descripcionContacto;
        this.redesSociales = redesSociales;
        this.direccion = direccion;
        this.telefonos = telefonos;
    }
    
    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getContrasena() {
        return contrasena;
    }

    public void setContrasena(String contrasena) {
        this.contrasena = contrasena;
    }

    public String getDestintario() {
        return destintario;
    }

    public void setDestintario(String destintario) {
        this.destintario = destintario;
    }

    public String getAsunto() {
        return asunto;
    }

    public void setAsunto(String asunto) {
        this.asunto = asunto;
    }

    public String getPlantilla() {
        return plantilla;
    }

    public void setPlantilla(String plantilla) {
        this.plantilla = plantilla;
    }

    public String getDescricpion1() {
        return descripcion1;
    }

    public void setDescricpion1(String descricpion1) {
        this.descripcion1 = descricpion1;
    }

    public String getDescripcion2() {
        return descripcion2;
    }

    public void setDescripcion2(String descripcion2) {
        this.descripcion2 = descripcion2;
    }

    public String getDescripcion3() {
        return descripcion3;
    }

    public void setDescripcion3(String descripcion3) {
        this.descripcion3 = descripcion3;
    }

    public String getImagen() {
        return imagen;
    }

    public void setImagen(String imagen) {
        this.imagen = imagen;
    }

    public String getDescripcionContacto() {
        return descripcionContacto;
    }

    public void setDescripcionContacto(String descripcionContacto) {
        this.descripcionContacto = descripcionContacto;
    }

    public String getRedesSociales() {
        return redesSociales;
    }

    public void setRedesSociales(String redesSociales) {
        this.redesSociales = redesSociales;
    }

    public String getDescripcion1() {
        return descripcion1;
    }

    public void setDescripcion1(String descripcion1) {
        this.descripcion1 = descripcion1;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getTelefonos() {
        return telefonos;
    }

    public void setTelefonos(String telefonos) {
        this.telefonos = telefonos;
    }
}
