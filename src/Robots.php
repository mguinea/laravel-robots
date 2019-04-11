<?php

namespace Robots;

use Robots\Contracts\Robots as RobotsContract;

class Robots implements RobotsContract
{
    /**
     * The rows of for the robots.
     *
     * @var array
     */
    protected $rows = [];

    /**
     *
     * Array with configuration set in constructor
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Robots constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
        $this->composeFromParameters();
    }

    /**
     *
     * Create Robots object from array
     *
     */
    private function composeFromParameters(): void
    {
        foreach($this->parameters as $key => $values) {
            if($key === 'allows') {
                foreach($values as $value) {
                    $this->addAllow($value);
                }
            } elseif($key === 'disallows') {
                foreach($values as $value) {
                    $this->addDisallow($value);
                }
            } elseif($key === 'hosts') {
                foreach($values as $value) {
                    $this->addHost($value);
                }
            } elseif($key === 'sitemaps') {
                foreach($values as $value) {
                    $this->addSitemap($value);
                }
            } elseif($key === 'userAgents') {
                foreach($values as $value) {
                    $this->addUserAgent($value);
                }
            }
        }
    }

    /**
     * Add a allow rule to the robots.
     *
     * @param string|array $directories
     * @return \Robots\Contracts\Robot;
     */
    public function addAllow($directories): RobotsContract
    {
        $this->addRuleLine($directories, 'Allow');

        return $this;
    }

    /**
     * Add a comment to the robots.
     *
     * @param string $comment
     * @return \Robots\Contracts\Robot;
     */
    public function addComment(string $comment): RobotsContract
    {
        $this->addLine("# $comment");

        return $this;
    }

    /**
     * Add a disallow rule to the robots.
     *
     * @param string|array $directories
     * @return \Robots\Contracts\Robot;
     */
    public function addDisallow($directories): RobotsContract
    {
        $this->addRuleLine($directories, 'Disallow');

        return $this;
    }

    /**
     * Add a Host to the robots.
     *
     * @param string $host
     * @return \Robots\Contracts\Robot;
     */
    public function addHost(string $host): RobotsContract
    {
        $this->addLine("Host: $host");

        return $this;
    }

    /**
     * Add a row to the robots.
     *
     * @param string $row
     */
    protected function addLine($row)
    {
        $this->rows[] = (string) $row;
    }

    /**
     * Add multiple rows to the robots.
     *
     * @param string|array $rows
     */
    protected function addRows($rows)
    {
        foreach ((array) $rows as $row) {
            $this->addLine($row);
        }
    }

    /**
     * Add a rule to the robots.
     *
     * @param string|array $directories
     * @param string       $rule
     */
    protected function addRuleLine($directories, $rule)
    {
        foreach ((array) $directories as $directory) {
            $this->addLine("$rule: $directory");
        }
    }

    /**
     * Add a Sitemap to the robots.
     *
     * @param string $sitemap
     * @return \Robots\Contracts\Robot;
     */
    public function addSitemap(string $sitemap): RobotsContract
    {
        $this->addLine("Sitemap: $sitemap");

        return $this;
    }

    /**
     * Add a spacer to the robots.
     * @return \Robots\Contracts\Robot;
     */
    public function addSpacer(): RobotsContract
    {
        $this->addLine('');

        return $this;
    }

    /**
     * Add a User-agent to the robots.
     *
     * @param string $userAgent
     * @return \Robots\Contracts\Robot;
     */
    public function addUserAgent(string $userAgent): RobotsContract
    {
        $this->addLine("User-agent: $userAgent");

        return $this;
    }

    /**
     * Generate the robots data.
     *
     * @return string
     */
    public function generate(): string
    {
        return implode(PHP_EOL, $this->rows);
    }

    /**
     * Reset the rows.
     *
     * @return \Robots\Contracts\Robot;
     */
    public function reset(): RobotsContract
    {
        $this->rows = [];

        return $this;
    }
}
