/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Asiento;

/**
 *
 * @author Alex Mendoza
 */
public class AsientoController {
    
    BaseDatos base;

    public AsientoController(BaseDatos base) {
        this.base = base;
    }
    
    public Asiento get(Integer idAsiento) throws SQLException{
        Asiento asiento = base.getAsiento(idAsiento);
        return asiento;
    }
    
    public List<Asiento> getAll() throws SQLException{
        List<Asiento> asientos = base.getAllAsiento();
        return asientos;
    }
    public boolean updateEstado(Asiento asiento) throws SQLException{
        return base.updateEstadoAsiento(asiento);
    }
    public boolean update(Asiento asiento) throws SQLException{
        return base.updateAsiento(asiento);
    }
    
    public boolean insert(Asiento asiento) throws SQLException{
        return base.insertAsiento(asiento);
    }
}
