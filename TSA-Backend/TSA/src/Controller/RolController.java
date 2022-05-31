/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Rol;

/**
 *
 * @author Alex Mendoza
 */
public class RolController {
    BaseDatos base ;

    public RolController(BaseDatos base) {
        this.base = base;
    }
    
    public Rol get(Integer idRol) throws SQLException{
        Rol rol = base.getRol(idRol);
        return rol;
    }
    
    public List<Rol> getAll() throws SQLException{
        List<Rol> roles = base.getAllRol();
        return roles;
    }
    public boolean updateEstado(Rol rol) throws SQLException{
        return base.updateEstadoRol(rol);
    }
    public boolean update(Rol rol) throws SQLException{
        return base.updateRol(rol);
    }
    
    public boolean insert(Rol rol) throws SQLException{
        return base.insertRol(rol);
    }
}
