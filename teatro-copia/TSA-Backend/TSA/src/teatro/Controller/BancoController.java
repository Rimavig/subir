/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Banco;

/**
 *
 * @author Alex Mendoza
 */
public class BancoController {
    BaseDatos base;

    public BancoController(BaseDatos base) {
        this.base = base;
    }
    
    public Banco get(Integer idBanco) throws SQLException{
        Banco banco = base.getBanco(idBanco);
        return banco;
    }
    
    public List<Banco> getAll() throws SQLException{
        List<Banco> bancos = base.getAllBanco();
        return bancos;
    }
    public boolean updateEstado(Banco banco) throws SQLException{
        return base.updateEstadoBanco(banco);
    }
    public boolean update(Banco banco) throws SQLException{
        return base.updateBanco(banco);
    }
    
    public boolean insert(Banco banco) throws SQLException{
        return base.insertBanco(banco);
    }
}
