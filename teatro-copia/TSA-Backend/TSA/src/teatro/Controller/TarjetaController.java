/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Tarjeta;

/**
 *
 * @author Alex Mendoza
 */
public class TarjetaController {
    BaseDatos base ;

    public TarjetaController(BaseDatos base) {
        this.base = base;
    }
    
    public Tarjeta get(Integer idTarjeta) throws SQLException{
        Tarjeta tarjeta = base.getTarjeta(idTarjeta);
        return tarjeta;
    }
    
    public List<Tarjeta> getAll() throws SQLException{
        List<Tarjeta> tarjetas = base.getAllTarjeta();
        return tarjetas;
    }
    public boolean updateEstado(Tarjeta tarjeta) throws SQLException{
        return base.updateEstadoTarjeta(tarjeta);
    }
    public boolean update(Tarjeta tarjeta) throws SQLException{
        return base.updateTarjeta(tarjeta);
    }
    
    public boolean insert(Tarjeta tarjeta) throws SQLException{
        return base.insertTarjeta(tarjeta);
    }
}
