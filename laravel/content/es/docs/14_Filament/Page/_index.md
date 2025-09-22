---
title: "Creando Páginas"
date: 2025-09-21T08:32:21+02:00
draft: false
tags: ['Laravel', 'Filament', 'Dashboard', 'Herramientas', 'Panel','Páginas']
categories: ['Laravel', 'Panel', 'Filament','Páginas']
weight: 10
icon: fas
---
### Personalizar la página dasbhboard
Vamos a crear una página personalizada para el dashboard de Filament, en lugar de usar la predeterminada.
En la terminal ejecutamos:
{{< highlight php tabla_alumnos "linenos=table, hl_lines=" >}}
php artisan make:filament-page AdminHome
{{< /highlight>}}

Esto generará el archivo:
app/Filament/Pages/AdminHome.php
Ejemplo de implementación:

{{< highlight php tabla_alumnos "linenos=table, hl_lines=" >}}

<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class AdminHome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.admin-home';

    public function getTitle(): string
    {
        return __('dashboard.title');
    }

    public function getHeading(): string
    {
        return __('dashboard.heading');
    }
}
{{< /highlight>}}

* Vista Blade
Esta acción generará el archivo de vista:
resources/views/filament/pages/admin-home.blade.php
{{< highlight php tabla_alumnos "linenos=table, hl_lines=" >}}      
<x-filament::page>
    <x-filament::section>
        <div class="p-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                👋 {{ __('dashboard.welcome_title') }}
            </h2>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                {!! __('dashboard.welcome_message') !!}
            </p>
        </div>
    </x-filament::section>
{{</x-filament::page>
{{< /highlight>}}