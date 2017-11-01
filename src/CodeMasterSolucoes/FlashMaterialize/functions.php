<?php

if (! function_exists('flash')) {

    /**
     * Arrange for a flash message.
     *
     * @param string|null $message
     * @param int $time
     * @param string $level
     * @return \SLDesen\FlashMaterialize\FlashNotifier
     */
    function flash($message = null, $time = 30000, $level = 'info')
    {
        $notifier = app('flash');

        if (! is_null($message)) {
            return $notifier->message($message, $time, $level);
        }

        return $notifier;
    }

}