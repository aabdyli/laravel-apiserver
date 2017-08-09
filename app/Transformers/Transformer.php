<?php 

namespace App\Transformers;

use Illuminate\Database\Eloquent\Collection;
/**
* Transformer Base
*/
abstract class Transformer
{
    public function transformCollection(Collection $collection)
    {
        return $collection->map(function($el) {
            return $this->transform($el);
        });
    }
    
    public abstract function transform($item);
}
