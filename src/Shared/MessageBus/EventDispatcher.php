<?php

declare(strict_types=1);

namespace App\Shared\MessageBus;

interface EventDispatcher
{
    public function dispatch(Event $event): void;
}
