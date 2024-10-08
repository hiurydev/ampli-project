# Sistema de Previsão do Tempo – Amplimed

## Introdução
O projeto consiste em um sistema para consultar e comparar previsões do tempo para diferentes locais. A aplicação foi desenvolvida integrando as APIs WeatherStack, para obter informações climáticas em tempo real, e ViaCEP, para obter a cidade a partir do CEP.

## Tecnologias utilizadas
<p>
  <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="laravel" />
  <img src="https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white" alt="jq" />
  <img src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white" alt="docker" />
  <img src="https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white" alt="mysql" />
  <img src="https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" alt="html" />
  <img src="https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white" alt="css" />
</p>

## Funcionalidades:
- Consulta de previsão do tempo para várias localidades.
- Possibilita comparar as previsões de duas localidades diferentes em uma mesma tela.
- Permite salvar consultas de previsao para acessar e reaproveitar as solicitações feitas anteriormente.
- Armazena em cache as localidades consultadas, permitindo consultar o histórico das mesmas.
- Interface intuitiva, com o uso de Bootstrap para proporcionar um layout responsivo.

## Estrutura do projeto:
- Backend: construído com Laravel (Padrão MVC), é onde a lógica do sistema acontece, e todas as solicitações à API são gerenciadas.
- Frontend: construído com o Blade do Laravel, juntamente do jQuery, na qual possibilita maior interação com o usuário em tela; Bootstrap: framework utilizado para o layout da página.
- Docker: servidores de desenvolvimento preparados juntamente com PHP e MySQL. Utilizado pois facilita e muito a vida de quem desenvolve.

## Git
- Criado branch desenv para o desenvolvimento da aplicação
- Utilizado padrão de commits por features

## Links úteis
- [Página principal do projeto](https://github.com/hiurydev/ampli-project)
- [Documentação da API WeatherStack](https://weatherstack.com/documentation)
- [Documentação da API ViaCEP](https://viacep.com.br/)

## Fluxograma (Teste 2)

- [Fluxograma do Elevador](https://github.com/hiurydev/ampli-project/blob/desenv/public/images/fluxograma.jpeg?raw=true)

## Demonstração:

### Pagina inicial e consulta da previsão
![Home Page](https://github.com/hiurydev/ampli-project/blob/desenv/public/images/1-home-page.gif?raw=true)

### Comparação de climas
![Comparar](https://github.com/hiurydev/ampli-project/blob/desenv/public/images/2-comparar.gif?raw=true)

### Históricos salvos
![Salvos](https://github.com/hiurydev/ampli-project/blob/desenv/public/images/3-historico-salvo.gif?raw=true)

### Exemplo da responsividade do sistema
![Salvos](https://github.com/hiurydev/ampli-project/blob/desenv/public/images/4-responsividade.gif?raw=true)

