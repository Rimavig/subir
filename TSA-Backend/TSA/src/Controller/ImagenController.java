/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Imagen;

/**
 *
 * @author Alex Mendoza
 */
public class ImagenController {
    BaseDatos base ;

    public ImagenController(BaseDatos base) {
        this.base = base;
    }
    
    public Imagen get(Integer idImagen, String tipo) throws SQLException{
        Imagen imagen = base.getImagen(idImagen,tipo);
        return imagen;
    }
    
    public List<Imagen> getAll(String tipo) throws SQLException{
        List<Imagen> imagens = base.getAllImagen(tipo);
        return imagens;
    }
    public boolean updateEstado(Imagen imagen,String tipo) throws SQLException{
        return base.updateEstadoImagen(imagen,tipo);
    }
    public boolean update(Imagen imagen,String tipo) throws SQLException{
        return base.updateImagen(imagen,tipo);
    }
    
    public String insert(Imagen imagen,String tipo) throws SQLException{
        return base.insertImagen(imagen,tipo);
    }
}
