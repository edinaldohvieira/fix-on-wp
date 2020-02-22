# fix-on-wp

Adiciona ou modifica recursos em uma instalação do WordPress

O que este plugin faz é nada mais que disponibilizar um diretório de "add-in" ou "trechos de códigos" que tem a função de adicionar ou modificar algo no WordPress.

Este plugin surgiu da necessidade de poder centralizar em um só local todos os recursos necessários de uma certa instalação do WordPress e assim evitar que sejam instalados diversos plugin diferente, portanto, centralizar em um só plugin os múltiplos recursos necessário. Por exemplo, ao invés de instalar um plugin para estoque e outro para clientes e ainda outro para boletos..., em um só plugin poderia instalar todos em forma de add-ins,  um para cada função (houve um caso em que tive que desenvolver 21 plugins diferentes. Se estivesse usando esta técnica bastaria apenas um plugin contendo os 21 arquivos). Então, presume-se que este plugin é um centralizador, ou um repositório de "add-ins".

Este plugin, por si só não altera nada. Apenas prepara o ambiente para receber novos funcionalidades.

Portanto, este plugin cria, dentro de sua estrutura, uma pasta de nome "addins". E dentro desta pasta terão vários diretórios. Toda vez que o WP é carregado, assim como ele lê o diretório dos plugins também irá ler a pasta addins no diretório deste plugin e consequentemente irá executar os arquivos "*.php" contido dentro da referida. Assim sendo, por exemplo, se tivéssemos um código que disponibilize um cadastro de clientes, então, vai estar disponível conforme as diretrizes ou trecho de código executado.

