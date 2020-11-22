namespace java Thrift

service Servidor{
    string registro(1:string dato1),
    string login(1:string usuario, 2:string password),
}
