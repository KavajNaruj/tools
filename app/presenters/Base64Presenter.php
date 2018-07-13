<?php

namespace App\Presenters;

class Base64Presenter extends BasePresenter
{
    public function renderDefault($input, $direction)
    {
        if ($direction == 'encode') {
            $this->template->encoded = base64_encode($input);
            $this->template->decoded = $input;
        }
        if ($direction == 'decode') {
            $this->template->encoded = $input;
            $this->template->decoded = base64_decode($input);
        }
    }
}
