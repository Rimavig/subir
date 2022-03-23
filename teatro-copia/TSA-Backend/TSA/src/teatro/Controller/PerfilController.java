/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Perfil;

/**
 *
 * @author Alex Mendoza
 */
public class PerfilController {
    BaseDatos base ;

    public PerfilController(BaseDatos base) {
        this.base = base;
    }
    
    public Perfil get(Integer idPerfil) throws SQLException{
        Perfil perfil = base.getPerfil(idPerfil);
        return perfil;
    }
    
    public List<Perfil> getAll() throws SQLException{
        List<Perfil> perfiles = base.getAllPerfil();
        return perfiles;
    }
    public boolean updateEstado(Perfil perfil) throws SQLException{
        return base.updateEstadoPerfil(perfil);
    }
    public boolean update(Perfil perfil) throws SQLException{
        return base.updatePerfil(perfil);
    }
    
    public boolean insert(Perfil perfil) throws SQLException{
        return base.insertPerfil(perfil);
    }
}
