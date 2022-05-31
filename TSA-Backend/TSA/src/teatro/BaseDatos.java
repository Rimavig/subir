/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro;
import Entity.Banco;
import Entity.Procedencia;
import Entity.Promocion;
import Entity.Usuario;
import Entity.Clasificacion;
import Entity.TipoPromocion;
import Entity.Imagen;
import Entity.Rol;
import Entity.Funcion;
import Entity.TipoEspectaculo;
import Entity.Mapa;
import Entity.Evento;
import Entity.Sala;
import Entity.Asiento;
import Entity.TipoEvento;
import Entity.Platea;
import Entity.UsuarioEvento;
import Entity.Categoria;
import Entity.Distribucion;
import Entity.Perfil;
import Entity.UsuarioCliente;
import Entity.BancoTarjeta;
import Entity.Bloqueo;
import Entity.Caja;
import Entity.Tarjeta;
import Entity.Productora;
import Entity.CodigoPromocional;
import Entity.Contacto;
import Entity.Facturacion;
import Entity.SalaMapa;
import Entity.PerfilRol;
import Entity.FichaArtistica;
import Entity.Fundacion;
import Entity.MailTemplate;
import Entity.Reserva;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.sql.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Collections;
import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import java.util.Properties;
import java.util.Random;
import java.util.TreeMap;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.mail.Address;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;

/**
 *
 * @author Richard Vivanco - Alex Mendoza
 */

public class BaseDatos {
   
   private Connection cnx = null;
   String base="jdbc:mysql://104.198.222.134/teatro";
//    String base="jdbc:mysql://localhost/teatro";
    String usuario= "rimavig";
    String clave="Hotm@il003";
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
                // System.out.println("2");
               Class.forName("com.mysql.cj.jdbc.Driver");
               //Conexion con la base de datos, usuario y clave
                cnx = DriverManager.getConnection(base, usuario, clave);
                Thread.sleep(2000);
               // System.out.println("22222");
                return true;
                 
            }else{
               // System.out.println("4");
                if (cnx==null) {
                   Class.forName("com.mysql.cj.jdbc.Driver");
                   //Conexion con la base de datos, usuario y clave
                  //  //System.out.println("1");
                    cnx = DriverManager.getConnection(base, usuario, clave);      
                    Thread.sleep(2000);
                    //System.out.println("22222");
                }else{
                    try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_contacto")) {
                        //stmt.setQueryTimeout(1);
                        ////System.out.println("asdsada");
                        stmt.executeQuery();
                        
                    } catch (SQLException sqle) { 
                      System.out.println("Error en la ejecución de la consulta:" 
                        + sqle.getErrorCode() + " " + sqle.getMessage()); 
                        cnx = DriverManager.getConnection(base, usuario, clave);      
                        Thread.sleep(1000);
                      
                    }
                }
                return true;
            }
        }catch (Exception ex) {
             //System.out.println("3");
             cnx.close();
            
               return false;                             
        }     
    }
    
    public Usuario login(String username, String password) throws Exception{
        if (seteo()) {
            Usuario usuario=null;
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario")) {
                ResultSet rs = stmt.executeQuery();
                 while (rs.next()){
                    if (rs.getString("usuario").equals(username) || rs.getString("correo").equals(username) ){
                        if (rs.getString("contrasena").equals(password)){
                            usuario = new Usuario();
                            usuario.setIdUsuario(rs.getInt("id_usuario"));
                            usuario.setNombres(rs.getString("nombres"));
                            usuario.setApellidos(rs.getString("apellidos"));
                            usuario.setUsuario(rs.getString("usuario"));
                            usuario.setCedula(rs.getString("cedula"));
                            usuario.setSexo(rs.getString("sexo"));
                            usuario.setCorreo(rs.getString("correo"));
                            usuario.setCelular(rs.getString("celular"));
                            usuario.setIdPerfil(rs.getInt("id_perfil"));
                            }
                    }
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_asiento where estado !='B'")) {
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
    
    public Mapa getMapa(Integer idMapa) throws SQLException{
        if (seteo()) {
            Mapa mapa = new Mapa();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_mapa WHERE id_mapa ="+idMapa.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    mapa.setIdMapa(rs.getInt("id_mapa"));
                    mapa.setNombre(rs.getString("nombre"));
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_mapa where estado !='B'")) {
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
            if (mapa.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_mapa WHERE id_mapa ="+mapa.getIdMapa().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                    PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_mapa set estado='"+ mapa.getEstado()+"' "+
                    " , usuario_modificacion='"+mapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                    " WHERE id_mapa ="+mapa.getIdMapa().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_mapa set estado='"+ mapa.getEstado()+"' "+
                                                                " , usuario_modificacion='"+mapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_mapa ="+mapa.getIdMapa().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
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
    
    
    // SI SE USA
    public String updateCantidad(Bloqueo bloqueo) throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT tf.*, tsm.id_sala,ts.nombre as sala,tp.aforo as 'aforoP', tpf.vendido  as 'vendidoP', tpf.cantidad_bloqueado as "
                        + "'bloqueadoP', tpf.cantidad_cortesia  as 'cortesiaP', tpf.cantidad_espera  as 'esperaP' FROM tsa_funcion tf "
                        + "INNER JOIN tsa_evento te ON tf.id_evento = te.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa "
                        + "INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala INNER JOIN tsa_platea tp ON tp.id_evento =te.id_evento INNER JOIN tsa_platea_funcion tpf "
                        + "ON tpf.id_funcion =tf .id_funcion and tpf.id_platea =tp.id_platea and tf.id_funcion="+bloqueo.getIdFuncion()+" and tp.id_platea="+bloqueo.getIdPlatea());
                ResultSet rs =stmt.executeQuery();
                int id_sala=0;
                String sala="";
                while (rs.next()){
                    int aforo=rs.getInt("aforo");
                    int cantidad_vendida=rs.getInt("cantidad_vendida");
                    int cantidad_boqueada=rs.getInt("cantidad_bloqueado");
                    int cantidad_cortesia=rs.getInt("cantidad_cortesia");
                    int cantidad_espera=rs.getInt("cantidad_espera");
                    int aforo1=rs.getInt("aforoP");
                    int cantidad_vendida1=rs.getInt("vendidoP");
                    int cantidad_boqueada1=rs.getInt("bloqueadoP");
                    int cantidad_cortesia1=rs.getInt("cortesiaP");
                    int cantidad_espera1=rs.getInt("esperaP");
                    int total=cantidad_vendida+cantidad_boqueada+cantidad_cortesia+cantidad_espera+bloqueo.getDesde();
                    int total1=cantidad_vendida1+cantidad_boqueada1+cantidad_cortesia1+cantidad_espera1+bloqueo.getDesde();
                    if (aforo<total && bloqueo.getEstado().equals("B")) {
                        return "AFORO FUNCIÓN NO DISPONIBLE PARA BLOQUEO";
                    }
                    if (cantidad_boqueada<bloqueo.getDesde() && bloqueo.getEstado().equals("D")) {
                        return "NO CUENTA CON LA CANTIDAD DE ASIENTOS PARA DESBLOQUEO";
                    }
                    if (aforo<total && bloqueo.getEstado().equals("C")) {
                        return "CANTIDAD DE ASIENTO NO DISPONIBLE PARA CORTESIA";
                    }
                    if (aforo1<total1 && bloqueo.getEstado().equals("B")) {
                        return "AFORO PLATEA NO DISPONIBLE PARA BLOQUEO";
                    }
                    if (cantidad_boqueada1<bloqueo.getDesde() && bloqueo.getEstado().equals("D")) {
                        return "NO CUENTA CON LA CANTIDAD DE ASIENTOS PARA DESBLOQUEO";
                    }
                    if (aforo1<total1 && bloqueo.getEstado().equals("C")) {
                        return "CANTIDAD DE ASIENTO NO DISPONIBLE PARA CORTESIA";
                    }
                    id_sala=rs.getInt("id_sala");
                    sala=rs.getString("sala");
                }
                String comando="CALL bloqueo_cantidad("+bloqueo.getIdFuncion()+","+bloqueo.getIdPlatea()+","+bloqueo.getDesde()+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"','"+sala+"')";
                stmt =  cnx.prepareStatement(comando);
               // System.out.println(comando);
                boolean results = stmt.execute();
                int rsCount = 0;

                // Loop through the available result sets.
                while (results) {
                     rs = stmt.getResultSet();
                     while (rs.next()) {
                         try{
                            System.out.println(rs.getInt("MYSQL_ERROR"));
                            return "ERROR NO SE PUEDE ACTUALIZAR";
                        } catch (SQLException sqle) { 

                        } 
                     }
                     rs.close();
                     // Check for next result set
                     results = stmt.getMoreResults();
                } 
                return "true";
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "true";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";   
        }
        
    }
    // SI SE USA
    public String updateFila(Bloqueo bloqueo) throws SQLException{
        if (seteo()) {
            String check = "";
            
           
            try {
                
                int minimo=0;
                int maximo=0;
                if(bloqueo.getFila().equals("A") ){
                    minimo =9;
                    maximo=116;
                }else if(bloqueo.getFila().equals("B")){
                    minimo =9;
                    maximo=117;
                }else if(bloqueo.getFila().equals("C")){
                    minimo =19;
                    maximo=118;
                }else if(bloqueo.getFila().equals("D")){
                    minimo =19;
                    maximo=119;
                }else if(bloqueo.getFila().equals("F")){
                    minimo =19;
                    maximo=120;
                }else if(bloqueo.getFila().equals("G")){
                    minimo =19;
                    maximo=121;
                }else if(bloqueo.getFila().equals("H")){
                    minimo =9;
                    maximo=116;
                }else if(bloqueo.getFila().equals("I")){
                    minimo =17;
                    maximo=123;
                }else if(bloqueo.getFila().equals("J")){
                    minimo =17;
                    maximo=124;
                }else if(bloqueo.getFila().equals("K")){
                    minimo =17;
                    maximo=125;
                }else if(bloqueo.getFila().equals("L")){
                    minimo =17;
                    maximo=126;
                }else if(bloqueo.getFila().equals("M")){
                    minimo =17;
                    maximo=128;
                }else if(bloqueo.getFila().equals("N")){
                    minimo =17;
                    maximo=129;
                }else if(bloqueo.getFila().equals("O")){
                    minimo =17;
                    maximo=130;
                }else if(bloqueo.getFila().equals("P")){
                    minimo =17;
                    maximo=131;
                }else if(bloqueo.getFila().equals("Q")){
                    minimo =15;
                    maximo=132;
                }else if(bloqueo.getFila().equals("R")){
                    minimo =15;
                    maximo=133;
                }else if(bloqueo.getFila().equals("S")){
                    minimo =15;
                    maximo=134;
                }else if(bloqueo.getFila().equals("T")){
                    minimo =15;
                    maximo=135;
                }else if(bloqueo.getFila().equals("U")){
                    minimo =15;
                    maximo=136;
                }else if(bloqueo.getFila().equals("V")){
                    minimo =15;
                    maximo=136;
                }else if(bloqueo.getFila().equals("W")){
                    minimo =0;
                    maximo=138;
                }
                LinkedList<Integer> lista=new LinkedList();
                int desde=bloqueo.getDesde();
                int hasta=bloqueo.getHasta();
                if (desde % 2 == 0 && desde<99) {
                    if (hasta % 2 == 0 && hasta<99) {
                        for (int i = desde; i >= hasta; i--) {
                            lista.add(i);
                            i--;
                        }
                    }else  if (hasta % 2 != 0 && hasta<99) {
                        for (int i = desde; i > 0; i--) {
                            lista.add(i);
                            i--;
                        }
                        for (int i = 101; i <= maximo; i++) {
                            lista.add(i);
                        }
                        for (int i = 1; i <= hasta; i++) {
                            lista.add(i);
                            i++;
                        }
                    }else if (hasta>99) {
                        for (int i = desde; i > 0; i--) {
                            lista.add(i);
                            i--;
                        }
                        for (int i = 101; i <= hasta; i++) {
                            lista.add(i);
                        }
                    }
                }else  if (desde % 2 != 0 && desde<99) {
                    for (int i = 1; i <= hasta; i++) {
                            lista.add(i);
                            i++;
                    }
                }else if (desde>99) {
                    if (hasta % 2 != 0 && hasta<99) {
                        for (int i =desde; i <= maximo; i++) {
                            lista.add(i);
                        }
                        for (int i = 1; i <= hasta; i++) {
                            lista.add(i);
                            i++;
                        }
                    }else if (hasta>99) {
                        for (int i =desde; i <= hasta; i++) {
                            lista.add(i);
                        }
                    }
                }
                //System.out.println(lista);
                PreparedStatement stmt =  cnx.prepareStatement("SELECT td.* FROM tsa_funcion tf INNER JOIN tsa_distribucion td ON td.id_funcion =tf.id_funcion  and td.fila ='"+bloqueo.getFila()+"' and tf.id_funcion="+bloqueo.getIdFuncion());
                ResultSet rs =stmt.executeQuery();
                int id_sala=0;
                LinkedList<Integer> vendidos=new LinkedList();
                Map<Integer,   LinkedList> map = (Map<Integer, LinkedList>)new LinkedHashMap();
                boolean band=false;
                while (rs.next()){
                    LinkedList objetos=new LinkedList();
                    int asiento=rs.getInt("numero");
                    String estado=rs.getString("estado");
                    int id_platea=rs.getInt("id_platea");
                    objetos.add(estado);
                    objetos.add(id_platea);
                    map.put(asiento, objetos);
                    if (estado.equals("V") | estado.equals("E") | estado.equals("C") && lista.contains(asiento)) {
                        vendidos.add(asiento);
                        band =true;
                    }
                    
                  
                }
                if (band) {
                    return "ERROR LOS ASIENTOS: " +vendidos+" YA SE ENCUENTRAN VENDIDOS O EN COMPRA";
                }
                //System.out.println( vendidos);
                //System.out.println( map);
                int acum=0;
                 int id=0;
                for(Integer str: lista)
                {   
                    LinkedList asientos=map.get(str);
                    String estado=(String) asientos.get(0);
                    int id_platea=(int) asientos.get(1);
                    if (bloqueo.getEstado().equals("B")) {
                        if (estado.equals("A")) {
                            String comando="CALL bloqueo_fila("+bloqueo.getIdFuncion()+","+id_platea+",'"+bloqueo.getFila()+"',"+str+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                             //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            } 
                        }
                    }else if (bloqueo.getEstado().equals("D")) {
                        if (estado.equals("B")) {
                            String comando="CALL bloqueo_fila("+bloqueo.getIdFuncion()+","+id_platea+",'"+bloqueo.getFila()+"',"+str+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }
                    }else if (bloqueo.getEstado().equals("C")) {
                        
                        if (estado.equals("A")) {
                            String comando="CALL bloqueo_fila("+bloqueo.getIdFuncion()+","+id_platea+",'"+bloqueo.getFila()+"',"+str+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }else if (estado.equals("B")) {
                            String comando="CALL bloqueo_fila("+bloqueo.getIdFuncion()+","+id_platea+",'"+bloqueo.getFila()+"',"+str+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','F','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }
                       
                        if (acum==0) {
                             String comando="CALL ticket("+bloqueo.getIdFuncion()+",1,'"+bloqueo.getUsuario_modificacion()+"','Sala Principal',1)";
                            stmt =  cnx.prepareStatement(comando);
                            rs =stmt.executeQuery();
                            while (rs.next()){
                                id=Integer.parseInt(rs.getString(1).trim());
                                
                            }
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_cortesia  (id_ticket,nombre,correo,usuario_creacion) VALUES ("+id+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getUsuario_modificacion()+"')"); 
                            stmt.executeUpdate();
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,id_platea, usuario_creacion) VALUES ("+id+",'"+bloqueo.getFila()+str+"',"+id_platea+",'"+bloqueo.getUsuario_modificacion()+"')"); 
                            stmt.executeUpdate(); 
                            acum++;
                        }else{
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,id_platea, usuario_creacion) VALUES ("+id+",'"+bloqueo.getFila()+str+"',"+id_platea+",'"+bloqueo.getUsuario_modificacion()+"')");
                            stmt.executeUpdate(); 
                        }
                                                
                    }
                }
     
                return "true";
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        } 
    }
    // SI SE USA
    public String updateLateral(Bloqueo bloqueo) throws SQLException{
        if (seteo()) {
            String check = "";
            try {

                String comando="CALL bloqueo_lateral("+bloqueo.getIdFuncion()+","+bloqueo.getIdPlatea()+",'"+bloqueo.getFila()+"','"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                if (rs.next()) {
                    System.out.println(rs.getInt("MYSQL_ERROR"));
                    return "ERROR NO SE PUEDE ACTUALIZAR";
                }
                return "true";
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "true";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
        
    }
    // SI SE USA
    public String updateAsiento(Bloqueo bloqueo) throws SQLException{
        if (seteo()) {
            String check = "";
            
           LinkedList<String> lista=new LinkedList();
           LinkedList<Integer> lista_id=new LinkedList();
            try {
                String asient=bloqueo.getFila();
                String[] parts = asient.split(",");
                //separo las plateas
                for (int i = 0; i < parts.length; i++) {
                    lista.add(parts[i]);
                }
                //System.out.println(lista);
                PreparedStatement stmt =  cnx.prepareStatement("SELECT td.* FROM tsa_funcion tf INNER JOIN tsa_distribucion td ON td.id_funcion =tf.id_funcion and tf.id_funcion="+bloqueo.getIdFuncion());
                ResultSet rs =stmt.executeQuery();
                int id_sala=0;
                LinkedList<String> vendidos=new LinkedList();
                Map<Integer,   LinkedList> map = (Map<Integer, LinkedList>)new LinkedHashMap();
                boolean band=false;
                while (rs.next()){
                    LinkedList objetos=new LinkedList();
                    
                    int asiento=rs.getInt("numero");
                    String letra=rs.getString("fila")+asiento;
                    if (lista.contains(letra)) {
                        String estado=rs.getString("estado");
                        int id_platea=rs.getInt("id_platea");
                        int id=rs.getInt("id_distribucion");
                        objetos.add(estado);
                        objetos.add(id_platea);
                        objetos.add(letra);
                        map.put(id, objetos);
                        lista_id.add(id);
                        if (estado.equals("V") | estado.equals("E") | estado.equals("C")) {
                            vendidos.add(letra);
                            band =true;
                        }
                    }
                }
                if (band) {
                    return "ERROR LOS ASIENTOS: " +vendidos+" YA SE ENCUENTRAN VENDIDOS O EN COMPRA";
                }
                //System.out.println( vendidos);
                //System.out.println( map);
                int acum=0;
                 int id=0;
                for(Integer str: lista_id)
                {   
                    
                    LinkedList asientos=map.get(str);
                    String estado=(String) asientos.get(0);
                    int id_platea=(int) asientos.get(1);
                    String Nasiento=(String) asientos.get(2);
                    try {
                        if (acum==0) {
                            String comando="CALL ticket("+bloqueo.getIdFuncion()+",1,'"+bloqueo.getUsuario_modificacion()+"','Sala Principal',1)";
                            stmt =  cnx.prepareStatement(comando);
                            rs =stmt.executeQuery();
                            while (rs.next()){
                                id=Integer.parseInt(rs.getString(1).trim());

                            }
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_cortesia  (id_ticket,nombre,correo,usuario_creacion) VALUES ("+id+",'"+bloqueo.getNombre()+"','"+bloqueo.getCorreo()+"','"+bloqueo.getUsuario_modificacion()+"')"); 
                            stmt.executeUpdate();
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,id_platea, usuario_creacion) VALUES ("+id+",'"+Nasiento+"',"+id_platea+",'"+bloqueo.getUsuario_modificacion()+"')"); 
                            stmt.executeUpdate(); 
                            acum++;
                        }else{
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,id_platea, usuario_creacion) VALUES ("+id+",'"+Nasiento+"',"+id_platea+",'"+bloqueo.getUsuario_modificacion()+"')");
                            stmt.executeUpdate(); 
                        }
                    } catch (SQLException sqle) { 
                        System.out.println(sqle);
                        String comando="CALL delete_ticket("+id+")";
                        stmt =  cnx.prepareStatement(comando);
                        stmt.executeUpdate();
                        return "ERROR NO SE PUEDE ACTUALIZAR";
                    } 
                    if (bloqueo.getEstado().equals("B")) {
                        if (estado.equals("A")) {
                            String comando="CALL bloqueo_asiento("+bloqueo.getIdFuncion()+","+str+",'"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                             //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            } 
                        }
                    }else if (bloqueo.getEstado().equals("D")) {
                        if (estado.equals("B")) {
                            String comando="CALL bloqueo_asiento("+bloqueo.getIdFuncion()+","+str+",'"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }
                    }else if (bloqueo.getEstado().equals("C")) {
                        
                        if (estado.equals("A")) {
                            String comando="CALL bloqueo_asiento("+bloqueo.getIdFuncion()+","+str+",'"+bloqueo.getEstado()+"','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }else if (estado.equals("B")) {
                            String comando="CALL bloqueo_asiento("+bloqueo.getIdFuncion()+","+str+",'F','"+bloqueo.getUsuario_modificacion()+"')";
                            //System.out.println(comando);
                            stmt =  cnx.prepareStatement(comando);
                            boolean results = stmt.execute();
                            // Loop through the available result sets.
                            while (results) {
                                 rs = stmt.getResultSet();
                                 while (rs.next()) {
                                     try{
                                        System.out.println(rs.getInt("MYSQL_ERROR"));
                                        return "ERROR NO SE PUEDE ACTUALIZAR";
                                    } catch (SQLException sqle) { 

                                    } 
                                 }
                                 rs.close();
                                 // Check for next result set
                                 results = stmt.getMoreResults();
                            }
                        }
                       
                        
                                                
                    }
                }
     
                return "true";
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "ERROR NO SE PUEDE ACTUALIZAR";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        } 
    }
    // SI SE USA
    public String getAllCortesia() throws SQLException{
        if (seteo()) {
            String check = "";
            try {
               
                String comando="SELECT tta.*, ttc.nombre , tt.estado as Nestado ,ttc.correo, te.nombre as Nevento, tf.fecha,tp.nombre as Nplatea FROM tsa_ticket tt INNER JOIN tsa_ticket_asiento tta ON tta.id_ticket= tt.id_ticket INNER JOIN tsa_ticket_cortesia ttc ON ttc.id_ticket= tt.id_ticket INNER JOIN tsa_funcion tf ON tf.id_funcion = tt.id_funcion  INNER JOIN tsa_evento te ON tf.id_evento =te.id_evento INNER JOIN tsa_platea tp ON tp.id_platea =tta.id_platea";
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                String resultado="";
                LinkedList cortesia=new LinkedList();
                Map<Integer,   LinkedList> map = (Map<Integer, LinkedList>)new LinkedHashMap();
                boolean band=false;
                while (rs.next()){
                   
                    if (map.containsKey(rs.getInt("id_ticket"))) {
                        cortesia=map.get(rs.getInt("id_ticket"));
                        int cantidad=(int)cortesia.get(0);
                        String asiento=rs.getString("asiento");
                        boolean isNumeric =  asiento.matches("[+-]?\\d*(\\.\\d+)?");
                        if (isNumeric) {
                            cantidad=cantidad+Integer.parseInt(asiento);
                        }else{
                            cantidad=cantidad+1;
                        }
                        String texto=rs.getInt("id_ticket")+",,,"+rs.getString("nombre")+",,,"+rs.getString("correo")+",,,"+cantidad+",,,"+rs.getString("Nevento")+",,,"+rs.getString("Nplatea")+",,,"+rs.getString("fecha")+",,,"+rs.getString("Nestado")+";";
                        cortesia=new LinkedList();
                        cortesia.add(cantidad);
                        cortesia.add(texto);
                        map.put(rs.getInt("id_ticket"), cortesia);
                    }else{
                        String asiento=rs.getString("asiento");
                        boolean isNumeric =  asiento.matches("[+-]?\\d*(\\.\\d+)?");
                        int cantidad=1;
                        if (isNumeric) {
                            cantidad=Integer.parseInt(asiento);
                        }else{
                            cantidad=1;
                        }
                        String texto=rs.getInt("id_ticket")+",,,"+rs.getString("nombre")+",,,"+rs.getString("correo")+",,,"+cantidad+",,,"+rs.getString("Nevento")+",,,"+rs.getString("Nplatea")+",,,"+rs.getString("fecha")+",,,"+rs.getString("Nestado")+";";
                        cortesia=new LinkedList();
                        cortesia.add(cantidad);
                        cortesia.add(texto);
                        map.put(rs.getInt("id_ticket"), cortesia);
                    }
                }
               // System.out.println(map);
                for (Map.Entry<Integer, LinkedList> entry : map.entrySet()) {
                    cortesia=entry.getValue();
                    resultado=resultado+cortesia.get(1);
                }
               
                return resultado;
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                 return "ERROR CON BASE DE DATOS";  
            } 
        }else{
           return "ERROR CON BASE DE DATOS";  
        }
        
    }
    
    public String getCortesia(Integer id_ticket) throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                String comando="SELECT * FROM tsa_ticket_asiento tta WHERE id_ticket="+id_ticket;
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                String resultado="";
                boolean band=false;
                while (rs.next()){
                    resultado=resultado+rs.getInt("id_ticket_asiento")+",,,"+rs.getString("asiento")+",,,"+rs.getString("estado")+";";
                }
                return resultado;
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                 return "ERROR CON BASE DE DATOS";  
            } 
        }else{
           return "ERROR CON BASE DE DATOS";  
        }
        
    }
    
    public String updateEstadoCortesia(Integer id, String estado, String usuario_modificacion) throws SQLException{
        if (seteo()) {
            String check = "";
            PreparedStatement stmt;
            try {
                String comando="";
                if (estado.equals("B")) {
                    comando="SELECT tta.*, tt.id_funcion  FROM tsa_ticket_asiento tta INNER JOIN tsa_ticket tt ON tta.id_ticket=tt.id_ticket and id_ticket_asiento="+id;
                    stmt =  cnx.prepareStatement(comando);
                    ResultSet rs =stmt.executeQuery();
                    String resultado="";
                    boolean band=false;
                    String asiento="";
                    String id_funcion="";
                    String id_platea="";
                    int idTicket=0;
                    while (rs.next()){
                        if (rs.getString("estado").equals("A")) {
                            band=true;
                            asiento=rs.getString("asiento");
                            id_funcion=rs.getString("id_funcion");
                            id_platea=rs.getString("id_platea");
                            idTicket=rs.getInt("id_ticket");
                        }
                    }
                    boolean isNumeric =  asiento.matches("[+-]?\\d*(\\.\\d+)?");
                    int cantidad=1;
                    if (band) {
                        String salida=delete_cortesia(id, idTicket, usuario_modificacion);
                       // System.out.println(salida);
                        return salida;

                    }else{
                        return "EL TICKET NO SE PUEDE ELIMINAR- TICKET INACTIVO";
                    }
                    
                }else{
                    comando="UPDATE teatro.tsa_ticket_asiento SET estado='"+estado+"' WHERE id_ticket_asiento="+id;
                    stmt =  cnx.prepareStatement(comando);
                    stmt.executeUpdate();
                    return "SE EDITO CORRECTAMENTE";
                }
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                 return "ERROR CON BASE DE DATOS";  
            } 
        }else{
           return "ERROR CON BASE DE DATOS";  
        }
        
    }
    // SI SE USA
    public String delete_cortesia(int idTicketAsiento, int idTicket, String usuario_modificacion) throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                String comando="SELECT tta.*,tt.id_funcion FROM tsa_ticket tt INNER JOIN tsa_ticket_asiento tta ON tta.id_ticket= tt.id_ticket  and tta.id_ticket="+idTicket;
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                String id_platea="";
                String asiento="";
                int id_funcion=0;
                int acum=0;
                while (rs.next()) {
                    if (rs.getInt("id_ticket_asiento")==idTicketAsiento) {
                        asiento=rs.getString("asiento");
                        id_platea=rs.getString("id_platea");
                        id_funcion=rs.getInt("id_funcion");
                    }
                    acum++;
                }
                 boolean isNumeric =  asiento.matches("[+-]?\\d*(\\.\\d+)?");
                if (isNumeric) {
                     if (acum<=1) {
                         comando="CALL delete_cortesia("+idTicketAsiento+","+idTicket+","+id_funcion+",'',"+asiento+",'T',"+id_platea+",'" +usuario_modificacion+"')";
                    }else{
                         comando="CALL delete_cortesia("+idTicketAsiento+","+idTicket+","+id_funcion+",'',"+asiento+",'S',"+id_platea+",'" +usuario_modificacion+"')";
                     }
                     
                }else{
                    char fila = asiento.charAt(0);
                    String numero= asiento.substring(1);
                    if (acum<=1) {
                        comando="CALL delete_cortesia("+idTicketAsiento+","+idTicket+","+id_funcion+",'"+fila+"',"+numero+",'Q',"+id_platea+",'" +usuario_modificacion+"')";
                    }else{
                        comando="CALL delete_cortesia("+idTicketAsiento+","+idTicket+","+id_funcion+",'"+fila+"',"+numero+",'P',"+id_platea+",'" +usuario_modificacion+"')";
                    }
                     
                }
              //  System.out.println(comando);
                stmt =  cnx.prepareStatement(comando);
                //System.out.println(comando);
                try{
                    boolean results = stmt.execute();
                    // Loop through the available result sets.
                    while (results) {
                         rs = stmt.getResultSet();
                         while (rs.next()) {
                             try{
                                System.out.println(rs.getInt("MYSQL_ERROR"));
                                return "ERROR NO SE PUEDE ELIMINAR";
                            } catch (SQLException sqle) { 

                            } 
                         }
                         rs.close();
                         // Check for next result set
                         results = stmt.getMoreResults();
                    }
                    return "SE ELIMINO EL TICKET CORRECTAMENTE";
                } catch (SQLException sqle) { 
                    System.out.println(sqle);
                    return "ERROR NO SE PUDO ELIMINAR";
                }
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "ERROR NO SE PUDO ELIMINAR";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
        
    }
  
    public String deleteA_cortesia(int idTicket) throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                
                String comando="SELECT tta.*,tt.id_funcion FROM tsa_ticket tt INNER JOIN tsa_ticket_asiento tta ON tta.id_ticket= tt.id_ticket  and tta.id_ticket="+idTicket;
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                String asiento="";
                String id_platea="";
                int id_funcion=0;
                int acum=0;
                String estado="";
                LinkedList<String> items=new LinkedList();
                while (rs.next()) {
                    asiento=rs.getString("asiento");
                    id_platea=rs.getString("id_platea");
                    id_funcion=rs.getInt("id_funcion");
                    estado=rs.getString("estado");
                    if (!estado.equals("A")) {
                        return "NO SE PUEDE ELIMINAR, EXISTEN TICKETS INACTIVOS";
                    }
                    items.add(rs.getString("asiento"));
                    acum++;
                }
                 boolean isNumeric =  asiento.matches("[+-]?\\d*(\\.\\d+)?");
                if (isNumeric) {
                     comando="CALL deleteA_cortesia("+idTicket+","+id_funcion+","+id_platea+",'C')";
    
                }else{
                    comando="CALL deleteA_cortesia("+idTicket+","+id_funcion+","+id_platea+",'P')";
                }
                //System.out.println(comando);
                stmt =  cnx.prepareStatement(comando);
                //System.out.println(comando);
                try{
                    boolean results = stmt.execute();
                    // Loop through the available result sets.
                    while (results) {
                         rs = stmt.getResultSet();
                         while (rs.next()) {
                             try{
                                System.out.println(rs.getInt("MYSQL_ERROR"));
                                return "ERROR NO SE PUEDE ELIMINAR";
                            } catch (SQLException sqle) { 

                            } 
                         }
                         rs.close();
                         // Check for next result set
                         results = stmt.getMoreResults();
                    }
                   // System.out.println(items);
                    if (!isNumeric) {
                        for (String id: items) {
                            String letra=id.substring(0,1);
                            String numero=id.substring(1);
                            comando="UPDATE teatro.tsa_distribucion SET estado='A' WHERE estado='C' and fila='"+letra+"' and numero='"+numero+"' and id_funcion="+id_funcion;
                         //   System.out.println(comando);
                            stmt =cnx.prepareStatement(comando);
                            stmt.executeUpdate();
                        }
                    }
                    return "true";
                } catch (SQLException sqle) { 
                    System.out.println(sqle);
                    return "ERROR NO SE PUDO ELIMINAR";
                }
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "ERROR NO SE PUDO ELIMINAR";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
        
    }
    //MANTENIMIENTO CREAR CATEGORIAS
    
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
    // SI SE USA
    public List<Categoria> getAllCategoria () throws SQLException{
        if (seteo()) {
            List<Categoria> categorias = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_categoria where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoCategoria(Categoria categoria) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (categoria.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_categoria  WHERE id_categoria ="+categoria.getIdCategoria().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_categoria set estado='"+ categoria.getEstado()+"' "+
                                                                " , usuario_modificacion='"+categoria.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_categoria ="+categoria.getIdCategoria().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                 try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_categoria set estado='"+ categoria.getEstado()+"' "+
                                                                " , usuario_modificacion='"+categoria.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_categoria ="+categoria.getIdCategoria().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }   
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    // SI SE USA
    public Imagen getImagen (Integer idImagen,String tipo) throws SQLException{
        if (seteo()) {
            Imagen imagen = new Imagen();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_imagen_"+tipo+" WHERE id_imagen ="+idImagen.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    imagen.setIdImagen(rs.getInt("id_imagen"));
                    imagen.setNombre(rs.getString("nombre"));
                    imagen.setDescripcion(rs.getString("descripcion"));
                    imagen.setImagen(rs.getString("imagen"));
                    imagen.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return imagen;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<Imagen> getAllImagen (String tipo) throws SQLException{
        if (seteo()) {
            List<Imagen> imagens = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_imagen_"+tipo+" where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Imagen imagen = new Imagen();
                while (rs.next()){
                    imagen = new Imagen();
                    imagen.setIdImagen(rs.getInt("id_imagen"));
                    imagen.setNombre(rs.getString("nombre"));
                    imagen.setDescripcion(rs.getString("descripcion"));
                    imagen.setImagen(rs.getString("imagen"));
                    imagen.setEstado(rs.getString("estado"));
                    imagens.add(imagen);
                } 
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return imagens; 
        }else{
          return null;  
        }
       
    }
    // SI SE USA
    public boolean updateEstadoImagen(Imagen imagen, String tipo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (imagen.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_imagen_"+tipo+"  WHERE id_imagen ="+imagen.getIdImagen().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_imagen_"+tipo+" set estado='"+ imagen.getEstado()+"' "+
                                                                " , usuario_modificacion='"+imagen.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_imagen ="+imagen.getIdImagen().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_imagen_"+tipo+" set estado='"+ imagen.getEstado()+"' "+
                                                                " , usuario_modificacion='"+imagen.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_imagen ="+imagen.getIdImagen().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }   
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
    public boolean updateImagen(Imagen imagen, String tipo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_imagen_"+tipo+" set nombre='"+ imagen.getNombre()+"' "+
                                                                " , descripcion='"+imagen.getDescripcion()+"' "+
                                                                " , usuario_modificacion='"+imagen.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_imagen ="+imagen.getIdImagen().toString())) {
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
    // SI SE USA
    public String insertImagen(Imagen imagen, String tipo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            
            String comando="CALL imagen_"+tipo+"('"+imagen.getNombre()+
                                        "','"+imagen.getDescripcion()+
                                        "','"+imagen.getEstado()+
                                        "','"+imagen.getUsuarioCreacion()+"')";
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
                ResultSet rs =stmt.executeQuery();
                while (rs.next()){
                    int id=Integer.parseInt(rs.getString(1).trim());
                   return id+"";
                }
                
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }   
            return "false";
            
        }else{
          return "false";
        }
        
    }
    
    // SI SE USA
    public Promocion getNombrePromocion (Integer idNombrePromocion) throws SQLException{
        if (seteo()) {
            Promocion nombre_promocion = new Promocion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_nombre_promocion WHERE id_nombre_promocion ="+idNombrePromocion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    nombre_promocion.setIdPromocion(rs.getInt("id_nombre_promocion"));
                    nombre_promocion.setNombre(rs.getString("nombre"));
                    nombre_promocion.setDescripcion(rs.getString("descripcion"));
                    nombre_promocion.setEstado(rs.getString("estado"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return nombre_promocion;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<Promocion> getAllNombrePromocion () throws SQLException{
        if (seteo()) {
            List<Promocion> nombre_promocions = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_nombre_promocion where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Promocion nombre_promocion = new Promocion();
                while (rs.next()){
                    nombre_promocion = new Promocion();
                    nombre_promocion.setIdPromocion(rs.getInt("id_nombre_promocion"));
                    nombre_promocion.setNombre(rs.getString("nombre"));
                    nombre_promocion.setDescripcion(rs.getString("descripcion"));
                    nombre_promocion.setEstado(rs.getString("estado"));
                    nombre_promocions.add(nombre_promocion);
                } 
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return nombre_promocions; 
        }else{
          return null;  
        }
       
    }
    // SI SE USA
    public boolean updateEstadoNombrePromocion(Promocion NombrePromocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (NombrePromocion.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_nombre_promocion  WHERE id_nombre_promocion ="+NombrePromocion.getIdPromocion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_nombre_promocion set estado='"+ NombrePromocion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+NombrePromocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_nombre_promocion ="+NombrePromocion.getIdPromocion().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                  try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_nombre_promocion set estado='"+ NombrePromocion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+NombrePromocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_nombre_promocion ="+NombrePromocion.getIdPromocion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }  
            
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
    public boolean updateNombrePromocion(Promocion NombrePromocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_nombre_promocion set nombre='"+ NombrePromocion.getNombre()+"' "+
                                                                " , descripcion='"+NombrePromocion.getDescripcion()+"' "+
                                                                 " , usuario_modificacion='"+NombrePromocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_nombre_promocion ="+NombrePromocion.getIdPromocion().toString())) {
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
   // SI SE USA
    public boolean insertNombrePromocion(Promocion NombrePromocion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_nombre_promocion VALUES (null,'"+NombrePromocion.getNombre()+
                                                                "','"+NombrePromocion.getDescripcion()+
                                                                "','"+NombrePromocion.getEstado()+
                                                                "', sysdate()"+
                                                                ",'"+NombrePromocion.getUsuarioCreacion()+"'"+
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
    
    // SI SE USA
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
    // SI SE USA
    public List<Clasificacion> getAllClasificacion () throws SQLException{
        if (seteo()) {
             List<Clasificacion> clasificaciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_clasificacion where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoClasificacion(Clasificacion clasificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (clasificacion.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_clasificacion  WHERE id_clasificacion ="+clasificacion.getIdClasificacion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_clasificacion set estado='"+ clasificacion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+clasificacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_clasificacion ="+clasificacion.getIdClasificacion().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                 try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_clasificacion set estado='"+ clasificacion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+clasificacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_clasificacion ="+clasificacion.getIdClasificacion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }     
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    // SI SE USA
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
    // SI SE USA
    public List<Distribucion> getAllDistribucion () throws SQLException{
        if (seteo()) {
            List<Distribucion> distribuciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_distribucion where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoDistribucion(Distribucion distribucion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (distribucion.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_distribucion WHERE id_distribucion ="+distribucion.getIdDistribucion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_distribucion set estado='"+ distribucion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+distribucion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_distribucion ="+distribucion.getIdDistribucion().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_distribucion set estado='"+ distribucion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+distribucion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_distribucion ="+distribucion.getIdDistribucion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }      
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    //PROCEDENCIA
    // SI SE USA
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
    // SI SE USA
    public List<Procedencia> getAllProcedencia() throws SQLException{
        if (seteo()) {
            List<Procedencia> procedencias = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_procedencia where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoProcedencia(Procedencia procedencia) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (procedencia.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_procedencia WHERE id_procedencia ="+procedencia.getIdProcedencia().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_procedencia set estado='"+ procedencia.getEstado()+"' "+
                                                                " , usuario_modificacion='"+procedencia.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_procedencia ="+procedencia.getIdProcedencia().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_procedencia set estado='"+ procedencia.getEstado()+"' "+
                                                                " , usuario_modificacion='"+procedencia.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_procedencia ="+procedencia.getIdProcedencia().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }       
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    //PRODUCTORA
    // SI SE USA
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
    // SI SE USA
    public List<Productora> getAllProductora() throws SQLException{
        if (seteo()) {
            List<Productora> productoras = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_productora where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoProductora(Productora productora) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (productora.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_productora WHERE id_productora ="+productora.getIdProductora().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_productora set estado='"+ productora.getEstado()+"' "+
                                                                " , usuario_modificacion='"+productora.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_productora ="+productora.getIdProductora().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                 try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_productora set estado='"+ productora.getEstado()+"' "+
                                                                " , usuario_modificacion='"+productora.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_productora ="+productora.getIdProductora().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }       
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    //SALAS
    // SI SE USA
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
    // SI SE USA
    public List<Sala> getAllSala() throws SQLException{
        if (seteo()) {
            List<Sala> salas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_sala where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoSala(Sala sala) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (sala.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_sala WHERE id_sala ="+sala.getIdSala().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala set estado='"+ sala.getEstado()+"' "+
                                                                " , usuario_modificacion='"+sala.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala ="+sala.getIdSala().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala set estado='"+ sala.getEstado()+"' "+
                                                                " , usuario_modificacion='"+sala.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala ="+sala.getIdSala().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            } 
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
    // SI SE USA
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
    
    //SALA MAPA PRINCIPAL Y SECUNDARIO
    // SI SE USA
    public SalaMapa getSalaMapa(Integer idEvento) throws SQLException{
        if (seteo()) {
            SalaMapa salaMapa = new SalaMapa();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT tsm1.*, tm.ruta_imagen FROM tsa_evento e INNER JOIN tsa_sala_mapa tsm1 ON e.id_sala_mapa =tsm1.id_sala_mapa " +
                    "INNER JOIN tsa_mapa tm ON tsm1.id_mapa =tm.id_mapa and e.id_evento= "+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salaMapa.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                    salaMapa.setIdSala(rs.getInt("id_sala"));
                    salaMapa.setIdMapa(rs.getInt("id_mapa"));
                    salaMapa.setRutaImagen(rs.getString("ruta_imagen"));
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
    // SI SE USA
    public String getAsientoDistribucion(Integer idSalaMapa) throws SQLException{
        if (seteo()) {
            SalaMapa salaMapa = new SalaMapa();
            String distribucion="";
            try ( PreparedStatement stmt1 =  cnx.prepareStatement("SELECT * FROM tsa_asiento_distribucion WHERE id_sala_mapa ="+idSalaMapa.toString())) {
                ResultSet rs = stmt1.executeQuery();
                String A="A:";
                String B="B:";
                String C="C:";
                String D="D:";
                String E="E:";
                String F="F:";
                int acumA=0;
                int acumB=0;
                int acumC=0;
                int acumD=0;
                int acumE=0;
                int acumF=0;
                
                while (rs.next()){
                    if (rs.getString("platea").equals("A")) {
                        if (acumA==0) {
                            A=A+rs.getString("fila")+rs.getString("numero"); 
                            acumA++;
                        }else{
                            A=A+","+rs.getString("fila")+rs.getString("numero"); 
                        }
                    }else if (rs.getString("platea").equals("B")) {
                        if (acumB==0) {
                            B=B+rs.getString("fila")+rs.getString("numero"); 
                            acumB++;
                        }else{
                            B=B+","+rs.getString("fila")+rs.getString("numero"); 
                        }
                    }else if (rs.getString("platea").equals("C")) {
                        if (acumC==0) {
                            C=C+rs.getString("fila")+rs.getString("numero"); 
                            acumC++;
                        }else{
                            C=C+","+rs.getString("fila")+rs.getString("numero"); 
                        }
                    }else if (rs.getString("platea").equals("D")) {
                        if (acumD==0) {
                            D=D+rs.getString("fila")+rs.getString("numero"); 
                            acumD++;
                        }else{
                            D=D+","+rs.getString("fila")+rs.getString("numero"); 
                        }
                    }else if (rs.getString("platea").equals("E")) {
                        if (acumE==0) {
                            E=E+rs.getString("fila")+rs.getString("numero"); 
                            acumE++;
                        }else{
                            E=E+","+rs.getString("fila")+rs.getString("numero"); 
                        } 
                    }else if (rs.getString("platea").equals("F")) {
                        if (acumF==0) {
                            F=F+rs.getString("fila")+rs.getString("numero"); 
                            acumF++;
                        }else{
                            F=F+","+rs.getString("fila")+rs.getString("numero"); 
                        }
                    }
                }
                distribucion =A+";"+B+";"+C+";"+D+";"+E+";"+F+";";
                //System.out.println(B);
              //  System.out.println(C);
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                 return null;  
            }
            return distribucion;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<SalaMapa> getAllSalaMapa() throws SQLException{
        if (seteo()) {
             List<SalaMapa> salasMapas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT sm.*, m.nombre ,m.ruta_imagen , s.nombre as 'sala' FROM tsa_sala_mapa sm INNER JOIN tsa_sala s ON sm.id_sala=s.id_sala INNER JOIN tsa_mapa m ON sm.id_mapa=m.id_mapa and sm.estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                SalaMapa salaMapa = new SalaMapa();

                while (rs.next()){
                    salaMapa = new SalaMapa();
                    salaMapa.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                    salaMapa.setIdSala(rs.getInt("id_sala"));
                    salaMapa.setIdMapa(rs.getInt("id_mapa"));
                    salaMapa.setNombre(rs.getString("nombre"));
                    salaMapa.setNombreSala(rs.getString("sala"));
                    salaMapa.setRutaImagen(rs.getString("ruta_imagen"));
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
    // SI SE USA
    public List<SalaMapa> getAllSalaMapa(int id) throws SQLException{
        if (seteo()) {
            List<SalaMapa> salasMapas = new ArrayList<>();
            List<Integer> salas = new ArrayList<>();
            try {
                SalaMapa salaMapa = new SalaMapa();
                PreparedStatement stmt1 =  cnx.prepareStatement("SELECT id_sala_mapa FROM tsa_asiento_distribucion");
                ResultSet rs1 =stmt1.executeQuery();
                while (rs1.next()){
                    if (!salas.contains(rs1.getInt("id_sala_mapa"))) {
                        salas.add(rs1.getInt("id_sala_mapa"));
                    }
                } 
                PreparedStatement stmt =  cnx.prepareStatement("SELECT sm.*, m.nombre ,m.ruta_imagen , s.nombre as 'sala' FROM tsa_sala_mapa sm INNER JOIN tsa_sala s ON sm.id_sala=s.id_sala and sm.id_sala="+id+" INNER JOIN tsa_mapa m ON sm.id_mapa=m.id_mapa and sm.estado !='B'");
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    if (rs.getInt("id_sala")!=1) {
                        salaMapa = new SalaMapa();
                        salaMapa.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                        salaMapa.setIdSala(rs.getInt("id_sala"));
                        salaMapa.setIdMapa(rs.getInt("id_mapa"));
                        salaMapa.setNombre(rs.getString("nombre"));
                        salaMapa.setNombreSala(rs.getString("sala"));
                        salaMapa.setRutaImagen(rs.getString("ruta_imagen"));
                        salaMapa.setEstado(rs.getString("estado"));
                        salasMapas.add(salaMapa);
                    }else{
                        if (salas.contains(rs.getInt("id_sala_mapa"))) {
                        salaMapa = new SalaMapa();
                        salaMapa.setIdSalaMapa(rs.getInt("id_sala_mapa"));
                        salaMapa.setIdSala(rs.getInt("id_sala"));
                        salaMapa.setIdMapa(rs.getInt("id_mapa"));
                        salaMapa.setNombre(rs.getString("nombre"));
                        salaMapa.setNombreSala(rs.getString("sala"));
                        salaMapa.setRutaImagen(rs.getString("ruta_imagen"));
                        salaMapa.setEstado(rs.getString("estado"));
                        salasMapas.add(salaMapa);
                        }else{
                            PreparedStatement  stmt2 =  cnx.prepareStatement("DELETE FROM tsa_sala_mapa WHERE id_sala_mapa ="+rs.getInt("id_sala_mapa"));
                            stmt2.executeUpdate();
                        }
                    }
                        
                    
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
    // SI SE USA
    public boolean updateEstadoSalaMapa(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (salaMapa.getEstado().equals("B")) {
               try (PreparedStatement stmt =  cnx.prepareStatement("CALL delete_sala_mapa("+salaMapa.getIdSalaMapa()+")")) {
                    ResultSet rs =stmt.executeQuery();
                    if (rs.next()) {
                        System.out.println(rs.getInt("MYSQL_ERROR"));
                        PreparedStatement stmt1 =  cnx.prepareStatement("UPDATE tsa_sala_mapa set estado='"+ salaMapa.getEstado()+"' "+
                                                                " , usuario_modificacion='"+salaMapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala_mapa ="+salaMapa.getIdSalaMapa().toString());
                        stmt1.executeUpdate();
                        check = true;
                    }
                } catch (SQLException sqle) { 
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_sala_mapa set estado='"+ salaMapa.getEstado()+"' "+
                                                                " , usuario_modificacion='"+salaMapa.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_sala_mapa ="+salaMapa.getIdSalaMapa().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            } 
                   
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
    public boolean updateSalaMapaP(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="CALL edit_salaMapaP ("+salaMapa.getIdMapa()+","+salaMapa.getIdSalaMapa()+",'"+salaMapa.getNombre()+"','"+salaMapa.getUsuarioCreacion()+"')";    
           // System.out.println(comando);
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
                ResultSet rs = stmt.executeQuery();

                if (!salaMapa.getRutaImagen().equals("none")) {
                    editar_mapa(salaMapa.getRutaImagen(),salaMapa.getUsuarioCreacion(),salaMapa.getIdMapaMapa());
                    plateas_mapa(salaMapa.getRutaImagen(),salaMapa.getUsuarioCreacion(),salaMapa.getIdMapaMapa());
                }
                 check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
              
            return check;
        }else{
          return false;  
        }
        
    }
    // SI SE USA
    public boolean updateSalaMapaE(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="CALL edit_salaMapaE ("+salaMapa.getIdMapa()+",'"+salaMapa.getRutaImagen()+"',"+salaMapa.getIdSalaMapa()+",'"+salaMapa.getNombre()+"','"+salaMapa.getUsuarioCreacion()+"')";    
           // System.out.println(comando);
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
                ResultSet rs = stmt.executeQuery();
                check = true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
              
            return check;
        }else{
          return false;  
        }
        
    }
    // SI SE USA
    public boolean insertSalaMapa(SalaMapa salaMapa) throws SQLException{
        if (seteo()) {
            boolean check = false;
             String comando="";
            if (salaMapa.getIdSala().equals(1)) {
                comando="CALL sala_mapa("+salaMapa.getIdSala()
                                            +",'"+salaMapa.getNombre()
                                            +"','none"
                                            +"','"+salaMapa.getEstado()
                                            +"','"+salaMapa.getUsuarioCreacion()+"')";
            }else{
                //System.out.println("adsdas");
                comando="CALL sala_mapa("+salaMapa.getIdSala()
                                        +",'"+salaMapa.getNombre()
                                        +"','"+salaMapa.getRutaImagen()
                                        +"','"+salaMapa.getEstado()
                                        +"','"+salaMapa.getUsuarioCreacion()+"')";
            }
            
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
               ResultSet rs =stmt.executeQuery();
               if (salaMapa.getIdSala().equals(1)) {
                    int id=0;
                     while (rs.next()){
                         id=Integer.parseInt(rs.getString(1).trim());
                     }
                     PreparedStatement stmt1 =  cnx.prepareStatement("SELECT * FROM tsa_sala_mapa WHERE id_mapa ="+id);
                     rs =stmt1.executeQuery();
                     int id1=0;
                     while (rs.next()){
                          id1=Integer.parseInt(rs.getString("id_sala_mapa").trim());

                     }
                     String comando2=ordenar_mapa(salaMapa.getRutaImagen(),salaMapa.getUsuarioCreacion(),id1);
                  //   System.out.println(comando2);
                     stmt1 =  cnx.prepareStatement("INSERT INTO teatro.tsa_asiento_distribucion (numero,fila,`lateral`,platea,estado,fecha_creacion,id_sala_mapa,usuario_creacion) VALUES "+comando2); 
                     stmt1.executeUpdate();
                     plateas_mapa(salaMapa.getRutaImagen(),salaMapa.getUsuarioCreacion(),id1);
                }
                check = true;
            } catch (SQLException sqle) { 
                Logger.getLogger(Teatro.class.getName()).log(Level.SEVERE, null,sqle);
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }     
            return check;
        }else{
          return false;  
        }
        
    }
    
    //DIBUJAR MAPA
    // SI SE USA
    public String ordenar_mapa(String data,String usuario, int id) {
        LinkedList<Asiento> A = new LinkedList<Asiento>();
        LinkedList<Asiento> B = new LinkedList<Asiento>();
        LinkedList<Asiento> C = new LinkedList<Asiento>();
        LinkedList<Asiento> D = new LinkedList<Asiento>();
        LinkedList<Asiento> E = new LinkedList<Asiento>();
        LinkedList<Asiento> F = new LinkedList<Asiento>();
        LinkedList<Asiento> G = new LinkedList<Asiento>();
        LinkedList<Asiento> H = new LinkedList<Asiento>();
        LinkedList<Asiento> J = new LinkedList<Asiento>();
        LinkedList<Asiento> K = new LinkedList<Asiento>();
        LinkedList<Asiento> L = new LinkedList<Asiento>();
        LinkedList<Asiento> M = new LinkedList<Asiento>();
        LinkedList<Asiento> N = new LinkedList<Asiento>();
        LinkedList<Asiento> O = new LinkedList<Asiento>();
        LinkedList<Asiento> P = new LinkedList<Asiento>();
        LinkedList<Asiento> Q = new LinkedList<Asiento>();
        LinkedList<Asiento> R = new LinkedList<Asiento>();
        LinkedList<Asiento> S = new LinkedList<Asiento>();
        LinkedList<Asiento> T = new LinkedList<Asiento>();
        LinkedList<Asiento> U = new LinkedList<Asiento>();
        LinkedList<Asiento> V = new LinkedList<Asiento>();
        LinkedList<Asiento> W = new LinkedList<Asiento>();

        String[] parts = data.split(";");
        //separo las plateas
        for (int i = 0; i < parts.length; i++) {
            String [] parts2 = parts[i].split(":");
            //separo tipo con asientos
            if (parts2.length>1) {
                String [] parts3 = parts2[1].split(",");
                //separo la letra con numero asiento
                String comando2="";
                int acum=0;
                for (int k = 0; k <  parts3.length; k++) {
                    Asiento asiento=new Asiento();
                    int numero=Integer.parseInt(parts3[k].substring(1).trim());
                    asiento.setFila(parts3[k].substring(0,1).trim());
                    asiento.setNumero(numero);
                    asiento.setPlatea(parts2[0].trim());

                     if (numero % 2 == 0 && numero<30) {
                        asiento.setLateral("I");
                    } else if (numero % 2 != 0 && numero<30) {
                        asiento.setLateral("D");
                    }else  {
                        asiento.setLateral("C");    
                     }    
                    if (parts3[k].substring(0,1).trim().equals("A")) {
                        A.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("B")) {
                        B.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("C")) {
                        C.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("D")) {
                        D.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("E")) {
                        E.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("F")) {
                        F.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("G")) {
                        G.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("H")) {
                        H.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("J")) {
                        J.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("K")) {
                        K.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("L")) {
                        L.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("M")) {
                        M.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("N")) {
                        N.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("O")) {
                        O.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("P")) {
                        P.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("Q")) {
                        Q.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("R")) {
                        R.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("S")) {
                        S.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("T")) {
                        T.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("U")) {
                        U.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("V")) {
                        V.add(asiento);
                    }else if (parts3[k].substring(0,1).trim().equals("W")) {
                        W.add(asiento);
                    }
                }
            }
        }
        
        Collections.sort(A);
        int acum=0;
        String comando2="";
        for (Asiento a : A) {
            if (acum==0) {
                comando2=comando2 +"("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";
                acum++;
            }else{
                comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
            }  
        }
        Collections.sort(B);
        for (Asiento a : B) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(C);
        for (Asiento a : C) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(D);
        for (Asiento a : D) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(E);
        for (Asiento a : E) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(F);
        for (Asiento a : F) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(G);
        for (Asiento a : G) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(H);
        for (Asiento a : H) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(J);
        for (Asiento a : J) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(K);
        for (Asiento a : K) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(L);
        for (Asiento a : L) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(M);
        for (Asiento a : M) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(N);
        for (Asiento a : N) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
         Collections.sort(O);
        for (Asiento a : O) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(P);
        for (Asiento a : P) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(Q);
        for (Asiento a : Q) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(R);
        for (Asiento a : R) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(S);
        for (Asiento a : S) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(T);
        for (Asiento a : T) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(U);
        for (Asiento a : U) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(V);
        for (Asiento a : V) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
        Collections.sort(W);
        for (Asiento a : W) {
            comando2=comando2 +",("+a.getNumero()+",'"+a.getFila()+"','"+a.getLateral()+"','"+a.getPlatea()+"','A',now(),"+id+",'"+usuario+"')";            
        }
       return comando2;
    }
    // SI SE USA
    public boolean plateas_mapa(String data,String usuario, int id) {
        String comando2="";
        boolean check = false;
        String[] parts = data.split(";");
         Map<String, Integer> map = (Map<String, Integer>)new LinkedHashMap();
        //separo las plateas
        for (int i = 0; i < parts.length; i++) {
            String [] parts2 = parts[i].split(":");
            //System.out.println(parts2[0]);
            //separo tipo con asientos
            if (parts2.length>1) {
                String [] parts3 = parts2[1].split(",");
                //separo la letra con numero asiento
                map.put("PLATEA "+parts2[0].trim(), parts3.length);
                //System.out.println();
                 comando2="";
                int acum=0;
            }else{
                map.put("PLATEA "+parts2[0].trim(), 0);
                //System.out.println(0);
            }
        }
        try {
            List<Integer> salas = new ArrayList<>();
            SalaMapa salaMapa = new SalaMapa();
            PreparedStatement stmt1 =  cnx.prepareStatement("SELECT id_sala_mapa FROM tsa_platea_distribucion");
            ResultSet rs1 =stmt1.executeQuery();
            while (rs1.next()){
                if (!salas.contains(rs1.getInt("id_sala_mapa"))) {
                    salas.add(rs1.getInt("id_sala_mapa"));
                }
            } 
            PreparedStatement stmt;
            
            if (!salas.contains(id)) {
                for (Map.Entry<String, Integer> entry : map.entrySet()) {
                    stmt =  cnx.prepareStatement("INSERT INTO tsa_platea_distribucion (nombre,aforo,id_sala_mapa,usuario_creacion) VALUES ('"+entry.getKey()+"'"+
                                                                ",'"+entry.getValue()+"',"+id+",'"+usuario+"')");
                    stmt.executeUpdate();
                  //  System.out.println("clave=" + entry.getKey() + ", valor=" + entry.getValue());
                }
                     
            }else{
                 stmt1 =  cnx.prepareStatement("SELECT * FROM tsa_platea_distribucion WHERE id_sala_mapa ="+id);
                ResultSet rs =stmt1.executeQuery();
                while (rs.next()){
                    for (Map.Entry<String, Integer> entry : map.entrySet()) {
                        if (entry.getKey().equals(rs.getString("nombre"))) {
                            stmt =  cnx.prepareStatement("UPDATE tsa_platea_distribucion set aforo='"+ entry.getValue()+"' "+
                                                                    " , usuario_modificacion='"+usuario+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_platea_distribucion ="+rs.getString("id_platea_distribucion"));
                            stmt.executeUpdate();
                        }
                    }
                } 
            }
            check=true;
        } catch (SQLException sqle) { 
          System.out.println("Error en la ejecución de la inserción:" 
            + sqle.getErrorCode() + " " + sqle.getMessage()); 
        }      
       
       return check;
    }
    // SI SE USA
    public void editar_mapa(String data,String usuario, int id) throws SQLException {
        Map<String, String> map = (Map<String, String>)new LinkedHashMap();

        String[] parts = data.split(";");
        //separo las plateas
        for (int i = 0; i < parts.length; i++) {
            String [] parts2 = parts[i].split(":");
            //separo tipo con asientos
            //System.out.println(parts2.length);
            if (parts2.length>1) {
                String [] parts3 = parts2[1].split(",");
                //separo la letra con numero asiento
                String comando2="";
                int acum=0;
                //System.out.println(parts3[0].trim());
                for (int k = 0; k <  parts3.length; k++) {
                    map.put(parts3[k].trim(), parts2[0].trim());
                }
            }
        }
        PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_asiento_distribucion WHERE id_sala_mapa ="+id);
        ResultSet rs = stmt.executeQuery();

        while (rs.next()){
             //System.out.println(rs.getString("fila")+rs.getString("numero"));
                if (!map.get(rs.getString("fila").trim()+rs.getString("numero").trim()).equals(rs.getString("platea").trim())) {
                    PreparedStatement stmt1 =  cnx.prepareStatement("UPDATE teatro.tsa_asiento_distribucion SET platea='"+map.get(rs.getString("fila").trim()+rs.getString("numero").trim())+
                                                                        " ', usuario_modificacion='"+usuario+"', fecha_modificacion=now()"+
                                                                        " WHERE id_asiento_distribucion="+rs.getInt("id_asiento_distribucion"));
                     stmt1.executeUpdate();
                    //System.out.println(map.get(rs.getString("fila")+rs.getString("numero")));
                    //System.out.println(rs.getString("fila")+rs.getString("numero"));
                }
        }

    }
    //SI SE USA
    public String dibujar_mapa(Integer idSalaMapa) throws SQLException{
        LinkedList<Asiento> A = new LinkedList<Asiento>();
        LinkedList<Asiento> B = new LinkedList<Asiento>();
        LinkedList<Asiento> C = new LinkedList<Asiento>();
        LinkedList<Asiento> D = new LinkedList<Asiento>();
        LinkedList<Asiento> E = new LinkedList<Asiento>();
        LinkedList<Asiento> F = new LinkedList<Asiento>();
        LinkedList<Asiento> G = new LinkedList<Asiento>();
        LinkedList<Asiento> H = new LinkedList<Asiento>();
        LinkedList<Asiento> J = new LinkedList<Asiento>();
        LinkedList<Asiento> K = new LinkedList<Asiento>();
        LinkedList<Asiento> L = new LinkedList<Asiento>();
        LinkedList<Asiento> M = new LinkedList<Asiento>();
        LinkedList<Asiento> N = new LinkedList<Asiento>();
        LinkedList<Asiento> O = new LinkedList<Asiento>();
        LinkedList<Asiento> P = new LinkedList<Asiento>();
        LinkedList<Asiento> Q = new LinkedList<Asiento>();
        LinkedList<Asiento> R = new LinkedList<Asiento>();
        LinkedList<Asiento> S = new LinkedList<Asiento>();
        LinkedList<Asiento> T = new LinkedList<Asiento>();
        LinkedList<Asiento> U = new LinkedList<Asiento>();
        LinkedList<Asiento> V = new LinkedList<Asiento>();
        LinkedList<Asiento> W = new LinkedList<Asiento>();
       try ( PreparedStatement stmt1 =  cnx.prepareStatement("SELECT * FROM tsa_asiento_distribucion WHERE id_sala_mapa ="+idSalaMapa.toString())) {
            ResultSet rs = stmt1.executeQuery();
            
            while (rs.next()){
                Asiento asiento =new Asiento();
                asiento.setFila(rs.getString("fila"));
                asiento.setPlatea(rs.getString("platea"));
                asiento.setLateral(rs.getString("lateral"));
                asiento.setEstado(rs.getString("estado"));
                asiento.setNumero(Integer.parseInt(rs.getString("numero").trim()));
                if (asiento.getFila().equals("A")) {
                    A.add(asiento);
                }else if (asiento.getFila().equals("B")) {
                    B.add(asiento);
                }else if (asiento.getFila().equals("C")) {
                    C.add(asiento);
                }else if (asiento.getFila().equals("D")) {
                    D.add(asiento);
                }else if (asiento.getFila().equals("E")) {
                    E.add(asiento);
                }else if (asiento.getFila().equals("F")) {
                    F.add(asiento);
                }else if (asiento.getFila().equals("G")) {
                    G.add(asiento);
                }else if (asiento.getFila().equals("H")) {
                    H.add(asiento);
                }else if (asiento.getFila().equals("J")) {
                    J.add(asiento);
                }else if (asiento.getFila().equals("K")) {
                    K.add(asiento);
                }else if (asiento.getFila().equals("L")) {
                    L.add(asiento);
                }else if (asiento.getFila().equals("M")) {
                    M.add(asiento);
                }else if (asiento.getFila().equals("N")) {
                    N.add(asiento);
                }else if (asiento.getFila().equals("O")) {
                    O.add(asiento);
                }else if (asiento.getFila().equals("P")) {
                    P.add(asiento);
                }else if (asiento.getFila().equals("Q")) {
                    Q.add(asiento);
                }else if (asiento.getFila().equals("R")) {
                    R.add(asiento);
                }else if (asiento.getFila().equals("S")) {
                    S.add(asiento);
                }else if (asiento.getFila().equals("T")) {
                    T.add(asiento);
                }else if (asiento.getFila().equals("U")) {
                    U.add(asiento);
                }else if (asiento.getFila().equals("V")) {
                    V.add(asiento);
                }else if (asiento.getFila().equals("W")) {
                    W.add(asiento);
                }
            }
        } catch (SQLException sqle) { 
          System.out.println("Error en la ejecución de la consulta:" 
            + sqle.getErrorCode() + " " + sqle.getMessage()); 
        }
        
                
        Collections.sort(A);
        int acum=0;
        String comando2="A:";
        for (Asiento a : A) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }  
        }
        comando2=comando2+";B:";
        acum=0;
        Collections.sort(B);
        for (Asiento a : B) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }             
        }
        comando2=comando2+";C:";
        acum=0;
        Collections.sort(C);
        for (Asiento a : C) {
           if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";D:";
        acum=0;
        Collections.sort(D);
        for (Asiento a : D) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";E:";
        acum=0;
        Collections.sort(E);
        for (Asiento a : E) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";F:";
        acum=0;
        Collections.sort(F);
        for (Asiento a : F) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";G:";
        acum=0;
        Collections.sort(G);
        for (Asiento a : G) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";H:";
        acum=0;
        Collections.sort(H);
        for (Asiento a : H) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";J:";
        acum=0;
        Collections.sort(J);
        for (Asiento a : J) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";K:";
        acum=0;
        Collections.sort(K);
        for (Asiento a : K) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";L:";
        acum=0;
        Collections.sort(L);
        for (Asiento a : L) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";M:";
        acum=0;
        Collections.sort(M);
        for (Asiento a : M) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";N:";
        acum=0;
        Collections.sort(N);
        for (Asiento a : N) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";O:";
        acum=0;
         Collections.sort(O);
        for (Asiento a : O) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";P:";
        acum=0;
        Collections.sort(P);
        for (Asiento a : P) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";Q:";
        acum=0;
        Collections.sort(Q);
        for (Asiento a : Q) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";R:";
        acum=0;
        Collections.sort(R);
        for (Asiento a : R) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";S:";
        acum=0;
        Collections.sort(S);
        for (Asiento a : S) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";T:";
        acum=0;
        Collections.sort(T);
        for (Asiento a : T) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";U:";
        acum=0;
        Collections.sort(U);
        for (Asiento a : U) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";V:";
        acum=0;
        Collections.sort(V);
        for (Asiento a : V) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";W:";
        acum=0;
        Collections.sort(W);
        for (Asiento a : W) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        //System.out.println(comando2);
        return comando2;
    }
    // SI SE USA
    public String dibujar_mapa_evento(Integer idFuncion) throws SQLException{
        LinkedList<Asiento> A = new LinkedList<Asiento>();
        LinkedList<Asiento> B = new LinkedList<Asiento>();
        LinkedList<Asiento> C = new LinkedList<Asiento>();
        LinkedList<Asiento> D = new LinkedList<Asiento>();
        LinkedList<Asiento> E = new LinkedList<Asiento>();
        LinkedList<Asiento> F = new LinkedList<Asiento>();
        LinkedList<Asiento> G = new LinkedList<Asiento>();
        LinkedList<Asiento> H = new LinkedList<Asiento>();
        LinkedList<Asiento> J = new LinkedList<Asiento>();
        LinkedList<Asiento> K = new LinkedList<Asiento>();
        LinkedList<Asiento> L = new LinkedList<Asiento>();
        LinkedList<Asiento> M = new LinkedList<Asiento>();
        LinkedList<Asiento> N = new LinkedList<Asiento>();
        LinkedList<Asiento> O = new LinkedList<Asiento>();
        LinkedList<Asiento> P = new LinkedList<Asiento>();
        LinkedList<Asiento> Q = new LinkedList<Asiento>();
        LinkedList<Asiento> R = new LinkedList<Asiento>();
        LinkedList<Asiento> S = new LinkedList<Asiento>();
        LinkedList<Asiento> T = new LinkedList<Asiento>();
        LinkedList<Asiento> U = new LinkedList<Asiento>();
        LinkedList<Asiento> V = new LinkedList<Asiento>();
        LinkedList<Asiento> W = new LinkedList<Asiento>();
       try ( PreparedStatement stmt1 =  cnx.prepareStatement("SELECT * FROM tsa_distribucion WHERE id_funcion ="+idFuncion.toString())) {
            ResultSet rs = stmt1.executeQuery();
            
            while (rs.next()){
                Asiento asiento =new Asiento();
                asiento.setFila(rs.getString("fila"));
                asiento.setPlatea(rs.getString("platea"));
                asiento.setLateral(rs.getString("lateral"));
                asiento.setEstado(rs.getString("estado"));
                asiento.setNumero(Integer.parseInt(rs.getString("numero").trim()));
                if (asiento.getFila().equals("A")) {
                    A.add(asiento);
                }else if (asiento.getFila().equals("B")) {
                    B.add(asiento);
                }else if (asiento.getFila().equals("C")) {
                    C.add(asiento);
                }else if (asiento.getFila().equals("D")) {
                    D.add(asiento);
                }else if (asiento.getFila().equals("E")) {
                    E.add(asiento);
                }else if (asiento.getFila().equals("F")) {
                    F.add(asiento);
                }else if (asiento.getFila().equals("G")) {
                    G.add(asiento);
                }else if (asiento.getFila().equals("H")) {
                    H.add(asiento);
                }else if (asiento.getFila().equals("J")) {
                    J.add(asiento);
                }else if (asiento.getFila().equals("K")) {
                    K.add(asiento);
                }else if (asiento.getFila().equals("L")) {
                    L.add(asiento);
                }else if (asiento.getFila().equals("M")) {
                    M.add(asiento);
                }else if (asiento.getFila().equals("N")) {
                    N.add(asiento);
                }else if (asiento.getFila().equals("O")) {
                    O.add(asiento);
                }else if (asiento.getFila().equals("P")) {
                    P.add(asiento);
                }else if (asiento.getFila().equals("Q")) {
                    Q.add(asiento);
                }else if (asiento.getFila().equals("R")) {
                    R.add(asiento);
                }else if (asiento.getFila().equals("S")) {
                    S.add(asiento);
                }else if (asiento.getFila().equals("T")) {
                    T.add(asiento);
                }else if (asiento.getFila().equals("U")) {
                    U.add(asiento);
                }else if (asiento.getFila().equals("V")) {
                    V.add(asiento);
                }else if (asiento.getFila().equals("W")) {
                    W.add(asiento);
                }
            }
        } catch (SQLException sqle) { 
          System.out.println("Error en la ejecución de la consulta:" 
            + sqle.getErrorCode() + " " + sqle.getMessage()); 
        }
        
                
        Collections.sort(A);
        int acum=0;
        String comando2="A:";
        for (Asiento a : A) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }  
        }
        comando2=comando2+";B:";
        acum=0;
        Collections.sort(B);
        for (Asiento a : B) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }             
        }
        comando2=comando2+";C:";
        acum=0;
        Collections.sort(C);
        for (Asiento a : C) {
           if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";D:";
        acum=0;
        Collections.sort(D);
        for (Asiento a : D) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";E:";
        acum=0;
        Collections.sort(E);
        for (Asiento a : E) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";F:";
        acum=0;
        Collections.sort(F);
        for (Asiento a : F) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";G:";
        acum=0;
        Collections.sort(G);
        for (Asiento a : G) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";H:";
        acum=0;
        Collections.sort(H);
        for (Asiento a : H) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";J:";
        acum=0;
        Collections.sort(J);
        for (Asiento a : J) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";K:";
        acum=0;
        Collections.sort(K);
        for (Asiento a : K) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }              
        }
        comando2=comando2+";L:";
        acum=0;
        Collections.sort(L);
        for (Asiento a : L) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";M:";
        acum=0;
        Collections.sort(M);
        for (Asiento a : M) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";N:";
        acum=0;
        Collections.sort(N);
        for (Asiento a : N) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";O:";
        acum=0;
         Collections.sort(O);
        for (Asiento a : O) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";P:";
        acum=0;
        Collections.sort(P);
        for (Asiento a : P) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";Q:";
        acum=0;
        Collections.sort(Q);
        for (Asiento a : Q) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";R:";
        acum=0;
        Collections.sort(R);
        for (Asiento a : R) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";S:";
        acum=0;
        Collections.sort(S);
        for (Asiento a : S) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";T:";
        acum=0;
        Collections.sort(T);
        for (Asiento a : T) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";U:";
        acum=0;
        Collections.sort(U);
        for (Asiento a : U) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }               
        }
        comando2=comando2+";V:";
        acum=0;
        Collections.sort(V);
        for (Asiento a : V) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        comando2=comando2+";W:";
        acum=0;
        Collections.sort(W);
        for (Asiento a : W) {
            if (acum==0) {
                comando2=comando2 +a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();
                acum++;
            }else{
                comando2=comando2 +","+a.getFila()+"-"+a.getNumero()+"-"+a.getLateral()+"-"+a.getPlatea()+"-"+a.getEstado();          
            }                
        }
        //System.out.println(comando2);
        return comando2;
    }
    
    //TIPO DE ESPECTACULO
    // SI SE USA
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
    // SI SE USA
    public List<TipoEspectaculo> getAllTipoEspectaculo() throws SQLException{
        if (seteo()) {
            List<TipoEspectaculo> tiposEspectaculos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_espectaculo where estado !='B'")) {
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
    // SI SE USA
    public boolean updateEstadoTipoEspectaculo(TipoEspectaculo tipoEspectaculo) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (tipoEspectaculo.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_tipo_espectaculo WHERE id_tipo_espectaculo ="+tipoEspectaculo.getIdTipoEspectaculo().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_espectaculo set estado='"+ tipoEspectaculo.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEspectaculo.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tipo_espectaculo ="+tipoEspectaculo.getIdTipoEspectaculo().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_espectaculo set estado='"+ tipoEspectaculo.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEspectaculo.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_tipo_espectaculo ="+tipoEspectaculo.getIdTipoEspectaculo().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            } 
            return check;
        }else{
          return false;  
        }
    }
    // SI SE USA
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
   // SI SE USA
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
   
    //TIPO DE EVENTO
    //SI SE USA
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
     //SI SE USA
    public List<TipoEvento> getAllTipoEvento() throws SQLException{
        if (seteo()) {
            List<TipoEvento> tiposEventos = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tipo_evento where estado !='B'")) {
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
     //SI SE USA
    public boolean updateEstadoTipoEvento(TipoEvento tipoEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (tipoEvento.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_tipo_evento WHERE id_tipo_evento ="+tipoEvento.getIdTipoEvento().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_evento set estado='"+ tipoEvento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_evento ="+tipoEvento.getIdTipoEvento().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_tipo_evento set estado='"+ tipoEvento.getEstado()+"' "+
                                                                " , usuario_modificacion='"+tipoEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                               " WHERE id_tipo_evento ="+tipoEvento.getIdTipoEvento().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            } 

            return check;
        }else{
          return false;  
        }
    }
     //SI SE USA
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
     //SI SE USA
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
    
    
    
    //EVENTOS VENTA-INFORMATIVO-GRATUITO

    // SI SE USA
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
                    evento.setIdProductora(rs.getString("id_productora"));
                    evento.setIdSalaMapa(rs.getString("id_sala_mapa"));
                    evento.setIdTipoEvento(rs.getString("id_tipo_evento"));
                    evento.setIdTipoEspectaculo(rs.getString("id_tipo_espectaculo"));
                    evento.setIdCategoria(rs.getString("id_categoria"));
                    evento.setIdClasificacion(rs.getString("id_clasificacion"));
                    evento.setIdProcedencia(rs.getString("id_procedencia"));
                    evento.setAforo(rs.getInt("aforo"));
                    evento.setSinopsis(rs.getString("sinopsis"));
                    evento.setElenco(rs.getString("elenco"));
                    evento.setRutaImagen(rs.getString("ruta_imagen"));
                    evento.setRutaVideo(rs.getString("ruta_video"));             
                    evento.setTipoEvento(rs.getString("tipo"));
                    evento.setVendidos(rs.getInt("vendido"));
                    evento.setRutaFormulario(rs.getString("ruta_formulario"));
                    evento.setEstado(rs.getString("estado"));
                    evento.setPreventa(rs.getString("preventa"));
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
    // SI SE USA
    public Evento getEventoDestacado() throws SQLException{
        if (seteo()) {
             Evento evento = new Evento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT te.* FROM tsa_evento_estrella tee INNER JOIN tsa_evento te ON te.id_evento =tee.id_evento and tee.id_evento_estrella =1")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setNombre(rs.getString("nombre"));
                    evento.setTipoEvento(rs.getString("tipo"));
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
    // SI SE USA
    public Evento getEvento_basico(Integer idEvento) throws SQLException{
        if (seteo()) {
             Evento evento = new Evento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT te.*, tsm.id_sala ,tsm.id_mapa FROM tsa_evento te " +
                                                                "INNER JOIN  tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa  and te.id_evento="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setNombre(rs.getString("nombre"));
                    evento.setDuracion(rs.getFloat("duracion"));
                    evento.setFechaInicial(rs.getDate("fecha_inicial"));
                    evento.setFechaFinal(rs.getDate("fecha_final"));
                    evento.setIdProductora(rs.getString("productora"));
                    evento.setIdSalaMapa(rs.getString("id_sala_mapa"));
                    evento.setIdTipoEvento(rs.getString("id_tipo_evento"));
                    evento.setIdTipoEspectaculo(rs.getString("id_tipo_espectaculo"));
                    evento.setIdCategoria(rs.getString("id_categoria"));
                    evento.setIdClasificacion(rs.getString("id_clasificacion"));
                    evento.setIdProcedencia(rs.getString("id_procedencia"));
                    evento.setAforo(rs.getInt("aforo"));
                    evento.setVendidos(rs.getInt("vendido"));
                    evento.setTipoEvento(rs.getString("tipo"));
                    evento.setIdMapa(rs.getString("id_mapa"));
                    evento.setIdSala(rs.getString("id_sala"));
                    evento.setEstado(rs.getString("estado"));
                    evento.setPreventa(rs.getString("preventa"));
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
    // SI SE USA
     public Evento getEvento_sinopsis(Integer idEvento) throws SQLException{
        if (seteo()) {
             Evento evento = new Evento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT te.id_evento, te.sinopsis, te.descripcion2 FROM tsa_evento te WHERE te.id_evento="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setSinopsis(rs.getString("sinopsis"));
                    evento.setProductora(rs.getString("descripcion2"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            //System.out.println(evento);
            return evento;
        }else{
          return null;  
        }
       
    }
     // SI SE USA
     public Evento getEvento_video(Integer idEvento) throws SQLException{
        if (seteo()) {
             Evento evento = new Evento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_evento te WHERE te.id_evento="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setRutaVideo(rs.getString("ruta_video"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            //System.out.println(evento);
            return evento;
        }else{
          return null;  
        }
       
    } 
     // SI SE USA
    public List<Evento> getAllEventoA (String tipo) throws SQLException{
        if (seteo()) {
            List<Evento> eventos = new ArrayList<>();
             String comando;
            if (tipo.equals("T")) {
                comando="CALL all_evento()";
            }else if (tipo.equals("P")) {
                comando="CALL all_evento_P()";
            }else if (tipo.equals("AV")) {
                comando="CALL all_eventoV_A()";
            }else {
                comando="CALL all_evento_A('"+tipo+"')";
                
            }
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
                ResultSet rs = stmt.executeQuery();
                Evento evento = new Evento();

                while (rs.next()){
                   evento = new Evento();
                    evento.setIdEvento(rs.getInt("id_evento"));
                    evento.setNombre(rs.getString("nombre"));
                    evento.setDuracion(rs.getFloat("duracion"));
                    evento.setFechaInicial(rs.getDate("fecha_inicial"));
                    evento.setFechaFinal(rs.getDate("fecha_final"));
                    evento.setIdProductora(rs.getString("Nproductora"));
                    evento.setIdSalaMapa(rs.getString("sala"));
                    evento.setIdTipoEvento(rs.getString("Tevento"));
                    evento.setIdTipoEspectaculo(rs.getString("espectaculo"));
                    evento.setIdCategoria(rs.getString("categoria"));
                    evento.setIdClasificacion(rs.getString("clasificacion"));
                    evento.setIdProcedencia(rs.getString("procedencia"));
                    evento.setAforo(rs.getInt("aforo"));
                    evento.setVendidos(rs.getInt("vendido"));
                    evento.setTipoEvento(rs.getString("tipo"));
                    evento.setEstado(rs.getString("estado"));
                    eventos.add(evento); 
                    //System.out.println(evento.toStringT());
                } 
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
           // System.out.println(eventos);
            return eventos;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<Evento> getAllEventoB () throws SQLException{
       if (seteo()) {
           List<Evento> eventos = new ArrayList<>();
           try (PreparedStatement stmt =  cnx.prepareStatement("CALL all_evento_B()")) {
               ResultSet rs = stmt.executeQuery();
               Evento evento = new Evento();

               while (rs.next()){
                  evento = new Evento();
                   evento.setIdEvento(rs.getInt("id_evento"));
                   evento.setNombre(rs.getString("nombre"));
                   evento.setDuracion(rs.getFloat("duracion"));
                   evento.setFechaInicial(rs.getDate("fecha_inicial"));
                   evento.setFechaFinal(rs.getDate("fecha_final"));
                   evento.setIdProductora(rs.getString("Nproductora"));
                   evento.setIdSalaMapa(rs.getString("sala"));
                   evento.setIdTipoEvento(rs.getString("Tevento"));
                   evento.setIdTipoEspectaculo(rs.getString("espectaculo"));
                   evento.setIdCategoria(rs.getString("categoria"));
                   evento.setIdClasificacion(rs.getString("clasificacion"));
                   evento.setIdProcedencia(rs.getString("procedencia"));
                   evento.setAforo(rs.getInt("aforo"));
                   evento.setVendidos(rs.getInt("vendido"));
                   evento.setTipoEvento(rs.getString("tipo"));
                   evento.setEstado(rs.getString("estado"));
                   eventos.add(evento); 
               } 
           } catch (SQLException sqle) { 
             System.out.println("Error en la ejecución de la consulta:" 
               + sqle.getErrorCode() + " " + sqle.getMessage()); 
           }
           //System.out.println(eventos);
           return eventos;
       }else{
         return null;  
       }

   }
    // SI SE USA
    public String updateEstadoEvento(Evento evento) throws SQLException{
        if (seteo()) {
            String check = "false";
            if (evento.getEstado().equals("B")) {
                String comando="CALL delete_evento("+evento.getIdEvento()+")";
                PreparedStatement stmt;
                try {
                   stmt =  cnx.prepareStatement(comando);
                   ResultSet rs =stmt.executeQuery();
                    if (rs.next()) {
                        System.out.println(rs.getInt("MYSQL_ERROR"));
                        stmt =  cnx.prepareStatement("UPDATE tsa_evento set estado='"+ evento.getEstado()+"' "+
                                                                    " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_evento ="+evento.getIdEvento().toString());
                        stmt.executeUpdate();
                        //System.out.println("false");
                        check = "Se bloqueo el evento correctamente";
                    }
                } catch (SQLException sqle) { 
                    //System.out.println("true");
                    check = "Se eliminó el evento correctamente";
                }  
            }else{
                
                try {
                    if (evento.getEstado().equals("P")) {
                        
                        PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set estado='A' "+
                                                                    " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_evento ="+evento.getIdEvento().toString());
                        stmt.executeUpdate();
                        check = "Se edito el evento correctamente";
                    }else{
                          PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set estado='"+ evento.getEstado()+"' "+
                                                                    " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_evento ="+evento.getIdEvento().toString());
                        stmt.executeUpdate();
                        check = "Se edito el evento correctamente";
                    }
                   
                } catch (SQLException sqle) { 
                    //System.out.println(sqle.getMessage());
                    check = "Error el evento no se pudo editar"; 
                }       
            }
             
            return check;
        }else{
          return "Error con base de datos";  
        }
    }
    // SI SE USA
    public boolean updateEvento(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set nombre='"+ evento.getNombre()+"' "+
                                                                " , duracion='"+evento.getDuracion().toString()+"' "+
                                                                " , fecha_inicial='"+evento.getFechaInicial().toString()+"' "+
                                                                " , fecha_final='"+evento.getFechaFinal().toString()+"' "+
                                                                " , productora='"+evento.getIdProductora().toString()+"' "+
                                                                " , id_sala_mapa="+evento.getIdSalaMapa().toString()+
                                                                " , id_tipo_evento="+evento.getIdTipoEvento().toString()+
                                                                " , id_tipo_espectaculo="+evento.getIdTipoEspectaculo().toString()+
                                                                " , id_categoria="+evento.getIdCategoria().toString()+
                                                                " , id_clasificacion="+evento.getIdClasificacion().toString()+
                                                                " , id_procedencia="+evento.getIdProcedencia().toString()+
                                                                " , id_funcion="+evento.getIdFuncion().toString()+
                                                                " , id_precio="+evento.getIdPrecio().toString()+
                                                                " , aforo='"+evento.getAforo().toString()+"' "+
                                                                " , sinopsis='"+evento.getSinopsis()+"' "+
                                                                " , productora='"+evento.getProductora()+"' "+
                                                                " , elenco='"+evento.getElenco()+"' "+
                                                                " , ruta_imagen='"+evento.getRutaImagen()+"' "+
                                                                " , ruta_video='"+evento.getRutaVideo()+"' "+
                                                                " , tipo='"+evento.getTipoEvento()+"' "+
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
    // SI SE USA
    public String updateEvento_informacion(Evento evento) throws SQLException{
        if (seteo()) {
            String  check = "false";
            Integer aforo= getAforo(evento.getIdEvento());
            Integer vendidos= getVendidos(evento.getIdEvento());
            if (vendidos<evento.getAforo()) {
                if (!aforo.equals(evento.getAforo())) {
                updateAforo_Funcion(evento.getIdEvento(),evento.getAforo(), evento.getUsuarioCreacion());
                }
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set nombre='"+ evento.getNombre()+"' "+
                                                                    " , duracion='"+evento.getDuracion().toString()+"' "+
                                                                    " , fecha_inicial='"+evento.getFechaInicial().toString()+"' "+
                                                                    " , fecha_final='"+evento.getFechaFinal().toString()+"' "+
                                                                   " , productora='"+evento.getIdProductora().toString()+"' "+
                                                                    " , id_tipo_evento="+evento.getIdTipoEvento().toString()+
                                                                    " , id_tipo_espectaculo="+evento.getIdTipoEspectaculo().toString()+
                                                                    " , id_categoria="+evento.getIdCategoria().toString()+
                                                                    " , id_clasificacion="+evento.getIdClasificacion().toString()+
                                                                    " , id_procedencia="+evento.getIdProcedencia().toString()+
                                                                    " , aforo='"+evento.getAforo().toString()+"' "+
                                                                    " , tipo='"+evento.getTipoEvento()+"' "+
                                                                    " , preventa='"+evento.getPreventa()+"' "+        
                                                                    " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_evento ="+evento.getIdEvento().toString())) {
                    stmt.executeUpdate();
                    check = "true";
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                } 
            }else{
                check = "ERROR INGRESE UN AFORO VALIDO";
            }
                    
                 
            return check;
        }else{
          return "false";  
        }
        
    }
    // SI SE USA
    public boolean updateEvento_sinopsis(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set sinopsis='"+ evento.getSinopsis()+"' "+
                                                                " , descripcion2='"+evento.getProductora()+"'"+
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
    // SI SE USA
    public boolean updateEvento_video(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_evento set ruta_video='"+ evento.getRutaVideo()+"' "+
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
    // SI SE USA
    public boolean updateEvento_destacado(Evento evento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try {
                PreparedStatement stmt=null;
                if (evento.getIdEvento().equals(0)) {
                    stmt =  cnx.prepareStatement("UPDATE tsa_evento_estrella set estado='I' "+
                                                                " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_evento_estrella =1");
                }else{
                    stmt =  cnx.prepareStatement("UPDATE tsa_evento_estrella set estado='A', id_evento="+ evento.getIdEvento()+" "+
                                                                " , usuario_modificacion='"+evento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_evento_estrella =1");
                }
                
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
    // SI SE USA
    public boolean insertEvento(Evento evento) throws SQLException{
        int id = 0;
        if (seteo()) {
            //System.out.println(evento);
             boolean check = false;
             String comando="CALL evento('"+evento.getNombre()+"'"+
                                        ","+evento.getDuracion().toString()+
                                        ",'"+evento.getFechaInicial()+"'"+
                                        ",'"+evento.getFechaFinal()+"'"+
                                        ",'"+evento.getIdProductora()+"'"+
                                        ","+evento.getIdSalaMapa()+
                                        ","+evento.getIdTipoEvento()+
                                        ","+evento.getIdTipoEspectaculo()+
                                        ","+evento.getIdCategoria()+
                                        ","+evento.getIdClasificacion()+
                                        ","+evento.getIdProcedencia()+                                                                                       
                                        ","+evento.getAforo()+
                                        ",'"+evento.getTipoEvento()+"'"+
                                        ",'"+evento.getUsuarioCreacion()+"')";

             try {
                 System.out.println(comando);
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                
                while (rs.next()){
                    id=Integer.parseInt(rs.getString(1).trim());
                }
                if (!evento.getTipoEvento().equals("I")) {
                    PreparedStatement stmt1 =  cnx.prepareStatement("INSERT INTO tsa_ficha_artistica (id_evento,titulo,descripcion,usuario_creacion) VALUES ("+id+",'Productora','"+evento.getIdProductora()+"','"+evento.getUsuarioCreacion()+"')"); 
                    stmt1.executeUpdate();
                    stmt1 =  cnx.prepareStatement("SELECT * from tsa_procedencia tp WHERE id_procedencia ="+evento.getIdProcedencia());
                    rs =stmt1.executeQuery();
                    while (rs.next()){
                         stmt1 =  cnx.prepareStatement("INSERT INTO tsa_ficha_artistica (id_evento,titulo,descripcion,usuario_creacion) VALUES ("+id+",'País','"+rs.getString("nombre")+"','"+evento.getUsuarioCreacion()+"')"); 
                         stmt1.executeUpdate();
                    }
                     if (evento.getTipoEvento().equals("V")) {
                         stmt1 =  cnx.prepareStatement("SELECT tpd.* ,ts.id_sala as sala FROM tsa_sala_mapa tsm " +
                        "INNER JOIN  tsa_sala ts ON tsm.id_sala =ts.id_sala " +
                        "INNER JOIN  tsa_platea_distribucion tpd ON tpd.id_sala_mapa =tsm.id_sala_mapa " +
                        "INNER JOIN  tsa_mapa tm ON tsm.id_mapa =tm.id_mapa where ts.id_sala =1 and tsm.id_sala_mapa ="+evento.getIdSalaMapa());
                        rs =stmt1.executeQuery();
                        int id_platea=0;
                        while (rs.next()){
                            if (!rs.getString("aforo").equals("0")) {
                                comando="CALL platea('"+rs.getString("nombre")+"',0,'"+rs.getString("aforo")+"',"+id+",'"+evento.getUsuarioCreacion()+"')";
                                stmt1 =  cnx.prepareStatement(comando); 
                                stmt1.executeUpdate();
                            }
                        }
                     }
                }
                check = true;
            } catch (SQLException sqle) { 
                PreparedStatement stmt1 =  cnx.prepareStatement("CALL delete_evento("+id+")");
                stmt1.executeUpdate();
              System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
       
    }
    // SI SE USA
    public Funcion getFuncion(Integer idFuncion) throws SQLException{
        if (seteo()) {
            Funcion funcion = new Funcion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_funcion WHERE id_funcion ="+idFuncion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    funcion.setIdFuncion(rs.getInt("id_funcion"));
                    funcion.setFecha(rs.getString("fecha"));
                    funcion.setAforo(rs.getInt("aforo"));
                    funcion.setCantidad_vendida(rs.getInt("cantidad_vendida"));
                    funcion.setCantidad_bloqueada(rs.getInt("cantidad_bloqueado"));
                    funcion.setIdEvento(rs.getInt("id_evento"));
                    funcion.setEstado(rs.getString("estado"));
                }
                //System.out.println(funcion.toString());
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return funcion;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<Funcion> getAllFuncion (Integer idEvento) throws SQLException{
        if (seteo()) {
             List<Funcion> funciones = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_funcion where id_evento="+idEvento+" and estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Funcion funcion = new Funcion();

                while (rs.next()){
                    funcion = new Funcion();
                    funcion.setIdFuncion(rs.getInt("id_funcion"));
                    //System.out.println(rs.getString("fecha"));
                    funcion.setFecha(rs.getString("fecha"));
                    funcion.setAforo(rs.getInt("aforo"));
                    funcion.setCantidad_vendida(rs.getInt("cantidad_vendida"));
                    funcion.setCantidad_bloqueada(rs.getInt("cantidad_bloqueado"));
                    funcion.setIdEvento(rs.getInt("id_evento"));
                    funcion.setEstado(rs.getString("estado"));
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
    // SI SE USA
     public boolean updateEstadoFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            //System.out.println(funcion);
            if (funcion.getEstado().equals("E")) {
                Funcion f=getFuncion(funcion.getIdFuncion());
                if (f.getCantidad_vendida()>0) {
                    return false;
                }else{

                    try (PreparedStatement stmt =  cnx.prepareStatement("CALL delete_funcion("+funcion.getIdFuncion().toString()+")")) {
                        ResultSet rs =stmt.executeQuery();
                        if (rs.next()) {
                            System.out.println(rs.getInt("MYSQL_ERROR"));
                            return false;
                        }
                    } catch (SQLException sqle) { 
                        check = true;
                        //System.out.println("sdadasd");
                    } 
                }
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_funcion set estado='"+ funcion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+funcion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_funcion ="+funcion.getIdFuncion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                } 
            }
                   
            return check;
        }else{
          return false;  
        }
    }
     // SI SE USA
    public void updateAforo_Funcion(Integer idEvento, Integer aforo, String usuario) throws SQLException{
        if (seteo()) {
            List<Funcion> funciones = new ArrayList<>();
            PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_funcion where id_evento="+idEvento);
            ResultSet rs = stmt.executeQuery();
            while (rs.next()){
                PreparedStatement stmt1 =  cnx.prepareStatement("UPDATE tsa_funcion set aforo="+ aforo+" "+
                                                            " , usuario_modificacion='"+usuario+"',fecha_modificacion=sysdate()"+
                                                            " WHERE id_funcion ="+rs.getInt("id_funcion"));
                stmt1.executeUpdate();
            }  
        }
    }
    // SI SE USA
    public boolean updateFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String fecha="STR_TO_DATE('"+funcion.getFecha()+":00 ','%d/%m/%Y %H:%i:%s')";
            //System.out.println(funcion.getFecha()+":00");
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_funcion set fecha="+ fecha+" "+
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
    // SI SE USA
    public int getAforo(Integer idEvento) throws SQLException{
        if (seteo()) {

            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT aforo FROM tsa_evento WHERE id_evento ="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    return rs.getInt("aforo");
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
        }else{
            return 0;
        }
        return 0;
    }
    // SI SE USA
    public int getVendidos(Integer idEvento) throws SQLException{
        if (seteo()) {

            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT vendido FROM tsa_evento WHERE id_evento ="+idEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    return rs.getInt("vendido");
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
        }else{
            return 0;
        }
        return 0;
    }
    // SI SE USA
    public boolean insertFuncion(Funcion funcion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String fecha="STR_TO_DATE('"+funcion.getFecha()+":00 ','%d/%m/%Y %H:%i:%s')";
            //System.out.println(funcion.getFecha()+":00");
            int aforo= getAforo(funcion.getIdEvento());
            String  comando="CALL funcion("+fecha+",'"+aforo+"'"+","+funcion.getIdEvento()+",'"+funcion.getUsuarioCreacion()+"')";
            //System.out.println(comando);
            Map<String, Integer> map = (Map<String, Integer>)new LinkedHashMap();
            try {
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                stmt =  cnx.prepareStatement(comando);
                ResultSet rs =stmt.executeQuery();
                int id_funcion=0;
                while (rs.next()){
                    id_funcion=Integer.parseInt(rs.getString(1).trim());
                }
                boolean princ=isPrincipal(funcion.getIdEvento());
                if (princ) {
                    stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea WHERE id_evento ="+funcion.getIdEvento());
                    rs =stmt.executeQuery();
                    while (rs.next()){
                        map.put(rs.getString("nombre"), rs.getInt("id_platea"));
                    }
                    //System.out.println(map);
                    stmt =  cnx.prepareStatement("SELECT tad.* FROM tsa_evento te INNER JOIN  tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa INNER  JOIN tsa_asiento_distribucion tad ON tad.id_sala_mapa =tsm.id_sala_mapa and te.id_evento ="+funcion.getIdEvento());
                    rs =stmt.executeQuery();
                    String texto="";
                    int acum=0;
                    while (rs.next()){
                         if (acum==0) {
                            texto="("+rs.getString("numero")+",'"+rs.getString("fila")+"','"+rs.getString("lateral")+"',"+id_funcion+",'"+map.get("PLATEA "+rs.getString("platea"))+"','"+rs.getString("platea")+"','"+funcion.getUsuarioCreacion()+"')";
                            acum++;
                        }else{
                             texto=texto+ ",("+rs.getString("numero")+",'"+rs.getString("fila")+"','"+rs.getString("lateral")+"',"+id_funcion+",'"+map.get("PLATEA "+rs.getString("platea"))+"','"+rs.getString("platea")+"','"+funcion.getUsuarioCreacion()+"')"; 
                        }  

                    }
                    try {
                        comando="INSERT INTO tsa_distribucion  (numero,fila,`lateral`,id_funcion,id_platea,platea,usuario_creacion)"
                                    + " VALUES "+texto;
                        stmt =  cnx.prepareStatement( comando);
                        stmt.executeUpdate();
                        check = true;
                    } catch (SQLException sqle) { 
                        System.out.println(sqle);
                        PreparedStatement stmt1 =  cnx.prepareStatement("CALL delete_funcion("+id_funcion+")");
                        stmt1.executeUpdate();
                        return false;
                    }  
                }else{
                    stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea WHERE id_evento ="+funcion.getIdEvento());
                    rs =stmt.executeQuery();
                    while (rs.next()){
                        comando="INSERT INTO tsa_platea_funcion  (id_funcion,id_platea,usuario_creacion)" + " VALUES ("+id_funcion+","+rs.getInt("id_platea")+",'"+funcion.getUsuarioCreacion()+"')"; 
                        stmt =  cnx.prepareStatement( comando);
                        stmt.executeUpdate();
                    }
                    check = true;
                }
                
               
            } catch (SQLException sqle) { 
                System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }       
            return check;
        }else{
          return false;  
        }
        
    }
    // SI SE USA
    public boolean isPrincipal(Integer idEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT ts.id_sala FROM tsa_evento te  INNER JOIN tsa_sala_mapa tsm ON te.id_sala_mapa =tsm.id_sala_mapa " +
                        "INNER JOIN  tsa_sala ts ON tsm.id_sala =ts.id_sala " +
                        "INNER JOIN  tsa_platea_distribucion tpd ON tpd.id_sala_mapa =tsm.id_sala_mapa " +
                        "INNER JOIN  tsa_mapa tm ON tsm.id_mapa =tm.id_mapa where ts.id_sala =1 and te.id_evento ="+idEvento)) {
                ResultSet rs = stmt.executeQuery();
                if (rs.next()) {
                    return true;
                }
                
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return false; 
        }else{
          return false;  
        }
        
    }
    // SI SE USA
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
                    platea.setAforo(rs.getInt("aforo"));
                    platea.setVendidos(rs.getInt("vendido"));
                    
                    platea.setIdEvento(rs.getInt("id_evento"));
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
     // SI SE USA
    public Platea getPlatea(Integer idPlatea, Integer idFuncion) throws SQLException{
        if (seteo()) {
            Platea platea = new Platea();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea_funcion WHERE id_platea ="+idPlatea.toString()+" and id_funcion="+idFuncion)) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    platea.setIdPlatea(rs.getInt("id_platea_funcion"));
                    platea.setEstado(rs.getString("estado"));
                    platea.setVendidos(rs.getInt("vendido"));
                    platea.setBloqueados(rs.getInt("cantidad_bloqueado"));
                    platea.setCortesia(rs.getInt("cantidad_cortesia"));
                    platea.setEspera(rs.getInt("cantidad_espera"));
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
    // SI SE USA
    public List<Platea> getPlateaTaquilla(Integer idFuncion) throws SQLException{
        if (seteo()) {
            List<Platea> plateas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT tp.aforo as aforoT,tp.estado as estadoP, tp.nombre ,tp.costo , tpf.* FROM tsa_platea_funcion tpf  "
                    + "INNER JOIN tsa_funcion tf2 ON tpf.id_funcion =tf2.id_funcion INNER JOIN tsa_platea tp ON tpf.id_platea =tp.id_platea and tpf.id_funcion="+idFuncion)) {
                ResultSet rs = stmt.executeQuery();
                Platea platea = new Platea();
                while (rs.next()){
                    platea = new Platea();
                    platea.setIdPlatea(rs.getInt("id_platea"));
                    platea.setNombre(rs.getString("nombre"));
                    platea.setCosto(rs.getFloat("costo"));
                    platea.setEstado(rs.getString("estadoP"));
                    int disponible=rs.getInt("aforoT")-rs.getInt("vendido")-rs.getInt("cantidad_bloqueado")-rs.getInt("cantidad_cortesia")-rs.getInt("cantidad_espera");
                    platea.setAforo(disponible);
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
     // SI SE USA
    public List<Platea> getAllPlatea(Integer idEvento) throws SQLException{
        if (seteo()) {
            List<Platea> plateas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_platea where id_evento="+idEvento+" and estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Platea platea = new Platea();

                while (rs.next()){
                    platea = new Platea();
                    platea.setIdPlatea(rs.getInt("id_platea"));
                    platea.setNombre(rs.getString("nombre"));
                    platea.setCosto(rs.getFloat("costo"));
                    platea.setEstado(rs.getString("estado"));
                    platea.setAforo(rs.getInt("aforo"));
                    platea.setIdEvento(rs.getInt("id_evento"));
                    platea.setVendidos(rs.getInt("vendido"));
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
     // SI SE USA
    public boolean updateEstadoPlatea(Platea platea) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (platea.getEstado().equals("E")) {
                Platea f=getPlatea(platea.getIdPlatea());
                if (f.getVendidos()>0) {
                    return false;
                }else{
                    try (PreparedStatement stmt =  cnx.prepareStatement("CALL delete_platea("+platea.getIdPlatea().toString()+")")) {
                        ResultSet rs =stmt.executeQuery();
                         if (rs.next()) {
                             System.out.println(rs.getInt("MYSQL_ERROR"));
                             check = false;
                         }
                    } catch (Exception sqle) { 
                        check = true;
                    } 
                }
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_platea set estado='"+ platea.getEstado()+"' "+
                                                                " , usuario_modificacion='"+platea.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_platea ="+platea.getIdPlatea().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }   
            }      
            return check;
        }else{
          return false;  
        }
    }
     // SI SE USA
    public boolean updatePlatea(Platea platea) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_platea set nombre='"+ platea.getNombre().toString()+"' "+
                                                                " , costo='"+platea.getCosto().toString()+"' "+
                                                                " , aforo='"+platea.getAforo().toString()+"' "+
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
     // SI SE USA
    public boolean insertPlatea(Platea platea) throws SQLException{
        if (seteo()) {
           boolean check = false;
            try {
                PreparedStatement stmt =  cnx.prepareStatement("CALL platea('"+platea.getNombre()+"'"+","+platea.getCosto().toString()+","+platea.getAforo().toString()+","+platea.getIdEvento().toString()+",'"+platea.getUsuarioCreacion().toString()+"')");
                ResultSet rs =stmt.executeQuery();
                String id_platea="";
                while (rs.next()) {
                    //System.out.println(rs.getString(1).trim());
                    id_platea=rs.getString(1).trim();
                }
                stmt =  cnx.prepareStatement("SELECT tf.id_funcion  FROM tsa_funcion tf INNER JOIN tsa_evento te ON tf.id_evento = te.id_evento and te.id_evento="+platea.getIdEvento());
                rs =stmt.executeQuery();
                while (rs.next()) {
                    int id_funcion=rs.getInt("id_funcion");
                    //System.out.println(id_funcion);
                    PreparedStatement stmt1 =  cnx.prepareStatement("INSERT INTO teatro.tsa_platea_funcion (id_platea,id_funcion,usuario_creacion) VALUES ("+id_platea+","+id_funcion+",'"+platea.getUsuarioCreacion().toString()+"')");
                    stmt1.executeUpdate();
                }
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
     // SI SE USA
    public FichaArtistica getFichaArtistica (Integer idFichaArtistica) throws SQLException{
        if (seteo()) {
            FichaArtistica ficha = new FichaArtistica();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_ficha_artistica WHERE id_ficha_artistica ="+idFichaArtistica.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    ficha.setIdFichaArtistica(rs.getInt("id_ficha_artistica"));
                    ficha.setIdEvento(rs.getInt("id_evento"));
                    ficha.setTitulo(rs.getString("titulo"));
                    ficha.setDescripcion(rs.getString("descripcion"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }      
            return ficha;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public List<FichaArtistica> getAllFichaArtistica (Integer idEvento) throws SQLException{
        if (seteo()) {
            List<FichaArtistica> fichas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_ficha_artistica WHERE id_evento="+idEvento)) {
                ResultSet rs = stmt.executeQuery();
                FichaArtistica ficha;
                while (rs.next()){
                    ficha = new FichaArtistica();
                    ficha.setIdFichaArtistica(rs.getInt("id_ficha_artistica"));
                    ficha.setIdEvento(rs.getInt("id_evento"));
                    ficha.setTitulo(rs.getString("titulo"));
                    ficha.setDescripcion(rs.getString("descripcion"));
                    fichas.add(ficha);
                }    
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return fichas;
        }else{
          return null;  
        }
        
    }
    // SI SE USA
    public boolean updateFichaArtistica(FichaArtistica ficha) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_ficha_artistica set titulo='"+ ficha.getTitulo()+"' "+
                                                                " , descripcion='"+ficha.getDescripcion()+"' "+
                                                                " , usuario_modificacion='"+ficha.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_ficha_artistica ="+ficha.getIdFichaArtistica().toString())) {
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
    // SI SE USA
    public boolean deleteFichaArtistica(Integer idFichaArtistica) throws SQLException{
        if (seteo()) {
             boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_ficha_artistica WHERE id_ficha_artistica="+idFichaArtistica)) {
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
    // SI SE USA
    public boolean insertFichaArtistica(FichaArtistica ficha) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_ficha_artistica (id_evento,titulo,descripcion,usuario_creacion) VALUES ("+ficha.getIdFichaArtistica()+",'"+ficha.getTitulo()+"','"+ficha.getDescripcion()+"','"+ficha.getUsuarioCreacion()+"')")) {
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
    
    
    //PERFIL PROMOCIONES 
    
    public Promocion getPromocion(Integer idPromocion,Integer idTipoPromocion,String tipo) throws SQLException{
        if (seteo()) {
            Promocion promocion = new Promocion();
            String comando="";
            //System.out.println(tipo);
            if (tipo.equals("boletos")) {
                comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_pago tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_promocion="+idTipoPromocion;
            }else if (tipo.equals("Fpago")) {
                comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_compra tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_promocion="+idTipoPromocion;
            }else if (tipo.equals("FormaPago")) {
                comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_banco_tarjeta tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_promocion="+idTipoPromocion;
            }else if (tipo.equals("Cpromocional")) {
                comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_codigo_promocional tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_promocion="+idTipoPromocion;
            }else if (tipo.equals("cruzados")) {
                comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_cruzados tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_promocion="+idTipoPromocion;
            }
            try {
                //System.out.println(comando);
                PreparedStatement stmt =  cnx.prepareStatement(comando);
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    promocion.setIdPromocion(rs.getInt("id_promocion"));
                    promocion.setNombre(rs.getString("nombre"));
                    promocion.setDescripcion(rs.getString("descripcion"));
                    promocion.setAmigoTeatro(rs.getString("amigo_teatro"));
                    promocion.setIdEvento(rs.getInt("id_evento"));
                    promocion.setIdPlatea(rs.getInt("id_platea"));
                    promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                    promocion.setIdTipoPromocion(rs.getInt("id_nombre_promocion"));
                    promocion.setEstado(rs.getString("estado"));
                    promocion.setFechaFin(rs.getDate("fecha_final"));
                    promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                    promocion.setTipoPromo(tipo);
                    promocion.setIdPlatea(rs.getInt("id_platea"));
                    promocion.setCmaxima(rs.getString("cantidad_ticket"));
                    promocion.setIdFuncion(rs.getInt("id_funcion"));
                    if (tipo.equals("boletos")) {
                        promocion.setDesde(rs.getInt("desde"));
                        promocion.setHasta(rs.getInt("hasta"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                    }else if (tipo.equals("Fpago")) {
                        promocion.setDesde(rs.getInt("compra"));
                        promocion.setHasta(rs.getInt("pago"));
                    }else if (tipo.equals("FormaPago")) {
                        promocion.setTarjeta(rs.getInt("id_tarjeta")+"");
                        promocion.setBanco(rs.getInt("id_banco")+"");
                        promocion.setDescuento(rs.getFloat("descuento"));
                    }else if (tipo.equals("Cpromocional")) {
                        promocion.setCodigo(rs.getString("codigo"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                    }else if (tipo.equals("cruzados")) {
                        promocion.setIdEvento1(rs.getInt("id_evento2"));
                        promocion.setDesde(rs.getInt("cantidad"));
                        promocion.setHasta(rs.getInt("cantidad2"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                    }
                    //System.out.println(promocion.toStringGet());
                    return promocion;
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
    // SI SE USA POR EVENTO
    public List<Promocion> getAllPromocion(Integer idEvento, String tipo) throws SQLException{
        if (seteo()) {
            List<Promocion> promociones = new ArrayList<>();
            try {
                String comando="";
                ResultSet rs;
                PreparedStatement stmt ;
                Promocion promocion = new Promocion();
                if (tipo.equals("CP")) {
                    comando="SELECT  tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_codigo_promocional tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and tcp.id_evento="+idEvento;
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_codigo_promocional"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setCodigo(rs.getString("codigo"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setEstado(rs.getString("estado"));
                        if (rs.getString("id_funcion").equals("1")) {
                            promocion.setFuncion("TODAS");
                        }else{
                            promocion.setFuncion(rs.getString("fechaF"));
                        }
                        promocion.setPlatea(rs.getString("nombreP"));
                        promociones.add(promocion);
                    }  
                }else if(tipo.equals("FC")){
                    comando="SELECT  tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_compra tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and  tcp.id_evento="+idEvento;
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_factor_compra"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setDesde(rs.getInt("compra"));
                        promocion.setHasta(rs.getInt("pago"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setEstado(rs.getString("estado"));
                        if (rs.getString("id_funcion").equals("1")) {
                            promocion.setFuncion("TODAS");
                        }else{
                            promocion.setFuncion(rs.getString("fechaF"));
                        }
                        promocion.setPlatea(rs.getString("nombreP"));
                        promociones.add(promocion);
                    }  
                }else if(tipo.equals("FP")){
                    comando="SELECT  tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_pago tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion  INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and  tcp.id_evento="+idEvento;
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_factor_pago"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setDesde(rs.getInt("desde"));
                        promocion.setHasta(rs.getInt("hasta"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setEstado(rs.getString("estado"));
                        if (rs.getString("id_funcion").equals("1")) {
                            promocion.setFuncion("TODAS");
                        }else{
                            promocion.setFuncion(rs.getString("fechaF"));
                        }
                        promocion.setPlatea(rs.getString("nombreP"));
                        promociones.add(promocion);
                    }  
                }else if(tipo.equals("TB")){
                    comando="SELECT  tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id,tb.nombre as banco, tt.nombre as tarjeta, tp.* FROM tsa_banco_tarjeta tcp "
                            + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_banco tb ON tb.id_banco =tcp.id_banco "
                            + "INNER JOIN tsa_tarjeta tt ON tt.id_tarjeta =tcp.id_tarjeta  INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and  tcp.id_evento="+idEvento;
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_banco_tarjeta"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setTarjeta(rs.getString("tarjeta"));
                        promocion.setBanco(rs.getString("banco"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setEstado(rs.getString("estado"));
                        if (rs.getString("id_funcion").equals("1")) {
                            promocion.setFuncion("TODAS");
                        }else{
                            promocion.setFuncion(rs.getString("fechaF"));
                        }
                        promocion.setPlatea(rs.getString("nombreP"));
                        promociones.add(promocion);
                    }  
                }else if(tipo.equals("EC")){
                    comando="SELECT  tf.fecha as fechaF, tp2.nombre as nombreP  , tc.*,tp.id_promocion as id, tp.*, te.nombre as evento1, te2.nombre as evento2 FROM tsa_cruzados tc "
                            + "INNER JOIN tsa_promocion tp ON tc.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_evento te ON te.id_evento =tc.id_evento "
                            + "INNER JOIN tsa_evento te2 ON te2.id_evento =tc.id_evento2 INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and  tc.id_evento="+idEvento;
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_cruzados"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setEvento1(rs.getString("evento1"));
                        promocion.setEvento2(rs.getString("evento2"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDesde(rs.getInt("cantidad"));
                        promocion.setHasta(rs.getInt("cantidad2"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setEstado(rs.getString("estado"));
                        if (rs.getString("id_funcion").equals("1")) {
                            promocion.setFuncion("TODAS");
                        }else{
                            promocion.setFuncion(rs.getString("fechaF"));
                        }
                        promocion.setPlatea(rs.getString("nombreP"));
                        promociones.add(promocion);
                    }  
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
    
    // SI SE USA PARA VENTA DE TAQUILLAS
    public List<Promocion> getAllPromocionT(Integer idUsuario,String tipo) throws SQLException{
        if (seteo()) {
            List<Promocion> promociones = new ArrayList<>();
            try {
               
                String comando="";
                ResultSet rs;
                PreparedStatement stmt ;
                Promocion promocion = new Promocion();
                List <Integer> eventos = new ArrayList<>();
                stmt =  cnx.prepareStatement("SELECT tr.id_evento , ts.nombre as Sala, ts.id_sala ,te.nombre as evento, tf.fecha ,tr.descuento ,tp.nombre,tra.* FROM tsa_reserva tr  INNER JOIN tsa_reserva_asientos tra  ON tr.id_reserva =tra.id_reserva INNER JOIN tsa_funcion tf ON tf.id_funcion =tr.id_funcion INNER JOIN tsa_platea tp ON tp.id_platea =tra.id_platea INNER JOIN tsa_evento te ON te.id_evento =tr.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala AND id_usuario="+idUsuario);
                rs = stmt.executeQuery();
                eventos.add(1);
                while (rs.next()){
                    if (!eventos.contains(rs.getInt("id_evento"))) {
                        eventos.add(rs.getInt("id_evento"));
                    }
                }
                if (tipo.equals("CP")) {
                    comando="SELECT  te.nombre as nombreE, te.id_evento as idE, tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_codigo_promocional tcp INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion INNER JOIN tsa_evento te ON te.id_evento =tcp.id_evento and tcp.estado='A'";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();
                    while (rs.next()){
                        promocion = new Promocion();
                        String ti=rs.getString("tipo_acceso");
                        boolean c=ti.contains("V");
                        boolean c2=eventos.contains(rs.getInt("idE"));
                        if (rs.getString("tipo_acceso").equals("T") | c) {
                            
                            if (rs.getInt("idE")==1) {
                                promocion.setEvento1("TODOS");
                            }else{
                                promocion.setEvento1(rs.getString("nombreE"));
                            }
                            promocion.setIdPromocion(rs.getInt("id_codigo_promocional"));
                            promocion.setIdPromocion2(rs.getInt("id"));
                            promocion.setNombre(rs.getString("nombre"));
                            promocion.setCodigo(rs.getString("codigo"));
                            promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                            promocion.setDescuento(rs.getFloat("descuento"));
                            promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                            promocion.setFechaFin(rs.getDate("fecha_final"));
                            promocion.setEstado(rs.getString("estado"));
                            if (rs.getString("id_funcion").equals("1")) {
                                promocion.setFuncion("TODAS");
                            }else{
                                promocion.setFuncion(rs.getString("fechaF"));
                            }
                            promocion.setPlatea(rs.getString("nombreP"));
                            if (c2) {
                              promociones.add(promocion);  
                            }
                            
                        }
                        
                    }  
                }else if(tipo.equals("FC")){
                    comando="SELECT  te.nombre as nombreE, te.id_evento as idE, tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_compra tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion INNER JOIN tsa_evento te ON te.id_evento =tcp.id_evento and tcp.estado='A'";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        String ti=rs.getString("tipo_acceso");
                        boolean c=ti.contains("V");
                        boolean c2=eventos.contains(rs.getInt("idE"));
                        if (rs.getString("tipo_acceso").equals("T") | c ) {
                            promocion = new Promocion();
                            if (rs.getInt("idE")==1) {
                                promocion.setEvento1("TODOS");
                            }else{
                                promocion.setEvento1(rs.getString("nombreE"));
                            }
                            promocion.setIdPromocion(rs.getInt("id_factor_compra"));
                            promocion.setIdPromocion2(rs.getInt("id"));
                            promocion.setNombre(rs.getString("nombre"));
                            promocion.setDesde(rs.getInt("compra"));
                            promocion.setHasta(rs.getInt("pago"));
                            promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                            promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                            promocion.setFechaFin(rs.getDate("fecha_final"));
                            promocion.setEstado(rs.getString("estado"));
                            if (rs.getString("id_funcion").equals("1")) {
                                promocion.setFuncion("TODAS");
                            }else{
                                promocion.setFuncion(rs.getString("fechaF"));
                            }
                            promocion.setPlatea(rs.getString("nombreP"));
                           if (c2) {
                              promociones.add(promocion);  
                            }
                        }
                        
                    }  
                }else if(tipo.equals("FP")){
                    comando="SELECT  te.nombre as nombreE, te.id_evento as idE, tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_pago tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion  INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion INNER JOIN tsa_evento te ON te.id_evento =tcp.id_evento and tcp.estado='A'";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        String ti=rs.getString("tipo_acceso");
                        boolean c=ti.contains("V");
                        boolean c2=eventos.contains(rs.getInt("idE"));
                        if (rs.getString("tipo_acceso").equals("T") | c ) {
                            promocion = new Promocion();
                            if (rs.getInt("idE")==1) {
                                promocion.setEvento1("TODOS");
                            }else{
                                promocion.setEvento1(rs.getString("nombreE"));
                            }
                            promocion.setIdPromocion(rs.getInt("id_factor_pago"));
                            promocion.setIdPromocion2(rs.getInt("id"));
                            promocion.setNombre(rs.getString("nombre"));
                            promocion.setDesde(rs.getInt("desde"));
                            promocion.setHasta(rs.getInt("hasta"));
                            promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                            promocion.setDescuento(rs.getFloat("descuento"));
                            promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                            promocion.setFechaFin(rs.getDate("fecha_final"));
                            promocion.setEstado(rs.getString("estado"));
                            if (rs.getString("id_funcion").equals("1")) {
                                promocion.setFuncion("TODAS");
                            }else{
                                promocion.setFuncion(rs.getString("fechaF"));
                            }
                            promocion.setPlatea(rs.getString("nombreP"));
                            if (c2) {
                              promociones.add(promocion);  
                            }
                        }
                        
                    }  
                }else if(tipo.equals("TB")){
                    comando="SELECT te.nombre as nombreE, te.id_evento as idE,  tf.fecha as fechaF, tp2.nombre as nombreP  ,tcp.*,tp.id_promocion as id,tb.nombre as banco, tt.nombre as tarjeta, tp.* FROM tsa_banco_tarjeta tcp "
                            + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_banco tb ON tb.id_banco =tcp.id_banco "
                            + "INNER JOIN tsa_tarjeta tt ON tt.id_tarjeta =tcp.id_tarjeta  INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion INNER JOIN tsa_evento te ON te.id_evento =tcp.id_evento and tcp.estado='A'";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        String ti=rs.getString("tipo_acceso");
                        boolean c=ti.contains("V");
                        boolean c2=eventos.contains(rs.getInt("idE"));
                        if (rs.getString("tipo_acceso").equals("T") | c ) {
                            promocion = new Promocion();
                            if (rs.getInt("idE")==1) {
                                promocion.setEvento1("TODOS");
                            }else{
                                promocion.setEvento1(rs.getString("nombreE"));
                            }
                            promocion.setIdPromocion(rs.getInt("id_banco_tarjeta"));
                            promocion.setIdPromocion2(rs.getInt("id"));
                            promocion.setNombre(rs.getString("nombre"));
                            promocion.setTarjeta(rs.getString("tarjeta"));
                            promocion.setBanco(rs.getString("banco"));
                            promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                            promocion.setDescuento(rs.getFloat("descuento"));
                            promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                            promocion.setFechaFin(rs.getDate("fecha_final"));
                            promocion.setEstado(rs.getString("estado"));
                            if (rs.getString("id_funcion").equals("1")) {
                                promocion.setFuncion("TODAS");
                            }else{
                                promocion.setFuncion(rs.getString("fechaF"));
                            }
                            promocion.setPlatea(rs.getString("nombreP"));
                           if (c2) {
                              promociones.add(promocion);  
                            }
                        }
                        
                    }  
                }else if(tipo.equals("EC")){
                    comando="SELECT te.nombre as nombreE, te.id_evento as idE, te2.id_evento as idE2,  tf.fecha as fechaF, tp2.nombre as nombreP  , tc.*,tp.id_promocion as id, tp.*, te.nombre as evento1, te2.nombre as evento2 FROM tsa_cruzados tc "
                            + "INNER JOIN tsa_promocion tp ON tc.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_evento te ON te.id_evento =tc.id_evento "
                            + "INNER JOIN tsa_evento te2 ON te2.id_evento =tc.id_evento2 INNER JOIN tsa_platea tp2 ON tp2.id_platea =tp.id_platea INNER JOIN tsa_funcion tf ON tf.id_funcion =tp.id_funcion and tc.estado='A'";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        String ti=rs.getString("tipo_acceso");
                        boolean c=ti.contains("V");
                        boolean c2=eventos.contains(rs.getInt("idE"));
                        boolean c3=eventos.contains(rs.getInt("idE2"));
                        if (rs.getString("tipo_acceso").equals("T") | c ) {
                            promocion = new Promocion();
                            if (rs.getInt("idE")==1) {
                                promocion.setEvento1("TODOS");
                            }else{
                                promocion.setEvento1(rs.getString("nombreE"));
                            }
                            promocion.setIdPromocion(rs.getInt("id_cruzados"));
                            promocion.setIdPromocion2(rs.getInt("id"));
                            promocion.setNombre(rs.getString("nombre"));
                            promocion.setEvento1(rs.getString("evento1"));
                            promocion.setEvento2(rs.getString("evento2"));
                            promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                            promocion.setDesde(rs.getInt("cantidad"));
                            promocion.setHasta(rs.getInt("cantidad2"));
                            promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                            promocion.setFechaFin(rs.getDate("fecha_final"));
                            promocion.setEstado(rs.getString("estado"));
                            if (rs.getString("id_funcion").equals("1")) {
                                promocion.setFuncion("TODAS");
                            }else{
                                promocion.setFuncion(rs.getString("fechaF"));
                            }
                            promocion.setPlatea(rs.getString("nombreP"));
                           if (c2 |  c3) {
                              promociones.add(promocion);  
                            }
                        }
                        
                    }  
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
    public List<Promocion> getAllPromocion() throws SQLException{
        if (seteo()) {
            List<Promocion> promociones = new ArrayList<>();
            try {
                String comando="";
                ResultSet rs;
                PreparedStatement stmt ;
                Promocion promocion = new Promocion();
                    comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_codigo_promocional tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_evento=1";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();
                    while (rs.next()){
                        promocion = new Promocion();
                        
                        promocion.setIdPromocion(rs.getInt("id_codigo_promocional"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setCodigo(rs.getString("codigo"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setTipoPromo("Código Promocional");
                        promocion.setEstado(rs.getString("estado"));
                        promociones.add(promocion);
                    }  
                    comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_compra tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion and tcp.id_evento=1";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_factor_compra"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setDesde(rs.getInt("compra"));
                        promocion.setHasta(rs.getInt("pago"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setTipoPromo("Factor de Compra/Pago");
                        promocion.setEstado(rs.getString("estado"));
                        promociones.add(promocion);
                    }  
                    comando="SELECT tcp.*,tp.id_promocion as id, tp.* FROM tsa_factor_pago tcp "
                        + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion  and tcp.id_evento=1";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_factor_pago"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setDesde(rs.getInt("desde"));
                        promocion.setHasta(rs.getInt("hasta"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setTipoPromo("Boletos");
                        promocion.setEstado(rs.getString("estado"));
                        promociones.add(promocion);
                    }  
                    comando="SELECT tcp.*,tp.id_promocion as id,tb.nombre as banco, tt.nombre as tarjeta, tp.* FROM tsa_banco_tarjeta tcp "
                            + "INNER JOIN tsa_promocion tp ON tcp.id_promocion = tp.id_promocion "
                            + "INNER JOIN tsa_banco tb ON tb.id_banco =tcp.id_banco "
                            + "INNER JOIN tsa_tarjeta tt ON tt.id_tarjeta =tcp.id_tarjeta  and tcp.id_evento=1";
                    stmt =  cnx.prepareStatement(comando); 
                    rs = stmt.executeQuery();            
                    while (rs.next()){
                        promocion = new Promocion();
                        promocion.setIdPromocion(rs.getInt("id_banco_tarjeta"));
                        promocion.setIdPromocion2(rs.getInt("id"));
                        promocion.setNombre(rs.getString("nombre"));
                        promocion.setTarjeta(rs.getString("banco"));
                        promocion.setBanco(rs.getString("tarjeta"));
                        promocion.setTipoAcceso(rs.getString("tipo_acceso"));
                        promocion.setDescuento(rs.getFloat("descuento"));
                        promocion.setFechaInicio(rs.getDate("fecha_inicio"));
                        promocion.setFechaFin(rs.getDate("fecha_final"));
                        promocion.setTipoPromo("Forma de Pago");
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
    
    public String updateEstadoPromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
           // System.out.println(promocion);
            boolean check = false;
             if (promocion.getEstado().equals("B")) {
                try {
                    System.out.println("CALL delete_promocion("+promocion.getIdPromocion2()+",'"+promocion.getTipoPromo()+"')");
                    PreparedStatement stmt =  cnx.prepareStatement("CALL delete_promocion("+promocion.getIdPromocion2()+",'"+promocion.getTipoPromo()+"')"); 
                    boolean results = stmt.execute();
                    // Loop through the available result sets.
                    while (results) {
                        ResultSet rs = stmt.getResultSet();
                        while (rs.next()) {
                            try{
                               System.out.println(rs.getInt("MYSQL_ERROR"));
                               return "ERROR LA PROMOCIÓN NO FUE ELIMINADA-PROMO YA USADA";
                            } catch (SQLException sqle) { 

                            } 
                        }
                        rs.close();
                        // Check for next result set
                        results = stmt.getMoreResults();
                    }
                    return "true";
                } catch (SQLException sqle) { 
                    return "ERROR LA PROMOCIÓN NO FUE ELIMINADA";
                } 
            }else{
                try{
                    String tipo="";
                    if (promocion.getTipoPromo().equals("boletos")) {
                        tipo="tsa_factor_pago";
                    }else if (promocion.getTipoPromo().equals("Fpago")) {
                        tipo="tsa_factor_compra";
                    }else if (promocion.getTipoPromo().equals("FormaPago")) {
                        tipo="tsa_banco_tarjeta";
                    }else if (promocion.getTipoPromo().equals("Cpromocional")) {
                        tipo="tsa_codigo_promocional";
                    }else if (promocion.getTipoPromo().equals("cruzados")) {
                        tipo="tsa_cruzados";
                    }
                    //System.out.println(tipo);
                    PreparedStatement stmt =  cnx.prepareStatement("UPDATE "+tipo+" set estado='"+ promocion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                    return "true";
                } catch (SQLException sqle) { 
                  return "ERROR NO SE PUEDE ACTUALIZAR";
                }     
            }      
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
    }
    //SI SE USA
    public String updatePromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
            try {
                String tipo=promocion.getTipoAcceso();
                String[] parts =tipo.split(",");
                String letra="";
                if (parts[0].trim().equals("true")) {
                   letra="T";
               }else{
                   if (parts[1].trim().equals("true")) {
                       if (parts[2].trim().equals("true")) {
                           if (parts[3].trim().equals("true")) {
                               letra="T";
                           }else{
                               letra="WA";
                           }
                       }else{
                           if (parts[3].trim().equals("true")) {
                               letra="WV";
                           }else{
                               letra="W";
                           }
                       }
                   }else{
                       if (parts[2].trim().equals("true")) {
                           if (parts[3].trim().equals("true")) {
                               letra="AV";
                           }else{
                               letra="A";
                           }
                       }else{
                           if (parts[3].trim().equals("true")) {
                               letra="V";
                           }
                       }
                   }   
                }
                PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_promocion set id_nombre_promocion='"+ promocion.getCategoria()+"' "+
                                                                " , descripcion='"+promocion.getDescripcion().toString()+"' "+
                                                                " , amigo_teatro='"+promocion.getAmigoTeatro().toString()+"' "+
                                                                " , id_platea='"+promocion.getIdPlatea().toString()+"' "+
                                                                " , id_funcion='"+promocion.getIdFuncion().toString()+"' "+
                                                                " , tipo_acceso='"+letra+"' "+
                                                                " , fecha_inicio='"+promocion.getFechaInicio().toString()+"' "+
                                                                " , fecha_final='"+promocion.getFechaFin().toString()+"' "+
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                stmt.executeUpdate();
                if (promocion.getTipoPromo().equals("boletos")) {
                    stmt =  cnx.prepareStatement("UPDATE tsa_factor_pago set nombre='"+ promocion.getNombre()+"' "+
                                                                " , desde="+promocion.getDesde().toString()+" "+
                                                                " , hasta="+promocion.getHasta().toString()+" "+
                                                                " , cantidad_ticket="+promocion.getCmaxima()+" "+
                                                                " , descuento="+promocion.getDescuento()+" "+
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                }else if (promocion.getTipoPromo().equals("Fpago")) {
                    stmt =  cnx.prepareStatement("UPDATE tsa_factor_compra set nombre='"+ promocion.getNombre()+"' "+
                                            " , compra="+promocion.getDesde().toString()+" "+
                                            " , pago="+promocion.getHasta().toString()+" "+
                                            " , cantidad_ticket="+promocion.getCmaxima()+" "+
                                           " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                            " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                }else if (promocion.getTipoPromo().equals("FormaPago")) {
                    //System.out.println("FormaPago");
                    stmt =  cnx.prepareStatement("UPDATE tsa_banco_tarjeta set nombre='"+ promocion.getNombre()+"' "+
                                                                " , id_tarjeta="+promocion.getTarjeta().toString()+" "+
                                                                " , id_banco="+promocion.getBanco().toString()+" "+
                                                                 " , cantidad_ticket="+promocion.getCmaxima()+" "+
                                                                " , descuento="+promocion.getDescuento()+" "+
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                    
                }else if (promocion.getTipoPromo().equals("Cpromocional")) {
   
                    stmt =  cnx.prepareStatement("UPDATE tsa_codigo_promocional set nombre='"+ promocion.getNombre()+"' "+
                                                                " , codigo='"+promocion.getCodigo().toString()+" '"+
                                                                " , descuento="+promocion.getDescuento()+" "+
                                                                 " , cantidad_ticket="+promocion.getCmaxima()+" "+
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                }else if (promocion.getTipoPromo().equals("cruzados")) {
   
                    stmt =  cnx.prepareStatement("UPDATE tsa_cruzados set nombre='"+ promocion.getNombre()+"' "+
                                                                " , cantidad='"+promocion.getDesde().toString()+" '"+
                                                                " , cantidad2="+promocion.getHasta()+" "+
                                                                 " , cantidad_ticket="+promocion.getCmaxima()+" "+
                                                                 " , descuento="+promocion.getDescuento()+" "+        
                                                               " , usuario_modificacion='"+promocion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_promocion ="+promocion.getIdPromocion2().toString());
                    stmt.executeUpdate();
                }
                
                
                return "true";
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }        
            return "NO SE PUEDE ACTUALIZAR PROMOCIÓN"; 
        }else{
          return "ERROR CON BASE DE DATOS";   
        }
        
    }
    //SI SE USA
    public String insertPromocion(Promocion promocion) throws SQLException{
        if (seteo()) {
            ResultSet rs;
            PreparedStatement stmt ;
             String comando="";
             String tipo=promocion.getTipoAcceso();
             String[] parts =tipo.split(",");
             String letra="";
             if (parts[0].trim().equals("true")) {
                letra="T";
            }else{
                if (parts[1].trim().equals("true")) {
                    if (parts[2].trim().equals("true")) {
                        if (parts[3].trim().equals("true")) {
                            letra="T";
                        }else{
                            letra="WA";
                        }
                    }else{
                        if (parts[3].trim().equals("true")) {
                            letra="WV";
                        }else{
                            letra="W";
                        }
                    }
                }else{
                    if (parts[2].trim().equals("true")) {
                        if (parts[3].trim().equals("true")) {
                            letra="AV";
                        }else{
                            letra="A";
                        }
                    }else{
                        if (parts[3].trim().equals("true")) {
                            letra="V";
                        }
                    }
                }   
             }
       
          //   System.out.println(promocion.getTipoAcceso());
             //(letra);
            try {
                if (promocion.getTipoPromo().equals("boletos")) {
                    comando="CALL insert_promocion("+promocion.getIdEvento()+","+promocion.getIdPlatea()+","+promocion.getIdFuncion()+",'"+promocion.getNombre()+"','"+promocion.getDescripcion()+"','"+promocion.getCategoria()+"','"+promocion.getAmigoTeatro()+"','"+promocion.getFechaInicio()+"','"+promocion.getFechaFin()+"','"+letra+"','"+promocion.getTipoPromo()+"',"+promocion.getDesde()+","+promocion.getHasta()+","+promocion.getDescuento()+","+promocion.getCmaxima()+",0,'"+promocion.getUsuarioCreacion()+"')";
                }else if (promocion.getTipoPromo().equals("Fpago")) {
                    comando="CALL insert_promocion("+promocion.getIdEvento()+","+promocion.getIdPlatea()+","+promocion.getIdFuncion()+",'"+promocion.getNombre()+"','"+promocion.getDescripcion()+"','"+promocion.getCategoria()+"','"+promocion.getAmigoTeatro()+"','"+promocion.getFechaInicio()+"','"+promocion.getFechaFin()+"','"+letra+"','"+promocion.getTipoPromo()+"',"+promocion.getDesde()+","+promocion.getHasta()+",'',"+promocion.getCmaxima()+",0,'"+promocion.getUsuarioCreacion()+"')";
                }else if (promocion.getTipoPromo().equals("FormaPago")) {
                    comando="CALL insert_promocion("+promocion.getIdEvento()+","+promocion.getIdPlatea()+","+promocion.getIdFuncion()+",'"+promocion.getNombre()+"','"+promocion.getDescripcion()+"','"+promocion.getCategoria()+"','"+promocion.getAmigoTeatro()+"','"+promocion.getFechaInicio()+"','"+promocion.getFechaFin()+"','"+letra+"','"+promocion.getTipoPromo()+"',"+promocion.getTarjeta()+","+promocion.getBanco()+","+promocion.getDescuento()+","+promocion.getCmaxima()+",0,'"+promocion.getUsuarioCreacion()+"')";
                }else if (promocion.getTipoPromo().equals("Cpromocional")) {
                    comando="CALL insert_promocion("+promocion.getIdEvento()+","+promocion.getIdPlatea()+","+promocion.getIdFuncion()+",'"+promocion.getNombre()+"','"+promocion.getDescripcion()+"','"+promocion.getCategoria()+"','"+promocion.getAmigoTeatro()+"','"+promocion.getFechaInicio()+"','"+promocion.getFechaFin()+"','"+letra+"','"+promocion.getTipoPromo()+"','"+promocion.getCodigo()+"','',"+promocion.getDescuento()+","+promocion.getCmaxima()+",0,'"+promocion.getUsuarioCreacion()+"')";
                }else if (promocion.getTipoPromo().equals("cruzados")) {
                    comando="CALL insert_promocion("+promocion.getIdEvento()+","+promocion.getIdPlatea()+","+promocion.getIdFuncion()+",'"+promocion.getNombre()+"','"+promocion.getDescripcion()+"','"+promocion.getCategoria()+"','"+promocion.getAmigoTeatro()+"','"+promocion.getFechaInicio()+"','"+promocion.getFechaFin()+"','"+letra+"','"+promocion.getTipoPromo()+"','"+promocion.getIdEvento1()+"',"+promocion.getDesde()+","+promocion.getHasta()+","+promocion.getCmaxima()+","+promocion.getDescuento()+",'"+promocion.getUsuarioCreacion()+"')";
                }
               System.out.println(comando);
                stmt =  cnx.prepareStatement(comando); 
                boolean results = stmt.execute();
                // Loop through the available result sets.
                while (results) {
                    rs = stmt.getResultSet();
                    while (rs.next()) {
                        try{
                           System.out.println(rs.getInt("MYSQL_ERROR"));
                           return "ERROR LA PROMOCIÓN NO FUE CREADA";
                        } catch (SQLException sqle) { 

                        } 
                    }
                    rs.close();
                    // Check for next result set
                    results = stmt.getMoreResults();
                }
                return "true";
            } catch (SQLException sqle) { 
              return "ERROR LA PROMOCIÓN NO FUE CREADA";
            }      
        }else{
          return  "ERROR CON BASE DE DATOS";
        }
        
    }
    //SI SE USA
    public String getContacto() throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_contacto WHERE id_contacto =1")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=salida+rs.getString("nombre")+",,,";
                    salida=salida+rs.getString("celular")+",,,";
                    salida=salida+rs.getString("telefono")+",,,";
                    salida=salida+rs.getString("direccion")+",,,";
                    salida=salida+rs.getString("correo")+",,,";
                    salida=salida+rs.getString("pagina")+",,,";
                    salida=salida+rs.getString("facebook")+",,,";
                    salida=salida+rs.getString("instagram")+",,,";
                    salida=salida+rs.getString("twitter")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    
    public boolean updateContacto(Contacto contacto) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_contacto SET direccion='"+contacto.getDireccion()+"',correo='"+contacto.getCorreo()+"',celular='"+
                                                                contacto.getCelular()+"',nombre='"+contacto.getNombre()+"',pagina='"+contacto.getPagina()+"',twitter='"+contacto.getTwitter()+"',instagram='"+contacto.getInstagram()+"',facebook='"+contacto.getFacebook()+"'"+
                                                                " , usuario_modificacion='"+contacto.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_contacto =1")) {
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
    //SI SE USA
    public String getFundacion() throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_fundacion WHERE id_fundacion =1")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=salida+rs.getString("nombre")+",,,";
                    salida=salida+rs.getString("descripcion1")+",,,";
                    salida=salida+rs.getString("descripcion2")+",,,";
                    salida=salida+rs.getString("precio1")+",,,";
                    salida=salida+rs.getString("precio2")+",,,";
                    salida=salida+rs.getString("precio3")+",,,";
                    salida=salida+rs.getString("precio4")+",,,";
                    salida=salida+rs.getString("precio5")+",,,";
                    salida=salida+rs.getString("precio6")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateFundacion(Fundacion fundacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_fundacion SET nombre='"+fundacion.getNombre()+"',descripcion1='"+fundacion.getDescripcion1()+"',descripcion2='"+fundacion.getDescripcion2()+
                                                                "',precio1="+fundacion.getPrecio1()+ ",precio2="+fundacion.getPrecio2()+ ",precio3="+fundacion.getPrecio3()+ ",precio4="+fundacion.getPrecio4()+ ",precio5="+fundacion.getPrecio5()+ ",precio6="+fundacion.getPrecio6()+
                                                                " , usuario_modificacion='"+fundacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_fundacion =1")) {
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
    //SI SE USA
    public String getInformacion() throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_amigos_teatro WHERE id_amigos_teatro =1")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=rs.getString("informacion");
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateInformacion(String Informacion, String usuario_modificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_amigos_teatro SET informacion='"+Informacion+"'"+
                                                                " , usuario_modificacion='"+usuario_modificacion+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_amigos_teatro =1")) {
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
    //SI SE USA
    public String getAllBeneficios() throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_amigos_beneficios")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=salida+rs.getInt("id_amigos_beneficios")+",,,";
                    salida=salida+rs.getString("beneficio")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateBeneficio(Integer id, String beneficio, String usuario_modificacion)  throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_amigos_beneficios set beneficio='"+ beneficio+"' "+
                                                                " , usuario_modificacion='"+usuario_modificacion+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_amigos_beneficios ="+id)) {
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
    //SI SE USA
    public boolean updateEstadoBeneficio(Integer id, String estado, String usuario_modificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_amigos_beneficios WHERE id_amigos_beneficios ="+id)) {
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
    //SI SE USA
    public boolean insertBeneficio(String beneficio, String usuarioCreacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_amigos_beneficios (beneficio,usuario_creacion) VALUES ('"+beneficio+"','"+usuarioCreacion+"')")) {
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
     
    public String getAllPreguntas() throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_amigos_preguntas")) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=salida+rs.getInt("id_amigos_preguntas")+",,,";
                    salida=salida+rs.getString("pregunta")+",,,";
                    salida=salida+rs.getString("respuesta")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updatePregunta(Integer id,  String pregunta, String respuesta, String usuario_modificacion)  throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_amigos_preguntas set pregunta='"+ pregunta+"',respuesta=' "+respuesta+"'"+
                                                                " , usuario_modificacion='"+usuario_modificacion+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_amigos_preguntas ="+id)) {
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
    //SI SE USA
    public boolean updateEstadoPregunta(Integer id, String estado, String usuario_modificacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            System.out.println(id);
            try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_amigos_preguntas WHERE id_amigos_preguntas ="+id)) {
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
    //SI SE USA
    public boolean insertPregunta(String pregunta, String respuesta, String usuarioCreacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_amigos_preguntas (pregunta,respuesta,usuario_creacion) VALUES ('"+pregunta+"','"+respuesta+
                                                                "','"+usuarioCreacion+"')")) {
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
    public String getBeneficio(Integer id_beneficio) throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_amigos_beneficios WHERE id_amigos_beneficios="+id_beneficio)) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    salida=salida+rs.getInt("id_amigos_beneficios")+",,,";
                    salida=salida+rs.getString("beneficio")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public String getPregunta(Integer id_pregunta) throws SQLException{
        if (seteo()) {
            String salida="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_amigos_preguntas WHERE id_amigos_preguntas="+id_pregunta)) {
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    salida=salida+rs.getInt("id_amigos_preguntas")+",,,";
                    salida=salida+rs.getString("pregunta")+",,,";
                    salida=salida+rs.getString("respuesta")+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return salida;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    
    public Tarjeta getTarjeta(Integer idTarjeta) throws SQLException{
        if (seteo()) {
            Tarjeta tarjeta = new Tarjeta();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tarjeta_taquilla WHERE id_tarjeta_taquilla ="+idTarjeta.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    tarjeta.setIdTarjeta(rs.getInt("id_tarjeta_taquilla"));
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tarjeta where estado !='B'")) {
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
    public List<Tarjeta> getAllTarjetaTaquilla() throws SQLException{
        if (seteo()) {
            List<Tarjeta> tarjetas = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_tarjeta_taquilla where estado ='A'")) {
                ResultSet rs = stmt.executeQuery();
                Tarjeta tarjeta = new Tarjeta();

                while (rs.next()){
                    tarjeta = new Tarjeta();
                    tarjeta.setIdTarjeta(rs.getInt("id_tarjeta_taquilla"));
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_codigo_promocional where estado !='B'")) {
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
            if (codigoPromocional.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_codigo_promocional  WHERE id_codigo_promocional ="+codigoPromocional.getIdCodigoPromocional().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_codigo_promocional set estado='"+ codigoPromocional.getEstado()+"' "+
                                                                " , usuario_modificacion='"+codigoPromocional.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+codigoPromocional.getIdCodigoPromocional().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_codigo_promocional set estado='"+ codigoPromocional.getEstado()+"' "+
                                                                " , usuario_modificacion='"+codigoPromocional.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_codigo_promocional ="+codigoPromocional.getIdCodigoPromocional().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco_tarjeta where estado !='B'")) {
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_banco where estado !='B'")) {
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
    
    // PERFIL
        
    public String getPerfil(Integer idPerfil ) throws SQLException{
        if (seteo()) {
           Perfil perfil = new Perfil();
           String comando="";
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil_rol WHERE id_perfil ="+idPerfil.toString())) {
                ResultSet rs = stmt.executeQuery();
                Map<Integer, List> map = (Map<Integer, List>)new LinkedHashMap();
                while (rs.next()){
                     List<Integer> acciones = new ArrayList<>();
                    if (map.containsKey(rs.getInt("id_rol"))) {
                        acciones=map.get(rs.getInt("id_rol"));
                        acciones.add(rs.getInt("id_accion"));
                        map.put(rs.getInt("id_rol"), acciones);
                    }else{
                        acciones.add(rs.getInt("id_accion"));
                        map.put(rs.getInt("id_rol"), acciones);
                    }
                }
                for (Map.Entry<Integer, List> entry : map.entrySet()) {
                    List<Integer> acciones =entry.getValue(); 
                    comando=comando+entry.getKey()+":";
                    for (Integer a : acciones) {
                        comando=comando+a+",";
                    }
                    comando=comando.substring(0, comando.length()-1)+";";
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return comando; 
        }else{
          return null;  
        }
        
    }
    public List<Perfil> getAllPerfil() throws SQLException{
        if (seteo()) {
            List<Perfil> perfiles = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil where estado !='B'")) {
                ResultSet rs = stmt.executeQuery();
                Perfil perfil = new Perfil();

                while (rs.next()){
                    perfil = new Perfil();
                    perfil.setIdPerfil(rs.getInt("id_perfil"));
                    perfil.setNombre(rs.getString("nombre"));
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
            if (perfil.getEstado().equals("B")) {
               try (PreparedStatement stmt =  cnx.prepareStatement("CALL delete_perfil("+perfil.getIdPerfil()+")")) {
                    ResultSet rs =stmt.executeQuery();
                    if (rs.next()) {
                        System.out.println(rs.getInt("MYSQL_ERROR"));
                        PreparedStatement stmt1 =  cnx.prepareStatement("UPDATE tsa_perfil set estado='"+ perfil.getEstado()+"' "+
                                                                " , usuario_modificacion='"+perfil.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil ="+perfil.getIdPerfil().toString());
                        stmt1.executeUpdate();
                        check = true;
                    }
                } catch (SQLException sqle) { 
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_perfil set estado='"+ perfil.getEstado()+"' "+
                                                                " , usuario_modificacion='"+perfil.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_perfil ="+perfil.getIdPerfil().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            } 
                   
            return check;
        }else{
          return false;  
        }
    }
    public boolean updatePerfil(Perfil perfil) throws SQLException{
        if (seteo()) {
            boolean check = false;
            int id=perfil.getIdPerfil();
            String nombre=perfil.getNombre();
            String permisos=perfil.getDescripcion();
            String tipo=perfil.getTipo();
            String usuario=perfil.getUsuarioCreacion();
            Map<String, Integer> map = (Map<String, Integer>)new LinkedHashMap();
            Map<Integer, List<Integer>> map1 = (Map<Integer, List<Integer>>)new LinkedHashMap();
            Map<Integer, List<Integer>> map2 = (Map<Integer, List<Integer>>)new LinkedHashMap();
            Map<Integer, List<Integer>> agregar = (Map<Integer, List<Integer>>)new LinkedHashMap();
            Map<Integer, List<Integer>> eliminar = (Map<Integer, List<Integer>>)new LinkedHashMap();
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_rol where estado !='B'");
                ResultSet rs = stmt.executeQuery();
                PerfilRol perfilRol = new PerfilRol();
                while (rs.next()){
                    map.put(rs.getString("tipo"),rs.getInt("id_rol"));
                }  
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil_rol WHERE id_perfil ="+id);
                rs = stmt.executeQuery();

                while (rs.next()){
                    List<Integer> acciones = new ArrayList<>();
                    if (map1.containsKey(rs.getInt("id_rol"))) {
                        acciones=map1.get(rs.getInt("id_rol"));
                        acciones.add(rs.getInt("id_accion"));
                        map1.put(rs.getInt("id_rol"), acciones);
                    }else{
                        acciones.add(rs.getInt("id_accion"));
                        map1.put(rs.getInt("id_rol"), acciones);
                    }
                }
                String[] padreT = permisos.split(";");
                //separo las plateas
                if (padreT.length>0 && !permisos.equals("")) {
                    for (int i = 0; i < padreT.length; i++) {
                        String[] padreG = padreT[i].split(":");
                        String padre=padreG[0];

                        String[] hijos = padreG[1].split(",");
                        if (map.containsKey(padre.substring(1))) {
                            List <Integer> acciones = new ArrayList<>();
                             for (int j = 0; j < hijos.length; j++) {
                                 acciones.add(Integer.parseInt(hijos[j].trim()));  
                            }
                            int hij=map.get(padre.substring(1));
                            map2.put(hij, acciones);
                        }
                    }  
                }
                if (map2.isEmpty()) {
                    String comando2="DELETE FROM teatro.tsa_perfil_rol WHERE id_perfil="+id;
                    stmt.executeUpdate(comando2);
                }else {
                    for (Map.Entry<Integer, List<Integer>> entry : map2.entrySet()) {
                        List<Integer> acciones2 =entry.getValue(); 
                        if (map1.containsKey(entry.getKey())) {
                             List<Integer> acciones1 =map1.get(entry.getKey()); 
                            if (!acciones2.equals(acciones1)) {
                                for (Integer a : acciones1) {
                                    if (!acciones2.contains(a)) {
                                        List<Integer> acciones = new ArrayList<>();
                                        if (eliminar.containsKey(entry.getKey())) {
                                            acciones=eliminar.get(entry.getKey());
                                            acciones.add(a);
                                            eliminar.put(entry.getKey(), acciones);
                                        }else{
                                            acciones.add(a);
                                            eliminar.put(entry.getKey(), acciones);
                                        }
                                    }
                                }
                                for (Integer a : acciones2) {
                                    if (!acciones1.contains(a)) {
                                        List<Integer> acciones = new ArrayList<>();
                                        if (agregar.containsKey(entry.getKey())) {
                                            acciones=agregar.get(entry.getKey());
                                            acciones.add(a);
                                            agregar.put(entry.getKey(), acciones);
                                        }else{
                                            acciones.add(a);
                                            agregar.put(entry.getKey(), acciones);
                                        }
                                    }
                                }
                            }
                        }else{
                            agregar.put(entry.getKey(), acciones2);
                        }

                    }
                    for (Map.Entry<Integer, List<Integer>> entry : map1.entrySet()) {
                        List<Integer> acciones2 =entry.getValue(); 
                        if (!map2.containsKey(entry.getKey())) {
                            eliminar.put(entry.getKey(), acciones2);
                        }

                    }
                }
                
                String comando1="INSERT INTO teatro.tsa_perfil_rol (id_perfil,id_rol,id_accion,usuario_creacion) VALUES ";
                cnx.setAutoCommit(false);
                boolean band=false;
                try {
                    for (Map.Entry<Integer, List<Integer>> entry : agregar.entrySet()) {
                        List<Integer> acciones =entry.getValue(); 
                        for (Integer a : acciones) {
                              comando1= comando1+ "("+id+","+entry.getKey()+","+a+",'"+usuario+"'),";
                        }
                        band=true;
                    }
                    if (band) {
                        stmt.executeUpdate(comando1.substring(0, comando1.length()-1));
                    }
                    for (Map.Entry<Integer, List<Integer>> entry : eliminar.entrySet()) {
                        List<Integer> acciones =entry.getValue(); 
                        for (Integer a : acciones) {
                            String comando2="DELETE FROM teatro.tsa_perfil_rol WHERE id_perfil="+id+" and id_rol="+entry.getKey()+" and id_accion="+a;
                            stmt.executeUpdate(comando2);
                        }
                    }
                    if (tipo.equals("A")) {
                        String comando2="UPDATE teatro.tsa_perfil SET nombre='"+nombre+"', tipo='Administrador' WHERE id_perfil="+id;
                        stmt.executeUpdate(comando2);
                    }else{
                        String comando2="UPDATE teatro.tsa_perfil SET nombre='"+nombre+"', tipo='Usuario' WHERE id_perfil="+id;
                        stmt.executeUpdate(comando2);
                    } 
                    cnx.commit();
                } finally {
                    cnx.rollback();
                }

                check=true;
            } catch (SQLException sqle) { 
                System.out.println("Error en la ejecución de la consulta:" 
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
            String nombre=perfil.getNombre();
            String permisos=perfil.getDescripcion();
            String tipo=perfil.getTipo();
            String usuario=perfil.getUsuarioCreacion();
            String comando="";
            if (tipo.equals("A")) {
                comando="CALL perfil('"+nombre+"','','Administrador','"+usuario+"')";
            }else{
                comando="CALL perfil('"+nombre+"','','Usuario','"+usuario+"')";
            }    
            int id=0;
            Map<String, Integer> map = (Map<String, Integer>)new LinkedHashMap();
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_rol where estado !='B'");
                ResultSet rs = stmt.executeQuery();
                PerfilRol perfilRol = new PerfilRol();
                while (rs.next()){
                    map.put(rs.getString("tipo"),rs.getInt("id_rol"));
                }  
                stmt =  cnx.prepareStatement(comando);
                rs =stmt.executeQuery();

                while (rs.next()){
                    id=Integer.parseInt(rs.getString(1).trim());

                }
                String[] padreT = permisos.split(";");
                //separo las plateas
                 if (padreT.length>0 && !permisos.equals("")) {
                    String comando1="INSERT INTO teatro.tsa_perfil_rol (id_perfil,id_rol,id_accion,usuario_creacion) VALUES ";
                    for (int i = 0; i < padreT.length; i++) {
                        String[] padreG = padreT[i].split(":");
                        String padre=padreG[0];
                        String[] hijos = padreG[1].split(",");

                        if (map.containsKey(padre.substring(1))) {
                            for (int j = 0; j < hijos.length; j++) {
                                comando1= comando1+ "("+id+","+map.get(padre.substring(1))+","+hijos[j]+",'"+usuario+"'),";
                            }

                        }
                    }
                    stmt =  cnx.prepareStatement(comando1.substring(0, comando1.length()-1));
                    stmt.executeUpdate();
                }
                check=true;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_perfil_rol WHERE id_perfil="+id);
                stmt.executeUpdate();
                stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_perfil WHERE id_perfil="+id);
                stmt.executeUpdate();
            }  
            return check;
        }else{
          return false;  
        }
       
    }
    public String getPerfilRol(Integer idPerfil,Integer idRol) throws SQLException{
        if (seteo()) {

            String rol="";
            //System.out.println(idPerfil);
            //System.out.println(idRol);
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT tpr.* FROM tsa_usuario tu INNER JOIN tsa_perfil tp  ON tp.id_perfil =tu.id_perfil INNER JOIN tsa_perfil_rol tpr ON tpr.id_perfil =tp.id_perfil and tu.id_usuario="+idPerfil.toString()+" and tpr.id_rol="+idRol)) {
                ResultSet rs = stmt.executeQuery();
                boolean band=false;
                while (rs.next()){
                    rol=rol+rs.getInt("id_accion")+",";
                    band=true;
                }
                if (band) {
                    rol=rol.substring(0, rol.length()-1);
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
    public String getAllPerfilRol(Integer idPerfil) throws SQLException{
        if (seteo()) {

            String rol="";
            //System.out.println(idPerfil);
            //System.out.println(idRol);
            List roles = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT tpr.* FROM tsa_usuario tu INNER JOIN tsa_perfil tp  ON tp.id_perfil =tu.id_perfil INNER JOIN tsa_perfil_rol tpr ON tpr.id_perfil =tp.id_perfil and tu.id_usuario="+idPerfil.toString())) {
                ResultSet rs = stmt.executeQuery();
                boolean band=false;
                while (rs.next()){
                    if (!roles.contains(rs.getInt("id_rol"))) {
                        rol=rol+rs.getInt("id_rol")+",";
                        roles.add(rs.getInt("id_rol"));
                    }
                    
                    band=true;
                }
                if (band) {
                    rol=rol.substring(0, rol.length()-1);
                }
                
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            //System.out.println(rol);
            return rol;
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
    public Rol getRol(Integer idRol) throws SQLException{
        if (seteo()) {
            Rol rol = new Rol();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_perfil WHERE id_perfil ="+idRol.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    rol.setIdRol(rs.getInt("id_perfil"));
                    rol.setDescripcion(rs.getString("nombre"));
                    rol.setModulo(rs.getString("tipo"));
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
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_rol where estado !='B'")) {
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
    
    
    
   //PERFIL USUARIOS 
    //USUARIO ADMINISTRADOR
    //SI SE USA
    public Usuario getUsuario(Integer idUsuario) throws SQLException{
        if (seteo()) {
            Usuario usuario = new Usuario();
            PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario WHERE id_usuario ="+idUsuario.toString());
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuario.setIdUsuario(rs.getInt("id_usuario"));
                    usuario.setNombres(rs.getString("nombres"));
                    usuario.setApellidos(rs.getString("apellidos"));
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
            return usuario;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public List<Usuario> getAllUsuario() throws SQLException{
        if (seteo()) {
            List<Usuario> usuarios = new ArrayList<>();
            PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario where estado !='B'");
            ResultSet rs = stmt.executeQuery();
            Usuario usuario;

            while (rs.next()){
                usuario = new Usuario();
                usuario.setIdUsuario(rs.getInt("id_usuario"));
                usuario.setNombres(rs.getString("nombres"));
                usuario.setApellidos(rs.getString("apellidos"));
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
            return usuarios;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateEstadoUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="";
            try {
                if (usuario.getEstado().equals("C")) {
                    Random r = new Random();
                    int cantidad = r.nextInt(90000) + 10000;
                     comando="UPDATE tsa_usuario set fecha_reseteo=sysdate(), codigo='"+ cantidad+"' "+
                                                                  " , usuario_modificacion='"+usuario.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario ="+usuario.getIdUsuario().toString();
                    try {
                        PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario WHERE id_usuario ="+usuario.getIdUsuario().toString());
                         ResultSet rs = stmt.executeQuery();
                         String nombre="";
                         String correo="";
                        while (rs.next()){
                            nombre =rs.getString("nombres")+" "+ rs.getString("apellidos");
                            correo=rs.getString("correo");
                        }  
                        SendMail(1, correo, "enlace", nombre,"", cantidad+"");
                    } catch (FileNotFoundException ex) {
                        System.out.println("Error en la ejecución de la actualizacion:"+ex.getMessage());
                        return false;
                    }
                }else{
                     comando="UPDATE tsa_usuario set estado='"+ usuario.getEstado()+"' "+
                                                                " , usuario_modificacion='"+usuario.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario ="+usuario.getIdUsuario().toString();
                }
                PreparedStatement stmt =  cnx.prepareStatement(comando);
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
    //SI SE USA
    public boolean updateUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario set nombres='"+ usuario.getNombres()+"' "+
                                                                " , apellidos='"+usuario.getApellidos()+"' "+
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
    
    public String generarCodigo(String usuario, String correo)  throws SQLException{
        if (seteo()) {
            try {
               // System.out.println(codigo);
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario where usuario='"+usuario+"'");
                ResultSet rs = stmt.executeQuery();
                boolean band=false;
                boolean band1=false;
                while (rs.next()){
                    band=true;
                    boolean iscorreo=rs.getString("correo").contains("@");
                    if (iscorreo) {
                        band1=true;
                        if (rs.getString("correo").equals(correo)) {
                            String   nombre =rs.getString("nombres")+" "+ rs.getString("apellidos");
                            Random r = new Random();
                            int cantidad = r.nextInt(90000) + 10000;
                            String comando="UPDATE tsa_usuario set fecha_reseteo=sysdate(), codigo='"+ cantidad+"' "+
                                                                        " , usuario_modificacion='"+usuario+"',fecha_modificacion=sysdate()"+
                                                                        " WHERE id_usuario="+rs.getInt("id_usuario");
                            try {
                                stmt =  cnx.prepareStatement(comando);
                                stmt.executeUpdate();
                                SendMail(1, correo, "enlace", nombre,"", cantidad+"");
                                return "true";
                            } catch (FileNotFoundException ex) {
                                System.out.println("Error en la ejecución de la actualizacion:"+ex.getMessage());
                                return "Error con base de datos";
                            }
                           
                        }
                    }
                }
                if (band) {
                    if (!band1) {
                   //     System.out.println("sdasd");
                        return "No cuenta con correo registrado, Contáctese con el administrador";  
                    }else{
                        return "Correo incorrecto";      
                    }
                }else{
              //      System.out.println("1111111111");
                 return "Usuario no Registrado";   
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return "Error con base de datos";
        }else{
          return null;  
        }
        
    } 
   //SI SE USA
    public String  validadCodigo(String usuario, String codigo, String clave) throws SQLException{
        if (seteo()) {
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario where codigo='"+codigo+"' and (usuario='"+usuario.trim()+"' or correo ='"+usuario.trim()+"')");
                ResultSet rs = stmt.executeQuery();
                boolean band=true;
                while (rs.next()){
                    PreparedStatement stmt1 =  cnx.prepareStatement("UPDATE tsa_usuario set contrasena='"+ clave+"', codigo=''  WHERE id_usuario ="+rs.getInt("id_usuario"));
                    stmt1.executeUpdate();
                    return "true";
                }          
                
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return "false";
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean insertUsuario(Usuario usuario) throws SQLException{
        if (seteo()) {
            boolean check = false;

            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario(nombres,apellidos,usuario,cedula,sexo,correo,celular,contrasena,id_perfil,fecha_nacimiento,direccion,estado,usuario_creacion)"
                                                                + " VALUES ('"+usuario.getNombres()+"' "+
                                                                " ,'"+usuario.getApellidos()+"' "+            
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
                                                                " ,'"+usuario.getUsuarioCreacion()+"')")) {
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
    
    //USUARIO CLIENTE
    //SI SE USA
    public UsuarioCliente getUsuarioCliente(Integer idUsuarioCliente) throws SQLException{
        if (seteo()) {
            UsuarioCliente usuarioCliente = new UsuarioCliente();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente ="+idUsuarioCliente.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuarioCliente.setIdUsuarioCliente(rs.getInt("id_usuario_cliente"));
                    usuarioCliente.setNombres(rs.getString("nombres"));
                    usuarioCliente.setApellidos(rs.getString("apellidos"));
                    usuarioCliente.setUsuario(rs.getString("usuario"));
                    usuarioCliente.setCedula(rs.getString("cedula"));
                    usuarioCliente.setCorreo(rs.getString("correo"));
                    usuarioCliente.setSexo(rs.getString("sexo"));
                     usuarioCliente.setPuntos(rs.getInt("puntos_acumulados"));
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
    //SI SE USA
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
                    usuarioCliente.setApellidos(rs.getString("apellidos"));
                    usuarioCliente.setUsuario(rs.getString("usuario"));
                    usuarioCliente.setCedula(rs.getString("cedula"));
                    usuarioCliente.setCorreo(rs.getString("correo"));
                    usuarioCliente.setSexo(rs.getString("sexo"));
                    usuarioCliente.setPuntos(rs.getInt("puntos_acumulados"));
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
    //SI SE USA
    public boolean updateEstadoUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="";
            try {
                if (usuarioCliente.getEstado().equals("C")) {
                    Random r = new Random();
                    int cantidad = r.nextInt(90000) + 10000;
                    comando="UPDATE tsa_usuario_cliente set fecha_reseteo=sysdate(), codigo='"+ cantidad+"' "+
                                                                " , usuario_modificacion='"+usuarioCliente.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_cliente ="+usuarioCliente.getIdUsuarioCliente().toString();
                    try {
                        PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente ="+usuarioCliente.getIdUsuarioCliente().toString());
                         ResultSet rs = stmt.executeQuery();
                         String nombre="";
                         String correo="";
                        while (rs.next()){
                            nombre =rs.getString("nombres")+" "+ rs.getString("apellidos");
                            correo=rs.getString("correo");
                        }  
                        SendMail(1, correo, "enlace", nombre,"", cantidad+"");
                    } catch (FileNotFoundException ex) {
                        System.out.println("Error en la ejecución de la actualizacion:"+ex.getMessage());
                        return false;
                    }
                }else{
                    if (usuarioCliente.getEstado().equals("B")) {
                        try (PreparedStatement stmt =  cnx.prepareStatement("CALL delete_usuario("+usuarioCliente.getIdUsuarioCliente()+")")) {
                            ResultSet rs =stmt.executeQuery();
                            if (rs.next()) {
                                check = false;
                            }
                        } catch (SQLException sqle) {
                            System.out.println("siadda");
                            check = true;
                        } 
                    }else{
                        comando="UPDATE tsa_usuario_cliente set estado='"+ usuarioCliente.getEstado()+"' "+
                                                                " , usuario_modificacion='"+usuarioCliente.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_usuario_cliente ="+usuarioCliente.getIdUsuarioCliente().toString();   
                        PreparedStatement stmt =  cnx.prepareStatement(comando);
                        stmt.executeUpdate();
                        check = true;
                    }
                   
                }

            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la actualizacion:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }             
            return check;
        }else{
          return false;  
        }
    }
    //SI SE USA
    public boolean updateUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_cliente set nombres='"+ usuarioCliente.getNombres()+"' "+
                                                                " , apellidos='"+usuarioCliente.getApellidos()+"' "+
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
    //SI SE USA
    public boolean insertUsuarioCliente(UsuarioCliente usuarioCliente) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario_cliente (nombres,apellidos,usuario,cedula,sexo,correo,celular,contrasena,fecha_nacimiento,direccion,amigo_teatro,estado,usuario_creacion)"
                                                                + " VALUES ('"+usuarioCliente.getNombres()+"' "+
                                                                " ,'"+usuarioCliente.getApellidos()+"' "+
                                                                " ,'"+usuarioCliente.getUsuario()+"' "+
                                                                " ,'"+usuarioCliente.getCedula()+"' "+
                                                                " ,'"+usuarioCliente.getSexo()+"' "+
                                                                " ,'"+usuarioCliente.getCorreo()+"' "+
                                                                " ,'"+usuarioCliente.getCelular()+"' "+
                                                                " ,'"+usuarioCliente.getContraseña()+"' "+
                                                                " ,'"+usuarioCliente.getFechaNacimiento()+"' "+
                                                                " ,'"+usuarioCliente.getDireccion()+"' "+
                                                                " ,'"+usuarioCliente.getAmigoTeatro()+"'"+
                                                                " ,'"+usuarioCliente.getEstado()+"' "+
                                                                " ,'"+usuarioCliente.getUsuarioCreacion()+"')")) {
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
    
    //USUARIO EVENTO
    //SI SE USA
    public UsuarioEvento getUsuarioEvento(Integer idUsuarioEvento) throws SQLException{
        if (seteo()) {
            UsuarioEvento usuarioEvento = new UsuarioEvento();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_evento WHERE id_usuario_evento ="+idUsuarioEvento.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    usuarioEvento.setIdUsuarioEvento(rs.getInt("id_usuario_evento"));
                    usuarioEvento.setNombres(rs.getString("nombres"));
                    usuarioEvento.setApellidos(rs.getString("apellidos"));
                    usuarioEvento.setUsuario(rs.getString("usuario"));
                    usuarioEvento.setCedula(rs.getString("cedula"));
                    usuarioEvento.setCorreo(rs.getString("correo"));
                    usuarioEvento.setSexo(rs.getString("sexo"));
                    usuarioEvento.setCelular(rs.getString("celular"));
                    usuarioEvento.setContraseña(rs.getString("contrasena"));
                    usuarioEvento.setPerfil(rs.getInt("id_perfil"));
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
    //SI SE USA
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
                    usuarioEvento.setApellidos(rs.getString("apellidos"));
                    usuarioEvento.setUsuario(rs.getString("usuario"));
                    usuarioEvento.setCedula(rs.getString("cedula"));
                    usuarioEvento.setCorreo(rs.getString("correo"));
                    usuarioEvento.setSexo(rs.getString("sexo"));
                    usuarioEvento.setCelular(rs.getString("celular"));
                    usuarioEvento.setContraseña(rs.getString("contrasena"));
                    usuarioEvento.setPerfil(rs.getInt("id_perfil"));
                    usuarioEvento.setFechaNacimiento(rs.getDate("fecha_nacimiento"));
                    usuarioEvento.setDireccion(rs.getString("direccion"));
                    usuarioEvento.setEstado(rs.getString("estado"));
                    usuariosEventos.add(usuarioEvento);
                }  
                //System.out.println(usuariosEventos.toString());
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return usuariosEventos;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateEstadoUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="";
            try {
                if (usuarioEvento.getEstado().equals("C")) {
                    Random r = new Random();
                    int cantidad = r.nextInt(90000) + 10000;
                    comando="UPDATE tsa_usuario_evento set fecha_reseteo=sysdate(), codigo='"+ cantidad+"' "+
                                                                    " , usuario_modificacion='"+usuarioEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_usuario_evento ="+usuarioEvento.getIdUsuarioEvento().toString();
                    try {
                        PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_usuario_evento WHERE id_usuario_evento ="+usuarioEvento.getIdUsuarioEvento().toString());
                         ResultSet rs = stmt.executeQuery();
                         String nombre="";
                         String correo="";
                        while (rs.next()){
                            nombre =rs.getString("nombres")+" "+ rs.getString("apellidos");
                            correo=rs.getString("correo");
                        }  
                        SendMail(1, correo, "enlace", nombre,"", cantidad+"");
                    } catch (FileNotFoundException ex) {
                        System.out.println("Error en la ejecución de la actualizacion:"+ex.getMessage());
                        return false;
                    }
                }else{
                    comando="UPDATE tsa_usuario_evento set estado='"+ usuarioEvento.getEstado()+"' "+
                                                                    " , usuario_modificacion='"+usuarioEvento.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                    " WHERE id_usuario_evento ="+usuarioEvento.getIdUsuarioEvento().toString();
                }
                PreparedStatement stmt =  cnx.prepareStatement(comando);
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
    //SI SE USA
    public boolean updateUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_usuario_evento set nombres='"+ usuarioEvento.getNombres()+"' "+
                                                                " , apellidos='"+usuarioEvento.getApellidos()+"' "+
                                                                " , usuario='"+usuarioEvento.getUsuario()+"' "+
                                                                " , cedula='"+usuarioEvento.getCedula()+"' "+
                                                                " , sexo='"+usuarioEvento.getSexo()+"' "+
                                                                " , correo='"+usuarioEvento.getCorreo()+"' "+
                                                                " , celular='"+usuarioEvento.getCelular()+"' "+
                                                                " , contrasena='"+usuarioEvento.getContraseña()+"' "+
                                                                " , id_perfil="+usuarioEvento.getPerfil().toString()+
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
    //SI SE USA
    public boolean insertUsuarioEvento(UsuarioEvento usuarioEvento) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO tsa_usuario_evento(nombres,apellidos,usuario,cedula,sexo,correo,celular,contrasena,id_perfil,fecha_nacimiento,direccion,estado,usuario_creacion)"
                                                    + " VALUES ('"+ usuarioEvento.getNombres()+"' "+
                                                                " ,'"+ usuarioEvento.getApellidos()+"' "+        
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
                                                                " ,'"+usuarioEvento.getUsuarioCreacion()+"')")) {
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
    
     public Facturacion getFacturacion(Integer idFacturacion) throws SQLException{
        if (seteo()) {
            Facturacion facturacion = new Facturacion();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_facturacion WHERE id_facturacion ="+idFacturacion.toString())) {
                ResultSet rs = stmt.executeQuery();

                while (rs.next()){
                    if (rs.getString("tipo").equals("R")) {
                        facturacion.setRazon(rs.getString("razon_social"));
                        facturacion.setCedula(rs.getString("ruc"));
                    }else{
                        facturacion.setNombres(rs.getString("nombres"));
                        facturacion.setApellidos(rs.getString("apellidos"));
                        facturacion.setCedula(rs.getString("cedula"));
                    }
                    facturacion.setIdFacturacion(rs.getInt("id_facturacion"));
                    facturacion.setEstado(rs.getString("estado"));
                    facturacion.setDireccion(rs.getString("direccion"));
                    facturacion.setCorreo(rs.getString("correo"));
                    facturacion.setTipo(rs.getString("tipo"));
                }
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return facturacion;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public List<Facturacion> getAllFacturacion(Integer idUsuario) throws SQLException{
        if (seteo()) {
            List<Facturacion> facturacionT = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_facturacion where estado !='B' and id_usuario_cliente="+idUsuario)) {
                ResultSet rs = stmt.executeQuery();
                Facturacion facturacion;

                while (rs.next()){
                    facturacion = new Facturacion();
                    if (rs.getString("tipo").equals("R")) {
                        facturacion.setNombres(rs.getString("razon_social"));
                        facturacion.setCedula(rs.getString("ruc"));
                    }else{
                        facturacion.setNombres(rs.getString("nombres")+" "+rs.getString("apellidos"));
                        facturacion.setCedula(rs.getString("cedula"));
                    }
                    facturacion.setIdFacturacion(rs.getInt("id_facturacion"));
                    facturacion.setEstado(rs.getString("estado"));
                    facturacion.setTipo(rs.getString("tipo"));
                    facturacion.setDireccion(rs.getString("direccion"));
                    facturacion.setCorreo(rs.getString("correo"));
                    facturacionT.add(facturacion);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return facturacionT;
        }else{
          return null;  
        }
        
    }
    //SI SE USA
    public boolean updateEstadoFacturacion(Facturacion facturacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (facturacion.getEstado().equals("B")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("DELETE FROM tsa_facturacion  WHERE id_facturacion ="+facturacion.getIdFacturacion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                   PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_facturacion set estado='"+ facturacion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+facturacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_facturacion ="+facturacion.getIdFacturacion().toString());
                    stmt.executeUpdate();
                    check = true;
                } 
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_facturacion set estado='"+ facturacion.getEstado()+"' "+
                                                                " , usuario_modificacion='"+facturacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_facturacion ="+facturacion.getIdFacturacion().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }    
                 
            return check;
        }else{
          return false;  
        }
    }
    //SI SE USA
    public boolean updateFacturacion(Facturacion facturacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            String comando="";
            if (facturacion.getTipo().equals("R")) {
                  comando="UPDATE tsa_facturacion set ruc='"+ facturacion.getRuc()+"' "+
                                                    " , tipo='"+facturacion.getTipo()+"' "+   
                                                    " , razon_social='"+facturacion.getRazon()+"' "+
                                                    " , direccion='"+facturacion.getDireccion()+"' "+
                                                    " , correo='"+facturacion.getCorreo()+"' "+
                                                    " , usuario_modificacion='"+facturacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                    " WHERE id_facturacion ="+facturacion.getIdFacturacion().toString();
            }else{
                comando="UPDATE tsa_facturacion set nombres='"+ facturacion.getNombres()+"' "+
                                                    " , tipo='"+facturacion.getTipo()+"' "+   
                                                    " , apellidos='"+facturacion.getApellidos()+"' "+
                                                    " , cedula='"+facturacion.getCedula()+"' "+
                                                    " , direccion='"+facturacion.getDireccion()+"' "+
                                                    " , correo='"+facturacion.getCorreo()+"' "+    
                                                    " , usuario_modificacion='"+facturacion.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                    " WHERE id_facturacion ="+facturacion.getIdFacturacion().toString();
            }
            try (PreparedStatement stmt =  cnx.prepareStatement(comando)) {
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
    //SI SE USA
    public boolean insertFacturacion(Facturacion facturacion) throws SQLException{
        if (seteo()) {
            boolean check = false;
            try (PreparedStatement stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_facturacion (nombres,apellidos,cedula,razon_social,ruc,direccion,correo, tipo,id_usuario_cliente, usuario_creacion)"
                                                                + " VALUES ('"+facturacion.getNombres()+"' "+
                                                                " ,'"+facturacion.getApellidos()+"' "+
                                                                " ,'"+facturacion.getCedula()+"' "+
                                                                " ,'"+facturacion.getRazon()+"' "+
                                                                " ,'"+facturacion.getRuc()+"' "+
                                                                " ,'"+facturacion.getDireccion()+"' "+
                                                                " ,'"+facturacion.getCorreo()+"' "+        
                                                                " ,'"+facturacion.getTipo()+"' "+    
                                                                " ,"+facturacion.getIdUsuario()+
                                                                " ,'"+facturacion.getUsuarioCreacion()+"')")) {
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
    public String insertReservaP(Reserva reserva) throws SQLException{
        if (seteo()) {
            String check = "";
            actualizar(reserva.getIdUsuario());
           LinkedList<String> lista=new LinkedList();
           LinkedList<Integer> lista_id=new LinkedList();
            try {
                String asient=reserva.getAsientos();
                String[] parts = asient.split(",");
                //separo las plateas
                for (int i = 0; i < parts.length; i++) {
                    lista.add(parts[i]);
                }
                //System.out.println(lista);
                PreparedStatement stmt =  cnx.prepareStatement("SELECT td.* FROM tsa_funcion tf INNER JOIN tsa_distribucion td ON td.id_funcion =tf.id_funcion and tf.id_funcion="+reserva.getIdFuncion());
                ResultSet rs =stmt.executeQuery();
                int id_sala=0;
                LinkedList<String> vendidos=new LinkedList();
                LinkedList<Integer> plateas=new LinkedList();
                Map<Integer,   Platea> mapPlateas = (Map<Integer, Platea>)new LinkedHashMap();
                Map<Integer,   LinkedList> map = (Map<Integer, LinkedList>)new LinkedHashMap();
                boolean band=false;
                while (rs.next()){
                    LinkedList objetos=new LinkedList();
                    
                    int asiento=rs.getInt("numero");
                    String letra=rs.getString("fila")+asiento;
                    if (lista.contains(letra)) {
                        String estado=rs.getString("estado");
                        
                        int id_platea=rs.getInt("id_platea");
                        if (!plateas.contains(id_platea)) {
                            plateas.add(id_platea);
                        }
                        int id=rs.getInt("id_distribucion");
                        objetos.add(estado);
                        objetos.add(id_platea);
                        objetos.add(letra);
                        map.put(id, objetos);
                        lista_id.add(id);
                        if (estado.equals("V") | estado.equals("E") | estado.equals("C")| estado.equals("B")) {
                            vendidos.add(letra);
                            band =true;
                        }
                    }
                }
                for(Integer str: plateas){
                    mapPlateas.put(str,  this.getPlatea(str));
                }
                System.out.println(mapPlateas);
                if (band) {
                    return "ERROR LOS ASIENTOS: " +vendidos+" NO SE ENCUENTRA DISPONIBLE";
                }
                //System.out.println( vendidos);
                //System.out.println( map);
                int acum=0;
                int id=0;
                float total=0;
                for(Integer str: lista_id)
                {   
                    LinkedList asientos=map.get(str);
                    String estado=(String) asientos.get(0);
                    int id_platea=(int) asientos.get(1);
                    String Nasiento=(String) asientos.get(2);
                   
                    if (estado.equals("A")) {
                        if (mapPlateas.containsKey(id_platea)) {
                            Platea pl=mapPlateas.get(id_platea);
                            total=total+pl.getCosto();
                        }
                    }
                } 
                int id_reserva=0;
                try{
                    System.out.println("total="+total);
                    String comando="CALL insert_reserva("+reserva.getIdUsuario()+","+reserva.getIdEvento()+","+reserva.getIdFuncion()+","+total+",'"+reserva.getUsuarioCreacion()+"')";
                    stmt =  cnx.prepareStatement(comando);
                    rs =stmt.executeQuery();
                    
                    while (rs.next()){
                        id_reserva=Integer.parseInt(rs.getString(1).trim());
                    }
                    for(Integer str: lista_id)
                    {   


                        LinkedList asientos=map.get(str);
                        String estado=(String) asientos.get(0);
                        int id_platea=(int) asientos.get(1);
                        String Nasiento=(String) asientos.get(2);
                        if (estado.equals("A")) {
                            System.out.println(Nasiento);
                            Platea pl=mapPlateas.get(id_platea);
                            float precio=pl.getCosto();

                             //System.out.println(comando);
                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_reserva_asientos (id_reserva,id_platea,asiento,precio,usuario_creacion) VALUES "
                                    + "("+id_reserva+","+id_platea+",'"+Nasiento+"',"+precio+",'"+reserva.getUsuarioCreacion()+"')");

                            stmt.executeUpdate();

                            stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_bloqueo_asiento_taquilla (id_usuario,id_distribucion,id_reserva,asiento) VALUES "
                                    + "("+reserva.getIdUsuario()+","+str+","+id_reserva+",'"+Nasiento+"')");

                            stmt.executeUpdate();
                            // Loop through the available result sets.
                        }
                    }  
                     return "true";
                } catch (SQLException sqle) { 
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva_asientos WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_asiento_taquilla WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    System.out.println(sqle);

                    return "ERROR NO SE PUEDE ACTUALIZAR";
                }
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                
                return "ERROR NO SE PUEDE ACTUALIZAR";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";  
        } 
    }
    public String insertReservaC(Reserva reserva) throws SQLException{
        if (seteo()) {
            String check = "";
            actualizar(reserva.getIdUsuario());
            LinkedList<Integer> plateas=new LinkedList();
            Map<Integer,Integer> asientos = (Map<Integer, Integer>)new LinkedHashMap();
            Map<Integer,Integer> platea_funcion = (Map<Integer, Integer>)new LinkedHashMap();
            String asient=reserva.getAsientos();
            String[] parts = asient.split(";");
            //separo las plateas
            for (int i = 0; i < parts.length; i++) {
                 String[] parts2 = parts[i].split(":");
                 Integer platea=Integer.parseInt(parts2[0]);
                 Integer cant=Integer.parseInt(parts2[1]);
                 plateas.add(platea);
                 asientos.put(platea, cant);
            }
            System.out.println(asientos);
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT tp.id_platea ,tpf.id_platea_funcion ,tf.*,tp.aforo as 'aforoP', tpf.vendido  as 'vendidoP', tpf.cantidad_bloqueado as 'bloqueadoP', "
                        + "tpf.cantidad_cortesia  as 'cortesiaP', tpf.cantidad_espera  as 'esperaP' FROM tsa_funcion tf INNER JOIN tsa_evento te ON tf.id_evento = te.id_evento   "
                        + "INNER JOIN tsa_platea tp ON tp.id_evento =te.id_evento INNER JOIN tsa_platea_funcion tpf ON tpf.id_funcion =tf.id_funcion and tpf.id_platea =tp.id_platea "
                        + "and  tf.id_funcion="+reserva.getIdFuncion());
                ResultSet rs =stmt.executeQuery();
                int id_sala=0;
                String sala="";
                while (rs.next()){
                    if (asientos.containsKey(rs.getInt("id_platea"))) {
                        int aforo=rs.getInt("aforo");
                        int cantidad_vendida=rs.getInt("cantidad_vendida");
                        int cantidad_boqueada=rs.getInt("cantidad_bloqueado");
                        int cantidad_cortesia=rs.getInt("cantidad_cortesia");
                        int cantidad_espera=rs.getInt("cantidad_espera");
                        int aforo1=rs.getInt("aforoP");
                        int cantidad_vendida1=rs.getInt("vendidoP");
                        int cantidad_boqueada1=rs.getInt("bloqueadoP");
                        int cantidad_cortesia1=rs.getInt("cortesiaP");
                        int cantidad_espera1=rs.getInt("esperaP");
                        platea_funcion.put(rs.getInt("id_platea"), rs.getInt("id_platea_funcion"));
                        int total=cantidad_vendida+cantidad_boqueada+cantidad_cortesia+cantidad_espera+asientos.get(rs.getInt("id_platea"));
                        int total1=cantidad_vendida1+cantidad_boqueada1+cantidad_cortesia1+cantidad_espera1+asientos.get(rs.getInt("id_platea"));
                        if (aforo<total) {
                            return "NO CUENTA CON LA CANTIDAD DE ASIENTOS-AFORO FUNCIÓN NO DISPONIBLE";
                        }
                        if (aforo1<total1) {
                            return "NO CUENTA CON LA CANTIDAD DE ASIENTOS-AFORO PLATEA NO DISPONIBLE ";
                        }
                        
                    }
                    
                }
                float total=0;
                for(Integer str: plateas){
                     Platea pl=this.getPlatea(str);
                     total=total+pl.getCosto()*asientos.get(str);
                }

                int id_reserva=0;
                try{
                    System.out.println("total="+total);
                    String comando="CALL insert_reserva("+reserva.getIdUsuario()+","+reserva.getIdEvento()+","+reserva.getIdFuncion()+","+total+",'"+reserva.getUsuarioCreacion()+"')";
                    stmt =  cnx.prepareStatement(comando);
                    rs =stmt.executeQuery();
                    
                    while (rs.next()){
                        id_reserva=Integer.parseInt(rs.getString(1).trim());
                    }
                    for(Integer str: plateas)
                    {   
                        Platea pl=this.getPlatea(str);
                        float precio=pl.getCosto();

                         //System.out.println(comando);
                        stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_reserva_asientos (id_reserva,id_platea,asiento,precio,usuario_creacion) VALUES "
                                + "("+id_reserva+","+str+",'"+asientos.get(str)+"',"+precio+",'"+reserva.getUsuarioCreacion()+"')");

                        stmt.executeUpdate();



                        stmt =  cnx.prepareStatement("INSERT INTO teatro.tsa_bloqueo_cantidad_taquilla (id_usuario,id_platea_funcion,id_reserva,cantidad,id_platea) VALUES "
                                + "("+reserva.getIdUsuario()+","+platea_funcion.get(str)+","+id_reserva+","+asientos.get(str)+","+str+")");

                        stmt.executeUpdate();
                        // Loop through the available result sets.
                        
                    }  
                     return "true";
                } catch (SQLException sqle) { 
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva_asientos WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_cantidad_taquilla WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva WHERE id_reserva="+id_reserva);
                    stmt.executeUpdate();
                    System.out.println(sqle);

                    return "ERROR NO SE PUEDE ACTUALIZAR";
                }
            } catch (SQLException sqle) { 
                System.out.println(sqle);
                return "ERROR NO SE PUEDE ACTUALIZAR";
            } 
        }else{
          return "ERROR CON BASE DE DATOS";   
        }
        
    }
    public String deleteReserva(Integer reserva, String idUsuario)  throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                actualizar(idUsuario);
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_reserva_asientos WHERE id_reserva_asientos="+reserva);
                ResultSet rs = stmt.executeQuery();
                LinkedList<String> asientos=new LinkedList();
                Map<String,   Integer> map = (Map<String, Integer>)new LinkedHashMap();
                Map<String,   Integer> map1 = (Map<String, Integer>)new LinkedHashMap();
                int acum=0;
                while (rs.next()){
                    if (acum==0) {
                       stmt =  cnx.prepareStatement("SELECT * FROM tsa_reserva_asientos WHERE id_reserva="+rs.getInt("id_reserva")+" and id_platea="+rs.getInt("id_platea"));
                        ResultSet rs1 = stmt.executeQuery();
                        while (rs1.next()){
                            if (!asientos.contains(rs1.getString("asiento"))) {
                                asientos.add(rs1.getString("asiento"));
                                map.put(rs1.getString("asiento"), rs.getInt("id_reserva"));
                                map1.put(rs1.getString("asiento"), rs.getInt("id_platea"));
                            }

                        } 
                        acum++;
                    }
                    System.out.println("DELETE FROM tsa_reserva_asientos WHERE id_reserva="+rs.getInt("id_reserva")+" and id_platea="+rs.getInt("id_platea"));
                    stmt =  cnx.prepareStatement("DELETE FROM tsa_reserva_asientos WHERE id_reserva="+rs.getInt("id_reserva")+" and id_platea="+rs.getInt("id_platea"));
                    stmt.executeUpdate();
                } 
                for(String str: asientos)
                {   
                    boolean isNumeric = str.chars().allMatch( Character::isDigit );
                    if (isNumeric) {
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_cantidad_taquilla WHERE id_reserva="+map.get(str)+" and cantidad="+str+" and id_platea="+map1.get(str));
                        stmt.executeUpdate();
                    }else{
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_asiento_taquilla WHERE id_reserva="+map.get(str)+" and asiento='"+str+"'");
                        stmt.executeUpdate();
                    }
                    
                    
                } 
                check = "true";
                return check;
            } catch (SQLException sqle) { 
               System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error no se puede eliminar";
            } 
            
         
        }else{
          return "Error con Base de datos";  
        }
    }
    public String deleteAllReserva(String idUsuario)  throws SQLException{
         if (seteo()) {
            String check = "";
            try {
                PreparedStatement stmt ;
                stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_cantidad_taquilla WHERE id_usuario ="+idUsuario);
                stmt.executeUpdate();

                stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_asiento_taquilla WHERE id_usuario ="+idUsuario);
                stmt.executeUpdate();
                return "true";  
            } catch (SQLException sqle) { 
               System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error no se puede Actualizar";
            } 
            
         
        }else{
          return "Error con Base de datos";  
        }
    }
    public String actualizarReserva(String idUsuario)  throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                return actualizar(idUsuario);
                
            } catch (SQLException sqle) { 
               System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error no se puede Actualizar";
            } 
            
         
        }else{
          return "Error con Base de datos";  
        }
    }
    
    public String getCompraReserva(String idUsuario)  throws SQLException{
        if (seteo()) {
            String texto="";
            PreparedStatement stmt ;
            try {
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_compra_reserva WHERE id_usuario ="+idUsuario.toString());
                ResultSet rs = stmt.executeQuery();
                boolean band=true;
                while (rs.next()){
                    texto=texto+rs.getString("sub_total")+",";
                    texto=texto+rs.getString("donacion")+",";
                    texto=texto+rs.getString("dolares_canjeados")+",";
                    texto=texto+rs.getString("descuento")+",";
                    texto=texto+rs.getString("total")+",";
                    band=false;
                }
                if (band) {
                   
                    stmt =  cnx.prepareStatement(" INSERT INTO teatro.tsa_compra_reserva (id_usuario,usuario_creacion) VALUES ("+idUsuario+",'"+idUsuario+"');");
                    stmt.executeUpdate();
                    texto=texto+"0,";
                    texto=texto+"0,";
                    texto=texto+"0,";
                    texto=texto+"0,";
                    texto=texto+"0";
                }
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_espera_pago WHERE id_usuario ="+idUsuario.toString());
                rs = stmt.executeQuery();
                float monto=0;
                while (rs.next()){
                    monto=monto+rs.getFloat("monto");
                }
                texto=texto+monto;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "";
            }
            return texto;
        }else{
          return "";  
        }
    }
    public String getAllPuntos(String idUsuario)  throws SQLException{
        if (seteo()) {
            String texto="";
            PreparedStatement stmt ;
            try {
                UsuarioCliente usuario=this.getUsuarioCliente(Integer.parseInt(idUsuario.trim()));
                int puntos=usuario.getPuntos();
                int acum=puntos/6;
                if (acum>5) {
                    double cantidad=acum/5;
                    double parteDecimal = cantidad % 1; // Lo que sobra de dividir al número entre 1
                    double parteEntera = cantidad - parteDecimal; // Le quitamos la parte decimal usando una resta
                    return cantidad+"";
                }else{
                     return "0";
                }
                
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "";
            }
        }else{
          return "";  
        }
    }
    public String insertDonacion(String idUsuario, String idUsuarioCliente, String donacion, String puntos_canjeados)  throws SQLException{
        if (seteo()) {
            try{
                UsuarioCliente usuario=this.getUsuarioCliente(Integer.parseInt(idUsuarioCliente.trim()));
                int puntos=usuario.getPuntos();
                int acum=puntos/6;
                
                if (acum>5) {
                    int valor=acum-Integer.parseInt(puntos_canjeados.trim());
                    if (valor<0) {
                        return "El Usuario no tiene puntos Acumulados";
                    }
                }else{
                     return "El Usuario no tiene puntos Acumulados";
                }
                float tod=Float.parseFloat(donacion.trim())-Float.parseFloat(puntos_canjeados.trim()); 
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_reserva WHERE id_usuario ="+idUsuario.toString());
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    tod=tod+rs.getFloat("total");
                    
                }
                
                stmt =  cnx.prepareStatement("UPDATE tsa_compra_reserva set donacion="+donacion+",dolares_canjeados="+puntos_canjeados+
                       ",total="+tod+",usuario_modificacion='"+idUsuario+"', fecha_modificacion=now()  WHERE id_usuario ="+idUsuario);
                stmt.executeUpdate();
                return "true";

            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
              return "Error con base de datos";
            }  
        }else{
          return "Error con base de datos";  
        }
    }
    public String updateCompraReserva(String idUsuario, String sub_total, String donacion, String dolares_canjeados, String descuento, String total, String usuario_modificacion)  throws SQLException{
         if (seteo()) {
            try{
                PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_compra_reserva set sub_total="+sub_total+",donacion="+donacion+",dolares_canjeados="+dolares_canjeados+
                        ",descuento="+descuento+",total="+total+",usuario_modificacion='"+usuario_modificacion+"', fecha_modificacion=now()  WHERE id_usuario ="+idUsuario);
                stmt.executeUpdate();
                return "true";

            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
              return "Error con base de datos";
            }  
        }else{
          return "Error con base de datos";  
        }
    }
    public String getAllEsperaPago(String idUsuario)  throws SQLException{
        if (seteo()) {
            String texto="";
            PreparedStatement stmt ;
            try {
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_espera_pago WHERE id_usuario ="+idUsuario.toString());
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    if (rs.getString("tipo").equals("E")) {
                        texto=texto+rs.getInt("id_espera_pago")+",";
                        texto=texto+"Efectivo,";
                        texto=texto+"Efectivo,";
                        texto=texto+"Efectivo,";
                        texto=texto+"Efectivo,";
                        texto=texto+rs.getString("monto")+";";
                    }else{
                        Banco banco=getBanco(rs.getInt("id_banco")); 
                        Tarjeta tarjeta=getTarjeta(rs.getInt("id_tarjeta")); 
                        texto=texto+rs.getInt("id_espera_pago")+",";
                        texto=texto+"Tarjeta,";
                        texto=texto+tarjeta.getNombre()+",";
                        texto=texto+banco.getNombre()+",";
                        texto=texto+rs.getString("lote")+",";
                        texto=texto+rs.getString("monto")+";";
                    }
                    
                }
                
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error con base de datos";
            }
            return texto;
        }else{
          return "Error con base de datos";  
        }
    }
    public String deleteEsperaPago(String idUsuario, String idEsperaPago)  throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                PreparedStatement stmt ;
                stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_espera_pago WHERE id_espera_pago ="+idEsperaPago);
                stmt.executeUpdate();
                return "true";  
            } catch (SQLException sqle) { 
               System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error no se puede Actualizar";
            } 
        }else{
          return "Error con Base de datos";  
        }
    }
    public String insertEsperaPago(String idUsuario, String tipo, String id_tarjeta, String id_banco, String lote, String monto, String usuario_modificacion)  throws SQLException{
        if (seteo()) {
            String check = "";
            try {
                PreparedStatement stmt ;
                if (tipo.equals("T")) {
                    stmt =  cnx.prepareStatement(" INSERT INTO teatro.tsa_espera_pago (id_usuario,tipo,id_tarjeta,id_banco,lote,monto,usuario_creacion)"
                            + " VALUES ("+idUsuario+",'"+tipo+"',"+id_tarjeta+","+id_banco+",'"+lote+"',"+monto+",'"+usuario_modificacion+"');");
                    stmt.executeUpdate();
        
                }else{
                    stmt =  cnx.prepareStatement(" INSERT INTO teatro.tsa_espera_pago (id_usuario,monto,usuario_creacion)"
                            + " VALUES ("+idUsuario+","+monto+",'"+usuario_modificacion+"');");
                    stmt.executeUpdate();
                }
                return "true";
            } catch (SQLException sqle) { 
               System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "Error no se puede Ingresar";
            } 
            
         
        }else{
          return "Error con Base de datos";  
        }
    }
    
    public String  actualizar(String idUsuaro) throws SQLException{ 
        try{
            PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_bloqueo_cantidad_taquilla set fecha_creacion=now() WHERE id_usuario ="+idUsuaro);
            stmt.executeUpdate();
            stmt =  cnx.prepareStatement("UPDATE tsa_bloqueo_asiento_taquilla set fecha_creacion=now() WHERE id_usuario ="+idUsuaro);
            stmt.executeUpdate();
            return "true";

        } catch (SQLException sqle) { 
          System.out.println("Error en la ejecución de la consulta:" 
            + sqle.getErrorCode() + " " + sqle.getMessage()); 
          return "false";
        }     
    }
    
    public List<Reserva> getAllReserva( String idUsuario) throws SQLException{
        if (seteo()) {
            List<Reserva> reservas = new ArrayList<>();
            LinkedList<Integer> id_reservas_asiento=new LinkedList();
            LinkedList<Integer> id_reservas=new LinkedList();
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_bloqueo_asiento_taquilla");
                ResultSet rs = stmt.executeQuery();
                while (rs.next()){
                    if (!id_reservas.contains(rs.getInt("id_reserva"))) {
                       id_reservas.add(rs.getInt("id_reserva"));  
                    }
                }  
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_bloqueo_cantidad_taquilla");
                rs = stmt.executeQuery();
                while (rs.next()){
                    if (!id_reservas.contains(rs.getInt("id_reserva"))) {
                       id_reservas.add(rs.getInt("id_reserva"));  
                    }
                }  
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_reserva_asientos");
                rs = stmt.executeQuery();

                while (rs.next()){
                    if (id_reservas.contains(rs.getInt("id_reserva"))) {
                       if (!id_reservas_asiento.contains(rs.getInt("id_reserva"))) {
                            id_reservas_asiento.add(rs.getInt("id_reserva"));  
                        }
                    }else{
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva_asientos WHERE id_reserva="+rs.getInt("id_reserva"));
                        stmt.executeUpdate();
                    }
                }  
                stmt =  cnx.prepareStatement("SELECT * FROM tsa_reserva WHERE id_usuario="+idUsuario);
                rs = stmt.executeQuery();
                Caja caja;

                while (rs.next()){
                    Integer id_reserva=rs.getInt("id_reserva");
                    if (!id_reservas_asiento.contains(id_reserva)) {
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_asiento_taquilla WHERE id_reserva="+id_reserva);
                        stmt.executeUpdate();
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_bloqueo_cantidad_taquilla WHERE id_reserva="+id_reserva);
                        stmt.executeUpdate();
                        stmt =  cnx.prepareStatement("DELETE FROM teatro.tsa_reserva WHERE id_reserva="+id_reserva);
                        stmt.executeUpdate();
                    }else{
                        System.out.println(id_reserva);
                    }
                }
                id_reservas=new LinkedList();
                stmt =  cnx.prepareStatement("SELECT ts.nombre as Sala, ts.id_sala ,te.nombre as evento, tf.fecha ,tr.descuento ,tp.nombre,tra.* FROM tsa_reserva tr  INNER JOIN tsa_reserva_asientos tra  ON tr.id_reserva =tra.id_reserva INNER JOIN tsa_funcion tf ON tf.id_funcion =tr.id_funcion INNER JOIN tsa_platea tp ON tp.id_platea =tra.id_platea INNER JOIN tsa_evento te ON te.id_evento =tr.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala AND id_usuario="+idUsuario);
                rs = stmt.executeQuery();

                while (rs.next()){
                    Reserva reserva= new Reserva();
                    float precio=0;
                    int cantidad=0;
                    float total=0;
                    if (rs.getString("id_sala").equals("1")) {
                        precio=rs.getFloat("precio");
                        total=precio;
                        
                    }else{
                        precio=rs.getInt("precio");
                        cantidad=rs.getInt("asiento");
                        total=precio*cantidad;
                    }
                    String evento=rs.getString("Sala")+":"+rs.getString("evento");
                    reserva.setAsientos(rs.getString("asiento"));
                    reserva.setDescuento(rs.getFloat("descuento"));
                    reserva.setEvento(evento);
                    reserva.setFuncion(rs.getString("fecha"));
                    reserva.setIdReserva(rs.getInt("id_reserva"));
                    reserva.setIdReservaAsiento(rs.getInt("id_reserva_asientos"));
                    reserva.setTipo(rs.getString("id_sala"));
                    reserva.setPlatea(rs.getString("nombre"));
                    reserva.setPrecioTotal(total);
                    reserva.setPrecioUnitario(rs.getFloat("precio"));
                    if (!id_reservas.contains(rs.getInt("id_reserva"))) {
                        id_reservas.add(rs.getInt("id_reserva"));
                    }
                    reservas.add(reserva);
          
                }
                 Map<String,Reserva> asientos = (Map<String, Reserva>)new LinkedHashMap();
                for(Reserva str: reservas)
                {   
        
                    if (asientos.containsKey(str.getIdReserva()+str.getPlatea())) {
                        Reserva re=asientos.get(str.getIdReserva()+str.getPlatea());
                        String a=re.getAsientos()+"-"+str.getAsientos();
                        float t=re.getPrecioTotal()+str.getPrecioUnitario();
                        re.setAsientos(a);
                        re.setPrecioTotal(t);
                        asientos.replace(str.getIdReserva()+str.getPlatea(), re);
                    }else{
                        asientos.put(str.getIdReserva()+str.getPlatea(), str);
                    }

                } 
                System.out.println(asientos);
                List<Reserva> reservas1 = new ArrayList<>();
                for (String clave:asientos.keySet()) {
                    Reserva valor = asientos.get(clave);
                    reservas1.add(valor);
                }
                System.out.println(reservas1);
                return reservas1;
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return reservas;
        }else{
          return null;  
        }
        
    }
    //METODOS DE TAQUILLA
     //SI SE USA
    public List<Caja> getAllCaja( String idUsuario) throws SQLException{
        if (seteo()) {
            System.out.println(idUsuario);
            List<Caja> cajaT = new ArrayList<>();
            try (PreparedStatement stmt =  cnx.prepareStatement("SELECT tc.*, tcm.fecha_creacion as fecha, tcm.valor_vendido FROM tsa_caja tc INNER JOIN tsa_caja_taquilla tcm ON tcm.id_caja = tc.id_caja AND tcm.fecha_creacion > CURDATE() and tcm.id_usuario="+idUsuario)) {
                ResultSet rs = stmt.executeQuery();
                Caja caja;

                while (rs.next()){
                    caja = new Caja();
                    caja.setEstado(rs.getString("estado"));
                    caja.setIdCaja(rs.getInt("id_caja"));
                    caja.setNombre(rs.getString("nombre"));
                    caja.setOrigen(rs.getString("origen"));
                    caja.setSecuencia(rs.getString("secuencia"));
                    caja.setSerie_sucursal(rs.getString("serie_sucursal"));
                    caja.setSerie_caja(rs.getString("serie_caja"));  
                    caja.setFecha(rs.getString("fecha"));
                    caja.setValorVendido(rs.getString("valor_vendido"));
                    cajaT.add(caja);
                }  
            } catch (SQLException sqle) { 
              System.out.println("Error en la ejecución de la consulta:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
            }
            return cajaT;
        }else{
          return null;  
        }
        
    }
     //SI SE USA
    public String abrirCaja(String idUsuario, String usuario) throws SQLException{
        if (seteo()) {
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_caja_taquilla where fecha_creacion > CURDATE() and id_usuario="+idUsuario);
                ResultSet rs = stmt.executeQuery();
                Caja caja;
                if (rs.next()) {
                    return "La caja ya se encuentra abierta";
                }else{
                    String comando="CALL abrir_caja("+idUsuario+",'"+usuario+"')";
                    System.out.println(comando);
                    stmt =  cnx.prepareStatement(comando);
                    // System.out.println(comando);
                    boolean results = stmt.execute();
                    int rsCount = 0;

                    // Loop through the available result sets.
                    while (results) {
                         rs = stmt.getResultSet();
                         while (rs.next()) {
                             try{
                                System.out.println(rs.getInt("MYSQL_ERROR"));
                                return "ERROR NO SE PUEDE ACTUALIZAR";
                            } catch (SQLException sqle) { 

                            } 
                         }
                         rs.close();
                         // Check for next result set
                         results = stmt.getMoreResults();
                    }
                    return "true";
                 }      
            } catch (SQLException sqle) { 
                System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "ERROR NO SE PUEDE ACTUALIZAR";
            }        
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
    }
      //SI SE USA
    public String editarCaja( String idCaja, String idUsuario) throws SQLException{
        if (seteo()) {
            try {
                PreparedStatement stmt =  cnx.prepareStatement("SELECT tcm.*, tc.estado as estadoCaja FROM tsa_caja tc INNER JOIN tsa_caja_taquilla tcm ON tcm.id_caja = tc.id_caja AND tcm.fecha_creacion > CURDATE() and tcm.id_usuario="+idUsuario+" and tc.id_caja="+idCaja);
                ResultSet rs = stmt.executeQuery();
                Caja caja;
                
                if (!rs.next()) {
                    return "La caja no se encuentra abierta";
                }else{
                    if ( rs.getString("estadoCaja").equals("A")) {
                       return "true";
                    }else{
                         return "La caja no se encuentra activa";
                    }
                 }      
            } catch (SQLException sqle) { 
                System.out.println("Error en la ejecución de la inserción:" 
                + sqle.getErrorCode() + " " + sqle.getMessage()); 
                return "ERROR NO SE PUEDE ACTUALIZAR";
            }        
        }else{
          return "ERROR CON BASE DE DATOS";  
        }
    }
       //SI SE USA
    public boolean updateEstadoCaja(Caja caja) throws SQLException{
        if (seteo()) {
            boolean check = false;
            if (caja.getEstado().equals("A")) {
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_caja set estado='A' "+
                                                                " , usuario_modificacion='"+caja.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_caja ="+caja.getIdCaja().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }  
                
            }else{
                try (PreparedStatement stmt =  cnx.prepareStatement("UPDATE tsa_caja set estado='I' "+
                                                                " , usuario_modificacion='"+caja.getUsuarioCreacion()+"',fecha_modificacion=sysdate()"+
                                                                " WHERE id_caja ="+caja.getIdCaja().toString())) {
                    stmt.executeUpdate();
                    check = true;
                } catch (SQLException sqle) { 
                  System.out.println("Error en la ejecución de la actualizacion:" 
                    + sqle.getErrorCode() + " " + sqle.getMessage()); 
                }     
            }    
                 
            return check;
        }else{
          return false;  
        }
    }
    //ENVIO DE CORREOS
    public String SendMail (int idPlantillaCorreo, String destinatario, String enlace, String nombre, String datosCompra, String codigo) throws SQLException, FileNotFoundException{
        MailTemplate mailTemplate = new MailTemplate();
        
        try (PreparedStatement stmt =  cnx.prepareStatement("SELECT * FROM tsa_plantilla_correo WHERE id_plantilla_correo ="+idPlantillaCorreo)) {
            ResultSet rs = stmt.executeQuery();
                       
            while (rs.next()){
                mailTemplate.correo = "tsa.test.mailer@gmail.com";
                mailTemplate.contrasena = "sndwiifclxirbpbu";
                mailTemplate.destintario = destinatario;
                mailTemplate.asunto = rs.getString("asunto");
                mailTemplate.descripcion1 = rs.getString("descripcion1");
                mailTemplate.descripcion2 = rs.getString("descripcion2");
                mailTemplate.descripcion3 = rs.getString("descripcion3");
                mailTemplate.imagen = rs.getString("imagen");
                mailTemplate.redesSociales = rs.getString("enlace_redes_sociales");
                mailTemplate.direccion = rs.getString("direccion");
                mailTemplate.telefonos = rs.getString("telefono");
            }
        } catch (SQLException sqle) { 
          System.out.println("Error en la ejecución de la consulta:" 
            + sqle.getErrorCode() + " " + sqle.getMessage()); 
        }       
        
        mailTemplate.plantilla = LeerArchivo();
        
        String valida="false";
        
        String to = destinatario;

        String from = mailTemplate.correo;
        final String username = mailTemplate.correo;
        final String password = mailTemplate.contrasena;

        String host = "smtp.gmail.com";

        Properties props = new Properties();
        props.put("mail.smtp.auth", "true");
        props.put("mail.smtp.starttls.enable", "true");
        props.put("mail.smtp.host", host);
        props.put("mail.smtp.port", "587");

        Session session = Session.getInstance(props,
           new javax.mail.Authenticator() {
              protected PasswordAuthentication getPasswordAuthentication() {
                 return new PasswordAuthentication(username, password);
              }
          });

        try {
            Message message = new MimeMessage(session);

            message.setFrom(new InternetAddress(from));

            Address [] correos = {new InternetAddress(to)};

            message.setRecipients(Message.RecipientType.TO,
               correos);

            message.setSubject(mailTemplate.asunto);

            message.addHeader("Content-Type", "text/html; charset=utf-8");
            
            String[] enlaceRedesSociales = mailTemplate.redesSociales.split(";");
            mailTemplate.plantilla=mailTemplate.plantilla.replace("(nombre y apellido)", nombre);
            mailTemplate.plantilla=mailTemplate.plantilla.replace("(NOMBRE IMAGEN)", mailTemplate.imagen);
            
            mailTemplate.plantilla = validaDescripcion1(idPlantillaCorreo, mailTemplate.plantilla, mailTemplate.descripcion1);
            mailTemplate.plantilla = validaDescripcion2(idPlantillaCorreo, mailTemplate.plantilla, mailTemplate.descripcion2, enlace, codigo);
            mailTemplate.plantilla = validaDescripcion3(idPlantillaCorreo, mailTemplate.plantilla, mailTemplate.descripcion3, datosCompra);
            
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(DIRECCION)", mailTemplate.direccion);
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(TELEFONOS)", mailTemplate.telefonos);
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(SITIOWEB)", enlaceRedesSociales[3]);
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(facebook_url)",enlaceRedesSociales[0]);
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(instagram_url)",enlaceRedesSociales[1]);
            mailTemplate.plantilla = mailTemplate.plantilla.replace("(twitter_url)",enlaceRedesSociales[2]);

            //System.out.println(mailTemplate.plantilla);    
            message.setContent(mailTemplate.plantilla, "text/html; charset=utf-8") ;

            Transport.send(message);
            
            valida = "true";
        } catch (MessagingException e) {
             e.printStackTrace();
             throw new RuntimeException(e);
        }     
        return valida;
    }
    
    private String validaDescripcion1(int idPlantilla, String plantilla, String descripcion1){
        if (idPlantilla==1 || idPlantilla==2 || idPlantilla==3 || idPlantilla==4 || idPlantilla==5 || idPlantilla==7){
            plantilla=plantilla.replace("(DESCRIPCION 1)", descripcion1);
        }     
        return plantilla;
    }
    
    private String validaDescripcion2(int idPlantilla, String plantilla, String descripcion2, String enlace, String codigo){
        if (idPlantilla==1 || idPlantilla==2){
            plantilla=plantilla.replace("(DESCRIPCION 2)", descripcion2);
            plantilla=plantilla.replace("(ENLACE)", enlace);
            plantilla=plantilla.replace("(CODIGO)", "<button style=\"font-size:24px;\" class=\"button\">"+ codigo + "</button>");
        }
        
        if (idPlantilla==3 || idPlantilla==4 || idPlantilla==5){
            plantilla=plantilla.replace("(DESCRIPCION 2)", descripcion2);
        }      
        return plantilla;
    }
     
    private String validaDescripcion3(int idPlantilla, String plantilla, String descripcion3, String datosCompra){
        if (idPlantilla==1 || idPlantilla==2 || idPlantilla==4 || idPlantilla==5){
            plantilla=plantilla.replace("(DESCRIPCION 3)", descripcion3);
        }  
        
        if (idPlantilla==3){
            plantilla=plantilla.replace("(DESCRIPCION 3)", descripcion3);
            String[] datos = datosCompra.split(";");
            plantilla=plantilla.replace("(NOMBRE)", datos[0]);
            plantilla=plantilla.replace("(FECHA)", datos[1]);
            plantilla=plantilla.replace("(HORA)", datos[2]);
            plantilla=plantilla.replace("(DURACION)", datos[3]);
            plantilla=plantilla.replace("(ASIENTOS)", datos[4]);
        }          
        return plantilla;
    }
    
    public String LeerArchivo() throws FileNotFoundException{
        StringBuilder html = new StringBuilder();
        //FileReader fr = new FileReader("/var/www/html/admin/PlantillaGeneral.html");
        FileReader fr = new FileReader("C:\\xampp\\htdocs\\teatro-copia\\TSA-Frontend\\TSA//PlantillaGeneral.html");
        try {
            BufferedReader br = new BufferedReader(fr);
            String val;
            while ((val = br.readLine()) != null) {
                html.append(val);
            }
            String result = html.toString();
            br.close();
            return result;
        }
	  catch (Exception ex) {
             throw new RuntimeException(ex);
        }
    }
}
