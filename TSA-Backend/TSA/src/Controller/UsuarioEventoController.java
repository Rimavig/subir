/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.UsuarioEvento;

/**
 *
 * @author Alex Mendoza
 */
public class UsuarioEventoController {
    BaseDatos base ;

    public UsuarioEventoController(BaseDatos base) {
        this.base = base;
    }
    
    public UsuarioEvento get(Integer idUsuarioEvento) throws SQLException{
        UsuarioEvento usuarioEvento = base.getUsuarioEvento(idUsuarioEvento);
        return usuarioEvento;
    }
    
    public List<UsuarioEvento> getAll() throws SQLException{
        List<UsuarioEvento> usuariosEventos = base.getAllUsuarioEvento();
        return usuariosEventos;
    }
    public boolean updateEstado(UsuarioEvento usuarioEvento) throws SQLException{
        return base.updateEstadoUsuarioEvento(usuarioEvento);
    }
    public boolean update(UsuarioEvento usuarioEvento) throws SQLException{
        return base.updateUsuarioEvento(usuarioEvento);
    }
    
    public boolean insert(UsuarioEvento usuarioEvento) throws SQLException{
        return base.insertUsuarioEvento(usuarioEvento);
    }
}
