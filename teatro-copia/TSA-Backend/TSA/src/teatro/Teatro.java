/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro;

import Teatro.Controller.AsientoController;
import Teatro.Controller.BancoController;
import Thrift.CRUDServer;
import Thrift.Servidor;
import java.sql.Date;
import java.sql.SQLException;
import java.sql.Time;
import java.util.List;

import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.thrift.TException;
import teatro.Controller.BancoTarjetaController;
import teatro.Controller.CategoriaController;
import teatro.Controller.ClasificacionController;
import teatro.Controller.CodigoPromocionalController;
import teatro.Controller.DistribucionController;
import teatro.Controller.EventoController;
import teatro.Controller.FuncionController;
import teatro.Controller.MapaController;
import teatro.Controller.PerfilController;
import teatro.Controller.PerfilRolController;
import teatro.Controller.PlateaController;
import teatro.Controller.PrecioController;
import teatro.Controller.ProcedenciaController;
import teatro.Controller.ProductoraController;
import teatro.Controller.PromocionController;
import teatro.Controller.RolController;
import teatro.Controller.SalaController;
import teatro.Controller.SalaMapaController;
import teatro.Controller.TarjetaController;
import teatro.Controller.TipoEspectaculoController;
import teatro.Controller.TipoEventoController;
import teatro.Controller.TipoPrecioController;
import teatro.Controller.TipoPromocionController;
import teatro.Controller.UsuarioClienteController;
import teatro.Controller.UsuarioController;
import teatro.Controller.UsuarioEventoController;
import teatro.Entity.Asiento;
import teatro.Entity.Banco;
import teatro.Entity.BancoTarjeta;
import teatro.Entity.Categoria;
import teatro.Entity.Clasificacion;
import teatro.Entity.CodigoPromocional;
import teatro.Entity.Distribucion;
import teatro.Entity.Evento;
import teatro.Entity.Funcion;
import teatro.Entity.Mapa;
import teatro.Entity.Perfil;
import teatro.Entity.PerfilRol;
import teatro.Entity.Platea;
import teatro.Entity.Precio;
import teatro.Entity.Procedencia;
import teatro.Entity.Productora;
import teatro.Entity.Promocion;
import teatro.Entity.Rol;
import teatro.Entity.Sala;
import teatro.Entity.SalaMapa;
import teatro.Entity.Tarjeta;
import teatro.Entity.TipoEspectaculo;
import teatro.Entity.TipoEvento;
import teatro.Entity.TipoPrecio;
import teatro.Entity.TipoPromocion;
import teatro.Entity.Usuario;
import teatro.Entity.UsuarioCliente;
import teatro.Entity.UsuarioEvento;

/**
 *
 * @author Richard Vivanco - Alex Mendoza
 */
public class Teatro implements CRUDServer.Iface  {

    /**
     * @param args the command line arguments
     */

    BaseDatos base = new BaseDatos();
    
    AsientoController asientoController = new AsientoController(base);
    BancoController bancoController = new BancoController(base);
    BancoTarjetaController bancoTarjetaController = new BancoTarjetaController(base);
    CategoriaController categoriaController = new CategoriaController(base);
    ClasificacionController clasificacionController = new ClasificacionController(base);
    CodigoPromocionalController codigoPromocionalController = new CodigoPromocionalController(base);
    DistribucionController distribucionController = new DistribucionController(base);
    EventoController eventoController = new EventoController(base);
    FuncionController funcionController = new FuncionController(base);
    MapaController mapaController = new MapaController(base);
    PerfilController perfilController = new PerfilController(base);
    PerfilRolController perfilRolController = new PerfilRolController(base);
    PlateaController plateaController = new PlateaController(base);
    PrecioController precioController = new PrecioController(base);
    ProcedenciaController procedenciaController = new ProcedenciaController(base);
    ProductoraController productoraController = new ProductoraController(base);
    PromocionController promocionController = new PromocionController(base);
    RolController rolController = new RolController(base);
    SalaController salaController = new SalaController(base);
    SalaMapaController salaMapaController = new SalaMapaController(base);
    TarjetaController tarjetaController = new TarjetaController(base);
    TipoEspectaculoController tipoEspectaculoController = new TipoEspectaculoController(base);
    TipoEventoController tipoEventoController = new TipoEventoController(base);
    TipoPrecioController tipoPrecioController = new TipoPrecioController(base);
    TipoPromocionController tipoPromocionController = new TipoPromocionController(base);
    UsuarioController usuarioController = new UsuarioController(base);
    UsuarioClienteController usuarioClienteController = new UsuarioClienteController(base);
    UsuarioEventoController usuarioEventoController = new UsuarioEventoController(base);

    public static void main(String[] args) {
        Comunicacion hs = new Comunicacion();
        Thread t = new Thread(hs);
        t.start();
    }
    
    @Override
    public String login(String username, String password) throws org.apache.thrift.TException {
        try {          
            Usuario usuario = base.login(username, password);
            System.out.println(usuario);
            if (usuario==null) {
                return "false";
            }else{
                return usuario.toString();
            }
        } catch (Exception ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "false";
        }      
    }

    @Override
    public String getAsiento(String idAsiento) throws TException {
        try {
            Asiento asiento = asientoController.get(Integer.parseInt(idAsiento.trim()));
            return asiento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String getAllAsiento() throws TException {
        try {
            List<Asiento> asientos = asientoController.getAll();
            String strAsientos = "";
            strAsientos = asientos.stream().map((asiento) -> asiento.toString()).reduce(strAsientos, String::concat);
            return strAsientos;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoAsiento(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Asiento Asiento = new Asiento(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            
            return String.valueOf(asientoController.updateEstado(Asiento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateAsiento(String numero, String fila, String lateral, String estado, String idAsiento, String usuario_modificacion) throws TException {
        try {
            Asiento asiento = new Asiento(Integer.parseInt(idAsiento.trim()), 
                                            Integer.parseInt(numero.trim()) , 
                                            fila, 
                                            lateral, 
                                            estado,usuario_modificacion);
            
            return String.valueOf(asientoController.update(asiento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String insertAsiento(String numero, String fila, String lateral, String estado, String usuarioCreacion) throws TException {
        try {
            Asiento asiento = new Asiento(Integer.parseInt(numero.trim()), 
                                            fila, 
                                            lateral,usuarioCreacion);
            
            return String.valueOf(asientoController.insert(asiento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String getBanco(String idBanco) throws TException {
        try {
            Banco banco = bancoController.get(Integer.parseInt(idBanco.trim()));
            return banco.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }    
    }

    @Override
    public String getAllBanco() throws TException {
        try {
            List<Banco> bancos = bancoController.getAll();
            String strBancos = "";
            strBancos = bancos.stream().map((banco) -> banco.toString()).reduce(strBancos, String::concat);
            return strBancos;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoBanco(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Banco banco = new Banco(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( bancoController.updateEstado(banco));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateBanco(String nombre, String estado, String idBanco, String usuario_modificacion) throws TException {
        try {
            Banco banco = new Banco(Integer.parseInt(idBanco.trim()), 
                                    nombre, 
                                    estado,usuario_modificacion);
            
            return String.valueOf(bancoController.update(banco));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String insertBanco(String nombre, String estado, String usuarioCreacion) throws TException {
        try {
            Banco banco = new Banco(nombre);
            
            return String.valueOf(bancoController.insert(banco));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getBancoTarjeta(String idBancoTarjeta) throws TException {
        try {
            BancoTarjeta bancoTarjeta = bancoTarjetaController.get(Integer.parseInt(idBancoTarjeta.trim()));
            return bancoTarjeta.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllBancoTarjeta() throws TException {
        try {
            List<BancoTarjeta> bancosTarjeta = bancoTarjetaController.getAll();
            String strBancosTarjeta = "";
            strBancosTarjeta = bancosTarjeta.stream().map((bancoTarjeta) -> bancoTarjeta.toString()).reduce(strBancosTarjeta, String::concat);
            return strBancosTarjeta;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoBancoTarjeta(String id, String estado, String usuario_modificacion) throws TException {
       try {
            BancoTarjeta bancoTarjeta = new BancoTarjeta(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( bancoTarjetaController.updateEstado(bancoTarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateBancoTarjeta(String idBanco, String idTarjeta, String descuento, String estado, String idBancoTarjeta, String usuario_modificacion) throws TException {
        try {
            BancoTarjeta bancoTarjeta = new BancoTarjeta(Integer.parseInt(idBancoTarjeta.trim()), 
                                                            Integer.parseInt(idBanco.trim()), 
                                                            Integer.parseInt(idTarjeta.trim()), 
                                                            Float.valueOf(descuento) ,
                                                            estado,usuario_modificacion);
            
            return String.valueOf(bancoTarjetaController.update(bancoTarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    //eliminar usuario
    @Override
    public String insertBancoTarjeta(String idBanco, String idTarjeta, String descuento, String estado) throws TException {
        try {
            BancoTarjeta bancoTarjeta = new BancoTarjeta(Integer.parseInt(idBanco.trim()), 
                                                            Integer.parseInt(idTarjeta.trim()), 
                                                            Float.valueOf(descuento),"");
            
            return String.valueOf(bancoTarjetaController.insert(bancoTarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }   
    }

    @Override
    public String getCategoria(String idCategoria) throws TException {
        try {
            Categoria categoria = categoriaController.get(Integer.parseInt(idCategoria.trim()));
            return categoria.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllCategoria() throws TException {
        try {
            List<Categoria> categorias = categoriaController.getAll();
            String strCategorias = "";
            strCategorias = categorias.stream().map((categoria) -> categoria.toString()).reduce(strCategorias, String::concat);
            return strCategorias;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateEstadoCategoria(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Categoria categoria = new Categoria(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( categoriaController.updateEstado(categoria));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateCategoria(String nombre, String descripcion, String estado, String idCategoria, String usuario_modificacion) throws TException {
        try {
            Categoria categoria = new Categoria(Integer.parseInt(idCategoria.trim()), 
                                                nombre, 
                                                descripcion,
                                                estado,usuario_modificacion);
            
            return String.valueOf(categoriaController.update(categoria));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertCategoria(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            Categoria categoria = new Categoria(nombre,descripcion,estado,usuarioCreacion);
            
            return String.valueOf(categoriaController.insert(categoria));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getClasificacion(String idClasificacion) throws TException {
        try {
            Clasificacion clasificacion = clasificacionController.get(Integer.parseInt(idClasificacion.trim()));
            System.out.println(clasificacion.toString());
            return clasificacion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllClasificacion() throws TException {
        try {
            List<Clasificacion> clasificaciones = clasificacionController.getAll();
            String strClasificaciones = "";
            strClasificaciones = clasificaciones.stream().map((clasificacion) -> clasificacion.toString()).reduce(strClasificaciones, String::concat);
            return strClasificaciones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoClasificacion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Clasificacion clasificacion = new Clasificacion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( clasificacionController.updateEstado(clasificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateClasificacion(String nombre, String descripcion, String estado, String idClasificacion, String usuario_modificacion) throws TException {
        try {
            Clasificacion clasificacion = new Clasificacion(Integer.parseInt(idClasificacion.trim()), 
                                                            nombre, 
                                                            descripcion,
                                                            estado,usuario_modificacion);
            
            return String.valueOf(clasificacionController.update(clasificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertClasificacion(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
       try {
            Clasificacion clasificacion = new Clasificacion(nombre, descripcion,estado,usuarioCreacion);
            
            return String.valueOf(clasificacionController.insert(clasificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getCodigoPromocional(String idCodigoPromocional) throws TException {
        try {
            CodigoPromocional codigoPromocional = codigoPromocionalController.get(Integer.parseInt(idCodigoPromocional.trim()));
            return codigoPromocional.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllCodigoPromocional() throws TException {
        try {
            List<CodigoPromocional> codigosPromocionales = codigoPromocionalController.getAll();
            String strCodigosPromocionales = "";
            strCodigosPromocionales = codigosPromocionales.stream().map((codigoPromocional) -> codigoPromocional.toString()).reduce(strCodigosPromocionales, String::concat);
            return strCodigosPromocionales;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoCodigoPromocional(String id, String estado, String usuario_modificacion) throws TException {
       try {
            CodigoPromocional codigoPromocional = new CodigoPromocional(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( codigoPromocionalController.updateEstado(codigoPromocional));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateCodigoPromocional(String nombre, String codigo, String descuento, String estado, String idCodigoPromocional, String usuario_modificacion) throws TException {
        try {
            CodigoPromocional codigoPromocional = new CodigoPromocional(Integer.parseInt(idCodigoPromocional.trim()), 
                                                                                        nombre, 
                                                                                        codigo,
                                                                                        Float.parseFloat(descuento),
                                                                                        estado,usuario_modificacion);
            
            return String.valueOf(codigoPromocionalController.update(codigoPromocional));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertCodigoPromocional(String nombre, String codigo, String descuento, String estado, String usuarioCreacion) throws TException {
        try {
            CodigoPromocional codigoPromocional = new CodigoPromocional(nombre, 
                                                                        codigo,
                                                                        Float.parseFloat(descuento),usuarioCreacion);
            
            return String.valueOf(codigoPromocionalController.insert(codigoPromocional));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getDistribucion(String idDistribucion) throws TException {
        try {
            Distribucion distribucion = distribucionController.get(Integer.parseInt(idDistribucion.trim()));
            return distribucion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllDistribucion() throws TException {
        try {
            List<Distribucion> distribuciones = distribucionController.getAll();
            String strDistribuciones = "";
            strDistribuciones = distribuciones.stream().map((distribucion) -> distribucion.toString()).reduce(strDistribuciones, String::concat);
            return strDistribuciones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoDistribucion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Distribucion distribucion = new Distribucion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( distribucionController.updateEstado(distribucion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateDistribucion(String idEvento, String idPlatea, String idAsiento, String tipo, String estado, String idDistribucion, String usuario_modificacion) throws TException {
        try {
            Distribucion distribucion = new Distribucion(Integer.parseInt(idDistribucion.trim()), 
                                                            Integer.parseInt(idEvento.trim()), 
                                                            Integer.parseInt(idPlatea.trim()),
                                                            Integer.parseInt(idAsiento.trim()),
                                                            tipo,
                                                            estado,usuario_modificacion);
            
            return String.valueOf(distribucionController.update(distribucion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertDistribucion(String idEvento, String idPlatea, String idAsiento, String tipo, String estado, String usuarioCreacion) throws TException {
        try {
            Distribucion distribucion = new Distribucion(Integer.parseInt(idEvento.trim()), 
                                                        Integer.parseInt(idPlatea.trim()),
                                                        Integer.parseInt(idAsiento.trim()),
                                                        tipo,
                                                        estado,usuarioCreacion);
            
            return String.valueOf(distribucionController.insert(distribucion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getEvento(String idEvento) throws TException {
        try {
            Evento evento = eventoController.get(Integer.parseInt(idEvento.trim()));
            return evento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllEvento() throws TException {
        try {
            List<Evento> eventos = eventoController.getAll();
            String strEventos = "";
            strEventos = eventos.stream().map((evento) -> evento.toString()).reduce(strEventos, String::concat);
            return strEventos;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoEvento(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Evento evento = new Evento(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( eventoController.updateEstado(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEvento(String nombre, String duracion, String fechaInicial, String fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String idTipoPrecio, String idFuncion, String idPrecio, String eventoDestacado, String eventoOrden, String aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String idEvento, String usuario_modificacion) throws TException {
        try {
            Evento evento = new Evento(Integer.parseInt(idEvento.trim()), 
                                        nombre, 
                                        Float.parseFloat(duracion),
                                        Date.valueOf(fechaInicial),
                                        Date.valueOf(fechaFinal),
                                        Integer.parseInt(idProductora.trim()),
                                        Integer.parseInt(idSalaMapa.trim()),
                                        Integer.parseInt(idTipoEvento.trim()),
                                        Integer.parseInt(idTipoEspectaculo.trim()),
                                        Integer.parseInt(idCategoria.trim()),
                                        Integer.parseInt(idClasificacion.trim()),
                                        Integer.parseInt(idProcedencia.trim()),
                                        Integer.parseInt(idTipoPrecio.trim()),
                                        Integer.parseInt(idFuncion.trim()),
                                        Integer.parseInt(idPrecio.trim()),
                                        eventoDestacado,
                                        eventoOrden,
                                        Integer.parseInt(aforo.trim()),
                                        sinopsis,
                                        productora,
                                        elenco,
                                        rutaImagen,
                                        rutaVideo,
                                        tipoEvento,
                                        rutaFormulario,                                      
                                        estado,usuario_modificacion);
            
            return String.valueOf(eventoController.update(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertEvento(String nombre, String duracion, String fechaInicial, String fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String idTipoPrecio, String idFuncion, String idPrecio, String eventoDestacado, String eventoOrden, String aforo, String sinopsis, String productora, String elenco, String rutaImagen, String rutaVideo, String tipoEvento, String rutaFormulario, String estado, String usuarioCreacion) throws TException {
        try {
            Evento evento = new Evento(nombre, 
                                        Float.parseFloat(duracion),
                                        Date.valueOf(fechaInicial),
                                        Date.valueOf(fechaFinal),
                                        Integer.parseInt(idProductora.trim()),
                                        Integer.parseInt(idSalaMapa.trim()),
                                        Integer.parseInt(idTipoEvento.trim()),
                                        Integer.parseInt(idTipoEspectaculo.trim()),
                                        Integer.parseInt(idCategoria.trim()),
                                        Integer.parseInt(idClasificacion.trim()),
                                        Integer.parseInt(idProcedencia.trim()),
                                        Integer.parseInt(idTipoPrecio.trim()),
                                        Integer.parseInt(idFuncion.trim()),
                                        Integer.parseInt(idPrecio.trim()),
                                        eventoDestacado,
                                        eventoOrden,
                                        Integer.parseInt(aforo.trim()),
                                        sinopsis,
                                        productora,
                                        elenco,
                                        rutaImagen,
                                        rutaVideo,
                                        tipoEvento,
                                        rutaFormulario,                                      
                                        estado,
                                        usuarioCreacion);
            
            return String.valueOf(eventoController.insert(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getFuncion(String idFuncion) throws TException {
        try {
            Funcion funcion = funcionController.get(Integer.parseInt(idFuncion.trim()));
            return funcion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllFuncion() throws TException {
        try {
            List<Funcion> funciones = funcionController.getAll();
            String strFunciones = "";
            strFunciones = funciones.stream().map((funcion) -> funcion.toString()).reduce(strFunciones, String::concat);
            return strFunciones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoFuncion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Funcion funcion = new Funcion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( funcionController.updateEstado(funcion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateFuncion(String fecha, String hora, String preventa, String estreno, String estado, String idFuncion, String usuario_modificacion) throws TException {
        try {
            Funcion funcion = new Funcion(Integer.parseInt(idFuncion.trim()), 
                                            Date.valueOf(fecha), 
                                            Time.valueOf(hora),
                                            preventa,
                                            estreno,
                                            estado,usuario_modificacion);
            
            return String.valueOf(funcionController.update(funcion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertFuncion(String fecha, String hora, String preventa, String estreno, String estado, String usuarioCreacion) throws TException {
       try {
            Funcion funcion = new Funcion(Date.valueOf(fecha), 
                                            Time.valueOf(hora),
                                            preventa,
                                            estreno,
                                            estado,usuarioCreacion);
            
            return String.valueOf(funcionController.insert(funcion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getMapa(String idMapa) throws TException {
        try {
            Mapa mapa = mapaController.get(Integer.parseInt(idMapa.trim()));
            return mapa.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllMapa() throws TException {
        try {
            List<Mapa> mapas = mapaController.getAll();
            String strMapas = "";
            strMapas = mapas.stream().map((mapa) -> mapa.toString()).reduce(strMapas, String::concat);
            return strMapas;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoMapa(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Mapa mapa = new Mapa(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( mapaController.updateEstado(mapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateMapa(String nombre, String distribucion, String rutaImagen, String estado, String idMapa, String usuario_modificacion) throws TException {
        try {
            Mapa mapa = new Mapa(Integer.parseInt(idMapa.trim()), 
                                    nombre, 
                                    distribucion,
                                    rutaImagen,
                                    estado,usuario_modificacion);
            
            return String.valueOf(mapaController.update(mapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertMapa(String nombre, String distribucion, String rutaImagen, String estado, String usuarioCreacion) throws TException {
        try {
            Mapa mapa = new Mapa(nombre, 
                                distribucion,
                                rutaImagen,
                                estado,usuarioCreacion);
            
            return String.valueOf(mapaController.insert(mapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPerfil(String idPerfil) throws TException {
        try {
            Perfil perfil = perfilController.get(Integer.parseInt(idPerfil.trim()));
            return perfil.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPerfil() throws TException {
        try {
            List<Perfil> perfiles = perfilController.getAll();
            String strPerfiles = "";
            strPerfiles = perfiles.stream().map((perfil) -> perfil.toString()).reduce(strPerfiles, String::concat);
            return strPerfiles;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPerfil(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Perfil perfil = new Perfil(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( perfilController.updateEstado(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePerfil(String descripcion, String tipo, String estado, String idPerfil, String usuario_modificacion) throws TException {
        try {
            Perfil perfil = new Perfil(Integer.parseInt(idPerfil.trim()), 
                                    descripcion, 
                                    tipo,
                                    estado,usuario_modificacion);
            
            return String.valueOf(perfilController.update(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPerfil(String descripcion, String tipo, String estado, String usuarioCreacion) throws TException {
       try {
            Perfil perfil = new Perfil(descripcion, 
                                    tipo,
                                    estado,usuarioCreacion);
            
            return String.valueOf(perfilController.insert(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPerfilRol(String idPerfilRol) throws TException {
        try {
            PerfilRol perfilRol = perfilRolController.get(Integer.parseInt(idPerfilRol.trim()));
            return perfilRol.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPerfilRol() throws TException {
        try {
            List<PerfilRol> perfilesRol = perfilRolController.getAll();
            String strPerfilesRol = "";
            strPerfilesRol = perfilesRol.stream().map((perfilRol) -> perfilRol.toString()).reduce(strPerfilesRol, String::concat);
            return strPerfilesRol;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPerfilRol(String id, String estado, String usuario_modificacion) throws TException {
       try {
            PerfilRol perfilRol = new PerfilRol(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( perfilRolController.updateEstado(perfilRol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePerfilRol(String idPerfil, String idRol, String estado, String idPerfilRol, String usuario_modificacion) throws TException {
        try {
            PerfilRol perfilRol = new PerfilRol(Integer.parseInt(idPerfilRol.trim()), 
                                                Integer.parseInt(idPerfil.trim()), 
                                                Integer.parseInt(idRol.trim()),
                                                estado,usuario_modificacion);
            
            return String.valueOf(perfilRolController.update(perfilRol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPerfilRol(String idPerfil, String idRol, String estado, String usuarioCreacion) throws TException {
        try {
            PerfilRol perfilRol = new PerfilRol(Integer.parseInt(idPerfil.trim()), 
                                                Integer.parseInt(idRol.trim()),
                                                estado,usuarioCreacion);
            
            return String.valueOf(perfilRolController.insert(perfilRol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPlatea(String idPlatea) throws TException {
        try {
            Platea platea = plateaController.get(Integer.parseInt(idPlatea.trim()));
            return platea.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPlatea() throws TException {
        try {
            List<Platea> plateas = plateaController.getAll();
            String strPlateas = "";
            strPlateas = plateas.stream().map((platea) -> platea.toString()).reduce(strPlateas, String::concat);
            return strPlateas;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPlatea(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Platea platea = new Platea(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( plateaController.updateEstado(platea));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePlatea(String nombre, String costo, String estado, String idPlatea, String usuario_modificacion) throws TException {
        try {
            Platea platea = new Platea(Integer.parseInt(idPlatea.trim()), 
                                        nombre, 
                                        Float.parseFloat(costo),
                                        estado,usuario_modificacion);
            
            return String.valueOf(plateaController.update(platea));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPlatea(String nombre, String costo, String estado, String usuarioCreacion) throws TException {
        try {
            Platea platea = new Platea(nombre, 
                                        Float.parseFloat(costo),
                                        estado,usuarioCreacion);
            
            return String.valueOf(plateaController.insert(platea));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPrecio(String idPrecio) throws TException {
        try {
            Precio precio = precioController.get(Integer.parseInt(idPrecio.trim()));
            return precio.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPrecio() throws TException {
        try {
            List<Precio> precios = precioController.getAll();
            String strPrecios = "";
            strPrecios = precios.stream().map((precio) -> precio.toString()).reduce(strPrecios, String::concat);
            return strPrecios;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPrecio(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Precio precio = new Precio(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( precioController.updateEstado(precio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePrecio(String nombre, String strPrecio, String preestreno, String estreno, String aforoInicial, String ventaPlatea, String estado, String idPrecio, String usuario_modificacion) throws TException {
        try {
            Precio precio = new Precio(Integer.parseInt(idPrecio.trim()), 
                                        nombre, 
                                        Float.parseFloat(strPrecio),
                                        preestreno,
                                        estreno,
                                        Integer.parseInt(aforoInicial.trim()),
                                        Integer.parseInt(ventaPlatea.trim()),
                                        estado,usuario_modificacion);
            
            return String.valueOf(precioController.update(precio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPrecio(String nombre, String strPrecio, String preestreno, String estreno, String aforoInicial, String ventaPlatea, String estado, String usuarioCreacion) throws TException {
       try {
            Precio precio = new Precio(nombre, 
                                        Float.parseFloat(strPrecio),
                                        preestreno,
                                        estreno,
                                        Integer.parseInt(aforoInicial.trim()),
                                        Integer.parseInt(ventaPlatea.trim()),
                                        estado,usuarioCreacion);
            
            return String.valueOf(precioController.insert(precio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getProcedencia(String idProcedencia) throws TException {
        try {
            Procedencia procedencia = procedenciaController.get(Integer.parseInt(idProcedencia.trim()));
            return procedencia.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllProcedencia() throws TException {
        try {
            List<Procedencia> procedencias = procedenciaController.getAll();
            String strProcedencias = "";
            strProcedencias = procedencias.stream().map((procedencia) -> procedencia.toString()).reduce(strProcedencias, String::concat);
            return strProcedencias;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoProcedencia(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Procedencia procedencia = new Procedencia(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( procedenciaController.updateEstado(procedencia));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateProcedencia(String nombre, String descripcion, String estado, String idProcedencia, String usuario_modificacion) throws TException {
        try {
            Procedencia procedencia = new Procedencia(Integer.parseInt(idProcedencia.trim()), 
                                                        nombre, 
                                                        descripcion,
                                                        estado,usuario_modificacion);
            
            return String.valueOf(procedenciaController.update(procedencia));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertProcedencia(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
       try {
            Procedencia procedencia = new Procedencia(nombre, 
                                                        descripcion,
                                                        estado,usuarioCreacion);
            
            return String.valueOf(procedenciaController.insert(procedencia));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getProductora(String idProductora) throws TException {
        try {
            Productora productora = productoraController.get(Integer.parseInt(idProductora.trim()));
            return productora.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllProductora() throws TException {
        try {
            List<Productora> productoras = productoraController.getAll();
            String strProductoras = "";
            strProductoras = productoras.stream().map((productora) -> productora.toString()).reduce(strProductoras, String::concat);
            return strProductoras;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoProductora(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Productora productora = new Productora(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( productoraController.updateEstado(productora));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateProductora(String nombre, String descripcion, String estado, String idProductora, String usuario_modificacion) throws TException {
        try {
            Productora productora = new Productora(Integer.parseInt(idProductora.trim()), 
                                                    nombre, 
                                                    descripcion,
                                                    estado,usuario_modificacion);
            
            return String.valueOf(productoraController.update(productora));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertProductora(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            Productora productora = new Productora(nombre, 
                                                    descripcion,
                                                    estado,usuarioCreacion);
            
            return String.valueOf(productoraController.insert(productora));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPromocion(String idPromocion) throws TException {
        try {
            Promocion promocion = promocionController.get(Integer.parseInt(idPromocion.trim()));
            return promocion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPromocion() throws TException {
        try {
            List<Promocion> promociones = promocionController.getAll();
            String strPromociones = "";
            strPromociones = promociones.stream().map((promocion) -> promocion.toString()).reduce(strPromociones, String::concat);
            return strPromociones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPromocion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Promocion promocion = new Promocion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( promocionController.updateEstado(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePromocion(String nombre, String descripcion, String amigoTeatro, String idEvento, String idPlatea, String tipoAcceso, String idTipoPromocion, String fechaInicio, String fechaFin, String estado, String idPromocion, String usuario_modificacion) throws TException {
        try {
            Promocion promocion = new Promocion(Integer.parseInt(idPromocion.trim()), 
                                                nombre, 
                                                descripcion,
                                                amigoTeatro,
                                                Integer.parseInt(idEvento.trim()),
                                                Integer.parseInt(idPlatea.trim()),
                                                tipoAcceso,
                                                Integer.parseInt(idTipoPromocion.trim()),
                                                Date.valueOf(fechaInicio),
                                                Date.valueOf(fechaFin),
                                                estado,usuario_modificacion);
            
            return String.valueOf(promocionController.update(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPromocion(String nombre, String descripcion, String amigoTeatro, String idEvento, String idPlatea, String tipoAcceso, String idTipoPromocion, String fechaInicio, String fechaFin, String estado, String usuarioCreacion) throws TException {
       try {
            Promocion promocion = new Promocion(nombre, 
                                                descripcion,
                                                amigoTeatro,
                                                Integer.parseInt(idEvento.trim()),
                                                Integer.parseInt(idPlatea.trim()),
                                                tipoAcceso,
                                                Integer.parseInt(idTipoPromocion.trim()),
                                                Date.valueOf(fechaInicio),
                                                Date.valueOf(fechaFin),
                                                estado,usuarioCreacion);
            
            return String.valueOf(promocionController.insert(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getRol(String idRol) throws TException {
        try {
            Rol rol = rolController.get(Integer.parseInt(idRol.trim()));
            return rol.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllRol() throws TException {
        try {
            List<Rol> roles = rolController.getAll();
            String strRoles = "";
            strRoles = roles.stream().map((rol) -> rol.toString()).reduce(strRoles, String::concat);
            return strRoles;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoRol(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Rol rol = new Rol(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( rolController.updateEstado(rol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateRol(String descripcion, String modulo, String estado, String idRol, String usuario_modificacion) throws TException {
        try {
            Rol rol = new Rol(Integer.parseInt(idRol.trim()),
                                descripcion,
                                modulo,
                                estado,usuario_modificacion);
            
            return String.valueOf(rolController.update(rol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertRol(String descripcion, String modulo, String estado, String usuarioCreacion) throws TException {
        try {
            Rol rol = new Rol(descripcion,
                                modulo,
                                estado,usuarioCreacion);
            
            return String.valueOf(rolController.insert(rol));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getSala(String idSala) throws TException {
        try {
            Sala sala = salaController.get(Integer.parseInt(idSala.trim()));
            return sala.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllSala() throws TException {
        try {
            List<Sala> salas = salaController.getAll();
            String strSalas = "";
            strSalas = salas.stream().map((sala) -> sala.toString()).reduce(strSalas, String::concat);
            return strSalas;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoSala(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Sala sala = new Sala(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( salaController.updateEstado(sala));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateSala(String nombre, String descripcion, String capacidad, String rutaImagen, String estado, String idSala, String usuario_modificacion) throws TException {
        try {
            Sala sala = new Sala(Integer.parseInt(idSala.trim()),
                                nombre,
                                descripcion,
                                Integer.parseInt(capacidad.trim()),
                                rutaImagen,
                                estado,usuario_modificacion);
            
            return String.valueOf(salaController.update(sala));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertSala(String nombre, String descripcion, String capacidad, String rutaImagen, String estado, String usuarioCreacion) throws TException {
        try {
            Sala sala = new Sala(nombre,
                                descripcion,
                                Integer.parseInt(capacidad.trim()),
                                rutaImagen,
                                estado,usuarioCreacion);
            
            return String.valueOf(salaController.insert(sala));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getSalaMapa(String idSalaMapa) throws TException {
        try {
            SalaMapa salaMapa = salaMapaController.get(Integer.parseInt(idSalaMapa.trim()));
            return salaMapa.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllSalaMapa() throws TException {
        try {
            List<SalaMapa> salasMapa = salaMapaController.getAll();
            String strSalasMapa = "";
            strSalasMapa = salasMapa.stream().map((salaMapa) -> salaMapa.toString()).reduce(strSalasMapa, String::concat);
            return strSalasMapa;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoSalaMapa(String id, String estado, String usuario_modificacion) throws TException {
       try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( salaMapaController.updateEstado(salaMapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateSalaMapa(String idSala, String idMapa, String estado, String idSalaMapa, String usuario_modificacion) throws TException {
        try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(idSalaMapa.trim()),
                                                Integer.parseInt(idSala.trim()),
                                                Integer.parseInt(idMapa.trim()),
                                                estado,usuario_modificacion);
            
            return String.valueOf(salaMapaController.update(salaMapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertSalaMapa(String idSala, String idMapa, String estado, String usuarioCreacion) throws TException {
        try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(idSala.trim()),
                                            Integer.parseInt(idMapa.trim()),
                                            estado,usuarioCreacion);
            
            return String.valueOf(salaMapaController.insert(salaMapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getTarjeta(String idTarjeta) throws TException {
        try {
            Tarjeta tarjeta = tarjetaController.get(Integer.parseInt(idTarjeta.trim()));
            return tarjeta.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllTarjeta() throws TException {
        try {
            List<Tarjeta> tarjetas = tarjetaController.getAll();
            String strTarjetas = "";
            strTarjetas = tarjetas.stream().map((tarjeta) -> tarjeta.toString()).reduce(strTarjetas, String::concat);
            return strTarjetas;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoTarjeta(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Tarjeta tarjeta = new Tarjeta(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( tarjetaController.updateEstado(tarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateTarjeta(String nombre, String tipo, String estado, String idTarjeta, String usuario_modificacion) throws TException {
        try {
            Tarjeta tarjeta = new Tarjeta(Integer.parseInt(idTarjeta.trim()),
                                            nombre,
                                            tipo,
                                            estado,usuario_modificacion);
            
            return String.valueOf(tarjetaController.update(tarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertTarjeta(String nombre, String tipo, String estado, String usuarioCreacion) throws TException {
        try {
            Tarjeta tarjeta = new Tarjeta(nombre,
                                            tipo,
                                            estado,usuarioCreacion);
            
            return String.valueOf(tarjetaController.insert(tarjeta));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getTipoEspectaculo(String idTipoEspectaculo) throws TException {
        try {
            TipoEspectaculo tipoEspectaculo = tipoEspectaculoController.get(Integer.parseInt(idTipoEspectaculo.trim()));
            return tipoEspectaculo.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllTipoEspectaculo() throws TException {
        try {
            List<TipoEspectaculo> tiposEspectaculos = tipoEspectaculoController.getAll();
            String strTiposEspectaculos = "";
            strTiposEspectaculos = tiposEspectaculos.stream().map((tipoespectaculo) -> tipoespectaculo.toString()).reduce(strTiposEspectaculos, String::concat);
            return strTiposEspectaculos;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoTipoEspectaculo(String id, String estado, String usuario_modificacion) throws TException {
       try {
            TipoEspectaculo tipoEspectaculo = new TipoEspectaculo(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( tipoEspectaculoController.updateEstado(tipoEspectaculo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateTipoEspectaculo(String nombre, String descripcion, String estado, String idTipoEspectaculo, String usuario_modificacion) throws TException {
        try {
            TipoEspectaculo tipoEspectaculo = new TipoEspectaculo(Integer.parseInt(idTipoEspectaculo.trim()),
                                                    nombre,
                                                    descripcion,
                                                    estado,usuario_modificacion);
            
            return String.valueOf(tipoEspectaculoController.update(tipoEspectaculo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertTipoEspectaculo(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            TipoEspectaculo tipoEspectaculo = new TipoEspectaculo(nombre,
                                                                descripcion,
                                                                estado,usuarioCreacion);
            
            return String.valueOf(tipoEspectaculoController.insert(tipoEspectaculo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getTipoEvento(String idTipoEvento) throws TException {
        try {
            TipoEvento tipoEvento = tipoEventoController.get(Integer.parseInt(idTipoEvento.trim()));
            return tipoEvento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllTipoEvento() throws TException {
       try {
            List<TipoEvento> tiposEventos = tipoEventoController.getAll();
            String strTiposEventos = "";
            strTiposEventos = tiposEventos.stream().map((tipoEvento) -> tipoEvento.toString()).reduce(strTiposEventos, String::concat);
            return strTiposEventos;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoTipoEvento(String id, String estado, String usuario_modificacion) throws TException {
       try {
            TipoEvento tipoEvento = new TipoEvento(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( tipoEventoController.updateEstado(tipoEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateTipoEvento(String nombre, String descripcion, String estado, String idTipoEvento, String usuario_modificacion) throws TException {
        try {
            TipoEvento tipoEvento = new TipoEvento(Integer.parseInt(idTipoEvento.trim()),
                                                    nombre,
                                                    descripcion,
                                                    estado,usuario_modificacion);
            
            return String.valueOf(tipoEventoController.update(tipoEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertTipoEvento(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            TipoEvento tipoEvento = new TipoEvento(nombre,
                                                    descripcion,
                                                    estado,usuarioCreacion);
            
            return String.valueOf(tipoEventoController.insert(tipoEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getTipoPrecio(String idTipoPrecio) throws TException {
        try {
            TipoPrecio tipoPrecio = tipoPrecioController.get(Integer.parseInt(idTipoPrecio.trim()));
            return tipoPrecio.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllTipoPrecio() throws TException {
        try {
            List<TipoPrecio> tiposPrecios = tipoPrecioController.getAll();
            String strTiposPrecios = "";
            strTiposPrecios = tiposPrecios.stream().map((tipoPrecio) -> tipoPrecio.toString()).reduce(strTiposPrecios, String::concat);
            return strTiposPrecios;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoTipoPrecio(String id, String estado, String usuario_modificacion) throws TException {
       try {
            TipoPrecio tipoPrecio = new TipoPrecio(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( tipoPrecioController.updateEstado(tipoPrecio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateTipoPrecio(String nombre, String descripcion, String estado, String idTipoPrecio, String usuario_modificacion) throws TException {
        try {
            TipoPrecio tipoPrecio = new TipoPrecio(Integer.parseInt(idTipoPrecio.trim()),
                                                    nombre,
                                                    descripcion,
                                                    estado,usuario_modificacion);
            
            return String.valueOf(tipoPrecioController.update(tipoPrecio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertTipoPrecio(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            TipoPrecio tipoPrecio = new TipoPrecio(nombre,
                                                    descripcion,
                                                    estado,usuarioCreacion);
            
            return String.valueOf(tipoPrecioController.insert(tipoPrecio));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getTipoPromocion(String idTipoPromocion) throws TException {
        try {
            TipoPromocion tipoPromocion = tipoPromocionController.get(Integer.parseInt(idTipoPromocion.trim()));
            return tipoPromocion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllTipoPromocion() throws TException {
        try {
            List<TipoPromocion> tiposPromociones = tipoPromocionController.getAll();
            String strTiposPromociones = "";
            strTiposPromociones = tiposPromociones.stream().map((tipoPromocion) -> tipoPromocion.toString()).reduce(strTiposPromociones, String::concat);
            return strTiposPromociones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoTipoPromocion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            TipoPromocion tipoPromocion = new TipoPromocion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( tipoPromocionController.updateEstado(tipoPromocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateTipoPromocion(String nombre, String factorCompra, String factorPago, String idBancoTarjeta, String idCodigoPromocional, String estado, String idTipoPromocion, String usuario_modificacion) throws TException {
        try {
            TipoPromocion tipoPromocion = new TipoPromocion(Integer.parseInt(idTipoPromocion.trim()),
                                                            nombre,
                                                            Integer.parseInt(factorCompra.trim()),
                                                            Float.parseFloat(factorPago),
                                                            Integer.parseInt(idBancoTarjeta.trim()),
                                                            Integer.parseInt(idCodigoPromocional.trim()),
                                                            estado,usuario_modificacion);
            
            return String.valueOf(tipoPromocionController.update(tipoPromocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertTipoPromocion(String nombre, String factorCompra, String factorPago, String idBancoTarjeta, String idCodigoPromocional, String estado, String usuarioCreacion) throws TException {
        try {
            TipoPromocion tipoPromocion = new TipoPromocion(nombre,
                                                            Integer.parseInt(factorCompra.trim()),
                                                            Float.parseFloat(factorPago),
                                                            Integer.parseInt(idBancoTarjeta.trim()),
                                                            Integer.parseInt(idCodigoPromocional.trim()),
                                                            estado,usuarioCreacion);
            
            return String.valueOf(tipoPromocionController.insert(tipoPromocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getUsuario(String idUsuario) throws TException {
        try {
            System.out.println(idUsuario);
            Usuario usuario = usuarioController.get(Integer.parseInt(idUsuario.trim()));
            System.out.println(usuario);
            return usuario.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }       
    }

    @Override
    public String getAllUsuario() throws TException {
        try {
            List<Usuario> usuarios = usuarioController.getAll();
            String strUsuarios = "";
            for (Usuario usuario : usuarios) {
                strUsuarios+=usuario.toString();
            }
            return strUsuarios;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }           
    }
 
   @Override
    public String updateEstadoUsuario(String idUsuario, String estado, String usuario_modificacion) throws TException {
        try {
            Usuario usuario = new Usuario(Integer.parseInt(idUsuario.trim()),estado,usuario_modificacion);
            
            return String.valueOf(usuarioController.updateEstado(usuario));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String updateUsuario(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String idPerfil, String fechaNacimiento, String direccion, String estado, String idUsuario, String usuario_modificacion) throws TException {
        try {
            Usuario strusuario = new Usuario(Integer.parseInt(idUsuario.trim()),
                                            nombres,
                                            usuario,
                                            cedula,
                                            sexo,
                                            correo,
                                            celular,
                                            contrasena,
                                            Integer.parseInt(idPerfil.trim()),
                                            Date.valueOf(fechaNacimiento),
                                            direccion,
                                            estado,usuario_modificacion);
            System.out.println(usuario);
            return String.valueOf(usuarioController.update(strusuario));
        } catch (Exception ex) {
            return "false";
        }
    }
 

    @Override
    public String insertUsuario(String nombres, String strUsuario, String cedula, String sexo, String correo, String celular, String contrasena, String idPerfil, String fechaNacimiento, String direccion, String estado, String usuarioCreacion) throws TException {
        try {
            Usuario usuario = new Usuario(nombres,
                                            strUsuario,
                                            cedula,
                                            sexo,
                                            correo,
                                            celular,
                                            contrasena,
                                            Integer.parseInt(idPerfil.trim()),
                                            Date.valueOf(fechaNacimiento),
                                            direccion,
                                            estado,
                                            usuarioCreacion);
            
            return String.valueOf(usuarioController.insert(usuario));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getUsuarioCliente(String idUsuarioCliente) throws TException {
        try {
            UsuarioCliente usuarioCliente = usuarioClienteController.get(Integer.parseInt(idUsuarioCliente.trim()));
            return usuarioCliente.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }    
    }

    @Override
    public String getAllUsuarioCliente() throws TException {
        try {
            List<UsuarioCliente> usuariosCliente = usuarioClienteController.getAll();
            String strUsuariosCliente = "";
            for (UsuarioCliente usuarioCliente : usuariosCliente) {
                strUsuariosCliente+=usuarioCliente.toString();
            }
            return strUsuariosCliente;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }    
    }
    @Override
    public String updateEstadoUsuarioCliente(String idUsuarioCliente, String estado, String usuario_modificacion) throws TException {
        try {
            UsuarioCliente usuarioCliente = new UsuarioCliente(Integer.parseInt(idUsuarioCliente.trim()),estado,usuario_modificacion);
            
            return String.valueOf(usuarioClienteController.updateEstado(usuarioCliente));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateUsuarioCliente(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String fechaNacimiento, String direccion, String amigoTeatro, String estado, String idUsuarioCliente, String usuario_modificacion) throws TException {
        try {
            UsuarioCliente usuarioCliente = new UsuarioCliente(Integer.parseInt(idUsuarioCliente.trim()),
                                                                nombres,
                                                                usuario,
                                                                cedula,
                                                                correo,
                                                                sexo,
                                                                celular,
                                                                contrasena,
                                                                Date.valueOf(fechaNacimiento),
                                                                direccion,
                                                                amigoTeatro,
                                                                estado,usuario_modificacion);
            System.out.println(usuarioCliente );
            
            return String.valueOf(usuarioClienteController.update(usuarioCliente));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertUsuarioCliente(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String fechaNacimiento, String direccion, String amigoTeatro, String estado, String usuarioCreacion) throws TException {
       try {
            UsuarioCliente usuarioCliente = new UsuarioCliente(nombres,
                                                                usuario,
                                                                cedula,
                                                                correo,
                                                                sexo,
                                                                celular,
                                                                contrasena,
                                                                Date.valueOf(fechaNacimiento),
                                                                direccion,
                                                                amigoTeatro,
                                                                estado,
                                                                usuarioCreacion);
            
            return String.valueOf(usuarioClienteController.insert(usuarioCliente));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getUsuarioEvento(String idUsuarioEvento) throws TException {
        try {
            UsuarioEvento usuarioEvento = usuarioEventoController.get(Integer.parseInt(idUsuarioEvento.trim()));
            return usuarioEvento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String getAllUsuarioEvento() throws TException {
        try {
            List<UsuarioEvento> usuariosEvento = usuarioEventoController.getAll();
            String strUsuariosEvento = "";
            for (UsuarioEvento usuarioEvento : usuariosEvento) {
                strUsuariosEvento+=usuarioEvento.toString();
            }
            return strUsuariosEvento;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }        
    }
    
       @Override
    public String updateEstadoUsuarioEvento(String idUsuarioEvento, String estado, String usuario_modificacion) throws TException {
        try {
            UsuarioEvento usuarioEvento = new UsuarioEvento(Integer.parseInt(idUsuarioEvento.trim()),estado,usuario_modificacion);
            
            return String.valueOf(usuarioEventoController.updateEstado(usuarioEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
      @Override
    public String updateUsuarioEvento(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String perfil, String fechaNacimiento, String direccion, String estado, String idUsuarioEvento, String usuario_modificacion) throws TException {
       try {
            UsuarioEvento usuarioEvento = new UsuarioEvento(Integer.parseInt(idUsuarioEvento.trim()),
                                                                nombres,
                                                                usuario,
                                                                cedula,
                                                                sexo,
                                                                correo,
                                                                celular,
                                                                contrasena,
                                                                Date.valueOf(fechaNacimiento),
                                                                Integer.parseInt(perfil.trim()),
                                                                direccion,
                                                                estado,usuario_modificacion);
            
            return String.valueOf(usuarioEventoController.update(usuarioEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertUsuarioEvento(String nombres, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String perfil, String fechaNacimiento, String direccion, String estado, String usuarioCreacion) throws TException {
        try {
            UsuarioEvento usuarioEvento = new UsuarioEvento(nombres,
                                                            usuario,
                                                            cedula,
                                                            sexo,
                                                            correo,
                                                            celular,
                                                            contrasena,
                                                            Date.valueOf(fechaNacimiento),
                                                            Integer.parseInt(perfil.trim()),
                                                            direccion,
                                                            estado,
                                                            usuarioCreacion);
            
            return String.valueOf(usuarioEventoController.insert(usuarioEvento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

 

    

    

 

   

    

  

}
