/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.SalaMapa;

/**
 *
 * @author Alex Mendoza
 */
public class SalaMapaController {
    BaseDatos base ;

    public SalaMapaController(BaseDatos base) {
        this.base = base;
    }
    
    public SalaMapa get(Integer idSalaMapa) throws SQLException{
        SalaMapa sala = base.getSalaMapa(idSalaMapa);
        return sala;
    }
    
    public List<SalaMapa> getAll() throws SQLException{
        List<SalaMapa> salasMapas = base.getAllSalaMapa();
        return salasMapas;
    }
    public boolean updateEstado(SalaMapa salaMapa) throws SQLException{
        return base.updateEstadoSalaMapa(salaMapa);
    }
    public boolean update(SalaMapa salaMapa) throws SQLException{
        return base.updateSalaMapa(salaMapa);
    }
    
    public boolean insert(SalaMapa salaMapa) throws SQLException{
        return base.insertSalaMapa(salaMapa);
    }
}
