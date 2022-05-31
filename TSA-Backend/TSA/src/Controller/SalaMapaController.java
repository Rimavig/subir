/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.SalaMapa;

/**
 *
 * @author Alex Mendoza
 */
public class SalaMapaController {
    BaseDatos base ;

    public SalaMapaController(BaseDatos base) {
        this.base = base;
    }
    
    public SalaMapa get(Integer idSalaMapa) throws SQLException{
        SalaMapa sala = base.getSalaMapa(idSalaMapa);
        return sala;
    }
    public String getAsientoDistribucion(Integer idSalaMapa) throws SQLException{
        String sala = base.getAsientoDistribucion(idSalaMapa);
        return sala;
    }
    public String getMapa(Integer idSalaMapa) throws SQLException{
        String sala = base.dibujar_mapa(idSalaMapa);
        return sala;
    }
    public String getMapaP(Integer idfuncion) throws SQLException{
        String sala = base.dibujar_mapa_evento(idfuncion);
        return sala;
    }
    public List<SalaMapa> getAll() throws SQLException{
        List<SalaMapa> salasMapas = base.getAllSalaMapa();
        return salasMapas;
    }
    public List<SalaMapa> getAll(int id) throws SQLException{
        List<SalaMapa> salasMapas = base.getAllSalaMapa(id);
        return salasMapas;
    }
    public boolean updateEstado(SalaMapa salaMapa) throws SQLException{
        return base.updateEstadoSalaMapa(salaMapa);
    }
    public boolean update(SalaMapa salaMapa) throws SQLException{
        if (salaMapa.getRutaImagen().equals("none") || salaMapa.getRutaImagen().length()>8) {
             return base.updateSalaMapaP(salaMapa);
        }else{
            return base.updateSalaMapaE(salaMapa);
        }
       
    }
    
    public boolean insert(SalaMapa salaMapa) throws SQLException{
        return base.insertSalaMapa(salaMapa);
    }
}
