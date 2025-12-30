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
            'actionFrontControllerAuthenticationInitBefore',
            'actionFrontControllerAuthenticationInitAfter',
            'actionFrontControllerAuthenticationSetVariablesBefore',
            'actionFrontControllerAuthenticationSetVariables',
            'actionBuildFrontAuthenticationEndObject',
            'displayAuthenticationHeader',
            'actionOutputAuthenticationHTMLBefore',
            'actionFrontControllerAuthenticationSetMedia',
        ]);
    }

    public function hookActionFrontControllerAuthenticationInitBefore(): void
    {
        echo 'hookActionFrontControllerAuthenticationInitBefore' . '<br>';
    }

    public function hookActionFrontControllerAuthenticationInitAfter(): void
    {
        echo 'hookActionFrontControllerAuthenticationInitAfter' . '<br>';
    }

    public function hookActionFrontControllerAuthenticationSetVariablesBefore(): void
    {
        echo 'hookActionFrontControllerAuthenticationSetVariablesBefore' . '<br>';
    }

    public function hookActionFrontControllerAuthenticationSetVariables(): void
    {
        echo 'hookActionFrontControllerAuthenticationSetVariables' . '<br>';
    }

    public function hookActionBuildFrontAuthenticationEndObject(): void
    {
        echo 'hookActionBuildFrontAuthenticationEndObject' . '<br>';
    }

    public function hookDisplayAuthenticationHeader(): void
    {
        echo 'hookDisplayAuthenticationHeader' . '<br>';
    }

    public function hookActionOutputAuthenticationHTMLBefore(): void
    {
        echo 'hookActionOutputAuthenticationHTMLBefore' . '<br>';
        die;
    }

    public function hookActionFrontControllerAuthenticationSetMedia(): void
    {
        echo 'hookActionFrontControllerAuthenticationSetMedia' . '<br>';
    }
}
