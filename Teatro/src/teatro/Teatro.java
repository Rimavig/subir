/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package teatro;

import Thrift.Servidor;

/**
 *
 * @author rwiva
 */
public class Teatro implements Servidor.Iface {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Comunicacion hs = new Comunicacion();
        Thread t = new Thread(hs);
        t.start();
    }

    @Override
    public String registro(String dato1) throws org.apache.thrift.TException {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public String login(String usuario, String password) throws org.apache.thrift.TException {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
