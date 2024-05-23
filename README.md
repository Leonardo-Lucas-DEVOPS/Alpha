Laravel e Breeze

Tudo parte da controller responsável pela autenticação do Breeze. O método store inicia com um if else que verifica se a autenticação do usuário é validada e verifica o usertype dele no banco, redirecionando para a rota correspondente.

Em web.php, as rotas chamam um método que recebe parâmetros que configuram a função, como o nome da middleware (auth, verified). O método Route::middleware() é usado para aplicar middleware a um grupo de rotas. Neste caso, estamos aplicando três middlewares: auth, UserMiddleware e verified. Isso significa que todas as rotas dentro deste grupo estarão sujeitas a essas middlewares.

Dentro dos métodos que confirmam a segurança e suas devidas verificações, vêm as rotas onde podem ter os verbos GET, POST, PUT e DELETE para puxar, enviar, ler e apagar.

Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

dashboard:
Apenas a definição da URL.

[UserController::class, 'index']:
O método index sendo chamado da instância da controller UserController.

->name('dashboard');:
Apelidando a rota.

Dentro da controller, passe a view no método index e para configurar a middleware app.php:


$middleware->alias([
    'UserMiddleware' => UserMiddleware::class,
]);
ATENÇÃO A UTILIZAÇÃO DE LETRAS MAIÚSCULAS E MINÚSCULAS PODE ACABAR COM VOCÊ.

1- composer update
2- npm install
3- npm run dev
4- php artisan serve