<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class ChannelSearch extends Component
{
    public $doctors;
    public $search = '';
    public $searchBy = 'search_by_doctor'; // Default search criteria

    public function render()
    {
        if (!empty($this->search)) {
            if ($this->searchBy === 'search_by_doctor') {
                $this->doctors = Member::whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->get();
            } elseif ($this->searchBy === 'search_by_centre') {
                // Handle search by centre if needed
            } elseif ($this->searchBy === 'search_by_specialization') {
                // Handle search by specialization if needed
            }
        } else {
            // If search input is empty, reset doctors and show message
            $this->doctors = null;
        }

        return view('livewire.channel-search', [
            'doctors' => $this->doctors,
        ]);
    }
}
