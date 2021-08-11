# Laravel Sistema

Versão de Sistema de pagamento ao prestador

Baseado no Laravel 8

## Instalação

Clone este projeto para o seu local e `cd` para entrar no projeto.

```bash
composer install

npm install

cp .env.example .env            //configurar seu banco de dados

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve               //rodar a sua aplicação

Register/Login to your system
```

#### Features

-   Dashboard administrativo

-   Login Admin

-   Cadastro de prestadores

-   Lancamento de horas trabalhadas por período

-   Relatorios:

    -   Total horas lancadas por prestador
    -   Total horas lancadas por prestador por período
    -   Total horas geral por período

-   Emissao de recibo prestador

#### Credencias Administrativa

| email           | senha  |
| --------------- | ------ |
| admin@admin.com | secret |
