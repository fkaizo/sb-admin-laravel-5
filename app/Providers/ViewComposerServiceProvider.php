<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->FranchiseMenuComposer();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function FranchiseMenuComposer(){
        view()->creator('layouts.dashboard', 'App\Http\ViewComposers\FranchiseMenuComposer@compose');
    }
}
