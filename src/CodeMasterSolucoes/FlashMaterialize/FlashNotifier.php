<?php

namespace CodeMasterSolucoes\FlashMaterialize;

class FlashNotifier
{
    /**
     * The session store.
     *
     * @var SessionStore
     */
    protected $session;

    /**
     * The messages collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $messages;

    /**
     * Create a new FlashNotifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }

    /**
     * FlashMaterialize an information message.
     *
     * @param  string|null $message
     * @param  int $time
     * @return $this
     */
    public function info($message = null, $time = 30000)
    {
        return $this->message($message, $time, 'info');
    }

    /**
     * FlashMaterialize a success message.
     *
     * @param  string|null $message
     * @param  int $time
     * @return $this
     */
    public function success($message = null, $time = 30000)
    {
        return $this->message($message, $time, 'success');
    }

    /**
     * FlashMaterialize an error message.
     *
     * @param  string|null $message
     * @param  int $time
     * @return $this
     */
    public function error($message = null, $time = 30000)
    {
        return $this->message($message, $time, 'error');
    }

    /**
     * FlashMaterialize a warning message.
     *
     * @param  string|null $message
     * @param  int $time
     * @return $this
     */
    public function warning($message = null, $time = 30000)
    {
        return $this->message($message, $time, 'warning');
    }

    /**
     * FlashMaterialize a general message.
     *
     * @param  string|null $message
     * @param  int $time
     * @param  string $level
     * @return $this
     */
    public function message($message = null, $time = 30000, $level = 'info')
    {
        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage(compact('level'));
        }

        if (! $message instanceof Message) {
            $message = new Message(compact('message', 'time', 'level'));
        }

        $this->messages->push($message);

        return $this->flash();
    }

    /**
     * Modify the most recently added message.
     *
     * @param  array $overrides
     * @return $this
     */
    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }

    /**
     * FlashMaterialize an overlay modal.
     *
     * @param  string|null $message
     * @param  string      $title
     * @return $this
     */
    public function overlay($message = null, $title = 'Title')
    {
        if (! $message) {
            return $this->updateLastMessage(['title' => $title, 'overlay' => true]);
        }

        return $this->message(
            new OverlayMessage(compact('title', 'message'))
        );
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        return $this->updateLastMessage(['important' => true]);
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->messages = collect();

        return $this;
    }

    /**
     * FlashMaterialize all messages to the session.
     */
    protected function flash()
    {
        $this->session->flash('flash_notification', $this->messages);

        return $this;
    }
}