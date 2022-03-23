/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Clasificacion;

/**
 *
 * @author Alex Mendoza
 */
public class ClasificacionController {
    BaseDatos base ;

    public ClasificacionController(BaseDatos base) {
        this.base = base;
    }
     
    public Clasificacion get(Integer idClasificacion) throws SQLException{
        Clasificacion clasificacion = base.getClasificacion(idClasificacion);
        return clasificacion;
    }
    
    public List<Clasificacion> getAll() throws SQLException{
        List<Clasificacion> clasificaciones = base.getAllClasificacion();
        return clasificaciones;
    }
    public boolean updateEstado(Clasificacion clasificacion) throws SQLException{
        return base.updateEstadoClasificacion(clasificacion);
    }
    public boolean update(Clasificacion clasificacion) throws SQLException{
        return base.updateClasificacion(clasificacion);
    }
    
    public boolean insert(Clasificacion clasificacion) throws SQLException{
        return base.insertClasificacion(clasificacion);
    }
}
