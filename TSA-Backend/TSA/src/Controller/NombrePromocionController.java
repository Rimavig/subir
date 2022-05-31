/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Promocion;

/**
 *
 * @author Alex Mendoza
 */
public class NombrePromocionController {
    BaseDatos base ;

    public NombrePromocionController(BaseDatos base) {
        this.base = base;
    }
    
    public Promocion get(Integer idPromocion) throws SQLException{
        Promocion promocion = base.getNombrePromocion(idPromocion);
        return promocion;
    }
    
    public List<Promocion> getAll() throws SQLException{
        List<Promocion> promociones = base.getAllNombrePromocion();
        return promociones;
    }
    public boolean updateEstado(Promocion promocion) throws SQLException{
        return base.updateEstadoNombrePromocion(promocion);
    }
    public boolean update(Promocion promocion) throws SQLException{
        return base.updateNombrePromocion(promocion);
    }
    
    public boolean insert(Promocion promocion) throws SQLException{
        return base.insertNombrePromocion(promocion);
    }
    
}
