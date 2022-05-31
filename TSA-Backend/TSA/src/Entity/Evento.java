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
public class Evento implements Serializable{
    private Integer idEvento;
    private String nombre;
    private Float duracion;
    private Date fechaInicial;
    private Date fechaFinal;
    private String idProductora;
    private String idSalaMapa;
    private String idTipoEvento;
    private String idTipoEspectaculo;
    private String idCategoria;
    private String idClasificacion;
    private String idProcedencia;
    private String idFuncion;
    private String idPrecio;
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
    private String idMapa;
    private String idSala;
    private String preventa;
    private int vendidos;
    public Evento() {
    }

    public Evento(String nombre, Float duracion, Date fechaInicial, Date fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, Integer aforo, String productora, String tipoEvento, String estado, String usuarioCreacion) {
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
        this.aforo = aforo;
        this.productora = productora;
        this.tipoEvento = tipoEvento;
        this.estado = estado;
        this.usuarioCreacion = usuarioCreacion;
    }

    public Evento(Integer idEvento, String nombre, Float duracion, Date fechaInicial, Date fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, Integer aforo, String tipoEvento, String preventa, String estado, String usuarioCreacion) {
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
        this.aforo = aforo;
        this.tipoEvento = tipoEvento;
        this.estado = estado;
        this.preventa=preventa;
        this.usuarioCreacion = usuarioCreacion;
    }
    
    public Evento(Integer idEvento, String nombre, Float duracion, Date fechaInicial, Date fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String idFuncion, String idPrecio, String eventoDestacado, String eventoOrden, Integer aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String usuarioCreacion) {
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
    
    public Evento(String nombre, Float duracion, Date fechaInicial, Date fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String idFuncion, String idPrecio, String eventoDestacado, String eventoOrden, Integer aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String usuarioCreacion) {
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

    public int getVendidos() {
        return vendidos;
    }

    public String getPreventa() {
        return preventa;
    }

    public void setPreventa(String preventa) {
        this.preventa = preventa;
    }

    public void setVendidos(int vendidos) {
        this.vendidos = vendidos;
    }

    public String getIdMapa() {
        return idMapa;
    }

    public void setIdMapa(String idMapa) {
        this.idMapa = idMapa;
    }

    public String getIdSala() {
        return idSala;
    }

    public void setIdSala(String idSala) {
        this.idSala = idSala;
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

    public String getIdProductora() {
        return idProductora;
    }

    public void setIdProductora(String idProductora) {
        this.idProductora = idProductora;
    }

    public String getIdSalaMapa() {
        return idSalaMapa;
    }

    public void setIdSalaMapa(String idSalaMapa) {
        this.idSalaMapa = idSalaMapa;
    }

    public String getIdTipoEvento() {
        return idTipoEvento;
    }

    public void setIdTipoEvento(String idTipoEvento) {
        this.idTipoEvento = idTipoEvento;
    }

    public String getIdTipoEspectaculo() {
        return idTipoEspectaculo;
    }

    public void setIdTipoEspectaculo(String idTipoEspectaculo) {
        this.idTipoEspectaculo = idTipoEspectaculo;
    }

    public String getIdCategoria() {
        return idCategoria;
    }

    public void setIdCategoria(String idCategoria) {
        this.idCategoria = idCategoria;
    }

    public String getIdClasificacion() {
        return idClasificacion;
    }

    public void setIdClasificacion(String idClasificacion) {
        this.idClasificacion = idClasificacion;
    }

    public String getIdProcedencia() {
        return idProcedencia;
    }

    public void setIdProcedencia(String idProcedencia) {
        this.idProcedencia = idProcedencia;
    }

    public String getIdFuncion() {
        return idFuncion;
    }

    public void setIdFuncion(String idFuncion) {
        this.idFuncion = idFuncion;
    }

    public String getIdPrecio() {
        return idPrecio;
    }

    public void setIdPrecio(String idPrecio) {
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
    
    //get all evento
    public String toStringT() {
        return idEvento+",,,"+nombre+",,,"+duracion+",,,"+fechaInicial+",,,"+fechaFinal+",,,"+idProductora+",,,"+idSalaMapa+",,,"+idMapa
               +",,,"+idTipoEvento+",,,"+idTipoEspectaculo+",,,"+idCategoria+",,,"+idClasificacion+",,,"+idProcedencia
               +",,,"+aforo+",,,"+vendidos+",,,"+tipoEvento+",,,"+estado+",,,"+usuarioCreacion+";";
    }
    //get evento
    public String toString() {
        return idEvento+",,,"+nombre+",,,"+duracion+",,,"+fechaInicial+",,,"+fechaFinal+",,,"+idProductora+",,,"+idSala+",,,"+idMapa
               +",,,"+idTipoEvento+",,,"+idTipoEspectaculo+",,,"+idCategoria+",,,"+idClasificacion+",,,"+idProcedencia
               +",,,"+aforo+",,,"+vendidos+",,,"+tipoEvento+",,,"+estado+",,,"+usuarioCreacion+",,,"+preventa+";";
    }
    //get evento
    public String sipnosis() {
        return idEvento+",,,"+sinopsis+",,,"+productora+";";
    }
    public String video() {
        return idEvento+",,,"+rutaVideo+";";
    }
}
