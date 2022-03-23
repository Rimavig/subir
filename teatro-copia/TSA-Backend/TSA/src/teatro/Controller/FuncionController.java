/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Funcion;

/**
 *
 * @author Alex Mendoza
 */
public class FuncionController {
    BaseDatos base;

    public FuncionController(BaseDatos base) {
        this.base = base;
    }
    
    public Funcion get(Integer idFuncion) throws SQLException{
        Funcion funcion = base.getFuncion(idFuncion);
        return funcion;
    }
    
    public List<Funcion> getAll() throws SQLException{
        List<Funcion> funciones = base.getAllFuncion();
        return funciones;
    }
    public boolean updateEstado(Funcion funcion) throws SQLException{
        return base.updateEstadoFuncion(funcion);
    }
    public boolean update(Funcion funcion) throws SQLException{
        return base.updateFuncion(funcion);
    }
    
    public boolean insert(Funcion funcion) throws SQLException{
        return base.insertFuncion(funcion);
    }
}
