# Este repositório contém as alterações necessárias para integrar o Atom com o Portal Português de Arquivos


Substituir o ficheiro _dc.xml.php:
```sh
/plugins/sfDcPlugin/modules/sfDcPlugin/templates/_dc.xml.php
sudo service php7.0-fpm restart
```
[AtoM]  -- AtoM é uma abreviatura de Access to Memory. Funciona em ambiente WEB e é uma aplicação de código aberto destinada à descrição normalizada de arquivos definitivos permitindo um acesso multilingue numa organização com múltiplos repositórios integrados.


####  Na versão 2.3.x é também necessário corrigir um bug do OAI-PMH

```sh
/usr/share/nginx/atom/plugins/arOaiPlugin/lib/arOaiPluginComponent.class.php
```
Na linha 114 alterar -> 'cursor' para -> 'offset'

[AtoM]: <https://www.accesstomemory.org/>
