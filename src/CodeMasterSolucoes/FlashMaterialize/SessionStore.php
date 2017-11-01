<?php

namespace CodeMasterSolucoes\FlashMaterialize;

interface SessionStore
{
    /**
     * FlashMaterialize a message to the session.
     *
     * @param string $name
     * @param array  $data
     */
    public function flash($name, $data);
}