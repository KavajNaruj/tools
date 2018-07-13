<?php

namespace App\Presenters;

use Nittro\Bridges\NittroUI\Presenter;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter
{
    protected function startup() {
        parent::startup();
        $this->setDefaultSnippets(['header', 'content']);
    }
}
