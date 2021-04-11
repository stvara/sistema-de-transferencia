# Avisos:

Este projeto deverá ser executadao em uma máquina local, através de um servidor que rode PHP, juntamente com um servidor MySQL/MariaDB.<br />

os arquivos Dockerfile e dockercompose.yml da pasta raíz conseguem fazer a instalação do MySQL e PHP, mas como ainda não consegui fazer uma comunicação funcional entre os dois <br />
resolvi primeiro terminar as funções básicas e depois voltar a estudar sobre o docker para a optimização deste projeto em um futuro breve. <br />

das funções principais, a única que não foi totalmente desenvolvida, foi a referente a duplicidade de cpf/email na area de cadastro. <br />

O programa foi desenvolvido majoritariamente em um sistema windows<br />

# Como Funciona:

os usuários de testes padrões são o<br />
Matricula  	 Senha<br />
   1		senha123<br /><br />

(após estes usuários, os restantes seguirão uma ordem numerica, 2, 3, 4, tanto para compradores, quanto para lojistas foram criadas uma tabela).<br />

1 - O usuário deverá ir ao campo de login para validar a sessão.<br />
2 - após a entrada, o usuário deverá digitar o numero da matricula do beneficiário da transação, juntamente com o valor, tipo de conta do mesmo e senha para confirmação.<br />
3 - após o processamento de dados e validações, caso não haja nenhum erro, o usuário pagador terá debitado de sua conta o valor escolhido, o beneficiário da transação terá o mesmo valor de transferencia depositado.<br />
4 - em caso de uma falha na validação externa, o dinheiro debitado do pagador, retornará a sua conta. <br />



# Estrutura do projeto em php.



controler/conexao.php<br />
		      

www/Index.php--->controler/cadastro.php---->cadastrar.php<br />
	     ou
www/index-->controler/login.php -->logar.php-->aplicacao.php --> validar.php<br />


# Onde:
index.php -> pagina principal e de redirecionamento para cadastro e login.<br />
montagem.php-> incrementa o html de cabeçalho da pagina, além de trasmitir o css para uma melhor apresentação do protótipo.<br />
/controler/ -> o diretório de onde partem as ações da pagina.<br />
cadastro.php -> a pagina responsável pelo formulário de cadastro<br />
login.php -> pagina resposável pelo formulário de verificação de usuário.<br />
conexao.php -> responsável pela conexão com o banco através da extensão PDO.(os dois ultimos campos de conexão devem ser configurados com sua máquina local). <br />
cadastrar.php -> valida o formulário, faz a conexão com o arquivo conexão.php e o cadastro no banco de dados.<br />
logar.php -> valida a tela de login.php, permitindo o acesso a aplicação de transferencias.<br />
validar.php ->faz a consulta.<br />
teste.php -> Arquivo de testes para implementações de novas funcionalidades.<br />
www/db/CreateDatabase.sql -> Neste arquivo estão as instruções que devem ser inxertadas no banco de dados para a criação da database, das tabelas de comprador e lojista. <br />
além de um usuário de exemplo para cada uma das classes, que no caso seriam:<br />
"usuario" que chamei de "compradores" e "lojistas" que mantive como "lojistas".<br />

# Notas:
Como a estrutura docker ainda não está totalmente funcional, o conteúdo do arquivo CreateDatabase.sql deve ser inserido manualmente em seu banco local. <br />

Os arquivos <br />
www/classes.php e www/controlador.php estão inativados no momento e poderão vir a serem utilizados em uma nova versão do código, mais voltada ao conceito de orientação a objetos.<br />
por hora, achei mais interessante fazer um código de maneira mais estrutural, pois tenho um maior dominio do que estou realizando, mas deixarei este gancho para uma futura atualização do codigo.<br />


# Linguagem escolhida:

Optei por usar o PHP de forma nativa, sem a utilização de frameworks pois tenho um melhor dominio dela desta forma até o presente momento, mas nada impede que este programa seja refeito no futuro em cima de algum framework.<br />
Quanto ao banco, optei pelo MySQL/MariaDB pois ainda não tive a oportunidade de parar para estudar outros bancos, ou a estrutura NoSQL.<br />


# Propostas de melhorias que farei:

Integração completa com o docker assim que possível.<br />
Uma estruturação mais subdividas entre os diretórios de controle.<br />
Divisões em funções para um melhor reaproveitamento de codigo.<br />
introdução de uma forma mais funcional do conceito de orientação a objetos.<br />
E por fim, uma revisita ao codigo em algum tempo, quando terei mais experiência e conhecimento sobre as tecnologias envolvidas nele.<br />
