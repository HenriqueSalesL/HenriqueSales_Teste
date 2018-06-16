import sqlite3
dados = [["1000","henrique","11111111111","S","700"],
        ["1300","guilherme","22222222222","S","350"],
         ["1550","barbara","33333333333","S","900"],
         ["1700","thiago","44444444444","S","450"],
         ["1950","felipe","55555555555","S","1250"],
         ["2150","gabrielle","66666666666","S","3000"],
         ["2300","aline","77777777777","S","2500"],
         ["2750","eduardo","88888888888","N","2350"],
         ["2900","joão","99999999999","S","3100"],
         ["3000","elizete","10101010101","N","450"]
         ]
conexão = sqlite3.connect("henriquesales.db")
cursor = conexão.cursor()

def tabela():
    cursor.execute('''
           
                create table if not exists tb_customer_account (
                id_customer integer primary key,
                nm_customer varchar(30),
                cpf_cnpj numeric ,
                is_active char(1),
                vl_total numeric)
        ''')
tabela()
def insert():
    try:
        cursor.executemany(
            "insert into tb_customer_account(id_customer, nm_customer, cpf_cnpj, is_active, vl_total) values (?,?,?,?,?)", (id, nome, cpf, status, saldo))
    except sqlite3.IntegrityError:
        return



def Delete():
    cursor.execute(
        'DELETE FROM tb_customer_account WHERE id_customer = {}'.format(idDelete)
    )

def Média():
    cursor.execute('select avg(vl_total) from tb_customer_account where vl_total > 560 and id_customer > 1500 and id_customer < 2700')
    resultado = cursor.fetchall()
    print("Média de seus Saldos: {}".format(resultado))


def Select():
    print(' ID     Nome      CPF/CNPJ   Ativo  Saldo')
    cursor.execute('select * from tb_customer_account')
    [print(row) for row in cursor.fetchall()]



def MaiorToMenor():
    cursor.execute('select * from tb_customer_account where vl_total > 560 and id_customer > 1500 and id_customer < 2700 order by vl_total desc')
    print('Clientes com id entre 1500 e 2700 com saldo acima de 560 em ordem decrescente:')
    print(' ID       NOME   CPF/CNPJ   ATIVO   SALDO')
    [print(row) for row in cursor.fetchall()]



while True:
    print("--------------------------------------------")
    print("1 - Inserir registros")
    print("2 - Consultar")
    print("3 - Deletar registro")
    print("4 - Informações")

    resposta = int(input("Opção desejada: "))
    if resposta == 1:
        id = input("ID do cliente: ")
        nome = input("Nome do cliente: ").upper()
        cpf = input("CPF/CNPJ do cliente: ")
        status = input("Status do cliente: A - [Ativo] I - [Inativo]").upper()
        saldo = input("Saldo do cliente: ")
        cursor.execute(
            'INSERT INTO tb_customer_account(id_customer, nm_customer, cpf_cnpj, is_active, vl_total) VALUES (?,?,?,?,?)',
            (id, nome, cpf, status, saldo))
    if resposta == 2:
        Select()
    if resposta == 3:
        idDelete = input("ID do cliente que deseja deletar: ")
        Delete()
    if resposta == 4:
        MaiorToMenor()
        Média()
    pergunta = int(input("Deseja Continuar ? 1 - [SIM] 2 - [NÃO]"))
    if pergunta == 2:
        break;

##Delete()
##tabela()
##insert()
##Select()
##Média()
##MaiorToMenor()
conexão.commit()
cursor.close()
conexão.close()
