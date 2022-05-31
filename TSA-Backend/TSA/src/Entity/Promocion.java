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
public class Promocion implements Serializable{
    private Integer idPromocion;
    private Integer idPromocion2;
    private String nombre;
    private String categoria;
    private String descripcion;
    private String amigoTeatro;
    private Integer idEvento;
    private Integer idEvento1;
    private Integer idPlatea;
    private Integer idFuncion;
    private String Platea;
    private String Funcion;
    private String tipoAcceso;
    private Integer idTipoPromocion;
    private Date fechaInicio;
    private Date fechaFin;
    private String estado;
    private String usuarioCreacion;
    private Integer desde;
    private Integer hasta;
    private float descuento;
    private String codigo;
    private String banco;
    private String tarjeta;
    private String evento1;
    private String evento2;
    private String tipoPromo;
    private String Cmaxima;
    
    public Promocion() {
    }

    
    public Promocion(Integer idPromocion,   String estado, String usuarioCreacion) {
        this.idPromocion = idPromocion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Promocion(Integer idPromocion, String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.idPromocion = idPromocion;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
     public Promocion( String nombre, String descripcion, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(Integer idFuncion) {
        this.idFuncion = idFuncion;
    }
     
    public String getCmaxima() {
        return Cmaxima;
    }

    public String getPlatea() {
        return Platea;
    }

    public void setPlatea(String Platea) {
        this.Platea = Platea;
    }

    public String getFuncion() {
        return Funcion;
    }

    public void setFuncion(String Funcion) {
        this.Funcion = Funcion;
    }

    public void setCmaxima(String Cmaxima) {
        this.Cmaxima = Cmaxima;
    }

     
    public String getUsuarioCreacion() {
        return usuarioCreacion;
    }

    public void setUsuarioCreacion(String usuarioCreacion) {
        this.usuarioCreacion = usuarioCreacion;
    }

    public String getTipoPromo() {
        return tipoPromo;
    }

    public void setTipoPromo(String tipoPromo) {
        this.tipoPromo = tipoPromo;
    }
    
    public Integer getIdPromocion() {
        return idPromocion;
    }

    public Integer getIdPromocion2() {
        return idPromocion2;
    }

    public String getEvento1() {
        return evento1;
    }

    public void setEvento1(String evento1) {
        this.evento1 = evento1;
    }

    public String getEvento2() {
        return evento2;
    }

    public void setEvento2(String evento2) {
        this.evento2 = evento2;
    }

    public void setIdPromocion2(Integer idPromocion2) {
        this.idPromocion2 = idPromocion2;
    }

    public void setIdPromocion(Integer idPromocion) {
        this.idPromocion = idPromocion;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }

    public Integer getIdEvento1() {
        return idEvento1;
    }

    public void setIdEvento1(Integer idEvento1) {
        this.idEvento1 = idEvento1;
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

    public float getDescuento() {
        return descuento;
    }

    public void setDescuento(float descuento) {
        this.descuento = descuento;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getBanco() {
        return banco;
    }

    public void setBanco(String banco) {
        this.banco = banco;
    }

    public String getTarjeta() {
        return tarjeta;
    }

    public void setTarjeta(String tarjeta) {
        this.tarjeta = tarjeta;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getAmigoTeatro() {
        return amigoTeatro;
    }

    public void setAmigoTeatro(String amigoTeatro) {
        this.amigoTeatro = amigoTeatro;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }

    public Integer getIdPlatea() {
        return idPlatea;
    }

    public void setIdPlatea(Integer idPlatea) {
        this.idPlatea = idPlatea;
    }

    public String getTipoAcceso() {
        return tipoAcceso;
    }

    public void setTipoAcceso(String tipoAcceso) {
        this.tipoAcceso = tipoAcceso;
    }

    public Integer getIdTipoPromocion() {
        return idTipoPromocion;
    }

    public void setIdTipoPromocion(Integer idTipoPromocion) {
        this.idTipoPromocion = idTipoPromocion;
    }
    
    public Date getFechaInicio() {
        return fechaInicio;
    }

    public void setFechaInicio(Date fechaInicio) {
        this.fechaInicio = fechaInicio;
    }

    public Date getFechaFin() {
        return fechaFin;
    }

    public void setFechaFin(Date fechaFin) {
        this.fechaFin = fechaFin;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    
    
    @Override
    public String toString() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+descripcion+",,,"+tipoAcceso+",,,"+tipoPromo+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+";";
    }
    public String toString_codigo() {
        return idPromocion+",,,"+idEvento+",,,"+nombre+",,,"+codigo+",,,"+descuento+",,,"+categoria+",,,"+descripcion+",,,"+amigoTeatro+",,,"+idPlatea+",,,"+tipoAcceso+",,,"+idTipoPromocion+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+";";
    }
    public String toString_codigoAll() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+tipoAcceso+",,,"+codigo+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_pagoAll() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+tipoAcceso+",,,"+desde+" / "+hasta+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_compraAll() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+tipoAcceso+",,,"+desde+",,,"+hasta+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_tarjetaAll() {
       return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+tipoAcceso+",,,"+tarjeta+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
   }
    public String toString_cruzadoAll() {
       return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+tipoAcceso+",,,"+evento1+" / "+desde+",,,"+evento2+" / "+hasta+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
   }
    public String toString_codigoAllT() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+evento1+",,,"+codigo+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_pagoAllT() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+evento1+",,,"+desde+" / "+hasta+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_compraAllT() {
        return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+evento1+",,,"+desde+",,,"+hasta+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
    }
    public String toString_tarjetaAllT() {
       return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+evento1+",,,"+tarjeta+",,,"+descuento+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
   }
    public String toString_cruzadoAllT() {
       return idPromocion+",,,"+idPromocion2+",,,"+nombre+",,,"+evento1+" / "+desde+",,,"+evento2+" / "+hasta+",,,"+fechaInicio+",,,"+fechaFin+",,,"+estado+",,,"+Funcion+",,,"+Platea+";";
   }
    public String toStringGet() {
        return idPromocion+",,," + idPromocion2 +",,,"+ tipoPromo+",,,"+ nombre +",,," + categoria+",,," +descripcion+",,," + amigoTeatro +",,," + tipoAcceso+",,," + idTipoPromocion +",,,"+ fechaInicio +",,,"+ fechaFin  +",,,"+ desde +",,,"+  hasta +",,,"+  descuento +",,,"+  codigo  +",,,"+ banco +",,," + tarjeta + ",,,"+idPlatea+ ",,,"+idEvento1+",,,"+Cmaxima+",,,"+idFuncion+';';
    }
}
