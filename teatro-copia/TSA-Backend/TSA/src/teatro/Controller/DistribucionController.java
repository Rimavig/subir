/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Distribucion;

/**
 *
 * @author Alex Mendoza
 */
public class DistribucionController {
    BaseDatos base ;

    public DistribucionController(BaseDatos base) {
        this.base = base;
    }
    
     public Distribucion get(Integer idDistribucion) throws SQLException{
        Distribucion distribucion = base.getDistribucion(idDistribucion);
        return distribucion;
    }
    
    public List<Distribucion> getAll() throws SQLException{
        List<Distribucion> distribuciones = base.getAllDistribucion();
        return distribuciones;
    }
    public boolean updateEstado(Distribucion distribucion) throws SQLException{
        return base.updateEstadoDistribucion(distribucion);
    }
    public boolean update(Distribucion distribucion) throws SQLException{
        return base.updateDistribucion(distribucion);
    }
    
    public boolean insert(Distribucion distribucion) throws SQLException{
        return base.insertDistribucion(distribucion);
    }
}
