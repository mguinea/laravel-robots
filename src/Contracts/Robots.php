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
     * @param string|array $host
     * @return \Robots\Contracts\Robot;
     */
    public function addHost($hosts): self;

    /**
     * Add a Sitemap to the robots.
     *
     * @param string|array $sitemap
     * @return \Robots\Contracts\Robot;
     */
    public function addSitemap($sitemaps): self;

    /**
     * Add a spacer to the robots.
     * @return \Robots\Contracts\Robot;
     */
    public function addSpacer(): self;

    /**
     * Add a User-agent to the robots.
     *
     * @param string|array $userAgent
     * @return \Robots\Contracts\Robot;
     */
    public function addUserAgent($userAgents): self;

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
