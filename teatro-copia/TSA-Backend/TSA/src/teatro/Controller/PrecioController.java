/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Precio;

/**
 *
 * @author Alex Mendoza
 */
public class PrecioController {
    BaseDatos base ;

    public PrecioController(BaseDatos base) {
        this.base = base;
    }
    
    public Precio get(Integer idPrecio) throws SQLException{
        Precio precio = base.getPrecio(idPrecio);
        return precio;
    }
    
    public List<Precio> getAll() throws SQLException{
        List<Precio> precios = base.getAllPrecio();
        return precios;
    }
    public boolean updateEstado(Precio precio) throws SQLException{
        return base.updateEstadoPrecio(precio);
    }
    public boolean update(Precio precio) throws SQLException{
        return base.updatePrecio(precio);
    }
    
    public boolean insert(Precio precio) throws SQLException{
        return base.insertPrecio(precio);
    }
}
