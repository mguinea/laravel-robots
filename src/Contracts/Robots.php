<?php

namespace Robots\Contracts;

interface Robots
{
    /**
     * Add a allow rule to the robots.
     *
     * @param string|array $directories
     * @return \Robots\Contracts\Robot;
     */
    public function addAllow($directories): self;

    /**
     * Add a comment to the robots.
     *
     * @param string $comment
     * @return \Robots\Contracts\Robot;
     */
    public function addComment(string $comment): self;

    /**
     * Add a disallow rule to the robots.
     *
     * @param string|array $directories
     * @return \Robots\Contracts\Robot;
     */
    public function addDisallow($directories): self;

    /**
     * Add a Host to the robots.
     *
     * @param string $host
     * @return \Robots\Contracts\Robot;
     */
    public function addHost(string $host): self;

    /**
     * Add a Sitemap to the robots.
     *
     * @param string $sitemap
     * @return \Robots\Contracts\Robot;
     */
    public function addSitemap(string $sitemap): self;

    /**
     * Add a spacer to the robots.
     * @return \Robots\Contracts\Robot;
     */
    public function addSpacer(): self;

    /**
     * Add a User-agent to the robots.
     *
     * @param string $userAgent
     * @return \Robots\Contracts\Robot;
     */
    public function addUserAgent(string $userAgent): self;

    /**
     * Generate the robots data.
     *
     * @return string
     */
    public function generate(): string;

    /**
     * Reset the rows.
     *
     * @return \Robots\Contracts\Robot;
     */
    public function reset(): self;
}
