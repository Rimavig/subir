/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.TipoEspectaculo;

/**
 *
 * @author Alex Mendoza
 */
public class TipoEspectaculoController {
    BaseDatos base ;

    public TipoEspectaculoController(BaseDatos base) {
        this.base = base;
    }
    
    public TipoEspectaculo get(Integer idTipoEspectaculo) throws SQLException{
        TipoEspectaculo tipoEspectaculo = base.getTipoEspectaculo(idTipoEspectaculo);
        return tipoEspectaculo;
    }
    
    public List<TipoEspectaculo> getAll() throws SQLException{
        List<TipoEspectaculo> tipoEspectaculos = base.getAllTipoEspectaculo();
        return tipoEspectaculos;
    }
    public boolean updateEstado(TipoEspectaculo tipoEspectaculo) throws SQLException{
        return base.updateEstadoTipoEspectaculo(tipoEspectaculo);
    }
    public boolean update(TipoEspectaculo tipoEspectaculo) throws SQLException{
        return base.updateTipoEspectaculo(tipoEspectaculo);
    }
    
    public boolean insert(TipoEspectaculo tipoEspectaculo) throws SQLException{
        return base.insertTipoEspectaculo(tipoEspectaculo);
    }
}
