## Template render with **PHP buffer and Slim 3**

Only use files with __*.phtml__ extension, for the moment can not be changed.
_____

## Class Template;

### **Get started**
```php
$View = new Template($container);
```
### **Configuring Layout path** - Root directory
```php
$dir = 'path/subpath';
$View->setLayoutPath($dir);
```
### **Configuring Templates path** - Root directory
```php
$dir = 'path/subpath';
$View->setTemplatePath($dir);
```

### **Create variables to access in to Templates and Layouts**
```php
$var = array(); || $var = (string); || $var = (integer);
$View->set('nome_variavel', mixed $var);
```

#### **How to access variables in to Template or Layout files**
```php
<p>
   <?=$variable_name?>
</p>

<!-- With array -->
<ul>
<?php foreach($variable_name as $key => $item){?>
   <li><?= $key; ?> => <?= $item; ?></li>
<?php } ?>
</ul>
```

### **Rendering template**
```php
//Obs.: file name without extension
$View->render('file_name');

//If it is in a subdirectory of the configured Template folder.
//Obs.: file name without extension
$View->render('path_name/file_name');
```
## Class Html;
This class has been extended by default in the Template class, and can be accessed with the public variable _$View->Html_
### **Adding CSS in Layout**
```php
//Don't write with extension *.css
$View->Html->addStyles(array());
//ex:
$View->Html->addStyles(['styles','admin/index']);
```
### **Displaying css in layout**
```php
<head>
<?=$this->Html->css();?>
</head>
```

### **Adding JS in Layout**
```php
//Don't write with extension *.js
$View->Html->addScripts(array());
//ex:
$View->Html->addScripts(['scripts','admin/index']);
```

### **Displaying JS in Layout**
```php
<head>
<?=$this->Html->js();?>
</head>
```

### **Displaying imagem**
```php
<body>
<?=$this->Html->image('nome_do_arquivo.extensão','classe_css');?>
</body>
```

## Class Text;
This class has been extended by default in the Template class, and can be accessed with the public variable _$View->Text_

```php
//Text clean
$this->Text->clean($string);

//Text excerpt
$this->Text->excerpt($string,$startPos=0,$maxLenght=100);

//Slugfy - Url Friendly
$this->Text->slugfy($text)
```