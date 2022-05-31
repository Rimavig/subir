/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Usuario;

/**
 *
 * @author Alex Mendoza
 */
public class UsuarioController {
    BaseDatos base;

    public UsuarioController(BaseDatos base) {
        this.base = base;
    }
    
     public Usuario get(Integer idUsuario) throws SQLException{
        Usuario usuario = base.getUsuario(idUsuario);
        return usuario;
    }
    
    public List<Usuario> getAll() throws SQLException{
        List<Usuario> usuarios = base.getAllUsuario();
        return usuarios;
    }
    public boolean updateEstado(Usuario usuario) throws SQLException{
        return base.updateEstadoUsuario(usuario);
    }
    
    public boolean update(Usuario usuario) throws SQLException{
        return base.updateUsuario(usuario);
    }
    public String generarCodigo(String usuario, String correo) throws SQLException{
        return base.generarCodigo( usuario,  correo);
    }
    public String  validadCodigo(String usuario, String codigo, String clave) throws SQLException{
        return base.validadCodigo( usuario,  codigo, clave);
    }
    public boolean insert(Usuario usuario) throws SQLException{
        return base.insertUsuario(usuario);
    }
}
