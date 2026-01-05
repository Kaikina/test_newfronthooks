<?php

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

class Test_Newfronthooks extends Module
{
    public function __construct()
    {
        $this->name = 'test_newfronthooks';
        $this->tab = 'administration';
        $this->author = 'Evolutive';
        $this->version = '1.0.0';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Test new front controllers hooks', [], 'Modules.Testnewfronthooks.Admin');
        $this->description = $this->trans(
            'This module is for QA purpose only.',
            [],
            'Modules.Testnewfronthooks.Admin'
        );

        $this->ps_versions_compliancy = ['min' => '9.1.0', 'max' => '9.1.0'];
    }

    public function install(): bool
    {
        return parent::install() && $this->registerHook([
                'actionAuthControllerInitBefore',
                'actionAuthControllerInitAfter',
                'actionAuthControllerSetVariablesBefore',
                'actionAuthControllerSetVariables',
                'actionBuildAuthControllerFrontEndObject',
                'displayAuthControllerHeader',
                'actionOutputAuthControllerHTMLBefore',
                'actionAuthControllerSetMedia',
            ]);
    }

    public function hookActionAuthControllerInitBefore(): void
    {
        echo 'hookActionAuthControllerInitBefore' . '<br>';
    }

    public function hookActionAuthControllerInitAfter(): void
    {
        echo 'hookActionAuthControllerInitAfter' . '<br>';
    }

    public function hookActionAuthControllerSetVariablesBefore(): void
    {
        echo 'hookActionAuthControllerSetVariablesBefore' . '<br>';
    }

    public function hookActionAuthControllerSetVariables(): void
    {
        echo 'hookActionAuthControllerSetVariables' . '<br>';
    }

    public function hookActionBuildAuthControllerFrontEndObject(): void
    {
        echo 'hookActionBuildAuthControllerFrontEndObject' . '<br>';
    }

    public function hookDisplayAuthControllerHeader(): void
    {
        echo 'hookDisplayAuthControllerHeader' . '<br>';
    }

    public function hookActionOutputAuthControllerHTMLBefore(): void
    {
        echo 'hookActionOutputAuthControllerHTMLBefore' . '<br>';
        die;
    }

    public function hookActionAuthControllerSetMedia(): void
    {
        echo 'hookActionAuthControllerSetMedia' . '<br>';
    }
}
