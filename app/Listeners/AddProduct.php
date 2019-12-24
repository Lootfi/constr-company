<?php

namespace App\Listeners;

use App\Events\ProductAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductAdded  $event
     * @return void
     */
    public function handle(ProductAdded $event)
    {
        //
    }
}
