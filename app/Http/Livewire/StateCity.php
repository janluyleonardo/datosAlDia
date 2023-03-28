<?php

namespace App\Http\Livewire;

use App\Models\city;
use App\Models\state;
use Livewire\Component;

class StateCity extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $selectedCountry = '';
    public $selectedState = null;
    public $selectedCity = null;

    public function mount(){
        $this->countries = collect();
        $this->states = state::all();
        $this->cities = collect();
    }

    public function updatedSelectedState($state)
    {
        $this->cities = city::where('state_id', $state)->get();
    }

    public function render()
    {
        return view('livewire.state-city');
    }


}
