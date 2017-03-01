# sql-whoiStore
SQL to store and manage domain names, its updated WHOIS data and other data



## How this folder was prepared
Uses 
* [getcomposer.org/installation-linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* (by composer `require`) https://github.com/phpWhois/phpWhois
* https://github.com/ppKrauss/sql-loadPack
* ...

```
wget -c https://getcomposer.org/installer composer-installer.phar
cd sql-whoiStore
php ../composer-installer.phar require "phpwhois/phpwhois":"~4.0"
```

### Testing
* `php vendor/phpwhois/phpwhois/example.cli.php terra.com.br` works fine, no bug like [python-whois tick-118](https://github.com/joepie91/python-whois/issues/118).


