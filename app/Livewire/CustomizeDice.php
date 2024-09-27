<?php

namespace App\Livewire;

use Livewire\Component;

class CustomizeDice extends Component
{
    public $colorsStore, $colorSelection, $flakeSelection, $numberSelection;
    public $openGroups = []; // Track which groups are open

    public function mount()
    {
        $this->loadColors();
    }

    public function loadColors()
    {
        $path = public_path('mica_colors.json');
        if(file_exists($path)){
            $this->colorsStore = json_decode(file_get_contents($path), false);
        } else {
            $this->colorsStore = [];
        }
    }

    // Toggle the visibility of a group
    public function toggleGroup($groupName)
    {
        if (isset($this->openGroups[$groupName])) {
            // If already open, close it
            unset($this->openGroups[$groupName]);
        } else {
            // Otherwise, open it
            $this->openGroups[$groupName] = true;
        }
    }

    public function render()
    {
        return view('livewire.customize-dice', [
            'colors' => $this->colorsStore,
        ]);
    }
}
