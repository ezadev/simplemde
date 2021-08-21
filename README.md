Simplemde editor extension for ezadev
======

[Simplemde](https://github.com/sparksuite/simplemde-markdown-editor) is a great markdown editor, this extension is used to integrate `Simplemde` into the `ezadev-admin` form.

## Installation

```bash
composer require ezadev/simplemde
```

Then
```bash
php artisan vendor:publish --tag=ezadev-simplemde
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php

    'extensions' => [

        'simplemde' => [
        
            // Set to false if you want to disable this extension
            'enable' => true,
            
            // If you want to set an alias for the calling method
            //'alias' => 'markdown',
            
            // Editor configuration
            'config' => [
                
            ]
        ]
    ]

```

The configuration of the editor can be found in [Simplemde Documentation](https://github.com/sparksuite/simplemde-markdown-editor#configuration)
```php
    'config' => [
        'autofocus'   => true,
        'placeholder' => 'xxxx',
        ....
    ]
```

## Usage

Use it in the form:
```php
$form->simplemde('content');
```

Set height
```php
$form->simplemde('content')->height(500);
```

If the method alias is specified in the configuration as `markdown`
```php
$form->markdown('content');
```
License
------------
Licensed under [The MIT License (MIT)](LICENSE).
