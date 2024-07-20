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
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isVeterinary()) {
            $this->links = [
                ['url' => route('exhibits.index'), 'name' => 'Exhibits'],
                ['url' => route('animals.index'), 'name' => 'Animals'],
                ['url' => route('veterinary-reports.index'), 'name' => 'Veterinary reports'],
                ['url' => route('feeding-reports.index'), 'name' => 'Feeding reports'],
            ];
        } elseif ($user->isEmployee()) {
            $this->links = [
                ['url' => route('reviews.index'), 'name' => 'Reviews'],
                ['url' => route('activities.index'), 'name' => 'Activities'],
                ['url' => route('feeding-reports.create'), 'name' => 'Feeding reports'],
            ];
        } elseif ($user->isAdmin()) {
            $this->links = [
                ['url' => route('users.index'), 'name' => 'Accounts'],
                ['url' => route('activities.index'), 'name' => 'Activities'],
                ['url' => route('exhibits.index'), 'name' => 'Exhibits'],
                ['url' => route('exhibit-images.index'), 'name' => 'Exhibit Images'],
                ['url' => route('animals.index'), 'name' => 'Animals'],
                ['url' => route('animal-images.index'), 'name' => 'Animal Images'],
                ['url' => route('veterinary-reports.index'), 'name' => 'Veterinary reports'],
                ['url' => route('timetables.index'), 'name' => 'Opening hours'],
                ['url' => route('feeding-reports.index'), 'name' => 'Feeding reports'],
                ['url' => route('reviews.index'), 'name' => 'Reviews'],
            ];
        } else {
            abort(403);
        }
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
