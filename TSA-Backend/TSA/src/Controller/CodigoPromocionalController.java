/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.CodigoPromocional;

/**
 *
 * @author Alex Mendoza
 */
public class CodigoPromocionalController {
    BaseDatos base ;

    public CodigoPromocionalController(BaseDatos base) {
        this.base = base;
    }
    
     public CodigoPromocional get(Integer idCodigoPromocional) throws SQLException{
        CodigoPromocional codigoPromocional = base.getCodigoPromocional(idCodigoPromocional);
        return codigoPromocional;
    }
    
    public List<CodigoPromocional> getAll() throws SQLException{
        List<CodigoPromocional> codigosPromocionales = base.getAllCodigoPromocional();
        return codigosPromocionales;
    }
    public boolean updateEstado(CodigoPromocional codigoPromocional) throws SQLException{
        return base.updateEstadoCodigoPromocional(codigoPromocional);
    }
    public boolean update(CodigoPromocional codigoPromocional) throws SQLException{
        return base.updateCodigoPromocional(codigoPromocional);
    }
    
    public boolean insert(CodigoPromocional codigoPromocional) throws SQLException{
        return base.insertCodigoPromocional(codigoPromocional);
    }
}
