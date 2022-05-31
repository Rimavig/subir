/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Procedencia;

/**
 *
 * @author Alex Mendoza
 */
public class ProcedenciaController {
    BaseDatos base ;

    public ProcedenciaController(BaseDatos base) {
        this.base = base;
    }
    
    public Procedencia get(Integer idProcedencia) throws SQLException{
        Procedencia procedencia = base.getProcedencia(idProcedencia);
        return procedencia;
    }
    
    public List<Procedencia> getAll() throws SQLException{
        List<Procedencia> procedencias = base.getAllProcedencia();
        return procedencias;
    }
    public boolean updateEstado(Procedencia procedencia) throws SQLException{
        return base.updateEstadoProcedencia(procedencia);
    }
    public boolean update(Procedencia procedencia) throws SQLException{
        return base.updateProcedencia(procedencia);
    }
    
    public boolean insert(Procedencia procedencia) throws SQLException{
        return base.insertProcedencia(procedencia);
    }
}
