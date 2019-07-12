<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	const CANCELED = 2;
	const PAID = 3;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function canceled()
    {
    	$this->status = $this::CANCELED;
    	return $this;
    }

    public function paid()
    {
    	$this->status = $this::PAID;
    	return $this;
    }
}
