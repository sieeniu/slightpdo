<?php


namespace SlightPDO;


class Connection
{
    /**
     * @var Configuration
     */
    public $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    public function getDsn(): string
    {
        return sprintf(
            '%s:host=%s;port=%d;dbname=%s',
            $this->config->getDriver(),
            $this->config->getHost(),
            $this->config->getPort(),
            $this->config->getDbname()
        );
    }
}