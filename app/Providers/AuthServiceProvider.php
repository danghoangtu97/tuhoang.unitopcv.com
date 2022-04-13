<?php

namespace App\Providers;

use App\Policies\categoryPolicy;
use App\Policies\infoProductPolicy;
use App\Policies\postPolicy;
use App\Policies\productPolicy;
use App\Policies\rolePolicy;
use App\Policies\settingsPolicy;
use App\Policies\sliderPolicy;
use App\Policies\userPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model\category' => 'App\Policies\categoryPolicy',
        'App\Model\infoProduct' => 'App\Policies\infoProductPolicy', 
        'App\Model\settings' => 'App\Policies\settingsPolicy', 
        'App\Model\product' => 'App\Policies\productPolicy', 
        'App\Model\slider' => 'App\Policies\sliderPolicy', 
        'App\Model\post' => 'App\Policies\postPolicy', 
        'App\Model\User' => 'App\Policies\userPolicy', 
        'App\Model\role' => 'App\Policies\rolePolicy', 
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGateCategory();
        $this->defineGateInfoProduct();
        $this->defineGateSettings();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGatePost();
        $this->defineGateUser();
        $this->defineGateRole();
    }

    public function defineGateCategory()  
    {
        Gate::define('category-list', [categoryPolicy::class, 'view']);
        Gate::define('category-create', [categoryPolicy::class, 'create']); 
        Gate::define('category-update', [categoryPolicy::class, 'update']);
        Gate::define('category-delete', [categoryPolicy::class, 'delete']);
    }

    public function defineGateInfoProduct()  
    {
        Gate::define('infoProduct-list', [infoProductPolicy::class, 'view']);
        Gate::define('infoProduct-create', [infoProductPolicy::class, 'create']); 
        Gate::define('infoProduct-update', [infoProductPolicy::class, 'update']);
        Gate::define('infoProduct-delete', [infoProductPolicy::class, 'delete']);
    }

    public function defineGateSettings()  
    {
        Gate::define('settings-list', [settingsPolicy::class, 'view']);
        Gate::define('settings-create', [settingsPolicy::class, 'create']); 
        Gate::define('settings-update', [settingsPolicy::class, 'update']);
        Gate::define('settings-delete', [settingsPolicy::class, 'delete']);
    }

    public function defineGateProduct()  
    {
        Gate::define('product-list', [productPolicy::class, 'view']);
        Gate::define('product-create', [productPolicy::class, 'create']); 
        Gate::define('product-update', [productPolicy::class, 'update']);
        Gate::define('product-delete', [productPolicy::class, 'delete']);
    }

    public function defineGateSlider()  
    {
        Gate::define('slider-list', [sliderPolicy::class, 'view']);
        Gate::define('slider-create', [sliderPolicy::class, 'create']); 
        Gate::define('slider-update', [sliderPolicy::class, 'update']);
        Gate::define('slider-delete', [sliderPolicy::class, 'delete']);
    }

    public function defineGatePost()  
    {
        Gate::define('post-list', [postPolicy::class, 'view']);
        Gate::define('post-create', [postPolicy::class, 'create']); 
        Gate::define('post-update', [postPolicy::class, 'update']);
        Gate::define('post-delete', [postPolicy::class, 'delete']);
    }

    public function defineGateUser()  
    {
        Gate::define('user-list', [userPolicy::class, 'view']);
        Gate::define('user-create', [userPolicy::class, 'create']); 
        Gate::define('user-update', [userPolicy::class, 'update']);
        Gate::define('user-delete', [userPolicy::class, 'delete']);
    }

    public function defineGateRole()  
    {
        Gate::define('role-list', [rolePolicy::class, 'view']);
        Gate::define('role-create', [rolePolicy::class, 'create']); 
        Gate::define('role-update', [rolePolicy::class, 'update']);
        Gate::define('role-delete', [rolePolicy::class, 'delete']);
    }
    
}
