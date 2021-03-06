<?php

namespace Ezadev\Simplemde;

use Ezadev\Admin\Admin;
use Ezadev\Admin\Form;
use Illuminate\Support\ServiceProvider;

class SimplemdeServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Simplemde $extension)
    {
        if (! Simplemde::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'ezadev-simplemde');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/ezadev/simplemde')],
                'ezadev-simplemde'
            );
        }

        Admin::booting(function () {
            Form::extend('simplemde', Editor::class);

            if ($alias = Simplemde::config('alias')) {
                Form::alias('simplemde', $alias);
            }
        });

        Admin::booted(function () {
            if (Simplemde::config('config.renderingConfig.codeSyntaxHighlighting')) {
                Admin::css('//cdn.jsdelivr.net/highlight.js/latest/styles/github.min.css');
                Admin::js('//cdn.jsdelivr.net/highlight.js/latest/highlight.min.js');
            }
        });
    }
}