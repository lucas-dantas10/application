<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Application</h1>
    <br>
</p>

Aplicação contendo dois CRUDS, um para gerenciamento de pessoas e um para gerenciamento de atributos.

ESTRUTURA DE DIRETÓRIOS
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUISITOS
------------

O requisito mínimo deste modelo de projeto é que seu servidor Web suporte PHP 7.4.


INSTALAÇÃO
------------

### Install via Composer

Se você não possui o [Composer](https://getcomposer.org/), você pode instalá-lo seguindo as instruções
no [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).


Você pode então instalar este modelo de projeto usando o seguinte comando:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Agora você deve conseguir acessar o aplicativo por meio da URL a seguir, presumindo que `basic` seja o diretório diretamente na raiz da Web.

~~~
http://localhost/basic/web/
~~~


### Install with Docker


Atualize seus pacotes vendor

    docker-compose run --rm php composer update --prefer-dist
    
Execute os triggers de instalação (criando código de validação de cookie)

    docker-compose run --rm php composer install    
    
Start o container

    docker-compose up -d
    
Você pode então acessar o aplicativo através do seguinte URL:

    http://127.0.0.1:8000

**NOTAS:** 
- Versão mínima necessária do Docker Engine `17.04` para desenvolvimento (consulte [Ajuste de desempenho para montagens de volume](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- A configuração padrão usa um volume host em seu diretório inicial `.docker-composer` para caches do composer


CONFIGURATION
-------------

### Database

Modifique o arquivo `config/db.php` com dados reais, por exemplo:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTAS:**
- O Yii não criará o banco de dados para você, isso deve ser feito manualmente antes que você possa acessá-lo.
- Verifique e edite os outros arquivos no diretório `config/` para personalizar sua aplicação conforme necessário.
- Consulte o README no diretório `tests` para obter informações específicas sobre testes básicos de aplicativos.


