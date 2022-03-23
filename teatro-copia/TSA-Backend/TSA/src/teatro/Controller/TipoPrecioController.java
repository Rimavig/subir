/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.TipoPrecio;

/**
 *
 * @author Alex Mendoza
 */
public class TipoPrecioController {
    BaseDatos base ;

    public TipoPrecioController(BaseDatos base) {
        this.base = base;
    }
    
    public TipoPrecio get(Integer idTipoPrecio) throws SQLException{
        TipoPrecio tipoPrecio = base.getTipoPrecio(idTipoPrecio);
        return tipoPrecio;
    }
    
    public List<TipoPrecio> getAll() throws SQLException{
        List<TipoPrecio> tiposPrecios = base.getAllTipoPrecio();
        return tiposPrecios;
    }
    public boolean updateEstado(TipoPrecio tipoPrecio) throws SQLException{
        return base.updateEstadoTipoPrecio(tipoPrecio);
    }
    public boolean update(TipoPrecio tipoPrecio) throws SQLException{
        return base.updateTipoPrecio(tipoPrecio);
    }
    
    public boolean insert(TipoPrecio tipoPrecio) throws SQLException{
        return base.insertTipoPrecio(tipoPrecio);
    }
}
