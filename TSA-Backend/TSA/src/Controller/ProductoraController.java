/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Productora;

/**
 *
 * @author Alex Mendoza
 */
public class ProductoraController {
    BaseDatos base;

    public ProductoraController(BaseDatos base) {
        this.base = base;
    }
    
    public Productora get(Integer idProductora) throws SQLException{
        Productora productora = base.getProductora(idProductora);
        return productora;
    }
    
    public List<Productora> getAll() throws SQLException{
        List<Productora> productoras = base.getAllProductora();
        return productoras;
    }
    public boolean updateEstado(Productora productora) throws SQLException{
        return base.updateEstadoProductora(productora);
    }
    public boolean update(Productora productora) throws SQLException{
        return base.updateProductora(productora);
    }
    
    public boolean insert(Productora productora) throws SQLException{
        return base.insertProductora(productora);
    }
}
