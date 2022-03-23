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
public class Evento implements Serializable{
    private Integer idEvento;
    private String nombre;
    private Float duracion;
    private Date fechaInicial;
    private Date fechaFinal;
    private Integer idProductora;
    private Integer idSalaMapa;
    private Integer idTipoEvento;
    private Integer idTipoEspectaculo;
    private Integer idCategoria;
    private Integer idClasificacion;
    private Integer idProcedencia;
    private Integer idTipoPrecio;
    private Integer idFuncion;
    private Integer idPrecio;
    private String eventoDestacado;
    private String eventoOrden;
    private Integer aforo;
    private String sinopsis;
    private String productora;
    private String elenco;
    private String rutaImagen;
    private String rutaVideo;
    private String tipoEvento;
    private String rutaFormulario;
    private String estado;
    private String usuarioCreacion;

    public Evento() {
    }

    public Evento(Integer idEvento, String nombre, Float duracion, Date fechaInicial, Date fechaFinal, Integer idProductora, Integer idSalaMapa, Integer idTipoEvento, Integer idTipoEspectaculo, Integer idCategoria, Integer idClasificacion, Integer idProcedencia, Integer idTipoPrecio, Integer idFuncion, Integer idPrecio, String eventoDestacado, String eventoOrden, Integer aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String usuarioCreacion) {
        this.idEvento = idEvento;
        this.nombre = nombre;
        this.duracion = duracion;
        this.fechaInicial = fechaInicial;
        this.fechaFinal = fechaFinal;
        this.idProductora = idProductora;
        this.idSalaMapa = idSalaMapa;
        this.idTipoEvento = idTipoEvento;
        this.idTipoEspectaculo = idTipoEspectaculo;
        this.idCategoria = idCategoria;
        this.idClasificacion = idClasificacion;
        this.idProcedencia = idProcedencia;
        this.idTipoPrecio = idTipoPrecio;
        this.idFuncion = idFuncion;
        this.idPrecio = idPrecio;
        this.eventoDestacado = eventoDestacado;
        this.eventoOrden = eventoOrden;
        this.aforo = aforo;
        this.sinopsis = sinopsis;
        this.productora = productora;
        this.elenco = elenco;
        this.rutaImagen = rutaImagen;
        this.rutaVideo = rutaVideo;
        this.tipoEvento = tipoEvento;
        this.rutaFormulario = rutaFormulario;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Evento(Integer idEvento, String estado, String usuarioCreacion) {
        this.idEvento = idEvento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Evento(String nombre, Float duracion, Date fechaInicial, Date fechaFinal, Integer idProductora, Integer idSalaMapa, Integer idTipoEvento, Integer idTipoEspectaculo, Integer idCategoria, Integer idClasificacion, Integer idProcedencia, Integer idTipoPrecio, Integer idFuncion, Integer idPrecio, String eventoDestacado, String eventoOrden, Integer aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String usuarioCreacion) {
        this.nombre = nombre;
        this.duracion = duracion;
        this.fechaInicial = fechaInicial;
        this.fechaFinal = fechaFinal;
        this.idProductora = idProductora;
        this.idSalaMapa = idSalaMapa;
        this.idTipoEvento = idTipoEvento;
        this.idTipoEspectaculo = idTipoEspectaculo;
        this.idCategoria = idCategoria;
        this.idClasificacion = idClasificacion;
        this.idProcedencia = idProcedencia;
        this.idTipoPrecio = idTipoPrecio;
        this.idFuncion = idFuncion;
        this.idPrecio = idPrecio;
        this.eventoDestacado = eventoDestacado;
        this.eventoOrden = eventoOrden;
        this.aforo = aforo;
        this.sinopsis = sinopsis;
        this.productora = productora;
        this.elenco = elenco;
        this.rutaImagen = rutaImagen;
        this.rutaVideo = rutaVideo;
        this.tipoEvento = tipoEvento;
        this.rutaFormulario = rutaFormulario;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Integer getIdEvento() {
        return idEvento;
    }

    public void setIdEvento(Integer idEvento) {
        this.idEvento = idEvento;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Float getDuracion() {
        return duracion;
    }

    public void setDuracion(Float duracion) {
        this.duracion = duracion;
    }

    public Date getFechaInicial() {
        return fechaInicial;
    }

    public void setFechaInicial(Date fechaInicial) {
        this.fechaInicial = fechaInicial;
    }

    public Date getFechaFinal() {
        return fechaFinal;
    }

    public void setFechaFinal(Date fechaFinal) {
        this.fechaFinal = fechaFinal;
    }

    public Integer getIdProductora() {
        return idProductora;
    }

    public void setIdProductora(Integer idProductora) {
        this.idProductora = idProductora;
    }

    public Integer getIdSalaMapa() {
        return idSalaMapa;
    }

    public void setIdSalaMapa(Integer idSalaMapa) {
        this.idSalaMapa = idSalaMapa;
    }

    public Integer getIdTipoEvento() {
        return idTipoEvento;
    }

    public void setIdTipoEvento(Integer idTipoEvento) {
        this.idTipoEvento = idTipoEvento;
    }

    public Integer getIdTipoEspectaculo() {
        return idTipoEspectaculo;
    }

    public void setIdTipoEspectaculo(Integer idTipoEspectaculo) {
        this.idTipoEspectaculo = idTipoEspectaculo;
    }

    public Integer getIdCategoria() {
        return idCategoria;
    }

    public void setIdCategoria(Integer idCategoria) {
        this.idCategoria = idCategoria;
    }

    public Integer getIdClasificacion() {
        return idClasificacion;
    }

    public void setIdClasificacion(Integer idClasificacion) {
        this.idClasificacion = idClasificacion;
    }

    public Integer getIdProcedencia() {
        return idProcedencia;
    }

    public void setIdProcedencia(Integer idProcedencia) {
        this.idProcedencia = idProcedencia;
    }

    public Integer getIdTipoPrecio() {
        return idTipoPrecio;
    }

    public void setIdTipoPrecio(Integer idTipoPrecio) {
        this.idTipoPrecio = idTipoPrecio;
    }

    public Integer getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(Integer idFuncion) {
        this.idFuncion = idFuncion;
    }

    public Integer getIdPrecio() {
        return idPrecio;
    }

    public void setIdPrecio(Integer idPrecio) {
        this.idPrecio = idPrecio;
    }

    public String getEventoDestacado() {
        return eventoDestacado;
    }

    public void setEventoDestacado(String eventoDestacado) {
        this.eventoDestacado = eventoDestacado;
    }

    public String getEventoOrden() {
        return eventoOrden;
    }

    public void setEventoOrden(String eventoOrden) {
        this.eventoOrden = eventoOrden;
    }

    public Integer getAforo() {
        return aforo;
    }

    public void setAforo(Integer aforo) {
        this.aforo = aforo;
    }

    public String getSinopsis() {
        return sinopsis;
    }

    public void setSinopsis(String sinopsis) {
        this.sinopsis = sinopsis;
    }

    public String getProductora() {
        return productora;
    }

    public void setProductora(String productora) {
        this.productora = productora;
    }

    public String getElenco() {
        return elenco;
    }

    public void setElenco(String elenco) {
        this.elenco = elenco;
    }

    public String getRutaImagen() {
        return rutaImagen;
    }

    public void setRutaImagen(String rutaImagen) {
        this.rutaImagen = rutaImagen;
    }

    public String getRutaVideo() {
        return rutaVideo;
    }

    public void setRutaVideo(String rutaVideo) {
        this.rutaVideo = rutaVideo;
    }

    public String getTipoEvento() {
        return tipoEvento;
    }

    public void setTipoEvento(String tipoEvento) {
        this.tipoEvento = tipoEvento;
    }

    public String getRutaFormulario() {
        return rutaFormulario;
    }

    public void setRutaFormulario(String rutaFormulario) {
        this.rutaFormulario = rutaFormulario;
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
        return idEvento+","+nombre+","+duracion+","+fechaInicial+","+fechaFinal+","+idProductora+","+idSalaMapa
               +","+idTipoEvento+","+idTipoEspectaculo+","+idCategoria+","+idClasificacion+","+idProcedencia+","+idTipoPrecio
               +","+idFuncion+","+idPrecio+","+eventoDestacado+","+eventoOrden+","+aforo+","+sinopsis+","+productora
               +","+elenco+","+rutaImagen+","+rutaVideo+","+tipoEvento+","+rutaFormulario+","+estado+","+usuarioCreacion+";";
    }
}
