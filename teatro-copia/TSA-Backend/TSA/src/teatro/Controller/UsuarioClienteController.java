/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.UsuarioCliente;

/**
 *
 * @author Alex Mendoza
 */
public class UsuarioClienteController {
    BaseDatos base ;

    public UsuarioClienteController(BaseDatos base) {
        this.base = base;
    }
    
    public UsuarioCliente get(Integer idUsuarioCliente) throws SQLException{
        UsuarioCliente usuarioCliente = base.getUsuarioCliente(idUsuarioCliente);
        return usuarioCliente;
    }
    
    public List<UsuarioCliente> getAll() throws SQLException{
        List<UsuarioCliente> usuariosClientes = base.getAllUsuarioCliente();
        return usuariosClientes;
    }
    public boolean updateEstado(UsuarioCliente usuarioCliente) throws SQLException{
        return base.updateEstadoUsuarioCliente(usuarioCliente);
    }
    public boolean update(UsuarioCliente usuarioCliente) throws SQLException{
        return base.updateUsuarioCliente(usuarioCliente);
    }
    
    public boolean insert(UsuarioCliente usuarioCliente) throws SQLException{
        return base.insertUsuarioCliente(usuarioCliente);
    }
}
