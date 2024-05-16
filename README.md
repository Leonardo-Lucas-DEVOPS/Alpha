laravel e breeze


tudo parte da controller que é responsavel pela autenticação do breeze
o metodo store lança com um if else que verifica se a autenticação do usuario é validada e verifica o usertype dele no banco redirecionando para a rota na qual ele pertence

em web.php as rotas chamam um metodo no qual recebe parametros que serão a configuração da função nome da middleware, auth, verified.
O método Route::middleware() é usado para aplicar middleware a um grupo de rotas. Neste caso, estamos aplicando três middlewares: auth, UserMiddleware e verified. Isso significa que todas as rotas dentro deste grupo estarão sujeitas a essas middlewares.

dentro dos metodos que confirmam a seguranças e suas devidas verificações vem as routas onde podem ter os verbos get, post, put e delete para puxar enviar ler e apagar

 route::get('dashboard', [UserController::class,'index'])->name('dashboard');


dashboard :

    -apenas a definição da url

[UserController::class,'index']:

    -o metodo index sendo chamado da instancia da controller UserController

->name('dashboard'); :


   -apilidando a routa


Dentro da controller passe a view no metodo index e para configurar a middleware app.php

 $middleware->alias([
            'UserMiddleware'=>UserMiddleware::class,
]);



ATENÇÃO A UTILIZAÇÃO DE LETRAS MAIUSCULAS E MINUSCULAS PODE ACABAR COM VC 