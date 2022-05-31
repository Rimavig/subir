/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Entity.Facturacion;
import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;

/**
 *
 * @author Alex Mendoza
 */
public class FacturacionController {
    BaseDatos base;

    public FacturacionController(BaseDatos base) {
        this.base = base;
    }
    
     public Facturacion get(Integer idFacturacion) throws SQLException{
        Facturacion facturacion = base.getFacturacion(idFacturacion);
        return facturacion;
    }
    
    public List<Facturacion> getAll(Integer idUsuario) throws SQLException{
        List<Facturacion> facturacion = base.getAllFacturacion(idUsuario);
        return facturacion;
    }
    public boolean updateEstado(Facturacion facturacion) throws SQLException{
        return base.updateEstadoFacturacion(facturacion);
    }
    
    public boolean update(Facturacion facturacion) throws SQLException{
        return base.updateFacturacion(facturacion);
    }
    
    public boolean insert(Facturacion facturacion) throws SQLException{
        return base.insertFacturacion(facturacion);
    }
}
