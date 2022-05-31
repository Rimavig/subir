/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.FichaArtistica;

/**
 *
 * @author Alex Mendoza
 */
public class FichaArtisticaController {
    BaseDatos base;

    public FichaArtisticaController(BaseDatos base) {
        this.base = base;
    }
    
    public FichaArtistica get(Integer idFichaArtistica) throws SQLException{
        FichaArtistica fichaArtistica = base.getFichaArtistica(idFichaArtistica);
        return fichaArtistica;
    }
    
    public List<FichaArtistica> getAll(Integer idEvento) throws SQLException{
        List<FichaArtistica> fichaArtisticas = base.getAllFichaArtistica(idEvento);
        return fichaArtisticas;
    }
    public boolean delete(Integer idFichaArtistica) throws SQLException{
        return base.deleteFichaArtistica(idFichaArtistica);
    }
    public boolean update(FichaArtistica fichaArtistica) throws SQLException{
        return base.updateFichaArtistica(fichaArtistica);
    }
    
    public boolean insert(FichaArtistica fichaArtistica) throws SQLException{
        return base.insertFichaArtistica(fichaArtistica);
    }
}
