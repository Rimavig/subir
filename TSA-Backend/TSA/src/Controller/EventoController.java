/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Evento;

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
    public Evento getDestacado() throws SQLException{
        Evento evento = base.getEventoDestacado();
        return evento;
    }
    public Evento get_basico(Integer idEvento) throws SQLException{
        Evento evento = base.getEvento_basico(idEvento);
        return evento;
    }
    public Evento get_sinopsis(Integer idEvento) throws SQLException{
        Evento evento = base.getEvento_sinopsis(idEvento);
        return evento;
    }
    public Evento get_video(Integer idEvento) throws SQLException{
        Evento evento = base.getEvento_video(idEvento);
        return evento;
    }
    public List<Evento> getAllA(String tipo) throws SQLException{
        List<Evento> eventos = base.getAllEventoA(tipo);
        return eventos;
    }
     public List<Evento> getAllB() throws SQLException{
        List<Evento> eventos = base.getAllEventoB();
        return eventos;
    }
    public String updateEstado(Evento evento) throws SQLException{
        return base.updateEstadoEvento(evento);
    }
    public boolean update(Evento evento) throws SQLException{
        return base.updateEvento(evento);
    }
    public String update_informacion(Evento evento) throws SQLException{
        return base.updateEvento_informacion(evento);
    }
    public boolean update_sipnosis(Evento evento) throws SQLException{
        return base.updateEvento_sinopsis(evento);
    }
    public boolean update_video(Evento evento) throws SQLException{
        return base.updateEvento_video(evento);
    }
    public boolean update_destacado(Evento evento) throws SQLException{
        return base.updateEvento_destacado(evento);
    }
    public boolean insert(Evento evento) throws SQLException{
        return base.insertEvento(evento);
    }
}
