<?php

namespace Worldline\Sips\Common;


use Worldline\Sips\Common\Exception\InvalidEnvironmentException;

class SipsEnvironment
{
    private $possibleEnvironments = [
        "SIMU" => "https://sherlocks-payment-webinit-simu.secure.lcl.fr/paymentInit",
        "TEST" => "",
        "PROD" => "https://sherlocks-payment-webinit.secure.lcl.fr/paymentInit",
    ];
    private $environment;

    /**
     * SipsEnvironment constructor.
     * @param string $environment
     * @throws InvalidEnvironmentException
     */
    public function __construct(string $environment)
    {
        if (key_exists(strtoupper($environment), $this->possibleEnvironments)) {
            $this->environment = $this->possibleEnvironments[$environment];
        } else {
            throw new InvalidEnvironmentException();
        }
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->environment;
    }
}
