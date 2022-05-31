/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Platea;

/**
 *
 * @author Alex Mendoza
 */
public class PlateaController {
    BaseDatos base ;

    public PlateaController(BaseDatos base) {
        this.base = base;
    }
    
    public Platea get(Integer idPlatea) throws SQLException{
        Platea platea = base.getPlatea(idPlatea);
        return platea;
    }
    public Platea get(Integer idPlatea,Integer idFuncion) throws SQLException{
        Platea platea = base.getPlatea(idPlatea, idFuncion);
        return platea;
    }
    public  List<Platea> getP(Integer idFuncion) throws SQLException{
        List<Platea> plateas = base.getPlateaTaquilla(idFuncion);
        return plateas;
    }
    public List<Platea> getAll(Integer idEvento) throws SQLException{
        List<Platea> plateas = base.getAllPlatea(idEvento);
        return plateas;
    }
    public boolean updateEstado(Platea platea) throws SQLException{
        return base.updateEstadoPlatea(platea);
    }
    public boolean update(Platea platea) throws SQLException{
        return base.updatePlatea(platea);
    }
    public boolean isPrincipal(Integer idEvento) throws SQLException{
        return base.isPrincipal(idEvento);
    }
    public boolean insert(Platea platea) throws SQLException{
        return base.insertPlatea(platea);
    }
}
