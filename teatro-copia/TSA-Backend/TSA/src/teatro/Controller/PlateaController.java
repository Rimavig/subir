/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Platea;

/**
 *
 * @author Alex Mendoza
 */
public class PlateaController {
    BaseDatos base ;

    public PlateaController(BaseDatos base) {
        this.base = base;
    }
    
    public Platea get(Integer idPlatea) throws SQLException{
        Platea platea = base.getPlatea(idPlatea);
        return platea;
    }
    
    public List<Platea> getAll() throws SQLException{
        List<Platea> plateas = base.getAllPlatea();
        return plateas;
    }
    public boolean updateEstado(Platea platea) throws SQLException{
        return base.updateEstadoPlatea(platea);
    }
    public boolean update(Platea platea) throws SQLException{
        return base.updatePlatea(platea);
    }
    
    public boolean insert(Platea platea) throws SQLException{
        return base.insertPlatea(platea);
    }
}
