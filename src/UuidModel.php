<?php

namespace MichielKempen\LaravelUuidModel;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

abstract class UuidModel extends Model
{
	protected $guarded = [];

	public $incrementing = false;

    protected $keyType = 'string';

	public static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			if($model->id === null) {
                $model->id = (string) Uuid::generate(4);
            }
		});
	}

	public function getId(): string
	{
		return $this->id;
	}
}
