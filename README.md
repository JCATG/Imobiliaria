# Imobiliaria
Portal imobiliario.
Como TG (Trabalho de Graduação). Estou desenvolvendo junto com minha equipe um portal Imobiliario, atendendo pequenas imobiliarias e corretores autonomos. Decidimos este trabalho com foco corretores e imobiliarias que divulgam em redes sociais, com um portal imobiliario a chance de vendas aumenta ainda mais.  

#Ferramentas 
Wordpress: Hoje o Wordpress é o CMS mais utilizado na web, pela facilidade de manutenção ao site e também por ser bastante intuitivo, assim a pessoa terá facilidade em publicar os imoveis, dentre outras funcionalidades do sistema.
HTML: Utilizamos o html para a marcação do nosso projeto.
Tailwind Css: Utilizamos o Framework tailwind pela facilidade de atribuir os estilos na própria classe no html e assim evitando a criação de codigos css extensos.
PHP:O php como linguagem principal, por conta do wordpress trabalhar com php. 
Mysql: mysql como nosso banco de dados.
JS: Utilizamos o Js para pequenas animações, e libs, como swipper para criação de carrossel no nosso site.

o Wordpress por padrão vem com 3 temas, mas criamos o nosso tema do Zero utilizando as ferramentas citadas acima.

#Rodar o programa

1. Clonar o projeto ou baixar um zip.
2. Baixar o wordpress 6.2.2
3- Adicionar wordpress que baixou, dentro de htcocs, utilizando o Xampp.
4. Adicionar o Tema que baixou do Git dentro de Themes na pasta Wordpress.
  Caminho: wp-content/themes/
5. Abrir com o Visual Studio Code.

6. Navegar até o diretorio do Tema.
  Caminho: wp-content/themes/Imobiliaria

7. Crie um banco de dados.
   http://localhost:9000/dashboard/
   abra o phpmyadmin e crie um banco de dados

7. Abrir o arquivo wp-config
   dentro dele você cofigura o banco de dados.
7.Rodar o seguinte comando 
   npm run dev  

8- start no xampp e abra o projeto no navegador

  Por padrao, utilizando o xampp, fica desta forma
  localhost:9000/"nome do projeto"






