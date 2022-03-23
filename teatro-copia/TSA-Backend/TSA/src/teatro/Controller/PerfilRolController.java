/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.PerfilRol;

/**
 *
 * @author Alex Mendoza
 */
public class PerfilRolController {
    BaseDatos base ;

    public PerfilRolController(BaseDatos base) {
        this.base = base;
    }
    
    public PerfilRol get(Integer idPerfilRol) throws SQLException{
        PerfilRol perfilRol = base.getPerfilRol(idPerfilRol);
        return perfilRol;
    }
    
    public List<PerfilRol> getAll() throws SQLException{
        List<PerfilRol> perfilRoles = base.getAllPerfilRol();
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
