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
public class PromocionController {
    BaseDatos base ;

    public PromocionController(BaseDatos base) {
        this.base = base;
    }
    
    public Promocion get(Integer idPromocion,Integer idTipoPromocion,String tipo) throws SQLException{
        Promocion promocion = base.getPromocion(idPromocion,idTipoPromocion,tipo);
        return promocion;
    }
    
    public List<Promocion> getAll(Integer idEvento, String tipo) throws SQLException{
        List<Promocion> promociones = base.getAllPromocion(idEvento,tipo);
        return promociones;
    }
    public List<Promocion> getAllT(Integer idUsuario, String tipo) throws SQLException{
        List<Promocion> promociones = base.getAllPromocionT(idUsuario,tipo);
        return promociones;
    }
    public List<Promocion> getAll() throws SQLException{
        List<Promocion> promociones = base.getAllPromocion();
        return promociones;
    }
    public String updateEstado(Promocion promocion) throws SQLException{
        return base.updateEstadoPromocion(promocion);
    }
    public String update(Promocion promocion) throws SQLException{
        return base.updatePromocion(promocion);
    }
    
    public String insert(Promocion promocion) throws SQLException{
        return base.insertPromocion(promocion);
    }
    
}
