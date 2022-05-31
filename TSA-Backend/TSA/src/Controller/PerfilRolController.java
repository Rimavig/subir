/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.PerfilRol;

/**
 *
 * @author Alex Mendoza
 */
public class PerfilRolController {
    BaseDatos base ;

    public PerfilRolController(BaseDatos base) {
        this.base = base;
    }
    
    public String get(Integer idPerfil,Integer idRol ) throws SQLException{
        String perfilRol = base.getPerfilRol(idPerfil,idRol);
        return perfilRol;
    }
    
    public String getAll(Integer idPerfil) throws SQLException{
        String perfilRoles = base.getAllPerfilRol(idPerfil);
        return perfilRoles;
    }
    public boolean updateEstado(PerfilRol perfilRol) throws SQLException{
        return base.updateEstadoPerfilRol(perfilRol);
    }
    public boolean update(PerfilRol perfilRol) throws SQLException{
        return base.updatePerfilRol(perfilRol);
    }
    
    public boolean insert(PerfilRol perfilRol) throws SQLException{
        return base.insertPerfilRol(perfilRol);
    }
}
