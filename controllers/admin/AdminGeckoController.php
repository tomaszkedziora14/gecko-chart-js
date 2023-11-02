<?php

class AdminGeckoController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->display = 'view';
        parent::__construct();
        $this->meta_title = $this->l('Your Bitcoin Chart');
    }
    
    public function setMedia($isNewTheme = false)
    {
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/chart.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/canvasjs.min.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/jquery-1.11.1.min.js.js');
        return parent::setMedia($isNewTheme);
    }
    
    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('Administration');
        $this->toolbar_title[] = $this->l('Gecko Chart');
    }
    
    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
        unset($this->page_header_toolbar_btn['back']);
    }
    
    public function renderView()
    {
        $this->tpl_view_vars = array(
            'test' => 'BitCoin Gecko',
        );
        $this->base_tpl_view = 'view_bt.tpl'; 
        return parent::renderView();
    }
}
