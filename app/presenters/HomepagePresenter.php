<?php

namespace App\Presenters;


class HomepagePresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->redirect('Json:Default');
        $this->template->anyVariable = 'any value';
    }
}
