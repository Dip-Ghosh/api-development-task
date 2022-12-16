<?php

namespace App\Repository;

use App\Repository\Base\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('App\Repository\Base\WriteAbleInterface', BaseRepository::class);
        $this->app->bind('App\Repository\Base\ReadAbleInterface', BaseRepository::class);
        $this->app->bind('App\Repository\PlayerInterface', PlayerRepository::class);
        $this->app->bind('App\Repository\PlayerSkillInterface', PlayerSkillRepository::class);
    }

    public function boot()
    {
        //
    }
}
