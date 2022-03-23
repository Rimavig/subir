/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.TipoPromocion;

/**
 *
 * @author Alex Mendoza
 */
public class TipoPromocionController {
    BaseDatos base ;

    public TipoPromocionController(BaseDatos base) {
        this.base = base;
    }
    
    public TipoPromocion get(Integer idTipoPromocion) throws SQLException{
        TipoPromocion tipoPromocion = base.getTipoPromocion(idTipoPromocion);
        return tipoPromocion;
    }
    
    public List<TipoPromocion> getAll() throws SQLException{
        List<TipoPromocion> tiposPromociones = base.getAllTipoPromocion();
        return tiposPromociones;
    }
    public boolean updateEstado(TipoPromocion tipoPromocion) throws SQLException{
        return base.updateEstadoTipoPromocion(tipoPromocion);
    }
    public boolean update(TipoPromocion tipoPromocion) throws SQLException{
        return base.updateTipoPromocion(tipoPromocion);
    }
    
    public boolean insert(TipoPromocion tipoPromocion) throws SQLException{
        return base.insertTipoPromocion(tipoPromocion);
    }
}
