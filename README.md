# 🚗 Byecar Web Service

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white)
![Git](https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white)
![GitHub Actions](https://img.shields.io/badge/GitHub_Actions-2088FF?style=for-the-badge&logo=github-actions&logoColor=white)
![Digital Ocean](https://img.shields.io/badge/Digital_Ocean-0080FF?style=for-the-badge&logo=DigitalOcean&logoColor=white)


👤 **Leonardo Carlos Dias**

🌐 [Portfólio](https://leocarlos-dias.github.io/personal-portfolio/)  
🔗 [LinkedIn](https://www.linkedin.com/in/leonardocsdias/)

## 📖 Sobre

O Byecar Web Service é um projeto desenvolvido como parte de um desafio técnico, demonstrando habilidades em desenvolvimento web utilizando o framework Laravel, Docker para ambientes de desenvolvimento e produção, além de implementar um fluxo de deploy automatizado com GitHub Actions para a plataforma Digital Ocean. O projeto está atualmente em produção para a avaliação do desafio, podendo ser acessado [aqui](http://144.126.222.30:8001/vehicles).

## 🚀 Principais Tecnologias Utilizadas

- Laravel
- Docker
- Docker Compose
- Git, GitHub & GitHub Actions
- Digital Ocean
- Nginx
- MySQL

## 🎯 Visão Geral

O projeto consiste em uma plataforma para listagem de carros, onde os usuários podem visualizar, editar e excluir os carros cadastrados.


## 💻 Instalação e Execução

Para executar o projeto localmente, siga os passos abaixo:

1. Clone e acesse o repositório.

2. Execute o comando `docker-compose build` para construir as imagens do Docker.

3. Execute o comando `docker-compose up -d` para iniciar os containers.

4. Execute o comando `docker exec -it php /bin/sh` para acessar o container do PHP. Os passos subsequentes devem ser executados dentro do container.

5. Execute o comando `chmod -R 777 storage` para conceder permissão de escrita à pasta de armazenamento.
6. 
7. Execute o comando `composer install` para instalar as dependências do projeto.

8. Execute o comando `cp .env.example .env` para criar o arquivo .env.

9. Execute o comando `php artisan key:generate` para gerar a chave da aplicação.

10. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados.

Pronto, o projeto estará disponível em `http://localhost:8001/vehicles`.

## 🚢 Deploy

O deploy deste projeto é realizado de forma automatizada através do GitHub Actions para a plataforma Digital Ocean. A cada push na branch main, o GitHub Actions é acionado para executar o deploy da aplicação.

## 🧪 Testes

Para executar os testes, siga os passos abaixo:

1. Abra um terminal.

2. Execute o comando `docker exec -it php /bin/sh` para acessar o container do PHP.

3. Dentro do container, execute o comando `php artisan test` para executar os testes.

Este comando iniciará a execução dos testes automatizados para os casos de uso e controladores do projeto, utilizando o padrão de teste em memória para garantir a integridade e a eficiência dos testes.

## 📚 Documentação

A documentação das rotas desta API está disponível no endpoint `api/documentation`, e pode ser acessada em produção através deste [endereço](http://144.126.218.156:8001/api/documentation).

## 💌 Contato

Em caso de dúvidas ou feedbacks, entre em contato por [email](mailto:leocsdias@hotmail.com).
