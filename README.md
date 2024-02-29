# 🚗 Lets Go Byecar

![PHP](https://img.shields.io/badge/php-6DA55F?style=for-the-badge&logo=node.js&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23323330.svg?style=for-the-badge&logo=nodemon&logoColor=%BBDEAD)
![Git](https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white)

👤 **Leonardo Carlos Dias**

🌐 [Portfólio](https://leocarlos-dias.github.io/personal-portfolio/)  
🔗 [LinkedIn](https://www.linkedin.com/in/leonardocsdias/)

## 📖 Sobre

Este projeto foi desenvolvido como parte de um desafio técnico e visa demonstrar habilidades em desenvolvimento web utilizando o framework Laravel, Docker para ambiente de desenvolvimento e produção, além de implementar um fluxo de deploy automatizado usando GitHub Actions para a plataforma Digital Ocean.

## 🚀 Tecnologias Utilizadas

- Laravel
- PHP
- Docker
- Docker Compose
- PHPUnit
- Git & GitHub
- GitHub Actions
- Digital Ocean
- Nginx
- MySQL
- Swagger

## 🎯 Visão Geral

O projeto conta com uma conta para a listagem de carros, onde é possível visualizar, editar e excluir os carros cadastrados. 


## 💻 Instalação e Execução

Para executar o projeto localmente, siga os passos abaixo:

1. Clone o repositório

2. Execute o comando `docker-compose build` para construir as imagens do Docker.

3. Execute o comando `docker-compose up -d` para iniciar os containers.

4. Execute o comando `chmod -R 777 storage` para dar permissão de escrita na pasta storage.

5. Execute o comando `docker exec -it php /bin/sh composer install` para instalar as dependências do projeto.

6. Execute o comando `docker exec -it php /bin/sh cp .env.example .env` para criar o arquivo .env.

7. Execute o comando `docker exec -it php /bin/sh php artisan key:generate` para gerar a chave da aplicação.

8. Execute o comando `docker exec -it php /bin/sh php artisan migrate` para criar as tabelas no banco de dados.

9. Pronto, o projeto estará disponível em `http://localhost:8001/vehicles`.

## 🚢 Deploy

O deploy deste projeto é feito de forma automatizada através do GitHub Actions para a plataforma Digital Ocean. A cada push na branch `main`, o GitHub Actions é acionado e realiza o deploy da aplicação.

## 🧪 Testes

Para executar os testes, execute o comando `docker exec -it php /bin/sh php artisan test` no terminal.

## 📚 Documentação

A documentação das rotas desta API está disponível no arquivo [documentation](http://144.126.222.30:8001/vehicles) nesta URL.

## 💌 Contato

Em caso de dúvidas ou feedbacks, entre em contato por [email](mailto:leocsdias@hotmail.com).
