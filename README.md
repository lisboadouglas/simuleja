# SIMULE JÁ

Nesta avaliação prática, fui responsável por desenvolver uma API para consultar a disponibilidade de crédito para um determinado CPF e informar qual é a melhor oportunidade a ser ofertada ao nosso cliente.

## Tecnologias Utilizadas e suas versões.

- Laravel 11

## Pré-requisitos

Certifique-se de ter as seguintes ferramentas com suas respectivas versões instaladas em sua máquina:

- PHP 8.2 ou superior com a extensão pdo.sqlite habilitada
- Composer 2.5.8
- NODE 18.16.0 COM NPM 9.5.1
- SGBD MariaDB 10.4.28

## Instalação

1. Clone o repositório:
```bash 
git clone https://github.com/lisboadouglas/simuleja.git seu-projeto
```
2. Navegue até o diretório do projeto:
```bash 
cd seu-projeto 
``` 
3. Instale as dependências: 
```bash 
/usr/your_path/php /your_path/composer install
/usr/your_path/npm install
```

## Configuração

1. Abra o arquivo de configuração: .env
2. Atualize as configurações conforme necessário.
```bash
APP_ENV=%server% #development ou production
APP_URL=%url_acesso%
-----

``` 
3. Execute os comandos abaixo separadamente:

```bash
/usr/your_path/php artisan migrate #para criar todas as tabelas necessárias
/usr/your_path/php artisan db:seed #para popular o banco de dados
/usr/your_path/php artisan key:generate #gera uma nova chave para o ambiente
/usr/your_path/php artisan config:clear # para remover todo o cache da configuração criado
/usr/your_path/php artisan config:cache # para gerar um novo cache da nova configuração
/usr/your_path/php artisan route:clear # para remover todo o cache de rota
/usr/your_path/php artisan route:cache # para gerar um novo cache de rota
/usr/your_path/php artisan view:clear # para remover todo o cache de views
/usr/your_path/php artisan view:cache # para gerar um novo cache de views
/usr/your_path/npm run build #gerar assets necessários
```

## Execução local

Execute o comando abaixo:
```bash
/usr/your_path/php artisan serve
```
O comando acima irá subir um servidor nativo do laravel e disponibilizar a aplicação na URL: http://127.0.0.1:8000

## Uso
Acesse a URL definida no APP_URL.

## Documentação dos endpoints
Documentação: [POSTMAN](https://documenter.getpostman.com/view/14634687/2sA3e5cSpp)
Collection: [POSTMAN](https://www.postman.com/restless-astronaut-308346/workspace/dsl/collection/14634687-c4f9ffaf-2c0d-4d4f-9d59-a707eb89b1d8?action=share&creator=14634687)


## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).