/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Mapa;

/**
 *
 * @author Alex Mendoza
 */
public class MapaController {
    BaseDatos base;

    public MapaController(BaseDatos base) {
        this.base = base;
    }
    
    public Mapa get(Integer idMapa) throws SQLException{
        Mapa mapa = base.getMapa(idMapa);
        return mapa;
    }
    
    public List<Mapa> getAll() throws SQLException{
        List<Mapa> mapas = base.getAllMapa();
        return mapas;
    }
    public boolean updateEstado(Mapa mapa) throws SQLException{
        return base.updateEstadoMapa(mapa);
    }
    public boolean update(Mapa mapa) throws SQLException{
        return base.updateMapa(mapa);
    }
    
    public boolean insert(Mapa mapa) throws SQLException{
        return base.insertMapa(mapa);
    }
}
