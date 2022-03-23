/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Sala;

/**
 *
 * @author Alex Mendoza
 */
public class SalaController {
    BaseDatos base ;

    public SalaController(BaseDatos base) {
        this.base = base;
    }
    
    public Sala get(Integer idSala) throws SQLException{
        Sala sala = base.getSala(idSala);
        return sala;
    }
    
    public List<Sala> getAll() throws SQLException{
        List<Sala> salas = base.getAllSala();
        return salas;
    }
    public boolean updateEstado(Sala sala) throws SQLException{
        return base.updateEstadoSala(sala);
    }
    public boolean update(Sala sala) throws SQLException{
        return base.updateSala(sala);
    }
    
    public boolean insert(Sala sala) throws SQLException{
        return base.insertSala(sala);
    }
}
