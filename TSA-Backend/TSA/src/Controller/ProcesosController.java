/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Entity.Contacto;
import Entity.Fundacion;
import java.sql.SQLException;
import java.util.List;
import teatro.BaseDatos;
import Entity.Usuario;

/**
 *
 * @author Alex Mendoza
 */
public class ProcesosController {
    BaseDatos base;

    public ProcesosController(BaseDatos base) {
        this.base = base;
    }
    
    public String getContacto() throws SQLException{
        String contacto = base.getContacto();
        return contacto;
    }
    public String getFundacion() throws SQLException{
        String fundacion = base.getFundacion();
        return fundacion;
    }
    public String getInformacion() throws SQLException{
        String informacion = base.getInformacion();
        return informacion;
    }
    public boolean updateContacto(Contacto contacto) throws SQLException{
        boolean contact = base.updateContacto(contacto);
        return contact;
    }
    public boolean updateFundacion(Fundacion fundacion) throws SQLException{
        boolean fundacio = base.updateFundacion(fundacion);
        return fundacio;
    }
    public boolean updateInformacion(String Informacion, String usuario_modificacion) throws SQLException{
        boolean informacion = base.updateInformacion(Informacion,usuario_modificacion);
        return informacion;
    }
    public String getAllBeneficios() throws SQLException{
        String beneficios = base.getAllBeneficios();
        return beneficios;
    }
     public String getAllPreguntas() throws SQLException{
        String preguntas = base.getAllPreguntas();
        return preguntas;
    }
    public String getBeneficio(Integer id_beneficio) throws SQLException{
        String beneficios = base.getBeneficio(id_beneficio);
        return beneficios;
    }
    public String getPregunta(Integer id_pregunta) throws SQLException{
        String preguntas = base.getPregunta(id_pregunta);
        return preguntas;
    }
    public boolean updateEstadoBeneficio(Integer id, String estado, String usuario_modificacion) throws SQLException{
        boolean preguntas = base.updateEstadoBeneficio(id,estado,usuario_modificacion);
        return preguntas;
    }
    public boolean updateBeneficio(Integer id, String beneficio, String usuario_modificacion) throws SQLException{
        boolean beneficios = base.updateBeneficio(id,beneficio,usuario_modificacion);
        return beneficios;
    }
    public boolean insertBeneficio(String beneficio, String usuarioCreacion) throws SQLException{
        boolean preguntas = base.insertBeneficio(beneficio,usuarioCreacion);
        return preguntas;
    }
    public boolean updateEstadoPregunta(Integer id, String estado, String usuario_modificacion) throws SQLException{
        boolean preguntas = base.updateEstadoPregunta(id,estado,usuario_modificacion);
        return preguntas;
    }
    public boolean updatePregunta(Integer id,  String pregunta, String respuesta, String usuario_modificacion) throws SQLException{
        boolean preguntas = base.updatePregunta(id,pregunta,respuesta,usuario_modificacion);
        return preguntas;
    }
    public boolean insertPregunta(String pregunta, String respuesta, String usuarioCreacion) throws SQLException{
        boolean preguntas = base.insertPregunta(pregunta,respuesta,usuarioCreacion);
        return preguntas;
    }
}
