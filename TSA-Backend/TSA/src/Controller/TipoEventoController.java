/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.TipoEvento;

/**
 *
 * @author Alex Mendoza
 */
public class TipoEventoController {
    BaseDatos base ;

    public TipoEventoController(BaseDatos base) {
        this.base = base;
    }
    
    public TipoEvento get(Integer idTipoEvento) throws SQLException{
        TipoEvento tipoEvento = base.getTipoEvento(idTipoEvento);
        return tipoEvento;
    }
    
    public List<TipoEvento> getAll() throws SQLException{
        List<TipoEvento> tiposEventos = base.getAllTipoEvento();
        return tiposEventos;
    }
    public boolean updateEstado(TipoEvento tipoEvento) throws SQLException{
        return base.updateEstadoTipoEvento(tipoEvento);
    }
    public boolean update(TipoEvento tipoEvento) throws SQLException{
        return base.updateTipoEvento(tipoEvento);
    }
    
    public boolean insert(TipoEvento tipoEvento) throws SQLException{
        return base.insertTipoEvento(tipoEvento);
    }
}
