/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Promocion;

/**
 *
 * @author Alex Mendoza
 */
public class PromocionController {
    BaseDatos base ;

    public PromocionController(BaseDatos base) {
        this.base = base;
    }
    
    public Promocion get(Integer idPromocion) throws SQLException{
        Promocion promocion = base.getPromocion(idPromocion);
        return promocion;
    }
    
    public List<Promocion> getAll() throws SQLException{
        List<Promocion> promociones = base.getAllPromocion();
        return promociones;
    }
    public boolean updateEstado(Promocion promocion) throws SQLException{
        return base.updateEstadoPromocion(promocion);
    }
    public boolean update(Promocion promocion) throws SQLException{
        return base.updatePromocion(promocion);
    }
    
    public boolean insert(Promocion promocion) throws SQLException{
        return base.insertPromocion(promocion);
    }
}
