<?php

namespace App\Nova;

use App\Nova\Lenses\LowStockProducts;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;  // Import the Spatie Media Library field for images
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'slug',
        'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('SKU', 'sku'),



            Textarea::make('Description')
                ->alwaysShow()
                ->rules('required'),

            Number::make('Price')
                ->sortable()
                ->rules('required', 'numeric', 'min:0')
                ->step(0.01) // This ensures the price can have decimal values
                ->displayUsing(function ($price) {
                    return number_format($price, 2); // Ensures it displays with 2 decimal places
                }),

            Number::make('Stock Quantity')
                ->rules('required', 'min:0')
                ->sortable(),

            Boolean::make('Is Customizable'),
            Boolean::make('Is Active'),

            // Spatie Media Library for managing product images
            Images::make('Product Images', 'images'),  // 'images' is the media collection name

            HasMany::make('Product Colors', 'productColors', ProductColor::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [
            new LowStockProducts,
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
