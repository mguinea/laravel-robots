<?php

namespace Robots\Models;

use Illuminate\Database\Eloquent\Model;
use Robots\Robots;

class RobotsRow extends Model
{
    protected $fillable = ['action', 'type'];

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('robots.table_names.robot_rows'));
    }

    /**
     * Generates an array from DB data, compatible with Robots constructor.
     *
     * @return array
     */
    public static function generateArray(): array
    {
        $response = [];

        $response['allows'] = static::where('type', Robots::ALLOW)->get('action')->toArray();
        $response['disallows'] = static::where('type', Robots::DISALLOW)->get('action')->toArray();
        $response['hosts'] = static::where('type', Robots::HOST)->get('action')->toArray();
        $response['sitemaps'] = static::where('type', Robots::SITEMAP)->get('action')->toArray();
        $response['userAgents'] = static::where('type', Robots::USER_AGENT)->get('action')->toArray();

        return $response;
    }
}
