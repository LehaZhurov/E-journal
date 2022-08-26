<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Leeto\MoonShine\MoonShine;

use Leeto\MoonShine\Resources\MoonShineUserResource;
use Leeto\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\GroupResource;
use App\MoonShine\Resources\SubjectResource;


class MoonShineProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        app(MoonShine::class)->registerResources([
            // MoonShineUserResource::class, // Системный раздел с администраторами
            // MoonShineUserRoleResource::class, // Системный раздел с ролями администраторов
            UserResource::class, // Ресурс для работы с пользователями из админ панели
            RoleResource::class, // Ресурс для работы с ролями пользователей из админ панели
            GroupResource::class, // Ресурс для работы с группами пользователей из админ панели
            SubjectResource::class, // Ресурс для работы с предметами из админ панели
        ]);
    }
}
