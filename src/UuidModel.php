<?php

namespace MichielKempen\LaravelUuidModel;

use Illuminate\Database\Eloquent\Model;

abstract class UuidModel extends Model
{
	public $incrementing = false;

    protected $keyType = 'string';

	public static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			if($model->id === null) {
                $model->id = Uuid::new()->generate();
            }
		});
	}

	public function getId(): string
	{
		return $this->id;
	}
}
