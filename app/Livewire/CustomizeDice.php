<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class CustomizeDice extends Component
{
    public $colorsStore, $colorSelection, $flakeSelection, $numberSelection;
    public $selectedStyle, $selectedColors = [];
    public $openGroups = []; // Track which groups are open

    public $cost = 60;

    private $diceStyles = [
        [
            "name" => "Dirty-Pour",
            "description" => "Multiple colors of resin are mixed together in a single pour without fully blending, creating swirls, marbling, or cloudy effects.",
            "slug" => "dirty-pour",
            "max_colors" => 4,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Petri",
            "description" => "This style involves dropping alcohol inks or pigments into the resin as it cures, creating organic, flowing, and sometimes 'bacterial' or 'fractal' shapes within the dice.",
            "slug" => "petri",
            "max_colors" => 3,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
            ]
        ],
        [
            "name" => "Layered",
            "description" => "Multiple layers of resin, each a different color or texture, are poured one at a time to create clear, defined layers within the dice.",
            "slug" => "layered-poured",
            "max_colors" => 4,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Ink-Wash",
            "description" => "Pigment is applied to the surface of the dice, then wiped away, leaving a wash effect that enhances the edges and carved numbers.",
            "slug" => "ink-wash",
            "max_colors" => 2,
            "allowed_colors" => [
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
            ]
        ],
        [
            "name" => "Inclusions",
            "description" => "Small objects, glitter, foil, flowers, or other items are placed inside the resin mold to give depth and uniqueness to each die.",
            "slug" => "inclusions",
            "max_colors" => 1,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Ombre",
            "description" => "The resin is colored in such a way that it fades from one color to another, either horizontally or vertically within the dice.",
            "slug" => "ombre-fade",
            "max_colors" => 2,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
            ]
        ],
        [
            "name" => "Transparent",
            "description" => "Clear or slightly tinted resin that allows visibility through the entire die, often paired with inclusions or other visual effects.",
            "slug" => "clear-transparent",
            "max_colors" => 2,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Pearlescent",
            "description" => "Mica powder or pearlescent pigments are added to the resin to give a shimmering or metallic look to the dice, often resulting in a marbled or swirling effect.",
            "slug" => "pearlescent-mica-powder",
            "max_colors" => 2,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder"],
            ]
        ],
        [
            "name" => "Galaxy",
            "description" => "A blend of dark, often black or deep purple resin, mixed with glitter or stars, creating a space or 'galaxy' effect within the dice.",
            "slug" => "galaxy-dice",
            "max_colors" => 2,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Chameleon",
            "description" => "These dice use special pigments that change color depending on the light or viewing angle, creating a dynamic and ever-changing appearance.",
            "slug" => "chameleon-color-shifting",
            "max_colors" => 2,
            "allowed_colors" => [
                "powder" => ["chameleon" => "Chameleon Powder"],
                "flakes" => ["chameleon" => "Chameleon Flakes"],
            ]
        ],
        [
            "name" => "Glow",
            "description" => "Incorporates pigments or materials that glow in the dark, giving the dice a magical appearance when the lights are out.",
            "slug" => "glow-in-the-dark",
            "max_colors" => 1,
            "allowed_colors" => [
                "powder" => ["glow" => "Glow Powder"],
            ]
        ],
        [
            "name" => "Frosted",
            "description" => "These dice have a frosted or matte finish, which gives them a soft, velvety texture instead of the typical glossy appearance.",
            "slug" => "frosted-matte-finish",
            "max_colors" => 4,
            "allowed_colors" => [
                "powder" => ["mica" => 'Powdered Mica', "chameleon" => "Chameleon Powder", "glow" => "Glow Powder"],
                "ink" => ["solid" => "Opaque Ink", "metallic" => "Metallic Ink", "translucent" => "Translucent Ink"],
                "pigment" => ["paste" => "Opaque Paste"],
            ]
        ]
    ];

    public function mount()
    {
        $this->loadColors();
    }

    public function loadColors()
    {
        $path = public_path('mica_colors.json');
        if (file_exists($path)) {
            $this->colorsStore = json_decode(file_get_contents($path), false);
        } else {
            $this->colorsStore = [];
        }
    }

    public function updatedSelectedStyle()
    {
        unset($this->colorsStore);
        $this->loadColors();
        $this->selectedColors = [];
    }

    public function toggleColors($type, $id)
    {
        $data = [$type, $id];

        if (!$this->selectedStyle) return;
        $current_colors_count = count($this->selectedColors);

        if (in_array($data, $this->selectedColors)) {
            $key = array_search($data, $this->selectedColors);

            if ($key !== false) {
                unset($this->selectedColors[$key]);
            }
        }

        $find_style_by_slug = array_filter($this->diceStyles, function ($style) {
            return $style['slug'] === $this->selectedStyle;
        });

        $style = array_values($find_style_by_slug);
        $max_colors = $style[0]['max_colors'];

        if ($max_colors === 1) {
            $this->selectedColors = [];
            $this->selectedColors[] = $data;
        }

        if ($current_colors_count >= $style[0]['max_colors']) return;

        $this->selectedColors[] = $data;
    }

    public function isColorSelected($type, $id)
    {
        $data = [$type, $id];
        return in_array($data, $this->selectedColors);
    }

    #[Computed]
    public function selectedStyleAllowedColors() {
        $item = [];

        foreach($this->diceStyles as $style) {
            if($style['slug'] === $this->selectedStyle)
                $item = $style;
        }

        return $item;
    }

    public function render()
    {
        return view('livewire.customize-dice');
    }
}
