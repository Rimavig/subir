/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import teatro.Entity.*;

/**
 *
 * @author Richard Vivanco - Alex Mendoza
 */

public class BaseDatos {
   
   private Connection cnx = null;
   String base="jdbc:mysql://104.154.225.61/teatro";
   String usuario= "qrticket-admin";
   String clave="qrt1ck3t@dm1n";
   
   public BaseDatos()  {      
       try { 
            Class.forName("com.mysql.cj.jdbc.Driver");
           //Conexion con la base de datos, usuario y clave
            cnx = DriverManager.getConnection(base, usuario, clave);
            System.out.println("Se establecio con exito la conexion a servidor");
       } catch (Exception ex) {
           Logger.getLogger(BaseDatos.class.getName()).log(Level.SEVERE, null, ex);
       }     
   }
   
    public Boolean seteo() throws SQLException {
        try{
            if (cnx.isClosed()) {
                 System.out.println("2");
               Class.forName("com.mysql.cj.jdbc.Driver");
               //Conexion con la base de datos, usuario y clave
                cnx = DriverManager.getConnection(base, usuario, clave);
                Thread.sleep(1000);
                 System.out.println("22222");
      
                 return true;
            }else{
                System.out.println("4");
                if (cnx==null) {
                   Class.forName("com.mysql.cj.jdbc.Driver");
                   //Conexion con la base de datos, usuario y clave
                    System.out.println("1");
                    cnx = DriverManager.getConnection(base, usuario, clave);      
                    Thread.sleep(1000);
                    System.out.println("22222");
                }
                return true;
                
            }
        }catch (Exception ex) {
             System.out.println("3");
             cnx.close();
            
               return false;                             
        }
    }
    
    public Usuario login(String username, String password) throws Exception{
        if (seteo()) {
            Usuario usuario=null;
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario WHERE usuario='"+username+"' AND contrasena='"+password+"'")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuario = new Usuario();
                    usuario.setIdUsuario(rs.getInt("id_usuario"));
                    usuario.setNombres(rs.getString("nombres"));
                    usuario.setUsuario(rs.getString("usuario"));
                    usuario.setCedula(rs.getString("cedula"));
                    usuario.setSexo(rs.getString("sexo"));
                    usuario.setCorreo(rs.getString("correo"));
                    usuario.setCelular(rs.getString("celular"));
                    usuario.setIdPerfil(rs.getInt("id_perfil"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuario;    
        }else{
          return null;  
        }
    }
    
    //METODOS CRUD ENTIDADES
    public Asiento getAsiento (Integer idAsiento) throws SQLException{
        if (seteo()) {
            Asiento asiento = new Asiento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_asiento WHERE id_asiento ="+idAsiento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                   asiento.setIdAsiento(rs.getInt("id_asiento"));
                    asiento.setNumero(rs.getInt("numero"));
                    asiento.setFila(rs.getString("fila"));
                    asiento.setLateral(rs.getString("lateral"));
                    asiento.setEstado(rs.getString("estado")); 
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return asiento;
        }else{
          return null;  
        }
    }
    
    public List<Asiento> getAllAsiento () throws SQLException{
        if (seteo()) {
            List<Asiento> asientos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_asiento")) {
                ResultSet rs = stmt.executeQuery();
                Asiento asiento = new Asiento();
                while (rs.next()){
                    asiento = new Asiento();
                    asiento.setIdAsiento(rs.getInt("id_asiento"));
                    asiento.setNumero(rs.getInt("numero"));
                    asiento.setFila(rs.getString("fila"));
                    asiento.setLateral(rs.getString("lateral"));
                    asiento.setEstado(rs.getString("estado"));
                    asientos.add(asiento);
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return asientos;
        }else{
          return null;  
        }

    }
    public boolean updateEstadoAsiento(Asiento asiento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_asiento set estado='"+ asiento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+asiento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_asiento ="+asiento.getIdAsiento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateAsiento(Asiento asiento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_asiento set numero="+ asiento.getNumero().toString()+
                                                                " , fila='"+asiento.getFila()+"' "+
                                                                " , lateral='"+asiento.getLateral()+"' "+
                                                                 " , usuario_modificacion='"+asiento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_asiento ="+asiento.getIdAsiento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertAsiento(Asiento asiento) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_asiento VALUES ("+asiento.getNumero().toString()+
                                                                " ,'"+asiento.getFila()+"'"+
                                                                " ,'"+asiento.getLateral() + "')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
       
    }
    
    public Banco getBanco (Integer idBanco) throws SQLException{
        if (seteo()) {
            Banco banco = new Banco();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco WHERE id_banco ="+idBanco.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    banco.setIdBanco(rs.getInt("id_banco"));
                    banco.setNombre(rs.getString("nombre"));
                    banco.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return banco;
        }else{
          return null;  
        }
        
    }
    
    public List<Banco> getAllBanco () throws SQLException{
        if (seteo()) {
            List<Banco> bancos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco")) {
                ResultSet rs = stmt.executeQuery();
                Banco banco = new Banco();
                while (rs.next()){
                    banco = new Banco();
                    banco.setIdBanco(rs.getInt("id_banco"));
                    banco.setNombre(rs.getString("nombre"));
                    banco.setEstado(rs.getString("estado"));
                    bancos.add(banco);
                }    
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return bancos;
        }else{
          return null;  
        }
        
    }
     public boolean updateEstadoBanco(Banco banco) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_banco set estado='"+ banco.getEstado()+"' "+
                                                                " , usuario_modificacion='"+banco.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_banco ="+banco.getIdBanco().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateBanco(Banco banco) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_banco set nombre='"+ banco.getNombre()+"' "+
                                                                " , usuario_modificacion='"+banco.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_banco ="+banco.getIdBanco().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertBanco(Banco banco) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_banco VALUES ('"+banco.getNombre()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public BancoTarjeta getBancoTarjeta (Integer idBancoTarjeta) throws SQLException{
        if (seteo()) {
            BancoTarjeta bancoTarjeta = new BancoTarjeta();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco_tarjeta WHERE id_banco_tarjeta ="+idBancoTarjeta.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    bancoTarjeta.setIdBancoTarjeta(rs.getInt("id_banco_tarjeta"));
                    bancoTarjeta.setIdBanco(rs.getInt("id_banco"));
                    bancoTarjeta.setIdTarjeta(rs.getInt("id_tarjeta"));
                    bancoTarjeta.setDescuento(rs.getFloat("descuento"));
                    bancoTarjeta.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }     
            return bancoTarjeta;
        }else{
          return null;  
        }
        
    }
    
    public List<BancoTarjeta> getAllBancoTarjeta () throws SQLException{
        if (seteo()) {
            List<BancoTarjeta> bancoTarjetas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco_tarjeta")) {
                ResultSet rs = stmt.executeQuery();
                BancoTarjeta bancoTarjeta = new BancoTarjeta();
                while (rs.next()){
                    bancoTarjeta = new BancoTarjeta();
                    bancoTarjeta.setIdBanco(rs.getInt("id_banco_tarjeta"));
                    bancoTarjeta.setIdBanco(rs.getInt("id_banco"));
                    bancoTarjeta.setIdTarjeta(rs.getInt("id_tarjeta"));
                    bancoTarjeta.setDescuento(rs.getFloat("descuento"));
                    bancoTarjeta.setEstado(rs.getString("estado"));
                    bancoTarjetas.add(bancoTarjeta);
                }     
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return bancoTarjetas;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoBancoTarjeta(BancoTarjeta bancoTarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_banco_tarjeta set estado='"+ bancoTarjeta.getEstado()+"' "+
                                                                " , usuario_modificacion='"+bancoTarjeta.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_banco_tarjeta ="+bancoTarjeta.getIdBancoTarjeta().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateBancoTarjeta(BancoTarjeta bancoTarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_banco_tarjeta set descuento="+ bancoTarjeta.getDescuento().toString()+
                                                                " , usuario_modificacion='"+bancoTarjeta.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_banco_tarjeta ="+bancoTarjeta.getIdBancoTarjeta().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertBancoTarjeta(BancoTarjeta bancoTarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_banco_tarjeta VALUES ("+bancoTarjeta.getIdTarjeta().toString()+
                                                                ","+bancoTarjeta.getIdBanco().toString()+
                                                                ","+bancoTarjeta.getDescuento().toString()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public Categoria getCategoria (Integer idCategoria) throws SQLException{
        if (seteo()) {
            Categoria categoria = new Categoria();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_categoria WHERE id_categoria ="+idCategoria.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    categoria.setIdCategoria(rs.getInt("id_categoria"));
                    categoria.setNombre(rs.getString("nombre"));
                    categoria.setDescripcion(rs.getString("descripcion"));
                    categoria.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return categoria;
        }else{
          return null;  
        }
        
    }
    
    public List<Categoria> getAllCategoria () throws SQLException{
        if (seteo()) {
            List<Categoria> categorias = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_categoria")) {
                ResultSet rs = stmt.executeQuery();
                Categoria categoria = new Categoria();
                while (rs.next()){
                    categoria = new Categoria();
                    categoria.setIdCategoria(rs.getInt("id_categoria"));
                    categoria.setNombre(rs.getString("nombre"));
                    categoria.setDescripcion(rs.getString("descripcion"));
                    categoria.setEstado(rs.getString("estado"));
                    categorias.add(categoria);
                } 
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return categorias; 
        }else{
          return null;  
        }
       
    }
    public boolean updateEstadoCategoria(Categoria categoria) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_categoria set estado='"+ categoria.getEstado()+"' "+
                                                                " , usuario_modificacion='"+categoria.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_categoria ="+categoria.getIdCategoria().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateCategoria(Categoria categoria) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_categoria set nombre='"+ categoria.getNombre()+"' "+
                                                                " , descripcion='"+categoria.getDescripcion()+"' "+
                                                                 " , usuario_modificacion='"+categoria.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_categoria ="+categoria.getIdCategoria().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertCategoria(Categoria categoria) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_categoria VALUES (null,'"+categoria.getNombre()+
                                                                "','"+categoria.getDescripcion()+
                                                                "','"+categoria.getEstado()+
                                                                "', sysdate()"+
                                                                ",'"+categoria.getUsuarioCreacion()+"'"+
                                                                ", null"+
                                                                ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Clasificacion getClasificacion (Integer idClasificacion) throws SQLException{
        if (seteo()) {
            Clasificacion clasificacion = new Clasificacion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_clasificacion WHERE id_clasificacion ="+idClasificacion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    clasificacion.setIdClasificacion(rs.getInt("id_clasificacion"));
                    clasificacion.setNombre(rs.getString("nombre"));
                    clasificacion.setDescripcion(rs.getString("descripcion"));
                    clasificacion.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return clasificacion;
        }else{
          return null;  
        }
        
    }
    
    public List<Clasificacion> getAllClasificacion () throws SQLException{
        if (seteo()) {
             List<Clasificacion> clasificaciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_clasificacion")) {
                ResultSet rs = stmt.executeQuery();
                Clasificacion clasificacion = new Clasificacion();
                while (rs.next()){
                    clasificacion = new Clasificacion();
                    clasificacion.setIdClasificacion(rs.getInt("id_clasificacion"));
                    clasificacion.setNombre(rs.getString("nombre"));
                    clasificacion.setDescripcion(rs.getString("descripcion"));
                    clasificacion.setEstado(rs.getString("estado"));
                    clasificaciones.add(clasificacion);
                }   
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return clasificaciones;
        }else{
          return null;  
        }
       
    }
    public boolean updateEstadoClasificacion(Clasificacion clasificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_clasificacion set estado='"+ clasificacion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+clasificacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_clasificacion ="+clasificacion.getIdClasificacion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateClasificacion(Clasificacion clasificacion) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_clasificacion set nombre='"+ clasificacion.getNombre()+"' "+
                                                                " , descripcion='"+clasificacion.getDescripcion()+"' "+
                                                                " , usuario_modificacion='"+clasificacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_clasificacion ="+clasificacion.getIdClasificacion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertClasificacion(Clasificacion clasificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_clasificacion VALUES (null,'"+clasificacion.getNombre()+
                                                           "','"+clasificacion.getDescripcion()+
                                                           "','"+clasificacion.getEstado()+
                                                           "', sysdate()"+
                                                           ",'"+clasificacion.getUsuarioCreacion()+"'"+
                                                           ", null"+
                                                           ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
        
    }
    
    public CodigoPromocional getCodigoPromocional (Integer idCodigoPromocional) throws SQLException{
        if (seteo()) {
            CodigoPromocional codigoPromocional = new CodigoPromocional();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_codigo_promocional WHERE id_codigo_promocional ="+idCodigoPromocional.toString())) {
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    codigoPromocional.setIdCodigoPromocional(rs.getInt("id_codigo_promocional"));
                    codigoPromocional.setNombre(rs.getString("nombre"));
                    codigoPromocional.setCodigo(rs.getString("codigo"));
                    codigoPromocional.setDescuento(rs.getFloat("descuento"));
                    codigoPromocional.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return codigoPromocional;
        }else{
          return null;  
        }
        
    }
    
    public List<CodigoPromocional> getAllCodigoPromocional () throws SQLException{
        if (seteo()) {
             List<CodigoPromocional> codigosPromocionales = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_codigo_promocional")) {
                ResultSet rs = stmt.executeQuery();
                CodigoPromocional codigoPromocional = new CodigoPromocional();
                while (rs.next()){
                    codigoPromocional = new CodigoPromocional();
                      codigoPromocional.setIdCodigoPromocional(rs.getInt("id_codigo_promocional"));
                      codigoPromocional.setNombre(rs.getString("nombre"));
                      codigoPromocional.setCodigo(rs.getString("codigo"));
                      codigoPromocional.setDescuento(rs.getFloat("descuento"));
                      codigoPromocional.setEstado(rs.getString("estado"));
                      codigosPromocionales.add(codigoPromocional);
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return codigosPromocionales;
        }else{
          return null;  
        }
       
    }
    public boolean updateEstadoCodigoPromocional(CodigoPromocional codigoPromocional) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_codigo_promocional set estado='"+ codigoPromocional.getEstado()+"' "+
                                                                " , usuario_modificacion='"+codigoPromocional.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+codigoPromocional.getIdCodigoPromocional().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    
    public boolean updateCodigoPromocional(CodigoPromocional codigoPromocional) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_codigo_promocional set nombre='"+ codigoPromocional.getNombre()+"' "+
                                                                " , codigo='"+codigoPromocional.getCodigo()+"' "+
                                                                " , descuento='"+codigoPromocional.getDescuento().toString()+"' "+
                                                               " , usuario_modificacion='"+codigoPromocional.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+codigoPromocional.getIdCodigoPromocional().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertCodigoPromocional(CodigoPromocional codigoPromocional) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_clasificacion VALUES ('"+codigoPromocional.getNombre()+"'"+
                                                                ",'"+codigoPromocional.getCodigo()+"'"+
                                                                ","+codigoPromocional.getDescuento().toString()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public Distribucion getDistribucion(Integer idDistribucion) throws SQLException{
        if (seteo()) {
            Distribucion distribucion = new Distribucion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_distribucion WHERE id_distribucion ="+idDistribucion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    distribucion.setIdDistribucion(rs.getInt("id_distribucion"));
                    distribucion.setIdEvento(rs.getInt("id_evento"));
                    distribucion.setIdPlatea(rs.getInt("id_platea"));
                    distribucion.setIdAsiento(rs.getInt("id_asiento"));
                    distribucion.setTipo(rs.getString("tipo"));
                    distribucion.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return distribucion;
        }else{
          return null;  
        }
        
    }
    
    public List<Distribucion> getAllDistribucion () throws SQLException{
        if (seteo()) {
            List<Distribucion> distribuciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_distribucion")) {
                ResultSet rs = stmt.executeQuery();
                Distribucion distribucion = new Distribucion();

                while (rs.next()){
                    distribucion = new Distribucion();
                    distribucion.setIdDistribucion(rs.getInt("id_distribucion"));
                    distribucion.setIdEvento(rs.getInt("id_evento"));
                    distribucion.setIdPlatea(rs.getInt("id_platea"));
                    distribucion.setIdAsiento(rs.getInt("id_asiento"));
                    distribucion.setTipo(rs.getString("tipo"));
                    distribucion.setEstado(rs.getString("estado"));
                    distribuciones.add(distribucion);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return distribuciones;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoDistribucion(Distribucion distribucion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_distribucion set estado='"+ distribucion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+distribucion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+distribucion.getIdDistribucion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateDistribucion(Distribucion distribucion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_distribucion set tipo='"+ distribucion.getTipo()+"' "+
                                                                " , usuario_modificacion='"+distribucion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+distribucion.getIdDistribucion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertDistribucion(Distribucion distribucion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_distribucion VALUES ("+distribucion.getIdEvento().toString()+
                                                                ","+distribucion.getIdPlatea().toString()+
                                                                ","+distribucion.getIdAsiento().toString()+
                                                                ",'"+distribucion.getTipo()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Evento getEvento(Integer idEvento) throws SQLException{
        if (seteo()) {
             Evento evento = new Evento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_evento WHERE id_evento ="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setNombre(rs.getString("nombre"));
                    evento.setDuracion(rs.getFloat("duracion"));
                    evento.setFechaInicial(rs.getDate("fecha_inicial"));
                    evento.setFechaFinal(rs.getDate("fecha_final"));
                    evento.setIdProductora(rs.getInt("id_productora"));
                    evento.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                    evento.setIdTipoEvento(rs.getInt("id_tipo_evento"));
                    evento.setIdTipoEspectaculo(rs.getInt("id_tipo_espectaculo"));
                    evento.setIdCategoria(rs.getInt("id_categoria"));
                    evento.setIdClasificacion(rs.getInt("id_clasificacion"));
                    evento.setIdProcedencia(rs.getInt("id_procedencia"));
                    evento.setIdTipoPrecio(rs.getInt("id_tipo_precio"));
                    evento.setIdFuncion(rs.getInt("id_funcion"));
                    evento.setIdPrecio(rs.getInt("id_precio"));
                    evento.setEventoDestacado(rs.getString("evento_destacado"));
                    evento.setEventoOrden(rs.getString("evento_orden"));
                    evento.setAforo(rs.getInt("aforo"));
                    evento.setSinopsis(rs.getString("sinopsis"));
                    evento.setProductora(rs.getString("productora"));
                    evento.setElenco(rs.getString("elenco"));
                    evento.setRutaImagen(rs.getString("ruta_imagen"));
                    evento.setRutaVideo(rs.getString("ruta_video"));             
                    evento.setTipoEvento(rs.getString("tipo_evento"));
                    evento.setRutaFormulario(rs.getString("ruta_formulario"));
                    evento.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return evento;
        }else{
          return null;  
        }
       
    }
    
    public List<Evento> getAllEvento () throws SQLException{
        if (seteo()) {
            List<Evento> eventos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_evento")) {
                ResultSet rs = stmt.executeQuery();
                Evento evento = new Evento();

                while (rs.next()){
                   evento = new Evento();
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setNombre(rs.getString("nombre"));
                    evento.setDuracion(rs.getFloat("duracion"));
                    evento.setFechaInicial(rs.getDate("fecha_inicial"));
                    evento.setFechaFinal(rs.getDate("fecha_final"));
                    evento.setIdProductora(rs.getInt("id_productora"));
                    evento.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                    evento.setIdTipoEvento(rs.getInt("id_tipo_evento"));
                    evento.setIdTipoEspectaculo(rs.getInt("id_tipo_espectaculo"));
                    evento.setIdCategoria(rs.getInt("id_categoria"));
                    evento.setIdClasificacion(rs.getInt("id_clasificacion"));
                    evento.setIdProcedencia(rs.getInt("id_procedencia"));
                    evento.setIdTipoPrecio(rs.getInt("id_tipo_precio"));
                    evento.setIdFuncion(rs.getInt("id_funcion"));
                    evento.setIdPrecio(rs.getInt("id_precio"));
                    evento.setEventoDestacado(rs.getString("evento_destacado"));
                    evento.setEventoOrden(rs.getString("evento_orden"));
                    evento.setAforo(rs.getInt("aforo"));
                    evento.setSinopsis(rs.getString("sinopsis"));
                    evento.setProductora(rs.getString("productora"));
                    evento.setElenco(rs.getString("elenco"));
                    evento.setRutaImagen(rs.getString("ruta_imagen"));
                    evento.setRutaVideo(rs.getString("ruta_video"));
                    evento.setTipoEvento(rs.getString("tipo_evento"));
                    evento.setRutaFormulario(rs.getString("ruta_formulario"));
                    evento.setEstado(rs.getString("estado"));
                    eventos.add(evento); 
                } 
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return eventos;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoEvento(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set estado='"+ evento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_evento ="+evento.getIdEvento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateEvento(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set nombre='"+ evento.getNombre()+"' "+
                                                                " , duracion='"+evento.getDuracion().toString()+"' "+
                                                                " , fecha_inicial='"+evento.getFechaInicial().toString()+"' "+
                                                                " , fecha_final='"+evento.getFechaFinal().toString()+"' "+
                                                                " , id_productora="+evento.getIdProductora().toString()+
                                                                " , id_sala_mapa="+evento.getIdSalaMapa().toString()+
                                                                " , id_tipo_evento="+evento.getIdTipoEvento().toString()+
                                                                " , id_tipo_espectaculo="+evento.getIdTipoEspectaculo().toString()+
                                                                " , id_categoria="+evento.getIdCategoria().toString()+
                                                                " , id_clasificacion="+evento.getIdClasificacion().toString()+
                                                                " , id_procedencia="+evento.getIdProcedencia().toString()+
                                                                " , id_tipo_precio="+evento.getIdTipoPrecio().toString()+
                                                                " , id_funcion="+evento.getIdFuncion().toString()+
                                                                " , id_precio="+evento.getIdPrecio().toString()+
                                                                " , evento_destacado='"+evento.getEventoDestacado()+"' "+
                                                                " , evento_orden='"+evento.getEventoOrden()+"' "+
                                                                " , aforo='"+evento.getAforo().toString()+"' "+
                                                                " , sinopsis='"+evento.getSinopsis()+"' "+
                                                                " , productora='"+evento.getProductora()+"' "+
                                                                " , elenco='"+evento.getElenco()+"' "+
                                                                " , ruta_imagen='"+evento.getRutaImagen()+"' "+
                                                                " , ruta_video='"+evento.getRutaVideo()+"' "+
                                                                " , tipo_evento='"+evento.getTipoEvento()+"' "+
                                                                " , ruta_formulario='"+evento.getRutaFormulario()+"' "+
                                                                " , estado='"+evento.getEstado()+"'"+
                                                                " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_evento ="+evento.getIdEvento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertEvento(Evento evento) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_evento VALUES (null"+
                                                                ",'"+evento.getNombre()+"'"+
                                                                ","+evento.getDuracion().toString()+
                                                                ",'"+evento.getFechaInicial()+"'"+
                                                                ",'"+evento.getFechaFinal()+"'"+
                                                                ","+evento.getIdProductora().toString()+
                                                                ","+evento.getIdSalaMapa().toString()+
                                                                ","+evento.getIdTipoEvento().toString()+
                                                                ","+evento.getIdTipoEspectaculo().toString()+
                                                                ","+evento.getIdCategoria().toString()+
                                                                ","+evento.getIdClasificacion().toString()+
                                                                ","+evento.getIdProcedencia().toString()+
                                                                ","+evento.getIdTipoPrecio().toString()+
                                                                ","+evento.getIdFuncion().toString()+
                                                                ","+evento.getIdPrecio().toString()+
                                                                ",'"+evento.getEventoDestacado()+"'"+
                                                                ",'"+evento.getEventoOrden()+"'"+
                                                                ","+evento.getAforo().toString()+
                                                                ",'"+evento.getSinopsis()+"'"+
                                                                ",'"+evento.getProductora()+"'"+
                                                                ",'"+evento.getElenco()+"'"+
                                                                ",'"+evento.getRutaImagen()+"'"+
                                                                ",'"+evento.getRutaVideo()+"'"+
                                                                ",'"+evento.getTipoEvento()+"'"+
                                                                ",'"+evento.getRutaFormulario()+"'"+
                                                                ",'"+evento.getEstado()+"' "+
                                                                ", sysdate()"+
                                                                ",'"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                ", null"+
                                                                ", null)")) {
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public Funcion getFuncion(Integer idFuncion) throws SQLException{
        if (seteo()) {
            Funcion funcion = new Funcion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_funcion WHERE id_funcion ="+idFuncion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    funcion.setIdFuncion(rs.getInt("id_funcion"));
                    funcion.setFecha(rs.getDate("fecha"));
                    funcion.setHora(rs.getTime("hora"));
                    funcion.setPreventa(rs.getNString("preventa"));
                    funcion.setEstreno(rs.getString("estreno"));
                    funcion.setEstado(rs.getNString("estado"));
                }
                System.out.println(funcion.toString());
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return funcion;
        }else{
          return null;  
        }
        
    }
    
    public List<Funcion> getAllFuncion () throws SQLException{
        if (seteo()) {
             List<Funcion> funciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_funcion")) {
                ResultSet rs = stmt.executeQuery();
                Funcion funcion = new Funcion();

                while (rs.next()){
                    funcion = new Funcion();
                    funcion.setIdFuncion(rs.getInt("id_funcion"));
                    funcion.setFecha(rs.getDate("fecha"));
                    funcion.setHora(rs.getTime("hora"));
                    funcion.setPreventa(rs.getNString("preventa"));
                    funcion.setEstreno(rs.getString("estreno"));
                    funcion.setEstado(rs.getNString("estado"));
                    funciones.add(funcion);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return funciones;
        }else{
          return null;  
        }
       
    }
     public boolean updateEstadoFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_funcion set estado='"+ funcion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+funcion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_funcion ="+funcion.getIdFuncion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_funcion set fecha='"+ funcion.getFecha().toString()+"' "+
                                                                " , hora='"+funcion.getHora().toString()+"' "+
                                                                " , preventa='"+funcion.getPreventa().toString()+"' "+
                                                                " , estreno='"+funcion.getEstreno().toString()+"' "+
                                                                " , usuario_modificacion='"+funcion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_funcion ="+funcion.getIdFuncion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_funcion VALUES ('"+funcion.getFecha()+"'"+
                                                                ",'"+funcion.getHora()+"'"+
                                                                ",'"+funcion.getPreventa()+"'"+
                                                                ",'"+funcion.getEstreno()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Mapa getMapa(Integer idMapa) throws SQLException{
        if (seteo()) {
            Mapa mapa = new Mapa();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_mapa WHERE id_mapa ="+idMapa.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    mapa.setIdMapa(rs.getInt("id_mapa"));
                    mapa.setNombre(rs.getString("nombre"));
                    mapa.setDistribucion(rs.getString("distribucion"));
                    mapa.setRutaImagen(rs.getString("ruta_imagen"));
                    mapa.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return mapa;
        }else{
          return null;  
        }
       
    }
    
    public List<Mapa> getAllMapa() throws SQLException{
        if (seteo()) {
            List<Mapa> mapas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_mapa")) {
                ResultSet rs = stmt.executeQuery();
                Mapa mapa = new Mapa();

                while (rs.next()){
                    mapa = new Mapa();
                    mapa.setIdMapa(rs.getInt("id_mapa"));
                    mapa.setNombre(rs.getString("nombre"));
                    mapa.setDistribucion(rs.getString("distribucion"));
                    mapa.setRutaImagen(rs.getString("ruta_imagen"));
                    mapa.setEstado(rs.getString("estado"));
                    mapas.add(mapa);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return mapas;
        }else{
          return null;  
        }
        
    }
     public boolean updateEstadoMapa(Mapa mapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_mapa set estado='"+ mapa.getEstado()+"' "+
                                                                " , usuario_modificacion='"+mapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_mapa ="+mapa.getIdMapa().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateMapa(Mapa mapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_mapa set nombre='"+ mapa.getNombre().toString()+"' "+
                                                                " , distribucion='"+mapa.getDistribucion().toString()+"' "+
                                                                " , ruta_imagen='"+mapa.getRutaImagen().toString()+"' "+
                                                               " , usuario_modificacion='"+mapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_mapa ="+mapa.getIdMapa().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertMapa(Mapa mapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_mapa VALUES ('"+mapa.getNombre()+"'"+
                                                                ",'"+mapa.getDistribucion()+"'"+
                                                                ",'"+mapa.getRutaImagen()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;     
        }else{
          return false;  
        }
       
    }
    
    public Perfil getPerfil(Integer idPerfil) throws SQLException{
        if (seteo()) {
           Perfil perfil = new Perfil();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil WHERE id_perfil ="+idPerfil.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    perfil.setIdPerfil(rs.getInt("id_perfil"));
                    perfil.setDescripcion(rs.getString("descripcion"));
                    perfil.setTipo(rs.getString("tipo"));
                    perfil.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return perfil; 
        }else{
          return null;  
        }
        
    }
    
    public List<Perfil> getAllPerfil() throws SQLException{
        if (seteo()) {
            List<Perfil> perfiles = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil")) {
                ResultSet rs = stmt.executeQuery();
                Perfil perfil = new Perfil();

                while (rs.next()){
                    perfil = new Perfil();
                    perfil.setIdPerfil(rs.getInt("id_perfil"));
                    perfil.setDescripcion(rs.getString("descripcion"));
                    perfil.setTipo(rs.getString("tipo"));
                    perfil.setEstado(rs.getString("estado"));
                    perfiles.add(perfil);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return perfiles;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoPerfil(Perfil perfil) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_perfil set estado='"+ perfil.getEstado()+"' "+
                                                                " , usuario_modificacion='"+perfil.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil ="+perfil.getIdPerfil().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePerfil(Perfil perfil) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_perfil set descricpion='"+ perfil.getDescripcion().toString()+"' "+
                                                                " , tipo='"+perfil.getTipo().toString()+"' "+
                                                                 " , usuario_modificacion='"+perfil.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil ="+perfil.getIdPerfil().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertPerfil(Perfil perfil) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_perfil VALUES ('"+perfil.getDescripcion()+"'"+
                                                                ",'"+perfil.getTipo()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public PerfilRol getPerfilRol(Integer idPerfilRol) throws SQLException{
        if (seteo()) {
             PerfilRol perfilRol = new PerfilRol();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil_rol WHERE id_perfil_rol ="+idPerfilRol.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    perfilRol.setIdPerfilRol(rs.getInt("id_perfil_rol"));
                    perfilRol.setIdPerfil(rs.getInt("id_perfil"));
                    perfilRol.setIdRol(rs.getInt("id_rol"));
                    perfilRol.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return perfilRol;
        }else{
          return null;  
        }
       
    }
    
    public List<PerfilRol> getAllPerfilRol() throws SQLException{
        if (seteo()) {
            List<PerfilRol> perfilesRoles = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil_rol")) {
                ResultSet rs = stmt.executeQuery();
                PerfilRol perfilRol = new PerfilRol();

                while (rs.next()){
                    perfilRol = new PerfilRol();
                    perfilRol.setIdPerfilRol(rs.getInt("id_perfil_rol"));
                    perfilRol.setIdPerfil(rs.getInt("id_perfil"));
                    perfilRol.setIdRol(rs.getInt("id_rol"));
                    perfilRol.setEstado(rs.getString("estado"));
                    perfilesRoles.add(perfilRol);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return perfilesRoles;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoPerfilRol(PerfilRol perfilRol) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_perfil_rol set estado='"+ perfilRol.getEstado()+"' "+
                                                                " , usuario_modificacion='"+perfilRol.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil_rol ="+perfilRol.getIdPerfilRol().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePerfilRol(PerfilRol perfilRol) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_perfil_rol set id_perfil='"+ perfilRol.getIdPerfil().toString()+"' "+
                                                                " , id_rol='"+perfilRol.getIdRol().toString()+"' "+
                                                                " , usuario_modificacion='"+perfilRol.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil_rol ="+perfilRol.getIdPerfilRol().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public boolean insertPerfilRol(PerfilRol perfilRol) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_perfil_rol VALUES ("+perfilRol.getIdPerfil()+
                                                                ","+perfilRol.getIdRol()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public Platea getPlatea(Integer idPlatea) throws SQLException{
        if (seteo()) {
            Platea platea = new Platea();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea WHERE id_platea ="+idPlatea.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    platea.setIdPlatea(rs.getInt("id_platea"));
                    platea.setNombre(rs.getString("nombre"));
                    platea.setCosto(rs.getFloat("costo"));
                    platea.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return platea; 
        }else{
          return null;  
        }
        
    }
    
    public List<Platea> getAllPlatea() throws SQLException{
        if (seteo()) {
            List<Platea> plateas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea")) {
                ResultSet rs = stmt.executeQuery();
                Platea platea = new Platea();

                while (rs.next()){
                    platea = new Platea();
                    platea.setIdPlatea(rs.getInt("id_platea"));
                    platea.setNombre(rs.getString("nombre"));
                    platea.setCosto(rs.getFloat("costo"));
                    platea.setEstado(rs.getString("estado"));
                    plateas.add(platea);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return plateas;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoPlatea(Platea platea) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_platea set estado='"+ platea.getEstado()+"' "+
                                                                " , usuario_modificacion='"+platea.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_platea ="+platea.getIdPlatea().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePlatea(Platea platea) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_platea set nombre='"+ platea.getNombre().toString()+"' "+
                                                                " , costo='"+platea.getCosto().toString()+"' "+
                                                                " , usuario_modificacion='"+platea.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_platea ="+platea.getIdPlatea().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertPlatea(Platea platea) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_platea VALUES ('"+platea.getNombre()+"'"+
                                                                ","+platea.getCosto().toString()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;  
        }else{
          return false;  
        }
       
    }
    
    public Precio getPrecio(Integer idPrecio) throws SQLException{
        if (seteo()) {
            Precio precio = new Precio();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_precio WHERE id_precio ="+idPrecio.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    precio.setIdPrecio(rs.getInt("id_precio"));
                    precio.setNombre(rs.getString("nombre"));
                    precio.setPrecio(rs.getFloat("precio"));
                    precio.setPreestreno(rs.getString("preestreno"));
                    precio.setEstreno(rs.getString("estreno"));
                    precio.setAforoInicial(rs.getInt("aforo_inicial"));
                    precio.setVentaPlatea(rs.getInt("venta_platea"));
                    precio.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return precio;
        }else{
          return null;  
        }
        
    }
    
    public List<Precio> getAllPrecio() throws SQLException{
        if (seteo()) {
            List<Precio> precios = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_precio")) {
                ResultSet rs = stmt.executeQuery();
                Precio precio = new Precio();

                while (rs.next()){
                    precio = new Precio();
                    precio.setIdPrecio(rs.getInt("id_precio"));
                    precio.setNombre(rs.getString("nombre"));
                    precio.setPrecio(rs.getFloat("precio"));
                    precio.setPreestreno(rs.getString("preestreno"));
                    precio.setEstreno(rs.getString("estreno"));
                    precio.setAforoInicial(rs.getInt("aforo_inicial"));
                    precio.setVentaPlatea(rs.getInt("venta_platea"));
                    precio.setEstado(rs.getString("estado"));
                    precios.add(precio);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return precios;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoPrecio(Precio precio) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_precio_rol set estado='"+ precio.getEstado()+"' "+
                                                                " , usuario_modificacion='"+precio.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_precio_rol ="+precio.getIdPrecio().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePrecio(Precio precio) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_precio set nombre='"+ precio.getNombre().toString()+"' "+
                                                                " , precio='"+precio.getPrecio().toString()+"' "+
                                                                " , presestreno='"+precio.getPreestreno().toString()+"' "+
                                                                " , estreno='"+precio.getEstreno().toString()+"' "+
                                                                " , aforo_inicial='"+precio.getAforoInicial().toString()+"' "+
                                                                " , venta_platea='"+precio.getVentaPlatea().toString()+"' "+
                                                                " , usuario_modificacion='"+precio.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_precio_rol ="+precio.getIdPrecio().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public boolean insertPrecio(Precio precio) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_precio VALUES ('"+precio.getNombre()+"'"+
                                                                ","+precio.getPrecio().toString()+
                                                                ",'"+precio.getPreestreno()+"'"+
                                                                ",'"+precio.getEstreno()+"'"+
                                                                ","+precio.getAforoInicial()+
                                                                ","+precio.getVentaPlatea()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Procedencia getProcedencia(Integer idProcedencia) throws SQLException{
        if (seteo()) {
            Procedencia procedencia = new Procedencia();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_procedencia WHERE id_procedencia ="+idProcedencia.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    procedencia.setIdProcedencia(rs.getInt("id_procedencia"));
                    procedencia.setNombre(rs.getString("nombre"));
                    procedencia.setDescripcion(rs.getString("descripcion"));
                    procedencia.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return procedencia;
        }else{
          return null;  
        }
        
    }
    
    public List<Procedencia> getAllProcedencia() throws SQLException{
        if (seteo()) {
            List<Procedencia> procedencias = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_procedencia")) {
                ResultSet rs = stmt.executeQuery();
                Procedencia procedencia = new Procedencia();

                while (rs.next()){
                    procedencia = new Procedencia();
                    procedencia.setIdProcedencia(rs.getInt("id_procedencia"));
                    procedencia.setNombre(rs.getString("nombre"));
                    procedencia.setDescripcion(rs.getString("descripcion"));
                    procedencia.setEstado(rs.getString("estado"));
                    procedencias.add(procedencia);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return procedencias;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoProcedencia(Procedencia procedencia) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_procedencia set estado='"+ procedencia.getEstado()+"' "+
                                                                " , usuario_modificacion='"+procedencia.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_procedencia ="+procedencia.getIdProcedencia().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateProcedencia(Procedencia procedencia) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_procedencia set nombre='"+ procedencia.getNombre().toString()+"' "+
                                                                " , descripcion='"+procedencia.getDescripcion().toString()+"' "+
                                                               " , usuario_modificacion='"+procedencia.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_procedencia ="+procedencia.getIdProcedencia().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }     
            return check;    
        }else{
          return false;  
        }
        
    }
    
    public boolean insertProcedencia(Procedencia procedencia) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_procedencia VALUES (null,'"+procedencia.getNombre()+
                                                    "','"+procedencia.getDescripcion()+
                                                    "','"+procedencia.getEstado()+
                                                    "', sysdate()"+
                                                    ",'"+procedencia.getUsuarioCreacion()+"'"+
                                                    ", null"+
                                                    ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public Productora getProductora(Integer idProductora) throws SQLException{
        if (seteo()) {
            Productora productora = new Productora();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_productora WHERE id_productora ="+idProductora.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    productora.setIdProductora(rs.getInt("id_productora"));
                    productora.setNombre(rs.getString("nombre"));
                    productora.setDescripcion(rs.getString("descripcion"));
                    productora.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return productora;
        }else{
          return null;  
        }
        
    }
    
    public List<Productora> getAllProductora() throws SQLException{
        if (seteo()) {
            List<Productora> productoras = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_productora")) {
                ResultSet rs = stmt.executeQuery();
                Productora productora = new Productora();

                while (rs.next()){
                    productora = new Productora();
                    productora.setIdProductora(rs.getInt("id_productora"));
                    productora.setNombre(rs.getString("nombre"));
                    productora.setDescripcion(rs.getString("descripcion"));
                    productora.setEstado(rs.getString("estado"));
                    productoras.add(productora);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return productoras;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoProductora(Productora productora) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_productora set estado='"+ productora.getEstado()+"' "+
                                                                " , usuario_modificacion='"+productora.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_productora ="+productora.getIdProductora().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateProductora(Productora productora) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_productora set nombre='"+ productora.getNombre().toString()+"' "+
                                                                " , descripcion='"+productora.getDescripcion().toString()+"' "+
                                                               " , usuario_modificacion='"+productora.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_productora ="+productora.getIdProductora().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertProductora(Productora productora) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_productora VALUES (null,'"+productora.getNombre()+
                                                    "','"+productora.getDescripcion()+
                                                    "','"+productora.getEstado()+
                                                    "', sysdate()"+
                                                    ",'"+productora.getUsuarioCreacion()+"'"+
                                                    ", null"+
                                                    ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Promocion getPromocion(Integer idPromocion) throws SQLException{
        if (seteo()) {
            Promocion promocion = new Promocion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_promocion WHERE id_promocion ="+idPromocion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    promocion.setIdPromocion(rs.getInt("id_promocion"));
                    promocion.setNombre(rs.getString("nombre"));
                    promocion.setDescripcion(rs.getString("descripcion"));
                    promocion.setAmigoTeatro(rs.getString("amigo_teatro"));
                    promocion.setIdEvento(rs.getInt("id_evento"));
                    promocion.setIdPlatea(rs.getInt("id_platea"));
                    promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                    promocion.setIdTipoPromocion(rs.getInt("id_tipo_promocion"));
                    promocion.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return promocion;
        }else{
          return null;  
        }
        
    }
    
    public List<Promocion> getAllPromocion() throws SQLException{
        if (seteo()) {
            List<Promocion> promociones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_promocion")) {
                ResultSet rs = stmt.executeQuery();
                Promocion promocion = new Promocion();

                while (rs.next()){
                    promocion = new Promocion();
                    promocion.setIdPromocion(rs.getInt("id_promocion"));
                    promocion.setNombre(rs.getString("nombre"));
                    promocion.setDescripcion(rs.getString("descripcion"));
                    promocion.setAmigoTeatro(rs.getString("amigo_teatro"));
                    promocion.setIdEvento(rs.getInt("id_evento"));
                    promocion.setIdPlatea(rs.getInt("id_platea"));
                    promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                    promocion.setIdTipoPromocion(rs.getInt("id_tipo_promocion"));
                    promocion.setEstado(rs.getString("estado"));
                    promociones.add(promocion);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return promociones;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoPromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_promocion set estado='"+ promocion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_promocion set nombre='"+ promocion.getNombre().toString()+"' "+
                                                                " , descripcion='"+promocion.getDescripcion().toString()+"' "+
                                                                " , amigo_teatro='"+promocion.getAmigoTeatro().toString()+"' "+
                                                                " , id_evento='"+promocion.getIdEvento().toString()+"' "+
                                                                " , id_platea='"+promocion.getIdPlatea().toString()+"' "+
                                                                " , tipo_acceso='"+promocion.getTipoAcceso().toString()+"' "+
                                                                " , id_tipo_promocion='"+promocion.getIdTipoPromocion().toString()+"' "+
                                                                " , fecha_inicio='"+promocion.getFechaInicio().toString()+"' "+
                                                                " , fecha_fin='"+promocion.getFechaFin().toString()+"' "+
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public boolean insertPromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_promocion VALUES ('"+promocion.getNombre()+"'"+
                                                                ",'"+promocion.getDescripcion()+"'"+
                                                                ",'"+promocion.getAmigoTeatro()+"'"+
                                                                ","+promocion.getIdEvento().toString()+
                                                                ","+promocion.getIdPlatea().toString()+
                                                                ",'"+promocion.getTipoAcceso()+"'"+
                                                                ","+promocion.getIdTipoPromocion().toString()+
                                                                ",'"+promocion.getFechaInicio()+"'"+
                                                                ",'"+promocion.getFechaFin()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Rol getRol(Integer idRol) throws SQLException{
        if (seteo()) {
            Rol rol = new Rol();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_rol WHERE id_rol ="+idRol.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    rol.setIdRol(rs.getInt("id_rol"));
                    rol.setDescripcion(rs.getString("descripcion"));
                    rol.setModulo(rs.getString("modulo"));
                    rol.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return rol;
        }else{
          return null;  
        }
        
    }
    
    public List<Rol> getAllRol() throws SQLException{
        if (seteo()) {
            List<Rol> roles = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_rol")) {
                ResultSet rs = stmt.executeQuery();
                Rol rol = new Rol();

                while (rs.next()){
                    rol = new Rol();
                    rol.setIdRol(rs.getInt("id_rol"));
                    rol.setDescripcion(rs.getString("descripcion"));
                    rol.setModulo(rs.getString("modulo"));
                    rol.setEstado(rs.getString("estado"));
                    roles.add(rol);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return roles;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoRol(Rol rol) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_rol set estado='"+ rol.getEstado()+"' "+
                                                                " , usuario_modificacion='"+rol.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_rol ="+rol.getIdRol().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateRol(Rol rol) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_rol set descripcion='"+ rol.getDescripcion().toString()+"' "+
                                                                " , modulo='"+rol.getModulo().toString()+"' "+
                                                               " , usuario_modificacion='"+rol.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_rol ="+rol.getIdRol().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertRol(Rol rol) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_rol VALUES ('"+rol.getDescripcion()+"'"+
                                                                ",'"+rol.getModulo()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Sala getSala(Integer idSala) throws SQLException{
        if (seteo()) {
            Sala sala = new Sala();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_sala WHERE id_sala ="+idSala.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    sala.setIdSala(rs.getInt("id_sala"));
                    sala.setNombre(rs.getString("nombre"));
                    sala.setDescripcion(rs.getString("descripcion"));
                    sala.setCapacidad(rs.getInt("capacidad"));
                    sala.setRutaImagen(rs.getString("ruta_imagen"));
                    sala.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return sala;
        }else{
          return null;  
        }
        
    }
    
    public List<Sala> getAllSala() throws SQLException{
        if (seteo()) {
            List<Sala> salas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_sala")) {
                ResultSet rs = stmt.executeQuery();
                Sala sala = new Sala();

                while (rs.next()){
                    sala = new Sala();
                    sala.setIdSala(rs.getInt("id_sala"));
                    sala.setNombre(rs.getString("nombre"));
                    sala.setDescripcion(rs.getString("descripcion"));
                    sala.setCapacidad(rs.getInt("capacidad"));
                    sala.setRutaImagen(rs.getString("ruta_imagen"));
                    sala.setEstado(rs.getString("estado"));
                    salas.add(sala);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salas;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoSala(Sala sala) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala set estado='"+ sala.getEstado()+"' "+
                                                                " , usuario_modificacion='"+sala.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala ="+sala.getIdSala().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateSala(Sala sala) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala set nombre='"+ sala.getNombre().toString()+"' "+
                                                                " , descripcion='"+sala.getDescripcion().toString()+"' "+
                                                                " , capacidad='"+sala.getCapacidad().toString()+"' "+
                                                                " , ruta_imagen='"+sala.getRutaImagen().toString()+"' "+
                                                               " , usuario_modificacion='"+sala.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala ="+sala.getIdSala().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check; 
        }else{
          return false;  
        }
        
    }
    
    public boolean insertSala(Sala sala) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_sala VALUES ('"+sala.getNombre()+"'"+
                                                                ",'"+sala.getDescripcion()+"'"+
                                                                ","+sala.getCapacidad().toString()+
                                                                ",'"+sala.getRutaImagen()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
       
    }
    
    public SalaMapa getSalaMapa(Integer idSalaMapa) throws SQLException{
        if (seteo()) {
            SalaMapa salaMapa = new SalaMapa();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_sala_mapa WHERE id_sala_mapa ="+idSalaMapa.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salaMapa.setIdSala(rs.getInt("id_sala_mapa"));
                    salaMapa.setIdSala(rs.getInt("id_sala"));
                    salaMapa.setIdMapa(rs.getInt("id_mapa"));
                    salaMapa.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salaMapa;
        }else{
          return null;  
        }
        
    }
    
    public List<SalaMapa> getAllSalaMapa() throws SQLException{
        if (seteo()) {
             List<SalaMapa> salasMapas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_sala_mapa")) {
                ResultSet rs = stmt.executeQuery();
                SalaMapa salaMapa = new SalaMapa();

                while (rs.next()){
                    salaMapa = new SalaMapa();
                    salaMapa.setIdSala(rs.getInt("id_sala_mapa"));
                    salaMapa.setIdSala(rs.getInt("id_sala"));
                    salaMapa.setIdMapa(rs.getInt("id_mapa"));
                    salaMapa.setEstado(rs.getString("estado"));
                    salasMapas.add(salaMapa);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salasMapas;
        }else{
          return null;  
        }
       
    }
    public boolean updateEstadoSalaMapa(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala_mapa set estado='"+ salaMapa.getEstado()+"' "+
                                                                " , usuario_modificacion='"+salaMapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala_mapa ="+salaMapa.getIdSalaMapa().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateSalaMapa(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala_mapa set id_sala='"+ salaMapa.getIdSala().toString()+"' "+
                                                                " , id_mapa='"+salaMapa.getIdMapa().toString()+"' "+
                                                                " , usuario_modificacion='"+salaMapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala_mapa ="+salaMapa.getIdSalaMapa().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertSalaMapa(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_sala_mapa VALUES ("+salaMapa.getIdSala().toString()+
                                                                                                   ","+salaMapa.getIdMapa().toString()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }     
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Tarjeta getTarjeta(Integer idTarjeta) throws SQLException{
        if (seteo()) {
            Tarjeta tarjeta = new Tarjeta();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tarjeta WHERE id_tarjeta ="+idTarjeta.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tarjeta.setIdTarjeta(rs.getInt("id_tarjeta"));
                    tarjeta.setNombre(rs.getString("nombre"));
                    tarjeta.setTipo(rs.getString("tipo"));
                    tarjeta.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tarjeta;
        }else{
          return null;  
        }
        
    }
    
    public List<Tarjeta> getAllTarjeta() throws SQLException{
        if (seteo()) {
            List<Tarjeta> tarjetas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tarjeta")) {
                ResultSet rs = stmt.executeQuery();
                Tarjeta tarjeta = new Tarjeta();

                while (rs.next()){
                    tarjeta = new Tarjeta();
                    tarjeta.setIdTarjeta(rs.getInt("id_tarjeta"));
                    tarjeta.setNombre(rs.getString("nombre"));
                    tarjeta.setTipo(rs.getString("tipo"));
                    tarjeta.setEstado(rs.getString("estado"));
                    tarjetas.add(tarjeta);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tarjetas;
        }else{
          return null;  
        }
        
    }
   public boolean updateEstadoTarjeta(Tarjeta tarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala_tarjeta set estado='"+ tarjeta.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tarjeta.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tarjeta ="+tarjeta.getIdTarjeta().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateTarjeta(Tarjeta tarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tarjeta set nombre='"+ tarjeta.getNombre().toString()+"' "+
                                                                " , tipo='"+tarjeta.getTipo().toString()+"' "+
                                                                " , usuario_modificacion='"+tarjeta.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tarjeta ="+tarjeta.getIdTarjeta().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertTarjeta(Tarjeta tarjeta) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_tarjeta VALUES ('"+tarjeta.getNombre()+"'"+
                                                                ",'"+tarjeta.getTipo()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public TipoEspectaculo getTipoEspectaculo(Integer idTipoEspectaculo) throws SQLException{
        if (seteo()) {
            TipoEspectaculo tipoEspectaculo = new TipoEspectaculo();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_espectaculo WHERE id_tipo_espectaculo ="+idTipoEspectaculo.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tipoEspectaculo.setIdTipoEspectaculo(rs.getInt("id_tipo_espectaculo"));
                    tipoEspectaculo.setNombre(rs.getString("nombre"));
                    tipoEspectaculo.setDescripcion(rs.getString("descripcion"));
                    tipoEspectaculo.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tipoEspectaculo;
        }else{
          return null;  
        }
        
    }
    
    public List<TipoEspectaculo> getAllTipoEspectaculo() throws SQLException{
        if (seteo()) {
            List<TipoEspectaculo> tiposEspectaculos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_espectaculo")) {
                ResultSet rs = stmt.executeQuery();
                TipoEspectaculo tipoEspectaculo = new TipoEspectaculo();

                while (rs.next()){
                    tipoEspectaculo = new TipoEspectaculo();
                    tipoEspectaculo.setIdTipoEspectaculo(rs.getInt("id_tipo_espectaculo"));
                    tipoEspectaculo.setNombre(rs.getString("nombre"));
                    tipoEspectaculo.setDescripcion(rs.getString("descripcion"));
                    tipoEspectaculo.setEstado(rs.getString("estado"));
                    tiposEspectaculos.add(tipoEspectaculo);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tiposEspectaculos;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoTipoEspectaculo(TipoEspectaculo tipoEspectaculo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_espectaculo set estado='"+ tipoEspectaculo.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEspectaculo.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tipo_espectaculo ="+tipoEspectaculo.getIdTipoEspectaculo().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateTipoEspectaculo(TipoEspectaculo tipoEspectaculo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_espectaculo set nombre='"+ tipoEspectaculo.getNombre().toString()+"' "+
                                                                " , descripcion='"+tipoEspectaculo.getDescripcion().toString()+"' "+
                                                                " , usuario_modificacion='"+tipoEspectaculo.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tipo_espectaculo ="+tipoEspectaculo.getIdTipoEspectaculo().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertTipoEspectaculo(TipoEspectaculo tipoEspectaculo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_tipo_espectaculo VALUES (null,'"+tipoEspectaculo.getNombre()+
                                                    "','"+tipoEspectaculo.getDescripcion()+
                                                    "','"+tipoEspectaculo.getEstado()+
                                                    "', sysdate()"+
                                                    ",'"+tipoEspectaculo.getUsuarioCreacion()+"'"+
                                                    ", null"+
                                                    ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public TipoEvento getTipoEvento(Integer idTipoEvento) throws SQLException{
        if (seteo()) {
            TipoEvento tipoEvento = new TipoEvento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_evento WHERE id_tipo_evento ="+idTipoEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tipoEvento.setIdTipoEvento(rs.getInt("id_tipo_evento"));
                    tipoEvento.setNombre(rs.getString("nombre"));
                    tipoEvento.setDescripcion(rs.getString("descripcion"));
                    tipoEvento.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tipoEvento;
        }else{
          return null;  
        }
        
    }
    
    public List<TipoEvento> getAllTipoEvento() throws SQLException{
        if (seteo()) {
            List<TipoEvento> tiposEventos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_evento")) {
                ResultSet rs = stmt.executeQuery();
                TipoEvento tipoEvento = new TipoEvento();

                while (rs.next()){
                    tipoEvento = new TipoEvento();
                    tipoEvento.setIdTipoEvento(rs.getInt("id_tipo_evento"));
                    tipoEvento.setNombre(rs.getString("nombre"));
                    tipoEvento.setDescripcion(rs.getString("descripcion"));
                    tipoEvento.setEstado(rs.getString("estado"));
                    tiposEventos.add(tipoEvento);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tiposEventos;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoTipoEvento(TipoEvento tipoEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_evento set estado='"+ tipoEvento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_evento ="+tipoEvento.getIdTipoEvento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateTipoEvento(TipoEvento tipoEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_evento set nombre='"+ tipoEvento.getNombre().toString()+"' "+
                                                                " , descripcion='"+tipoEvento.getDescripcion().toString()+"' "+
                                                                " , usuario_modificacion='"+tipoEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_evento ="+tipoEvento.getIdTipoEvento().toString())) {

                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertTipoEvento(TipoEvento tipoEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_tipo_evento VALUES (null,'"+tipoEvento.getNombre()+
                                                    "','"+tipoEvento.getDescripcion()+
                                                    "','"+tipoEvento.getEstado()+
                                                    "', sysdate()"+
                                                    ",'"+tipoEvento.getUsuarioCreacion()+"'"+
                                                    ", null"+
                                                    ", null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public TipoPrecio getTipoPrecio(Integer idTipoPrecio) throws SQLException{
        if (seteo()) {
            TipoPrecio tipoPrecio = new TipoPrecio();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_precio WHERE id_tipo_precio ="+idTipoPrecio.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tipoPrecio.setIdTipoPrecio(rs.getInt("id_tipo_precio"));
                    tipoPrecio.setNombre(rs.getString("nombre"));
                    tipoPrecio.setDescripcion(rs.getString("descripcion"));
                    tipoPrecio.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tipoPrecio; 
        }else{
          return null;  
        }
        
    }
    
    public List<TipoPrecio> getAllTipoPrecio() throws SQLException{
        if (seteo()) {
            List<TipoPrecio> tiposPrecios = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_precio")) {
                ResultSet rs = stmt.executeQuery();
                TipoPrecio tipoPrecio = new TipoPrecio();

                while (rs.next()){
                    tipoPrecio = new TipoPrecio();
                    tipoPrecio.setIdTipoPrecio(rs.getInt("id_tipo_precio"));
                    tipoPrecio.setNombre(rs.getString("nombre"));
                    tipoPrecio.setDescripcion(rs.getString("descripcion"));
                    tipoPrecio.setEstado(rs.getString("estado"));
                    tiposPrecios.add(tipoPrecio);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tiposPrecios;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoTipoPrecio(TipoPrecio tipoPrecio) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_evento set estado='"+ tipoPrecio.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoPrecio.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_precio ="+tipoPrecio.getIdTipoPrecio().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateTipoPrecio(TipoPrecio tipoPrecio) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_precio set nombre='"+ tipoPrecio.getNombre().toString()+"' "+
                                                                " , descripcion='"+tipoPrecio.getDescripcion().toString()+"' "+
                                                                " , usuario_modificacion='"+tipoPrecio.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_precio ="+tipoPrecio.getIdTipoPrecio().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }     
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertTipoPrecio(TipoPrecio tipoPrecio) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_tipo_precio VALUES ('"+tipoPrecio.getNombre()+"'"+
                                                                ",'"+tipoPrecio.getDescripcion()+"')")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
       
    }
    
    public TipoPromocion getTipoPromocion(Integer idTipoPromocion) throws SQLException{
        if (seteo()) {
            TipoPromocion tipoPromocion = new TipoPromocion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_promocion WHERE id_tipo_promocion ="+idTipoPromocion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tipoPromocion.setIdTipoPromocion(rs.getInt("id_tipo_promocion"));
                    tipoPromocion.setNombre(rs.getString("nombre"));
                    tipoPromocion.setFactorCompra(rs.getInt("factor_compra"));
                    tipoPromocion.setFactorPago(rs.getFloat("factor_pago"));
                    tipoPromocion.setIdBancoTarjeta(rs.getInt("id_banco_tarjeta"));
                    tipoPromocion.setIdCodigoPromocional(rs.getInt("id_codigo_promocional"));
                    tipoPromocion.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tipoPromocion;
        }else{
          return null;  
        }
        
    }
    
    public List<TipoPromocion> getAllTipoPromocion() throws SQLException{
        if (seteo()) {
            List<TipoPromocion> tiposPromociones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_promocion")) {
                ResultSet rs = stmt.executeQuery();
                TipoPromocion tipoPromocion;

                while (rs.next()){
                    tipoPromocion = new TipoPromocion();
                    tipoPromocion.setIdTipoPromocion(rs.getInt("id_tipo_promocion"));
                    tipoPromocion.setNombre(rs.getString("nombre"));
                    tipoPromocion.setFactorCompra(rs.getInt("factor_compra"));
                    tipoPromocion.setFactorPago(rs.getFloat("factor_pago"));
                    tipoPromocion.setIdBancoTarjeta(rs.getInt("id_banco_tarjeta"));
                    tipoPromocion.setIdCodigoPromocional(rs.getInt("id_codigo_promocional"));
                    tipoPromocion.setEstado(rs.getString("estado"));
                    tiposPromociones.add(tipoPromocion);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return tiposPromociones;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoTipoPromocion(TipoPromocion tipoPromocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_promocion set estado='"+ tipoPromocion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoPromocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                              " WHERE id_tipo_promocion ="+tipoPromocion.getIdTipoPromocion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateTipoPromocion(TipoPromocion tipoPromocion) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_promocion set nombre='"+ tipoPromocion.getNombre()+"' "+
                                                                " , factor_compra="+tipoPromocion.getFactorCompra().toString()+
                                                                " , factor_pago="+tipoPromocion.getFactorPago().toString()+
                                                                " , id_banco_tarjeta="+tipoPromocion.getIdBancoTarjeta().toString()+
                                                                " , id_codigo_promocional="+tipoPromocion.getIdCodigoPromocional().toString()+
                                                                " , usuario_modificacion='"+tipoPromocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                              " WHERE id_tipo_promocion ="+tipoPromocion.getIdTipoPromocion().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
       
    }
    
    public boolean insertTipoPromocion(TipoPromocion tipoPromocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_tipo_promocion VALUES ('"+tipoPromocion.getNombre()+"'"+
                                                                ","+tipoPromocion.getFactorCompra().toString()+
                                                                ","+tipoPromocion.getFactorPago().toString()+
                                                                ","+tipoPromocion.getIdBancoTarjeta().toString()+
                                                                ","+tipoPromocion.getIdCodigoPromocional().toString()+")")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
    
    public Usuario getUsuario(Integer idUsuario) throws SQLException{
        if (seteo()) {
            Usuario usuario = new Usuario();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario WHERE id_usuario ="+idUsuario.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuario.setIdUsuario(rs.getInt("id_usuario"));
                    usuario.setNombres(rs.getString("nombres"));
                    usuario.setUsuario(rs.getString("usuario"));
                    usuario.setCedula(rs.getString("cedula"));
                    usuario.setSexo(rs.getString("sexo"));
                    usuario.setCorreo(rs.getString("correo"));
                    usuario.setCelular(rs.getString("celular"));
                    usuario.setContraseña(rs.getString("contrasena"));
                    usuario.setIdPerfil(rs.getInt("id_perfil"));
                    usuario.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuario.setDireccion(rs.getString("direccion"));
                    usuario.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuario;
        }else{
          return null;  
        }
        
    }
    
    public List<Usuario> getAllUsuario() throws SQLException{
        if (seteo()) {
            List<Usuario> usuarios = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Usuario usuario;

                while (rs.next()){
                    usuario = new Usuario();
                    usuario.setIdUsuario(rs.getInt("id_usuario"));
                    usuario.setNombres(rs.getString("nombres"));
                    usuario.setUsuario(rs.getString("usuario"));
                    usuario.setCedula(rs.getString("cedula"));
                    usuario.setSexo(rs.getString("sexo"));
                    usuario.setCorreo(rs.getString("correo"));
                    usuario.setCelular(rs.getString("celular"));
                    usuario.setContraseña(rs.getString("contrasena"));
                    usuario.setIdPerfil(rs.getInt("id_perfil"));
                    usuario.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuario.setDireccion(rs.getString("direccion"));
                    usuario.setEstado(rs.getString("estado"));
                    usuarios.add(usuario);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuarios;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario set estado='"+ usuario.getEstado()+"' "+
                                                                " , usuario_modificacion='"+usuario.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario ="+usuario.getIdUsuario().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
        
    }
    public boolean updateUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario set nombres='"+ usuario.getNombres()+"' "+
                                                                " , usuario='"+usuario.getUsuario()+"' "+
                                                                " , cedula='"+usuario.getCedula()+"' "+
                                                                " , sexo='"+usuario.getSexo()+"' "+
                                                                " , correo='"+usuario.getCorreo()+"' "+
                                                                " , celular='"+usuario.getCelular()+"' "+
                                                                " , id_perfil="+usuario.getIdPerfil().toString()+
                                                                " , fecha_nacimiento='"+usuario.getFechaNacimiento().toString()+"' "+
                                                                " , direccion='"+usuario.getDireccion()+"' "+
                                                                " , usuario_modificacion='"+usuario.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario ="+usuario.getIdUsuario().toString())) {
                
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario VALUES (null"+
                                                                " ,'"+usuario.getNombres()+"' "+
                                                                " ,'"+usuario.getUsuario()+"' "+
                                                                " ,'"+usuario.getCedula()+"' "+
                                                                " ,'"+usuario.getSexo()+"' "+
                                                                " ,'"+usuario.getCorreo()+"' "+
                                                                " ,'"+usuario.getCelular()+"' "+
                                                                " ,'"+usuario.getContraseña()+"' "+
                                                                " ,"+usuario.getIdPerfil().toString()+
                                                                " ,'"+usuario.getFechaNacimiento().toString()+"' "+
                                                                " ,'"+usuario.getDireccion()+"' "+
                                                                " ,'"+usuario.getEstado()+"' "+
                                                                " , sysdate()"+
                                                                " ,'"+usuario.getUsuarioCreacion()+"'"+
                                                                " , null"+
                                                                " , null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public UsuarioCliente getUsuarioCliente(Integer idUsuarioCliente) throws SQLException{
        if (seteo()) {
            UsuarioCliente usuarioCliente = new UsuarioCliente();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente ="+idUsuarioCliente.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuarioCliente.setIdUsuarioCliente(rs.getInt("id_usuario_cliente"));
                    usuarioCliente.setNombres(rs.getString("nombres"));
                    usuarioCliente.setUsuario(rs.getString("usuario"));
                    usuarioCliente.setCedula(rs.getString("cedula"));
                    usuarioCliente.setCorreo(rs.getString("correo"));
                    usuarioCliente.setSexo(rs.getString("sexo"));
                    usuarioCliente.setCelular(rs.getString("celular"));
                    usuarioCliente.setContraseña(rs.getString("contrasena"));
                    usuarioCliente.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuarioCliente.setDireccion(rs.getString("direccion"));
                    usuarioCliente.setAmigoTeatro(rs.getString("amigo_teatro"));
                    usuarioCliente.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuarioCliente;
        }else{
          return null;  
        }
        
    }
    
    public List<UsuarioCliente> getAllUsuarioCliente() throws SQLException{
        if (seteo()) {
            List<UsuarioCliente> usuariosClientes = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_cliente where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                UsuarioCliente usuarioCliente;

                while (rs.next()){
                    usuarioCliente = new UsuarioCliente();
                    usuarioCliente.setIdUsuarioCliente(rs.getInt("id_usuario_cliente"));
                    usuarioCliente.setNombres(rs.getString("nombres"));
                    usuarioCliente.setUsuario(rs.getString("usuario"));
                    usuarioCliente.setCedula(rs.getString("cedula"));
                    usuarioCliente.setCorreo(rs.getString("correo"));
                    usuarioCliente.setSexo(rs.getString("sexo"));
                    usuarioCliente.setCelular(rs.getString("celular"));
                    usuarioCliente.setContraseña(rs.getString("contrasena"));
                    usuarioCliente.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuarioCliente.setDireccion(rs.getString("direccion"));
                    usuarioCliente.setAmigoTeatro(rs.getString("amigo_teatro"));
                    usuarioCliente.setEstado(rs.getString("estado"));
                    usuariosClientes.add(usuarioCliente);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuariosClientes;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_cliente set estado='"+ usuarioCliente.getEstado()+"' "+
                                                                " , usuario_modificacion='"+usuarioCliente.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_cliente ="+usuarioCliente.getIdUsuarioCliente().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_cliente set nombres='"+ usuarioCliente.getNombres()+"' "+
                                                                " , usuario='"+usuarioCliente.getUsuario()+"' "+
                                                                " , cedula='"+usuarioCliente.getCedula()+"' "+
                                                                " , sexo='"+usuarioCliente.getSexo()+"' "+
                                                                " , correo='"+usuarioCliente.getCorreo()+"' "+
                                                                " , celular='"+usuarioCliente.getCelular()+"' "+
                                                                " , contrasena='"+usuarioCliente.getContraseña()+"' "+
                                                                " , fecha_nacimiento='"+usuarioCliente.getFechaNacimiento().toString()+"' "+
                                                                " , direccion='"+usuarioCliente.getDireccion()+"' "+
                                                                " , amigo_teatro='"+usuarioCliente.getAmigoTeatro()+"' "+
                                                                " , usuario_modificacion='"+usuarioCliente.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_cliente ="+usuarioCliente.getIdUsuarioCliente().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario_cliente VALUES (null"+
                                                                " ,'"+usuarioCliente.getNombres()+"' "+
                                                                " ,'"+usuarioCliente.getUsuario()+"' "+
                                                                " ,'"+usuarioCliente.getCedula()+"' "+
                                                                " ,'"+usuarioCliente.getCorreo()+"' "+
                                                                " ,'"+usuarioCliente.getSexo()+"' "+
                                                                " ,'"+usuarioCliente.getCelular()+"' "+
                                                                " ,'"+usuarioCliente.getContraseña()+"' "+
                                                                " ,'"+usuarioCliente.getFechaNacimiento()+"' "+
                                                                " ,'"+usuarioCliente.getDireccion()+"' "+
                                                                " ,'"+usuarioCliente.getAmigoTeatro()+"'"+
                                                                " ,'"+usuarioCliente.getEstado()+"' "+
                                                                " , sysdate()"+
                                                                " ,'"+usuarioCliente.getUsuarioCreacion()+"'"+
                                                                " , null"+
                                                                " , null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
        
    }
    
    public UsuarioEvento getUsuarioEvento(Integer idUsuarioEvento) throws SQLException{
        if (seteo()) {
            UsuarioEvento usuarioEvento = new UsuarioEvento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_evento WHERE id_usuario_evento ="+idUsuarioEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuarioEvento.setIdUsuarioEvento(rs.getInt("id_usuario_evento"));
                    usuarioEvento.setNombres(rs.getString("nombres"));
                    usuarioEvento.setUsuario(rs.getString("usuario"));
                    usuarioEvento.setCedula(rs.getString("cedula"));
                    usuarioEvento.setCorreo(rs.getString("correo"));
                    usuarioEvento.setSexo(rs.getString("sexo"));
                    usuarioEvento.setCelular(rs.getString("celular"));
                    usuarioEvento.setContraseña(rs.getString("contrasena"));
                    usuarioEvento.setPerfil(rs.getInt("perfil"));
                    usuarioEvento.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuarioEvento.setDireccion(rs.getString("direccion"));
                    usuarioEvento.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuarioEvento;
        }else{
          return null;  
        }
        
    }
    
    public List<UsuarioEvento> getAllUsuarioEvento() throws SQLException{
        if (seteo()) {
            List<UsuarioEvento> usuariosEventos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_evento where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                UsuarioEvento usuarioEvento;

                while (rs.next()){
                    usuarioEvento = new UsuarioEvento();
                    usuarioEvento.setIdUsuarioEvento(rs.getInt("id_usuario_evento"));
                    usuarioEvento.setNombres(rs.getString("nombres"));
                    usuarioEvento.setUsuario(rs.getString("usuario"));
                    usuarioEvento.setCedula(rs.getString("cedula"));
                    usuarioEvento.setCorreo(rs.getString("correo"));
                    usuarioEvento.setSexo(rs.getString("sexo"));
                    usuarioEvento.setCelular(rs.getString("celular"));
                    usuarioEvento.setContraseña(rs.getString("contrasena"));
                    usuarioEvento.setPerfil(rs.getInt("perfil"));
                    usuarioEvento.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuarioEvento.setDireccion(rs.getString("direccion"));
                    usuarioEvento.setEstado(rs.getString("estado"));
                    usuariosEventos.add(usuarioEvento);
                }  
                System.out.println(usuariosEventos.toString());
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuariosEventos;
        }else{
          return null;  
        }
        
    }
    public boolean updateEstadoUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_evento set estado='"+ usuarioEvento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+usuarioEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_evento ="+usuarioEvento.getIdUsuarioEvento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return check;
        }else{
          return false;  
        }
    }
    public boolean updateUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_evento set nombres='"+ usuarioEvento.getNombres()+"' "+
                                                                " , usuario='"+usuarioEvento.getUsuario()+"' "+
                                                                " , cedula='"+usuarioEvento.getCedula()+"' "+
                                                                " , sexo='"+usuarioEvento.getSexo()+"' "+
                                                                " , correo='"+usuarioEvento.getCorreo()+"' "+
                                                                " , celular='"+usuarioEvento.getCelular()+"' "+
                                                                " , contrasena='"+usuarioEvento.getContraseña()+"' "+
                                                                " , perfil="+usuarioEvento.getPerfil().toString()+
                                                                " , fecha_nacimiento='"+usuarioEvento.getFechaNacimiento().toString()+"' "+
                                                                " , direccion='"+usuarioEvento.getDireccion()+"' "+
                                                                " , usuario_modificacion='"+usuarioEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_evento ="+usuarioEvento.getIdUsuarioEvento().toString())) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }    
            return check;
        }else{
          return false;  
        }
        
    }
    
    public boolean insertUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario_evento VALUES (null"+
                                                                " ,'"+ usuarioEvento.getNombres()+"' "+
                                                                " ,'"+usuarioEvento.getUsuario()+"' "+
                                                                " ,'"+usuarioEvento.getCedula()+"' "+
                                                                " ,'"+usuarioEvento.getSexo()+"' "+
                                                                " ,'"+usuarioEvento.getCorreo()+"' "+
                                                                " ,'"+usuarioEvento.getCelular()+"' "+
                                                                " ,'"+usuarioEvento.getContraseña()+"' "+
                                                                " ,"+usuarioEvento.getPerfil().toString()+
                                                                " ,'"+usuarioEvento.getFechaNacimiento().toString()+"' "+
                                                                " ,'"+usuarioEvento.getDireccion()+"' "+
                                                                " ,'"+usuarioEvento.getEstado()+"' "+
                                                                " , sysdate()"+
                                                                " ,'"+usuarioEvento.getUsuarioCreacion()+"' "+
                                                                " , null"+
                                                                " , null)")) {
                stmt.executeUpdate();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return check;
        }else{
          return false;  
        }
        
    }
}
