/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Entity.Caja;
import Entity.Facturacion;
import Entity.Reserva;
import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;

/**
 *
 * @author Alex Mendoza
 */
public class TaquillaController {
    BaseDatos base;

    public TaquillaController(BaseDatos base) {
        this.base = base;
    }
    
     public Facturacion get(Integer idFacturacion) throws SQLException{
        Facturacion facturacion = base.getFacturacion(idFacturacion);
        return facturacion;
    }
    
    public List<Caja> getAllCaja( String idUsuario) throws SQLException{
        List<Caja> cajas = base.getAllCaja(idUsuario);
        return cajas;
    }
    public List<Reserva> getAllReserva( String idUsuario) throws SQLException{
        List<Reserva> cajas = base.getAllReserva(idUsuario);
        return cajas;
    }
    public String abrirCaja( String idUsuario, String usuario) throws SQLException{
       String cajas = base.abrirCaja(idUsuario,usuario);
        return cajas;
    }
    public String editarCaja( String idCaja, String idUsuario) throws SQLException{
       String cajas = base.editarCaja(idCaja,idUsuario);
        return cajas;
    }
    public boolean updateEstadoCaja(Caja caja) throws SQLException{
        return base.updateEstadoCaja(caja);
    }
    public String deleteReserva(Integer reserva, String idUsuario) throws SQLException{
        return base.deleteReserva(reserva,idUsuario);
    }
    public String deleteAllReserva(String idUsuario) throws SQLException{
        return base.deleteAllReserva(idUsuario);
    }
    public String actualizarReserva(String idUsuario) throws SQLException{
        return base.actualizarReserva(idUsuario);
    }
    public boolean update(Facturacion facturacion) throws SQLException{
        return base.updateFacturacion(facturacion);
    }
    
    public boolean insert(Facturacion facturacion) throws SQLException{
        return base.insertFacturacion(facturacion);
    }
    public String insertReservaP(Reserva reserva) throws SQLException{
        return base.insertReservaP(reserva);
    }
    public String insertReservaC(Reserva reserva) throws SQLException{
        return base.insertReservaC(reserva);
    }
    public String getCompraReserva(String idUsuario) throws SQLException{
        return base.getCompraReserva(idUsuario.trim());
    }
    public String updateCompraReserva(String idUsuario, String sub_total, String donacion, String dolares_canjeados, String descuento, String total, String usuario_modificacion) throws SQLException{
        return base.updateCompraReserva( idUsuario.trim(),  sub_total.trim(),  donacion.trim(),  dolares_canjeados.trim(),  descuento.trim(),  total.trim(),  usuario_modificacion.trim());
    }
    public String getAllEsperaPago(String idUsuario) throws SQLException{
        return base.getAllEsperaPago(idUsuario.trim());
    }
    public String getAllPuntos(String idUsuarioCliente) throws SQLException{
        return base.getAllPuntos(idUsuarioCliente.trim());
    }
     public String insertDonacion(String idUsuario, String idUsuarioCliente, String donacion, String puntos_canjeados) throws SQLException{
        return base.insertDonacion(idUsuario.trim(),idUsuarioCliente.trim(),donacion,puntos_canjeados.trim());
    }
    public String deleteEsperaPago(String idUsuario, String idEsperaPago) throws SQLException{
        return base.deleteEsperaPago(idUsuario.trim(),idEsperaPago.trim());
    }
     public String insertEsperaPago(String idUsuario, String tipo, String id_tarjeta, String id_banco, String lote, String monto, String usuario_modificacion) throws SQLException{
        return base.insertEsperaPago( idUsuario.trim(),  tipo.trim(),  id_tarjeta.trim(),  id_banco.trim(),  lote.trim(),  monto.trim(),  usuario_modificacion.trim());
    }
}
