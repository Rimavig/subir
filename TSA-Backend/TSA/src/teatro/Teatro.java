/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro;

import Controller.AsientoController;
import Controller.BancoController;
import Thrift.CRUDServer;
import java.sql.Date;
import java.sql.SQLException;
import java.sql.Time;
import java.util.List;
import java.util.Timer;
import java.util.TimerTask;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.thrift.TException;
import Controller.BancoTarjetaController;
import Controller.BloqueoController;
import Controller.CategoriaController;
import Controller.ClasificacionController;
import Controller.CodigoPromocionalController;
import Controller.DistribucionController;
import Controller.EventoController;
import Controller.FacturacionController;
import Controller.FichaArtisticaController;
import Controller.FuncionController;
import Controller.ImagenController;
import Controller.MapaController;
import Controller.NombrePromocionController;
import Controller.PerfilController;
import Controller.PerfilRolController;
import Controller.PlateaController;
import Controller.ProcedenciaController;
import Controller.ProcesosController;
import Controller.ProductoraController;
import Controller.PromocionController;
import Controller.RolController;
import Controller.SalaController;
import Controller.SalaMapaController;
import Controller.TaquillaController;
import Controller.TarjetaController;
import Controller.TipoEspectaculoController;
import Controller.TipoEventoController;
import Controller.UsuarioClienteController;
import Controller.UsuarioController;
import Controller.UsuarioEventoController;
import Entity.Asiento;
import Entity.Banco;
import Entity.BancoTarjeta;
import Entity.Bloqueo;
import Entity.Caja;
import Entity.Categoria;
import Entity.Clasificacion;
import Entity.CodigoPromocional;
import Entity.Contacto;
import Entity.Distribucion;
import Entity.Evento;
import Entity.Facturacion;
import Entity.FichaArtistica;
import Entity.Funcion;
import Entity.Fundacion;
import Entity.Imagen;
import Entity.Mapa;
import Entity.Perfil;
import Entity.PerfilRol;
import Entity.Platea;
import Entity.Procedencia;
import Entity.Productora;
import Entity.Promocion;
import Entity.Reserva;
import Entity.Rol;
import Entity.Sala;
import Entity.SalaMapa;
import Entity.Tarjeta;
import Entity.TipoEspectaculo;
import Entity.TipoEvento;
import Entity.TipoPromocion;
import Entity.Usuario;
import Entity.UsuarioCliente;
import Entity.UsuarioEvento;

/**
 *
 * @author Richard Vivanco - Alex Mendoza
 */
public class Teatro implements CRUDServer.Iface  {

    /**
     * @param args the command line arguments
     */

    public static BaseDatos base = new BaseDatos();
    public static  int tic=0;
   
    BancoController bancoController = new BancoController(base);
    AsientoController asientoController = new AsientoController(base);
    BancoTarjetaController bancoTarjetaController = new BancoTarjetaController(base);
    CategoriaController categoriaController = new CategoriaController(base);
    ImagenController imagenController = new ImagenController(base);
    ClasificacionController clasificacionController = new ClasificacionController(base);
    CodigoPromocionalController codigoPromocionalController = new CodigoPromocionalController(base);
    DistribucionController distribucionController = new DistribucionController(base);
    EventoController eventoController = new EventoController(base);
    FuncionController funcionController = new FuncionController(base);
    MapaController mapaController = new MapaController(base);
    PerfilController perfilController = new PerfilController(base);
    PerfilRolController perfilRolController = new PerfilRolController(base);
    PlateaController plateaController = new PlateaController(base);
    ProcedenciaController procedenciaController = new ProcedenciaController(base);
    ProductoraController productoraController = new ProductoraController(base);
    PromocionController promocionController = new PromocionController(base);
    NombrePromocionController nombrePromocionController = new NombrePromocionController(base);
    RolController rolController = new RolController(base);
    SalaController salaController = new SalaController(base);
    SalaMapaController salaMapaController = new SalaMapaController(base);
    TarjetaController tarjetaController = new TarjetaController(base);
    TipoEspectaculoController tipoEspectaculoController = new TipoEspectaculoController(base);
    TipoEventoController tipoEventoController = new TipoEventoController(base);
    UsuarioController usuarioController = new UsuarioController(base);
    UsuarioClienteController usuarioClienteController = new UsuarioClienteController(base);
    UsuarioEventoController usuarioEventoController = new UsuarioEventoController(base);
    FichaArtisticaController fichaController = new FichaArtisticaController(base);
    BloqueoController bloqueoController = new BloqueoController(base);
    FacturacionController facturacionController = new FacturacionController(base);
    ProcesosController procesosController = new ProcesosController(base);
    TaquillaController taquillaController = new TaquillaController(base);
    public static void main(String[] args) {
        
        Comunicacion hs = new Comunicacion();
        Thread t = new Thread(hs);
        t.start();
        Timer timer;
        timer = new Timer();

        TimerTask task = new TimerTask() {

        @Override
        public void run()
        {   
         try{
            if (tic==200){
                tic=1;
                base.seteo();
                System.out.print("1");
            }else{
                tic++;
            }
        }catch(Exception ex){
         tic++;  
        }

    }
        };
        // Empezamos dentro de 10ms y luego lanzamos la tarea cada 1000ms
        timer.scheduleAtFixedRate(task, 2, 1000);
    }
    
    @Override
    public String login(String username, String password) throws org.apache.thrift.TException {
        try {          
            Usuario usuario = base.login(username, password);
            //System.out.println(usuario);
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
    public String generarCodigo(String usuario, String correo) throws TException {
        try {
            //System.out.println(idUsuario);
            String usuario1 = usuarioController.generarCodigo(usuario,correo);
            //System.out.println(usuario);
            return usuario1.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }    
    }

    @Override
    public String validadCodigo(String usuario, String codigo, String clave) throws TException {
        try {
            //System.out.println(idUsuario);
            String usuario1 = usuarioController.validadCodigo(usuario,codigo,clave);
            System.out.println(usuario1);
            return usuario1.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
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
    public String getAllBanco(String tipo) throws TException {
        try {
            List<Banco> bancos;
            if (tipo.equals("taquilla")) {
               bancos = bancoController.getAll();
            }else{
                bancos = bancoController.getAll();
            }
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
    public String insertBancoTarjeta(String idBanco, String idTarjeta, String descuento, String estado,String usuarioCreacion) throws TException {
        try {
            BancoTarjeta bancoTarjeta = new BancoTarjeta(Integer.parseInt(idBanco.trim()), 
                                                            Integer.parseInt(idTarjeta.trim()), 
                                                            Float.valueOf(descuento),usuarioCreacion);
            
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
    public String getImagen(String idImagen, String tipo) throws TException {
        //System.out.println(tipo);
        try {
            Imagen imagen = imagenController.get(Integer.parseInt(idImagen.trim()),tipo);
            return imagen.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllImagen(String tipo) throws TException {
        //System.out.println(tipo);
        try {
            List<Imagen> imagens = imagenController.getAll(tipo);
            String strImagens = "";
            strImagens = imagens.stream().map((imagen) -> imagen.toString()).reduce(strImagens, String::concat);
            return strImagens;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String updateEstadoImagen(String id,  String tipo, String estado, String usuario_modificacion) throws TException {
       //System.out.println(tipo);
        try {
            Imagen imagen = new Imagen(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( imagenController.updateEstado(imagen,tipo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateImagen(String nombre, String descripcion, String tipo, String estado, String idImagen, String usuario_modificacion) throws TException {
        //System.out.println(tipo);
        try {
            Imagen imagen = new Imagen(Integer.parseInt(idImagen.trim()), 
                                                nombre, 
                                                descripcion,
                                                estado,usuario_modificacion);
            
            return String.valueOf(imagenController.update(imagen,tipo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String insertImagen(String nombre, String descripcion, String tipo, String estado, String usuarioCreacion) throws TException {
        //System.out.println(tipo);
        try {
            //System.out.println(nombre);
            Imagen imagen = new Imagen(nombre,descripcion,estado,usuarioCreacion);
            
            return String.valueOf(imagenController.insert(imagen,tipo));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "false";
        }
    }
    
    @Override
    public String getNombrePromocion(String idNombrePromocion) throws TException {
        try {
            Promocion promocion = nombrePromocionController.get(Integer.parseInt(idNombrePromocion.trim()));
            return promocion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllNombrePromocion() throws TException {
        try {
            List<Promocion> promocion = nombrePromocionController.getAll();
            String strPromociones = "";
            strPromociones = promocion.stream().map((categoria) -> categoria.toString()).reduce(strPromociones, String::concat);
            return strPromociones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateEstadoNombrePromocion(String id, String estado, String usuario_modificacion) throws TException {
       try {
            Promocion promocion = new Promocion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( nombrePromocionController.updateEstado(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateNombrePromocion(String nombre, String descripcion, String estado, String idNombrePromocion, String usuario_modificacion) throws TException {
        try {
            Promocion promocion = new Promocion(Integer.parseInt(idNombrePromocion.trim()), 
                                                nombre, 
                                                descripcion,
                                                estado,usuario_modificacion);
            
            return String.valueOf(nombrePromocionController.update(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String insertNombrePromocion(String nombre, String descripcion, String estado, String usuarioCreacion) throws TException {
        try {
            //System.out.println(nombre);
            Promocion promocion = new Promocion(nombre,descripcion,estado,usuarioCreacion);
            
            return String.valueOf(nombrePromocionController.insert(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getClasificacion(String idClasificacion) throws TException {
        try {
            Clasificacion clasificacion = clasificacionController.get(Integer.parseInt(idClasificacion.trim()));
            //System.out.println(clasificacion.toString());
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
    public String getEvento(String idEvento,String tipoEvento) throws TException {
        try {
            Evento evento = eventoController.get_basico(Integer.parseInt(idEvento.trim()));
            //System.out.println("getEvento");
            System.out.println(evento.toString());
            return evento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getEvento_sinopsis(String idEvento,String tipoEvento) throws TException {
        try {
            Evento evento = eventoController.get_sinopsis(Integer.parseInt(idEvento.trim()));
            //System.out.println("getEvento_sipnosis");
            return evento.sipnosis();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getEvento_multimedia(String idEvento,String tipoEvento) throws TException {
        try {
            Evento evento = eventoController.get_video(Integer.parseInt(idEvento.trim()));
            //System.out.println("getEvento_multimedia");
            return evento.video();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getAllEvento(String tipoEvento) throws TException {
        try {
            List<Evento> eventos;
            if (tipoEvento.equals("bloqueados")) {
                eventos = eventoController.getAllB();
            }else{
                eventos = eventoController.getAllA(tipoEvento);
            }
            String strEventos = "";
            strEventos = eventos.stream().map((evento) -> evento.toStringT()).reduce(strEventos, String::concat);
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
            return eventoController.updateEstado(evento);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
  
    @Override
    public String updateEvento_informacion(String nombre, String duracion, String fechaInicial, String fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String aforo, String tipoEvento,String estado, String idEvento, String preventa, String usuario_modificacion) throws TException {
        try {
            //System.out.println(idEvento);
            Evento evento = new Evento(Integer.parseInt(idEvento.trim()), 
                                        nombre, 
                                        Float.parseFloat(duracion),
                                        Date.valueOf(fechaInicial),
                                        Date.valueOf(fechaFinal),
                                        idProductora.trim(),
                                        idSalaMapa.trim(),
                                        idTipoEvento.trim(),
                                        idTipoEspectaculo.trim(),
                                        idCategoria.trim(),
                                        idClasificacion.trim(),
                                        idProcedencia.trim(),
                                        Integer.parseInt(aforo.trim()),
                                        tipoEvento,preventa,
                                        estado,usuario_modificacion);
            //System.out.println(evento);
            String valor=eventoController.update_informacion(evento);
            //System.out.println(valor);
            return valor;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEvento_sinopsis(String sinopsis, String tipoEvento, String idEvento, String usuario_modificacion) throws TException {
        try {
            //System.out.println(idEvento);
             Evento evento = new Evento();
             evento.setSinopsis(sinopsis);
             evento.setProductora(tipoEvento);
             evento.setIdEvento(Integer.parseInt(idEvento.trim()));
             evento.setUsuarioCreacion(usuario_modificacion);
             //System.out.println(evento);
            return String.valueOf(eventoController.update_sipnosis(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String updateEvento_multimedia(String video, String tipoEvento, String idEvento, String usuario_modificacion) throws TException {
        try {
            //System.out.println(video);
             Evento evento = new Evento();
             evento.setRutaVideo(video);
             evento.setIdEvento(Integer.parseInt(idEvento.trim()));
             evento.setUsuarioCreacion(usuario_modificacion);
            return String.valueOf(eventoController.update_video(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String insertEvento(String nombre, String duracion, String fechaInicial, String fechaFinal, String idProductora, String idSalaMapa, String idTipoEvento, String idTipoEspectaculo, String idCategoria, String idClasificacion, String idProcedencia, String aforo, String productora,  String tipoEvento, String estado, String usuarioCreacion) throws TException {
        try {
            //System.out.println(fechaInicial);
            //System.out.println(fechaFinal);
            Evento evento = new Evento(nombre, 
                                        Float.parseFloat(duracion),
                                        Date.valueOf(fechaInicial),
                                        Date.valueOf(fechaFinal),
                                       idProductora.trim(),
                                       idSalaMapa.trim(),
                                       idTipoEvento.trim(),
                                       idTipoEspectaculo.trim(),
                                       idCategoria.trim(),
                                       idClasificacion.trim(),
                                       idProcedencia.trim(),
                                        Integer.parseInt(aforo.trim()),
                                        productora,
                                        tipoEvento,
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
    public String getAllFuncion(String idEvento) throws TException {
        try {
            List<Funcion> funciones = funcionController.getAll(Integer.parseInt(idEvento.trim()));
            String strFunciones = "";
            strFunciones = funciones.stream().map((funcion) -> funcion.toString()).reduce(strFunciones, String::concat);
            //System.out.println(strFunciones );
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
    public String updateFuncion(String fecha, String aforo, String estado,  String idFuncion, String usuario_modificacion) throws TException {
        try {
            Funcion funcion = new Funcion();
            funcion.setAforo(Integer.parseInt(aforo.trim()));
            funcion.setFecha(fecha);
            funcion.setIdFuncion(Integer.parseInt(idFuncion.trim()));
            
            return String.valueOf(funcionController.update(funcion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertFuncion(String fecha, String aforo, String idEvento, String estado, String usuarioCreacion) throws TException {
       try {
            Funcion funcion = new Funcion();
            funcion.setAforo(Integer.parseInt(aforo.trim()));
            funcion.setFecha(fecha);
            funcion.setUsuarioCreacion(usuarioCreacion);
            funcion.setIdEvento(Integer.parseInt(idEvento.trim()));
            
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
            String perfil = perfilController.get(Integer.parseInt(idPerfil.trim()));
            //System.out.println(perfil);
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
            Perfil perfil = new Perfil();
            perfil.setEstado(estado);
            perfil.setIdPerfil(Integer.parseInt(id.trim()));
            perfil.setUsuarioCreacion(usuario_modificacion);
            return String.valueOf( perfilController.updateEstado(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePerfil(String nombre, String descripcion, String tipo, String idPerfil, String usuario_modificacion) throws TException {
        try {
            Perfil perfil = new Perfil();
            perfil.setNombre(nombre);
            perfil.setDescripcion(descripcion);
            perfil.setTipo(tipo);
            perfil.setIdPerfil(Integer.parseInt(idPerfil.trim()));
            perfil.setUsuarioCreacion(usuario_modificacion);
            
            return String.valueOf(perfilController.update(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPerfil(String nombre, String descripcion, String tipo, String usuarioCreacion) throws TException {
       try {
            Perfil perfil = new Perfil();
            perfil.setNombre(nombre);
            perfil.setDescripcion(descripcion);
            perfil.setTipo(tipo);
            perfil.setUsuarioCreacion(usuarioCreacion);
            
            return String.valueOf(perfilController.insert(perfil));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getPerfilRol(String idPerfil,String idRol) throws TException {
        try {
            String perfilRol = perfilRolController.get(Integer.parseInt(idPerfil.trim()),Integer.parseInt(idRol.trim()));
            //System.out.println(perfilRol);
            return perfilRol.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPerfilRol(String idPerfil) throws TException {
        try {
            String strPerfilesRol = perfilRolController.getAll(Integer.parseInt(idPerfil.trim()));
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
    public String isPrincipal(String idEvento) throws TException {
        try {
             return String.valueOf(plateaController.isPrincipal(Integer.parseInt(idEvento.trim())));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getAllPlatea(String idEvento) throws TException {
        try {
          
            List<Platea> plateas = plateaController.getAll(Integer.parseInt(idEvento.trim()));
            String strPlateas = "";
            strPlateas = plateas.stream().map((platea) -> platea.toString()).reduce(strPlateas, String::concat);
              System.out.println(strPlateas);
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
    public String updatePlatea(String nombre, String costo,String aforo, String estado, String idPlatea, String usuario_modificacion) throws TException {
        try {
            Platea platea = new Platea();
            platea.setAforo(Integer.parseInt(aforo.trim()));
            platea.setCosto(Float.parseFloat(costo));
            platea.setEstado(estado);
            platea.setIdPlatea(Integer.parseInt(idPlatea.trim()));
            platea.setNombre(nombre);
            platea.setUsuarioCreacion(usuario_modificacion);
            return String.valueOf(plateaController.update(platea));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertPlatea(String nombre, String costo, String aforo, String idEvento, String estado, String usuarioCreacion) throws TException {
        try {
            Platea platea = new Platea();
            platea.setAforo(Integer.parseInt(aforo.trim()));
            platea.setCosto(Float.parseFloat(costo));
            platea.setEstado(estado);
            platea.setIdEvento(Integer.parseInt(idEvento.trim()));
            platea.setNombre(nombre);
            platea.setUsuarioCreacion(usuarioCreacion);

            return String.valueOf(plateaController.insert(platea));
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
    public String getPromocion(String idPromocion,String idTipoPromocion,String tipo) throws TException {
        try {
            Promocion promocion = promocionController.get(Integer.parseInt(idPromocion.trim()),Integer.parseInt(idTipoPromocion.trim()),tipo );
            return promocion.toStringGet();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPromocion(String idEvento,String tipo) throws TException {
        try {
            List<Promocion> promociones ;
            String strPromociones = "";
            //System.out.println(tipo);
            //System.out.println(idEvento);
            if (tipo.contains("T")) {
                tipo=tipo.substring(0, tipo.length()-1);
                promociones = promocionController.getAllT(Integer.parseInt(idEvento.trim()), tipo);
                if (tipo.equals("CP")) {
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_codigoAllT()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("FC")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_compraAllT()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("FP")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_pagoAllT()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("TB")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_tarjetaAllT()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("EC")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_cruzadoAllT()).reduce(strPromociones, String::concat);
                }
            }else{
                promociones = promocionController.getAll(Integer.parseInt(idEvento.trim()), tipo);
                if (tipo.equals("CP")) {
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_codigoAll()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("FC")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_compraAll()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("FP")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_pagoAll()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("TB")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_tarjetaAll()).reduce(strPromociones, String::concat);
                }else if(tipo.equals("EC")){
                    strPromociones = promociones.stream().map((promocion) -> promocion.toString_cruzadoAll()).reduce(strPromociones, String::concat);
                }
            }
            
            //System.out.println(strPromociones);
            return strPromociones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    //generales
     @Override
    public String getAllPromociones() throws TException {
        try {
            List<Promocion> promociones = promocionController.getAll();
            String strPromociones = "";
            strPromociones = promociones.stream().map((promocion) -> promocion.toString()).reduce(strPromociones, String::concat);
            //System.out.println(strPromociones);
            return strPromociones;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateEstadoPromocion(String id, String estado,String tipo, String usuario_modificacion) throws TException {
       try {
           //System.out.println(estado);
            Promocion promocion = new Promocion();
            promocion.setIdPromocion2(Integer.parseInt(id.trim()));
            promocion.setEstado(estado);
            promocion.setTipoPromo(tipo);
            promocion.setUsuarioCreacion(usuario_modificacion);
            return String.valueOf( promocionController.updateEstado(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
     @Override
    public String insertPromocion(String nombre, String descripcion, String amigoTeatro, String idEvento, String idPlatea, String idFuncion, String General, String Web, String App, String Taquilla, String idTipoPromocion, String fechaInicio, String fechaFin, String TipoPromocion, String var1, String var2, String descuento, String Cmaxima,String var3, String usuarioCreacion) throws TException {
       try {
           Promocion promocion=new Promocion();
           promocion.setAmigoTeatro(amigoTeatro);
           
           promocion.setCategoria(Integer.parseInt(idTipoPromocion.trim())+"");
          
           promocion.setDescripcion(descripcion);
           promocion.setFechaFin(Date.valueOf(fechaFin));
           promocion.setFechaInicio( Date.valueOf(fechaInicio));
           promocion.setNombre(nombre);
           promocion.setTipoAcceso(General+","+Web+","+App+","+Taquilla);
           promocion.setTipoPromo(TipoPromocion);
           promocion.setIdEvento(Integer.parseInt(idEvento.trim()));
           promocion.setIdPlatea(Integer.parseInt(idPlatea.trim()));
           promocion.setIdFuncion(Integer.parseInt(idFuncion.trim()));
           promocion.setUsuarioCreacion(usuarioCreacion);
           promocion.setCmaxima(Cmaxima);
           if (TipoPromocion.equals("boletos")) {
               promocion.setDesde(Integer.parseInt(var1.trim()));
               promocion.setHasta(Integer.parseInt(var2.trim()));
               promocion.setDescuento(Float.parseFloat(descuento.trim()));
               //System.out.println(promocion.toString_compraAll());
           }else if (TipoPromocion.equals("Fpago")) {
               promocion.setDesde(Integer.parseInt(var1.trim()));
               promocion.setHasta(Integer.parseInt(var2.trim()));
                //System.out.println(promocion.toString_pagoAll());
           }else if (TipoPromocion.equals("FormaPago")) {
               promocion.setBanco(var2);
               promocion.setTarjeta(var1);
              promocion.setDescuento(Float.parseFloat(descuento.trim()));
                //System.out.println(promocion.toString_tarjetaAll());
           }else if (TipoPromocion.equals("Cpromocional")) {
                promocion.setCodigo(var1);
                promocion.setDescuento(Float.parseFloat(descuento.trim()));
                 //System.out.println(promocion.toString_codigoAll());
           }else if (TipoPromocion.equals("cruzados")) {
                promocion.setIdEvento1(Integer.parseInt(var1.trim()));
                promocion.setDesde(Integer.parseInt(var2.trim()));
                promocion.setHasta(Integer.parseInt(descuento.trim()));
                promocion.setDescuento(Float.parseFloat(var3.trim()));
                //System.out.println(promocion.toString_cruzadoAll());
           }
            return String.valueOf(promocionController.insert(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePromocion(String idPromocion, String idPromocion2,String nombre, String descripcion, String amigoTeatro, String idEvento, String idPlatea, String idFuncion, String General, String Web, String App, String Taquilla, String idTipoPromocion, String fechaInicio, String fechaFin, String TipoPromocion, String var1, String var2, String descuento, String Cmaxima,String var3, String usuarioCreacion) throws TException {
       try {
           Promocion promocion=new Promocion();
           promocion.setAmigoTeatro(amigoTeatro);
           promocion.setCategoria(Integer.parseInt(idTipoPromocion.trim())+"");
           promocion.setIdPromocion(Integer.parseInt(idPromocion.trim()));
           promocion.setIdPromocion2(Integer.parseInt(idPromocion2.trim()));
           promocion.setDescripcion(descripcion);
           promocion.setFechaFin(Date.valueOf(fechaFin));
           promocion.setFechaInicio( Date.valueOf(fechaInicio));
           promocion.setNombre(nombre);
           promocion.setTipoAcceso(General+","+Web+","+App+","+Taquilla);
           promocion.setTipoPromo(TipoPromocion);
           promocion.setIdEvento(Integer.parseInt(idEvento.trim()));
           promocion.setIdPlatea(Integer.parseInt(idPlatea.trim()));
           promocion.setIdFuncion(Integer.parseInt(idFuncion.trim()));
           promocion.setUsuarioCreacion(usuarioCreacion);
           promocion.setCmaxima(Cmaxima);
           if (TipoPromocion.equals("boletos")) {
               promocion.setDesde(Integer.parseInt(var1.trim()));
               promocion.setHasta(Integer.parseInt(var2.trim()));
               promocion.setDescuento(Float.parseFloat(descuento.trim()));
               //System.out.println(promocion.toString_compraAll());
           }else if (TipoPromocion.equals("Fpago")) {
               promocion.setDesde(Integer.parseInt(var1.trim()));
               promocion.setHasta(Integer.parseInt(var2.trim()));
                //System.out.println(promocion.toString_pagoAll());
           }else if (TipoPromocion.equals("FormaPago")) {
               promocion.setBanco(var2);
               promocion.setTarjeta(var1);
               promocion.setDescuento(Float.parseFloat(descuento.trim()));
                //System.out.println(promocion.toString_tarjetaAll());
           }else if (TipoPromocion.equals("Cpromocional")) {
                promocion.setCodigo(var1);
                promocion.setDescuento(Float.parseFloat(descuento.trim()));
                 //System.out.println(promocion.toString_codigoAll());
           }else if (TipoPromocion.equals("cruzados")) {
                promocion.setIdEvento1(Integer.parseInt(var1.trim()));
                promocion.setDesde(Integer.parseInt(var2.trim()));
                promocion.setHasta(Integer.parseInt(descuento.trim()));
                promocion.setDescuento(Float.parseFloat(var3.trim()));
                //System.out.println(promocion.toString_cruzadoAll());
           }
           //System.out.println(promocion.toStringGet());
            return String.valueOf(promocionController.update(promocion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getRol(String idRol) throws TException {
        try {
            Rol rol = rolController.get(Integer.parseInt(idRol.trim()));
           // System.out.println(rol);
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
    public String getSalaMapa(String idSalaMapa, String tipo) throws TException {
        try {
            if (tipo.equals("Principal")) {
                //System.out.println(idSalaMapa);
                String distribucion = salaMapaController.getAsientoDistribucion(Integer.parseInt(idSalaMapa.trim()));
                String mapa = salaMapaController.getMapa(Integer.parseInt(idSalaMapa.trim()));
                //System.out.println(distribucion);
                 //System.out.println(mapa);
                return distribucion+"&"+mapa;
            }else if (tipo.equals("bloqueo")) {
                //System.out.println(idSalaMapa);
                String mapa = salaMapaController.getMapaP(Integer.parseInt(idSalaMapa.trim()));
                return mapa;
            }else if (tipo.equals("Mapa")) {
                //System.out.println(idSalaMapa);
                SalaMapa mapa = salaMapaController.get(Integer.parseInt(idSalaMapa.trim()));
                //System.out.println(mapa);
                return mapa.toString();
            }else{
                //System.out.println(idSalaMapa);
                String mapa = salaMapaController.getMapa(Integer.parseInt(idSalaMapa.trim()));
                return mapa;
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllSalaMapa(String tipo) throws TException {
        try {
            String strSalasMapa = "";
            if (tipo.trim().equals("total")) {
                List<SalaMapa> salasMapa = salaMapaController.getAll();
                strSalasMapa = salasMapa.stream().map((salaMapa) -> salaMapa.toString()).reduce(strSalasMapa, String::concat);
            }else{
                int id=Integer.parseInt(tipo.trim());
                List<SalaMapa> salasMapa = salaMapaController.getAll(id);
                strSalasMapa = salasMapa.stream().map((salaMapa) -> salaMapa.toString()).reduce(strSalasMapa, String::concat);
            }
            //System.out.println(strSalasMapa);
             return strSalasMapa;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String updateEstadoSalaMapa(String id, String estado, String usuario_modificacion, String tipo) throws TException {
       try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf( salaMapaController.updateEstado(salaMapa));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    //eliminar no se usa
    @Override
    public String updateSalaMapa(String idSalaMapa, String idMapa,String nombre, String rutaImagen, String estado, String usuario_modificacion) throws TException {
        try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(idSalaMapa.trim()),Integer.parseInt(idMapa.trim()),
                                                nombre.trim(),
                                                rutaImagen.trim(),
                                                estado,usuario_modificacion);
            
            return String.valueOf(salaMapaController.update(salaMapa));
        } catch (Exception ex) {
            //System.out.println(ex);
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return ex.getMessage();
        }
    }

    @Override
    public String insertSalaMapa(String idSala, String nombre, String rutaImagen, String estado, String usuarioCreacion) throws TException {
        

        try {
            SalaMapa salaMapa = new SalaMapa(Integer.parseInt(idSala.trim()),
                                            nombre,rutaImagen,
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
    public String getAllTarjeta(String tipo) throws TException {
        try {
            List<Tarjeta> tarjetas;
            if (tipo.equals("taquilla")) {
                tarjetas = tarjetaController.getAllTaquilla();
            }else{
                tarjetas = tarjetaController.getAll();
            }
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
    public String getUsuario(String idUsuario) throws TException {
        try {
            //System.out.println(idUsuario);
            Usuario usuario = usuarioController.get(Integer.parseInt(idUsuario.trim()));
            //System.out.println(usuario);
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
    public String updateUsuario(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String idPerfil, String fechaNacimiento, String direccion, String estado, String idUsuario, String usuario_modificacion) throws TException {
        try {
            Usuario strusuario = new Usuario(Integer.parseInt(idUsuario.trim()),
                                            nombres,apellidos,
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
            //System.out.println(usuario);
            return String.valueOf(usuarioController.update(strusuario));
        } catch (Exception ex) {
            return "false";
        }
    }
 

    @Override
    public String insertUsuario(String nombres,String apellidos, String strUsuario, String cedula, String sexo, String correo, String celular, String contrasena, String idPerfil, String fechaNacimiento, String direccion, String estado, String usuarioCreacion) throws TException {
        try {
            Usuario usuario = new Usuario(nombres,apellidos,
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
    public String updateUsuarioCliente(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String fechaNacimiento, String direccion, String amigoTeatro, String estado, String idUsuarioCliente, String usuario_modificacion) throws TException {
        try {
            UsuarioCliente usuarioCliente = new UsuarioCliente(Integer.parseInt(idUsuarioCliente.trim()),
                                                                nombres,apellidos,
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
            //System.out.println(usuarioCliente );
            
            return String.valueOf(usuarioClienteController.update(usuarioCliente));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertUsuarioCliente(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String fechaNacimiento, String direccion, String amigoTeatro, String estado, String usuarioCreacion) throws TException {
       try {
            UsuarioCliente usuarioCliente = new UsuarioCliente(nombres,apellidos,
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
    public String updateUsuarioEvento(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String perfil, String fechaNacimiento, String direccion, String estado, String idUsuarioEvento, String usuario_modificacion) throws TException {
       try {
            UsuarioEvento usuarioEvento = new UsuarioEvento(Integer.parseInt(idUsuarioEvento.trim()),
                                                                nombres,apellidos,
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
    public String insertUsuarioEvento(String nombres,String apellidos, String usuario, String cedula, String sexo, String correo, String celular, String contrasena, String perfil, String fechaNacimiento, String direccion, String estado, String usuarioCreacion) throws TException {
        try {
            UsuarioEvento usuarioEvento = new UsuarioEvento(nombres,apellidos,
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

    @Override
    public String getFichaArtistica(String idficha) throws TException {
       try {
            FichaArtistica ficha = fichaController.get(Integer.parseInt(idficha.trim()));
            //System.out.println(ficha);
            return ficha.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String deleteFichaArtistica(String idficha) throws TException {
        try {
            return String.valueOf(fichaController.delete(Integer.parseInt(idficha.trim())));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String getAllFichaArtistica(String idEvento) throws TException {
        try {
            List<FichaArtistica> ficha = fichaController.getAll(Integer.parseInt(idEvento.trim()));
            String strFichaArtistica = "";
            for (FichaArtistica fichaArtistica : ficha) {
                strFichaArtistica+=fichaArtistica.toString();
            }
            return strFichaArtistica;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }    
    }

    @Override
    public String updateFichaArtistica( String titulo, String descripcion, String idficha, String usuario_modificacion) throws TException {
       try {
            FichaArtistica ficha = new FichaArtistica(Integer.parseInt(idficha.trim()),
                                                                titulo,descripcion,
                                                                usuario_modificacion);
            
            return String.valueOf(fichaController.update(ficha));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertFichaArtistica(String idEvento, String titulo, String descripcion, String usuarioCreacion) throws TException {
         try {
            FichaArtistica ficha  = new FichaArtistica(Integer.parseInt(idEvento.trim()),
                                                                titulo,descripcion,
                                                                usuarioCreacion);
            
             return String.valueOf(fichaController.insert(ficha));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String bloqueo(String idFuncion, String idPlatea, String tipo, String fila, String desde, String hasta, String nombre, String correo, String descripcion, String estado, String usuario_modificacion) throws TException {
       Bloqueo bloqueo=new Bloqueo();
       bloqueo.setCorreo(correo);
       bloqueo.setDescripcion(descripcion);
      
       bloqueo.setEstado(estado);
       bloqueo.setFila(fila);
        if (!hasta.equals("")) {
               bloqueo.setHasta(Integer.parseInt(hasta.trim()));
        }
        if (tipo.equals("asiento")) {
            bloqueo.setFila(desde);
        }else{
            if (!desde.equals("")) {
                bloqueo.setDesde(Integer.parseInt(desde.trim()));
            }
        }
        
       bloqueo.setIdFuncion(Integer.parseInt(idFuncion.trim()));
       bloqueo.setIdPlatea(Integer.parseInt(idPlatea.trim()));
       bloqueo.setTipo(tipo);
       bloqueo.setNombre(nombre);
       bloqueo.setUsuario_modificacion(usuario_modificacion);
         //System.out.println(bloqueo);
       //evento no es principal
       try {
            if (tipo.equals("cantidad")) {
                String resultado=bloqueoController.cantidad(bloqueo);
               return resultado;
            }else if (tipo.equals("fila")) {
                String resultado=bloqueoController.fila(bloqueo);
               return resultado;
            }else if (tipo.equals("laterales")) {
                String resultado=bloqueoController.lateral(bloqueo);
               return resultado;
            }else{
                String resultado=bloqueoController.asiento(bloqueo);
               return resultado;
            }
                  
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
   
    }

    @Override
    public String getPlateaFuncion(String idPlatea, String idFuncion) throws TException {
        try {
            Platea plateaT;
            if (idPlatea.equals("T")) {
                List<Platea> plateas = plateaController.getP(Integer.parseInt(idFuncion.trim()));
                String strPlateas = "";
                strPlateas = plateas.stream().map((platea) -> platea.toString()).reduce(strPlateas, String::concat);
                System.out.println(strPlateas);
                return strPlateas;
            }else{
                plateaT = plateaController.get(Integer.parseInt(idPlatea.trim()),Integer.parseInt(idFuncion.trim()));
            }
          
            //System.out.println(platea.toString2());
            return plateaT.toString2();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllCortesia() throws TException {
        try {
            String resultado=bloqueoController.cortesia();
            //System.out.println(resultado);
            return resultado;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
         
    }

    @Override
    public String deleteCortesia(String idTicketAsiento, String idTicket, String usuario_modificacion) throws TException {
        try {
            String resultado="";
            if (idTicket.equals("0")) {
                resultado=bloqueoController.deleteA_cortesia(Integer.parseInt(idTicketAsiento.trim()));
            }else{
                resultado=bloqueoController.delete_cortesia(Integer.parseInt(idTicketAsiento.trim()),Integer.parseInt(idTicket.trim()),usuario_modificacion);
            }
            
            //System.out.println(resultado);
            return resultado;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getCortesia(String id_cortesia) throws TException {
        try {
            String resultado=bloqueoController.Ecortesia(Integer.parseInt(id_cortesia.trim()));
            //System.out.println(resultado);
            return resultado;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateEstadoCortesia(String id, String estado, String usuario_modificacion) throws TException {
        try {
            return String.valueOf(bloqueoController.updateEstadoCortesia(Integer.parseInt(id.trim()),estado,usuario_modificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getFacturacion(String idFacturacion) throws TException {
        try {
            Facturacion facturacion = facturacionController.get(Integer.parseInt(idFacturacion.trim()));
            //System.out.println(ficha);
            return facturacion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String getAllFacturacion(String idUsuario) throws TException {
       try {
            List<Facturacion> facturacion = facturacionController.getAll(Integer.parseInt(idUsuario.trim()));
            String strfacturacion = "";
            for (Facturacion facturacionT : facturacion) {
                strfacturacion+=facturacionT.toString();
            }
            return strfacturacion;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }   
    }

    @Override
    public String updateEstadoFacturacion(String id, String estado, String usuario_modificacion) throws TException {
        try {
            Facturacion facturacion = new Facturacion(Integer.parseInt(id.trim()),estado,usuario_modificacion);
            return String.valueOf(facturacionController.updateEstado(facturacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateFacturacion(String nombres, String apellidos, String tipo, String cedula, String razon,String direccion, String correo, String estado, String idUsuario, String idFacturacion, String usuario_modificacion) throws TException {
        Facturacion facturacion = new Facturacion();
        if (tipo.equals("cedula")) {
            facturacion.setCedula(cedula);
            facturacion.setTipo("C");
        }else if (tipo.equals("ruc")) {
            facturacion.setRuc(cedula);
            facturacion.setTipo("R");
        }else{
            facturacion.setCedula(cedula);
            facturacion.setTipo("P");
        }
        facturacion.setRazon(razon);
        facturacion.setNombres(nombres);
        facturacion.setApellidos(apellidos);
        facturacion.setEstado(estado);
        facturacion.setDireccion(direccion);
        facturacion.setCorreo(correo);
        facturacion.setIdFacturacion(Integer.parseInt(idFacturacion.trim()));
        facturacion.setUsuarioCreacion(usuario_modificacion);

        try {
            return String.valueOf(facturacionController.update(facturacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertFacturacion(String nombres, String apellidos, String tipo, String cedula, String razon, String direccion,String correo, String estado, String idUsuario, String usuarioCreacion) throws TException {
        Facturacion facturacion = new Facturacion();
        if (tipo.equals("cedula")) {
            facturacion.setCedula(cedula);
            facturacion.setTipo("C");
        }else if (tipo.equals("ruc")) {
            facturacion.setRuc(cedula);
            facturacion.setTipo("R");
        }else{
            facturacion.setCedula(cedula);
            facturacion.setTipo("P");
        }
        facturacion.setRazon(razon);
        facturacion.setUsuarioCreacion(usuarioCreacion);
        facturacion.setNombres(nombres);
        facturacion.setApellidos(apellidos);
        facturacion.setEstado(estado);
        facturacion.setDireccion(direccion);
        facturacion.setCorreo(correo);
        facturacion.setIdUsuario(Integer.parseInt(idUsuario.trim()));
        try {
            return String.valueOf(facturacionController.insert(facturacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getEventoDestacado() throws TException {
        try {
            Evento evento = eventoController.getDestacado();
            //System.out.println(ficha);
            return evento.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateEventoDestacado(String id, String usuario_modificacion) throws TException {
        try {
            Evento evento = new Evento();
            evento.setIdEvento(Integer.parseInt(id.trim()));
            evento.setUsuarioCreacion(usuario_modificacion);
            return String.valueOf(eventoController.update_destacado(evento));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getContacto() throws TException {
        try {
            String contacto = procesosController.getContacto();
            //System.out.println(ficha);
            System.out.println(contacto);
            return contacto.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateContacto(String nombre, String celular, String telefono, String direccion, String correo, String pagina, String facebook, String instagram, String twitter, String usuario_modificacion) throws TException {
        Contacto contacto=new Contacto();
        contacto.setCelular(celular);
        contacto.setTelefono(telefono);
        contacto.setDireccion(direccion);
        contacto.setFacebook(facebook);
        contacto.setIdContacto(1);
        contacto.setInstagram(instagram);
        contacto.setTwitter(twitter);
        contacto.setCorreo(correo);
        contacto.setPagina(pagina);
        contacto.setNombre(nombre);
        try {
            return String.valueOf(procesosController.updateContacto(contacto));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getFundacion() throws TException {
        try {
            String fundacion = procesosController.getFundacion();
            //System.out.println(ficha);
            return fundacion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateFundacion(String nombre, String descripcion1, String descripcion2, String precio1, String precio2, String precio3, String precio4, String precio5, String precio6, String usuario_modificacion) throws TException {
        Fundacion fundacion=new Fundacion();
        fundacion.setDescripcion1(descripcion1);
        fundacion.setDescripcion2(descripcion2);
        fundacion.setNombre(nombre);
        fundacion.setPrecio1(Integer.parseInt(precio1.trim()));
        fundacion.setPrecio2(Integer.parseInt(precio2.trim()));
        fundacion.setPrecio3(Integer.parseInt(precio3.trim()));
        fundacion.setPrecio4(Integer.parseInt(precio4.trim()));
        fundacion.setPrecio5(Integer.parseInt(precio5.trim()));
        fundacion.setPrecio6(Integer.parseInt(precio6.trim()));
        fundacion.setIdFundacion(1);
        try {
            return String.valueOf(procesosController.updateFundacion(fundacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllBeneficios() throws TException {
        try {
            String beneficios = procesosController.getAllBeneficios();
            //System.out.println(ficha);
            System.out.println(beneficios);
            return beneficios.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getBeneficio(String id) throws TException {
        try {
            String beneficios = procesosController.getBeneficio(Integer.parseInt(id.trim()));
            //System.out.println(ficha);
            return beneficios.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updateBeneficio(String id, String beneficio, String usuario_modificacion) throws TException {
        try {
            boolean beneficios = procesosController.updateBeneficio(Integer.parseInt(id.trim()),beneficio,usuario_modificacion);
            //System.out.println(ficha);
            return String.valueOf(beneficios);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    
    @Override
    public String updateEstadoBeneficio(String id, String estado, String usuario_modificacion) throws TException {
        try {
            return String.valueOf(procesosController.updateEstadoBeneficio(Integer.parseInt(id.trim()),estado,usuario_modificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
   
    @Override
    public String insertBeneficio(String beneficio, String usuarioCreacion) throws TException {
        try {
            boolean beneficios = procesosController.insertBeneficio(beneficio,usuarioCreacion);
            //System.out.println(ficha);
            return String.valueOf(beneficios);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllPreguntas() throws TException {
        try {
            String pregunta = procesosController.getAllPreguntas();
            //System.out.println(ficha);
            return pregunta.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getPregunta(String id) throws TException {
        try {
            String pregunta = procesosController.getPregunta(Integer.parseInt(id.trim()));
            //System.out.println(ficha);
            return pregunta.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String updatePregunta(String id, String pregunta, String respuesta, String usuario_modificacion) throws TException {
        try {
            boolean pregunt = procesosController.updatePregunta(Integer.parseInt(id.trim()),pregunta,respuesta,usuario_modificacion);
            //System.out.println(ficha);
            return String.valueOf(pregunt);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }

    }
    @Override
    public String updateEstadoPregunta(String id, String estado, String usuario_modificacion) throws TException {
        try {
            System.out.println(id);
            return String.valueOf(procesosController.updateEstadoPregunta(Integer.parseInt(id.trim()),estado,usuario_modificacion));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String insertPregunta(String pregunta, String respuesta, String usuarioCreacion) throws TException {
        try {
            boolean pregunt = procesosController.insertPregunta(pregunta,respuesta,usuarioCreacion);
            //System.out.println(ficha);
            return String.valueOf(pregunt);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getInformacion() throws TException {
       try {
            String informacion = procesosController.getInformacion();
            //System.out.println(ficha);
            return informacion.toString();
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateInformacion(String Informacion, String usuario_modificacion) throws TException {
        try {
            boolean informacion = procesosController.updateInformacion(Informacion,usuario_modificacion);
            //System.out.println(ficha);
            return String.valueOf(informacion);
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllCaja(String idUsuario) throws TException {
        try {
            List<Caja> caja = taquillaController.getAllCaja(idUsuario);
            String strcaja = "";
            for (Caja cajaT : caja) {
                strcaja+=cajaT.toString();
            }
            return strcaja;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String abrirCaja(String idUsuario, String usuario) throws TException {
        try {
             System.out.println(idUsuario);
            String abrir=taquillaController.abrirCaja(idUsuario,usuario);
            System.out.println(abrir);
            return abrir;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
        
    }
    @Override
    public String getCaja(String idCaja, String idUsuario) throws TException {
        try {
            System.out.println(idUsuario);
            String abrir=taquillaController.editarCaja(idCaja,idUsuario);
            System.out.println(abrir);
            return abrir;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String editarCaja(String idUsuario, String idCaja) throws TException {
        try {
            System.out.println(idUsuario);
            String abrir=taquillaController.editarCaja(idCaja,idUsuario);
            System.out.println(abrir);
            return abrir;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String updateEstadoCaja(String id, String estado, String usuario_modificacion) throws TException {
        try {
            Caja caja =new Caja();
            caja.setEstado(estado);
            caja.setUsuarioCreacion(usuario_modificacion);
            caja.setIdCaja(Integer.parseInt(id.trim()));
            return String.valueOf(taquillaController.updateEstadoCaja(caja));
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertReserva(String idFuncion, String idEvento, String idUsuario, String asientos, String tipo, String usuarioCreacion) throws TException {
        try {
            Reserva reserva=new Reserva();
            reserva.setIdFuncion(idFuncion);
            reserva.setIdEvento(idEvento);
            reserva.setIdUsuario(idUsuario);
            reserva.setAsientos(asientos);
            reserva.setTipo(tipo);
            reserva.setUsuarioCreacion(usuarioCreacion);
             String pregunt = "";
            if (tipo.equals("P")) {
                pregunt = taquillaController.insertReservaP(reserva);
            }else{
                pregunt = taquillaController.insertReservaC(reserva);    
            }
            System.out.println(pregunt);
            return pregunt;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllReserva(String idUsuario) throws TException {
        try {
            
            List<Reserva> caja = taquillaController.getAllReserva(idUsuario);
            String strcaja = "";
            for (Reserva cajaT : caja) {
                strcaja+=cajaT.toString();
            }
            System.out.println(strcaja);
            return strcaja;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        } 
    }

    @Override
    public String deleteReserva(String reserva, String idUsuario) throws TException {
        try {
            if (reserva.equals("T")) {
                return String.valueOf(taquillaController.deleteAllReserva(idUsuario));
            }else{
                return String.valueOf(taquillaController.deleteReserva(Integer.parseInt(reserva.trim()),idUsuario));
            }
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String actualizarReserva(String idUsuario) throws TException {
        try {
            return taquillaController.actualizarReserva(idUsuario.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getCompraReserva(String idUsuario) throws TException {
       try {
            return taquillaController.getCompraReserva(idUsuario.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String updateCompraReserva(String idUsuario, String sub_total, String donacion, String dolares_canjeados, String descuento, String total, String usuario_modificacion) throws TException {
        try {
            return taquillaController.updateCompraReserva( idUsuario.trim(),  sub_total.trim(),  donacion.trim(),  dolares_canjeados.trim(),  descuento.trim(),  total.trim(),  usuario_modificacion.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertEsperaPago(String idUsuario, String tipo, String id_tarjeta, String id_banco, String lote, String monto, String usuario_modificacion) throws TException {
         try {
            return taquillaController.insertEsperaPago( idUsuario.trim(),  tipo.trim(),  id_tarjeta.trim(),  id_banco.trim(),  lote.trim(),  monto.trim(),  usuario_modificacion.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String getAllEsperaPago(String idUsuario) throws TException {
        try {
            return taquillaController.getAllEsperaPago(idUsuario.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }
    @Override
    public String getAllPuntos(String idUsuarioCliente) throws TException {
        try {
            String resultado=taquillaController.getAllPuntos(idUsuarioCliente.trim());
            System.out.println(resultado);
            return resultado;
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String deleteEsperaPago(String idUsuario, String idEsperaPago) throws TException {
       try {
            return taquillaController.deleteEsperaPago(idUsuario.trim(),idEsperaPago.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

    @Override
    public String insertDonacion(String idUsuario, String idUsuarioCliente, String donacion, String puntos_canjeados) throws TException {
       try {
            return taquillaController.insertDonacion(idUsuario.trim(),idUsuarioCliente.trim(),donacion,puntos_canjeados.trim());
        } catch (SQLException ex) {
            Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null, ex);
            return "null";
        }
    }

   

}

   


    


 

    

    

 

   

    

  


