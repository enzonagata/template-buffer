## Renderizar template com **PHP buffer e Slim 3**

Utiliza-se arquivos com extensão __*.phtml__ para a exibição do template, por enquanto não podendo ser alterada.
_____

## Class Template;

### **Como começar**
```php
$View = new Template($container);
```
### **Configurando pasta de Layout** - Diretório relativo a raíz
```php
$dir = 'path/subpath';
$View->setLayoutPath($dir);
```
### **Configurando pasta de Templates** - Diretório relativo a raíz
```php
$dir = 'path/subpath';
$View->setTemplatePath($dir);
```

### **Criando variáveis para acesso nos TEMPLATES e LAYOUTS**
```php
$var = array(); || $var = (string); || $var = (integer);
$View->set('nome_variavel', mixed $var);
```

#### **Modo de acesso as variaveis no Template ou Layout**
```php
<p>
   <?=$nome_variavel?>
</p>

<!-- Acesso com array -->
<ul>
<?php foreach($nome_variavel as $key => $item){?>
   <li><?= $key; ?> => <?= $item; ?></li>
<?php } ?>
</ul>
```

### **Renderizando o template**
```php
//Obs.: nome do arquivo sem a
$View->render('nome_do_arquivo');

//Caso esteja em um subdiretorio da pasta de Template configurada.
//Obs.: nome do arquivo sem a extensão
$View->render('nome_pasta/nome_do_arquivo');
```
## Class Html;
Essa classe vem estenciada por padrão na classe Template, podendo ser acessada com a variável públic $View->Html
### **Adicionando CSS no Layout**
```php
//Não colocar a extensão *.css
$View->Html->addStyles(array());
//ex:
$View->Html->addStyles(['styles','admin/index']);
```
### **Exibindo CSS no Layout**
```php
<head>
<?=$this->Html->css();?>
</head>
```

### **Adicionando JS a um Layout**
```php
//Não colocar a extensão *.js
$View->Html->addScripts(array());
//ex:
$View->Html->addScripts(['scripts','admin/index']);
```

### **Exibindo JS no Layout**
```php
<head>
<?=$this->Html->js();?>
</head>
```

### **Exibindo imagem**
```php
<body>
<?=$this->Html->image('nome_do_arquivo.extensão','classe_css');?>
</body>
```