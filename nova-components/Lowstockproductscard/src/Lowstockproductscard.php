<?php

namespace Arcanis\Lowstockproductscard;

use App\Models\Product;
use Laravel\Nova\Card;

class Lowstockproductscard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'lowstockproductscard';
    }

    /**
     * Fetch the low stock products.
     *
     * @return array
     */
    public function getLowStock()
    {
        // Fetch the 10 products with the lowest stock_quantity
        $lowStockProducts = Product::orderBy('stock_quantity', 'asc')
            ->limit(10)
            ->get(['name', 'stock_quantity']);

        return $this->withMeta(['products' => $lowStockProducts]);
    }
}
