# world-cup-xml

## Trabalho de Linguagem de Marcação extensíveis
Nomes: Evandro Bolzan, Luiz Felipe Schleder

### Tecnologias usadas:
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![NetBeans IDE](https://img.shields.io/badge/NetBeansIDE-1B6AC6.svg?style=for-the-badge&logo=apache-netbeans-ide&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white)

### Documentação 
Schema.xml contem as definições do XML da COPA do Mundo;
Todos os Arquivos HTML são gerados pelos arquivos index.php, group.php, finals.php, 
champion.php, createfile.php;
Para geração dos arquivos HTML executar o arquivo index.php;
A página inicial do site depois de gerado o HTML é home.html;
O arquivo que faz a validação do XML é o arquivo schema.xsd.
Critério de classificação dos grupos adotado foi:
<ul>
  <li>1º – Número de pontos;</li>
  <li>2º – Saldo de gols.</li>
  </ul>
  
### Requisitos funcionais

O documento XML possui:
Todos os jogos da Copa, apresentando para cada jogo: as duas seleções envolvidas 
e o número de gols marcados por cada time.
A definição de quais seleções pertencem a quais grupos da fase inicial.
A partir deste documento XML contendo jogos e placares, uma XSLT ou Xquery 
deverá processar tal documento gerando como saída um conjunto de páginas HTML  
contendo:
Uma página HTML para cada grupo, sendo que nesta página aparecem: tanto os 
jogos deste grupo, quanto a classificação do grupo, totalmente baseada em seus jogos.
Uma página HTML para cada eliminatória, contendo os jogos e os placares (não é 
necessário se preocupar com prorrogação e pênaltis).
Uma página HTML para o campeão, mostrando toda a sua campanha.
Uma página HTML como índice, na qual se possa locomover até o grupo ou a fase 
desejada, a qual tem um link para cada uma das 32 seleções.
Toda página HTML deve ter um link que permita o regresso para a página índice. 
Cada página
referente   aos  grupos  ainda   deve   ter  links   para   os  demais   grupos.  As   páginas 
referentes às fases
eliminatórias devem possuir links para as demais fases eliminatórias.
O documento XML não contém o cálculo de classificação de cada grupo. Esse 
cálculo é feito
dinamicamente pela XSLT ou pela XQuery.
A XSLT ou XQuery também deve verificar se uma seleção que já foi eliminada em 
uma fase anterior não está jogando em uma fase seguinte. Por exemplo, uma seleção 
eliminada nas oitavas-de-final não pode jogar nas quarta, semi ou final da Copa.


Automatically exported from code.google.com/p/world-cup-xml
