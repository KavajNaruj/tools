<?php

namespace App\Presenters;

class JsonPresenter extends BasePresenter
{
    public function renderDefault($input)
    {
        $data = json_decode($input);
        $options = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES |  JSON_UNESCAPED_UNICODE;
        $this->template->input = $input ?: '';
        $this->template->json = $data ? json_encode($data, $options) : '';
    }
}
