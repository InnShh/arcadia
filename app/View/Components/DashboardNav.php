<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardNav extends Component
{
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->links = [
            ['url' => route('users.index'), 'name' => 'Accounts'],
            ['url' => route('activities.index'), 'name' => 'Activities'],
            ['url' => route('exhibits.index'), 'name' => 'Exhibits'],
            ['url' => route('exhibit-images.index'), 'name' => 'Exhibit Images'],
            ['url' => '/animals', 'name' => 'Animals'],
            ['url' => '/veterinarian-reports', 'name' => 'Veterinarian reports'],
            ['url' => '/opening-hours', 'name' => 'Opening hours'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.dashboard-nav');
    }
}
