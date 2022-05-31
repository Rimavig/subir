/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Entity.Bloqueo;
import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;


/**
 *
 * @author Alex Mendoza
 */
public class BloqueoController {
    BaseDatos base;

    public BloqueoController(BaseDatos base) {
        this.base = base;
    }
    
    public String cantidad(Bloqueo bloqueo) throws SQLException{
        String mensaje = base.updateCantidad(bloqueo);
        return mensaje;
    }
    
    public String fila(Bloqueo bloqueo) throws SQLException{
        String mensaje = base.updateFila(bloqueo);
        return mensaje;
    }
    public String lateral(Bloqueo bloqueo) throws SQLException{
        String mensaje = base.updateLateral(bloqueo);
        return mensaje;
    }
    public String asiento(Bloqueo bloqueo) throws SQLException{
        String mensaje = base.updateAsiento(bloqueo);
        return mensaje;
    }
    public String cortesia() throws SQLException{
        String mensaje = base.getAllCortesia();
        return mensaje;
    }
    public String updateEstadoCortesia(Integer id, String estado, String usuario_modificacion) throws SQLException{
        String mensaje = base.updateEstadoCortesia(id,estado,usuario_modificacion);
        return mensaje;
    }
    public String Ecortesia(Integer id_cortesia) throws SQLException{
        String mensaje = base.getCortesia(id_cortesia);
        return mensaje;
    }
     public String delete_cortesia(int idTicketAsiento, int idTicket, String usuario_modificacion) throws SQLException{
        String mensaje = base.delete_cortesia(idTicketAsiento, idTicket, usuario_modificacion);
        return mensaje;
    }
    public String deleteA_cortesia(int idTicket) throws SQLException{
        String mensaje = base.deleteA_cortesia( idTicket);
        return mensaje;
    }
}
