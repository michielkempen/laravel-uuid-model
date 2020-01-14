<?php

namespace MichielKempen\LaravelUuidModel;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

abstract class UuidModel extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * @var bool 
	 */
	public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

	/**
	 *  Setup model event hooks
	 */
	public static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			if($model->id === null) {
                $model->id = (string) Uuid::generate(4);
            }
		});
	}

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}
}