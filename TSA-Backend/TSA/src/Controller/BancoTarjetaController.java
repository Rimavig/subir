/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.BancoTarjeta;

/**
 *
 * @author Alex Mendoza
 */
public class BancoTarjetaController {
    BaseDatos base;

    public BancoTarjetaController(BaseDatos base) {
        this.base = base;
    }
    
     public BancoTarjeta get(Integer idBancoTarjeta) throws SQLException{
        BancoTarjeta bancoTarjeta = base.getBancoTarjeta(idBancoTarjeta);
        return bancoTarjeta;
    }
    
    public List<BancoTarjeta> getAll() throws SQLException{
        List<BancoTarjeta> bancoTarjetas = base.getAllBancoTarjeta();
        return bancoTarjetas;
    }
    public boolean updateEstado(BancoTarjeta bancoTarjeta) throws SQLException{
        return base.updateEstadoBancoTarjeta(bancoTarjeta);
    }
    public boolean update(BancoTarjeta bancoTarjeta) throws SQLException{
        return base.updateBancoTarjeta(bancoTarjeta);
    }
    
    public boolean insert(BancoTarjeta bancoTarjeta) throws SQLException{
        return base.insertBancoTarjeta(bancoTarjeta);
    }
}
