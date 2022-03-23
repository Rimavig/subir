/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro.Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import teatro.Entity.Evento;

/**
 *
 * @author Alex Mendoza
 */
public class EventoController {
    BaseDatos base ;

    public EventoController(BaseDatos base) {
        this.base = base;
    }
    
    public Evento get(Integer idEvento) throws SQLException{
        Evento evento = base.getEvento(idEvento);
        return evento;
    }
    
    public List<Evento> getAll() throws SQLException{
        List<Evento> eventos = base.getAllEvento();
        return eventos;
    }
    public boolean updateEstado(Evento evento) throws SQLException{
        return base.updateEstadoEvento(evento);
    }
    public boolean update(Evento evento) throws SQLException{
        return base.updateEvento(evento);
    }
    
    public boolean insert(Evento evento) throws SQLException{
        return base.insertEvento(evento);
    }
}
