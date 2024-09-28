<?php

namespace App\Livewire;

use Livewire\Component;

class CustomizeDice extends Component
{
    public $colorsStore, $colorSelection, $flakeSelection, $numberSelection;
    public $selectedStyle;
    public $openGroups = []; // Track which groups are open

    private $diceStyles = [
        [
            "name" => "Dirty-Pour",
            "description" => "Multiple colors of resin are mixed together in a single pour without fully blending, creating swirls, marbling, or cloudy effects.",
            "slug" => "dirty-pour"
        ],
        [
            "name" => "Layered",
            "description" => "Multiple layers of resin, each a different color or texture, are poured one at a time to create clear, defined layers within the dice.",
            "slug" => "layered-poured"
        ],
        [
            "name" => "Ink-Wash",
            "description" => "Pigment is applied to the surface of the dice, then wiped away, leaving a wash effect that enhances the edges and carved numbers.",
            "slug" => "ink-wash"
        ],
        [
            "name" => "Inclusions",
            "description" => "Small objects, glitter, foil, flowers, or other items are placed inside the resin mold to give depth and uniqueness to each die.",
            "slug" => "inclusions"
        ],
        [
            "name" => "Ombre",
            "description" => "The resin is colored in such a way that it fades from one color to another, either horizontally or vertically within the dice.",
            "slug" => "ombre-fade"
        ],
        [
            "name" => "Transparent",
            "description" => "Clear or slightly tinted resin that allows visibility through the entire die, often paired with inclusions or other visual effects.",
            "slug" => "clear-transparent"
        ],
        [
            "name" => "Pearlescent",
            "description" => "Mica powder or pearlescent pigments are added to the resin to give a shimmering or metallic look to the dice, often resulting in a marbled or swirling effect.",
            "slug" => "pearlescent-mica-powder"
        ],
        [
            "name" => "Galaxy",
            "description" => "A blend of dark, often black or deep purple resin, mixed with glitter or stars, creating a space or 'galaxy' effect within the dice.",
            "slug" => "galaxy-dice"
        ],
        [
            "name" => "Chameleon",
            "description" => "These dice use special pigments that change color depending on the light or viewing angle, creating a dynamic and ever-changing appearance.",
            "slug" => "chameleon-color-shifting"
        ],
        [
            "name" => "Glow",
            "description" => "Incorporates pigments or materials that glow in the dark, giving the dice a magical appearance when the lights are out.",
            "slug" => "glow-in-the-dark"
        ],
        [
            "name" => "Frosted",
            "description" => "These dice have a frosted or matte finish, which gives them a soft, velvety texture instead of the typical glossy appearance.",
            "slug" => "frosted-matte-finish"
        ]
    ];

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
            'diceStyles' => $this->diceStyles,
            'selectedStyle' => $this->selectedStyle,
        ]);
    }
}
