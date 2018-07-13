<?php

namespace App\Presenters;

use Ramsey\Uuid\Uuid;

class UuidPresenter extends BasePresenter
{
    private $validate = '';
    private $uuids = '';
    private $count = 1;

    public function renderDefault()
    {
        $this->template->validate = $this->validate;
        $this->template->count = $this->count;
        $this->template->uuids = $this->uuids;
    }

    public function handleIsUuidValid($validate)
    {
        $this->validate = $validate;

        if ($validate && Uuid::isValid($validate)) {
            $this->flashMessage($validate . ' is valid uuid');
            $this->redrawDefault(true);
            return;
        }
        $this->flashMessage($validate  . ' is not valid uuid', 'danger');
        $this->redrawDefault(true);
    }

    public function handleGenerateUuids($count, $quoted = false, $commaSeparated = false)
    {
        $uuids = '';
        for ($i = 1; $i <= $count; $i++) {
            $uuid = Uuid::uuid4();
            $uuids .= $quoted ? "'" . $uuid . "'" : $uuid;
            if ($i != $count) {
                if ($commaSeparated) {
                    $uuids .= ',';
                }
                $uuids .= PHP_EOL;
            }
        }
        $this->count = $count;
        $this->uuids = $uuids;
        $this->redrawDefault(true);
    }
}
