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
            ['url' => route('animals.index'), 'name' => 'Animals'],
            ['url' => route('animal-images.index'), 'name' => 'Animal Images'],
            ['url' => route('veterinary-reports.index'), 'name' => 'Veterinary reports'],
            ['url' => route('timetables.index'), 'name' => 'Opening hours'],
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
