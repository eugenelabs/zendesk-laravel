<?php

namespace Eugenelabs\Zendesk\Services;

use Illuminate\Support\Facades\Log;

class NullService {

    /**
     * @var bool
     */
    private bool $logCalls;

    public function __construct(bool $logCalls = false)
    {
        $this->logCalls = $logCalls;
    }

    public function __call($name, $arguments): static
    {
        if ($this->logCalls) {
            Log::debug('Called Eugenelabs Zendesk facade method: '.$name.' with:', $arguments);

            return new self;
        }

        return $this;
    }
    
    public function __get(string $name): static
    {
        if ($this->logCalls) {
            Log::debug('Called Eugenelabs Zendesk facade property: '.$name);

            return new self;
        }

        return $this;
    }
}
