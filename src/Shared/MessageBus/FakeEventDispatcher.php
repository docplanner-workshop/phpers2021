<?php

declare(strict_types=1);

namespace App\Shared\MessageBus;

final class FakeEventDispatcher implements EventDispatcher
{
    public function dispatch(Event $event): void
    {
        // TODO: Implement dispatch() method.
    }
}
