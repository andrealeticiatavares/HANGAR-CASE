# Big Bang Theory Inc.


A loja Big Bang Theory Inc. precisou criar novas páginas, e o processo de desenvolvimento envolveu diversas tecnologias e habilidades. Isso incluiu a manipulação de banco de dados usando SQL, além de uma apresentação clara e visualmente atraente com HTML e CSS. O sistema, desenvolvido em PHP, deve permitir o acesso e a visualização dos pedidos e dos respectivos usuários de várias maneiras. Cada etapa do desenvolvimento trouxe seus próprios desafios, mas conseguimos alcançar soluções funcionais e bem organizadas.

Como rodar o projeto. [**Work in progress**]

Este projeto usa Docker para criar um ambiente isolado para a execução do sistema. Siga as instruções abaixo para configurar e rodar o sistema localmente.

1.Clone este repositório para um diretório de sua escolha. Use o comando:
```
$ git clone https://github.com/andrealeticiatavares/hangar-case.git
```

2.Entre no diretório do projeto clonado:

```
$ cd ..
```
3.Construa a imagem Docker para o sistema:
```
$ sudo docker-compose build
```
4.Suba o container com o sistema:
```
$ sudo docker-compose up
```
5.Acesse o sistema pelo navegador no seguinte endereço:
http://localhost:82/

Se tudo estiver configurado corretamente, o sistema deverá estar rodando localmente.

Estrutura do repositório [**Work in progress**]

`conexao.php`: Arquivo de conexão com o banco de dados.
`index.php` : Arquivo que direciona para as respostas.
`resposta_1.php`: Código para calcular a média dos pedidos por dia e exibir uma tabela colorida de acordo com o valor da média.
`resposta_2.php`: Página que lista todos os pedidos em formato de tabela com cores alternadas para facilitar a leitura. Inclui um botão para impressão.
`resposta_3.php`: Página que exibe a soma dos totais de venda por país com opção para filtrar por um país desejado.
`resposta_4.php`: Query SQL para juntar as tabelas User e Order, selecionando colunas específicas e ordenando por Name.
`resposta_5.php`: Query SQL para alterar o campo Country do ID 4 para "Canada".
`resposta_6.php`: Query SQL para obter a soma dos totais de venda por mês/ano após uma junção de tabelas.