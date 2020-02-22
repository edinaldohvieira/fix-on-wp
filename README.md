# fix-on-wp
Adiciona ou modifica recursos em uma instalação do WordPress

O que este plugin faz é nada mais que diponibilizar um diretorio de add-in ou pedaços de códigos que tem a função de adicionar ou modificar algo no wordpress.

Este plugin surgiu da necessidade de poder centralizar em um só plugin todos os recursos necessários de uma certa instalação e evitar que sejam instalados diversos plugin diferente, portanto, centralizar em um só plugin as multiplas recursos. Por exemplo, ao invés de instalar um plugin para estoque e outro para clientes, em um só plugin poderia instalar dois add-in, um para cada função. Então, presume-se que este plugin é um centarlizador, ou um repositorio de add-ins.

Este plugin, por sí só não altera nada. Apenas prepara o ambiente para receber novoas funcionalidades.

Este plugin cria, dentro de sua estrutura, uma pasta de nome "addins". Dentro desta pasta terão vários diretorios. Toda vez que o wp é carregado, assim como ele lê o diretorio dos plugins tambem ele irá ler a pasta addins no diretorio deste plugin e consequentemente irá executar os arquivos .php contido dentro da pasta. Assim sendo, por exemplo, se tiver um codigo que disponibilize um cadastro de clientes, então, vai estar disponivel conforme as diretrizes ou trecho de codigo executado.
