/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Categoria;

/**
 *
 * @author Alex Mendoza
 */
public class CategoriaController {
    BaseDatos base ;

    public CategoriaController(BaseDatos base) {
        this.base = base;
    }
    
    public Categoria get(Integer idCategoria) throws SQLException{
        Categoria categoria = base.getCategoria(idCategoria);
        return categoria;
    }
    
    public List<Categoria> getAll() throws SQLException{
        List<Categoria> categorias = base.getAllCategoria();
        return categorias;
    }
    public boolean updateEstado(Categoria categoria) throws SQLException{
        return base.updateEstadoCategoria(categoria);
    }
    public boolean update(Categoria categoria) throws SQLException{
        return base.updateCategoria(categoria);
    }
    
    public boolean insert(Categoria categoria) throws SQLException{
        return base.insertCategoria(categoria);
    }
}
