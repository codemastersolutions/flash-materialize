<?php

namespace CodeMasterSolucoes\FlashMaterialize;

class OverlayMessage extends Message
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title = 'Title';

    /**
     * Whether the message is an overlay.
     *
     * @var bool
     */
    public $overlay = true;
}