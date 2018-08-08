<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class PropertyTransformer extends TransformerAbstract {

	public function transform($property) {
		return [
				'id' => $property->id,
				'name' => $property->name,
				'price' => $property->price,
				'bedrooms' => $property->bedrooms,
				'bathrooms' => $property->bathrooms,
				'storeys' => $property->storeys,
				'garages' => $property->garages,
		];
	}
}