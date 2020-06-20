<?php

namespace Mguinea\Robots\Models;

use Illuminate\Database\Eloquent\Model;
use Mguinea\Robots\Robots;

class RobotsRow extends Model
{
    protected $fillable = ['action', 'type'];

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('laravel-robots.table_names.robot_rows'));
    }

    /**
     * Generates an array from DB data, compatible with Robots constructor.
     *
     * @return array
     */
    public static function generateArray(): array
    {
        return [
            'allows' => static::where('type', Robots::ALLOW)->get('action')->toArray(),
            'disallows' => static::where('type', Robots::DISALLOW)->get('action')->toArray(),
            'hosts' => static::where('type', Robots::HOST)->get('action')->toArray(),
            'sitemaps' => static::where('type', Robots::SITEMAP)->get('action')->toArray(),
            'userAgents' => static::where('type', Robots::USER_AGENT)->get('action')->toArray(),
        ];
    }
}
