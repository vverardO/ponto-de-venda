## Leia

O projeto **ponto-de-venda** está sendo desenvolvido com [Laravel v10+](https://laravel.com/docs/10.x), [Livewire v3](https://livewire.laravel.com/) e [TailwindCSS](https://tailwindcss.com/).

```sh
git clone https://github.com/vverardO/ponto-de-venda.git
cd ponto-de-venda
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Projeto desenvolvido baseado em uma solicitação do 99freelas: "Boa noite! Necessito de um PDV para controle interno, com um crud de produtos e usuários, juntamente de uma listagem de vendas e uma interface inicial com alguns gráficos".

Assim já terá no banco um total de 1 usuário do tipo gerente, 3 usuários do tipo caixa e 10 produtos cadastrados, ou seja, o necessário para começar a operar.

PS.: A senha dos usuários é "password".