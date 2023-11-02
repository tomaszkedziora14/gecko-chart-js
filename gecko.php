<?php


if (!defined('_PS_VERSION_')) {
    exit;
}

class Gecko extends Module
{
    public function __construct()
    {
        $this->name = 'gecko';
        $this->tab = 'administration';
        $this->version = '1.0';
        $this->author = 'Tomasz Kędziora';
        $this->ps_versions_compliancy = array(
            'min' => '1.0',
        );

        parent::__construct();

        $this->displayName = $this->l('Gecko Chart');
        $this->description = $this->l('Track bitcoin chart!');

    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayBackOfficeHeader') 
            || !$this->installTab())
        {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() 
            || !$this->uninstallTab())
        {
            return false;
        }
        return true;
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminGecko';
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Gecko Chart';
        }

        $tab->id_parent = (int)Tab::getIdFromClassName('ShopParameters');
        $tab->module = $this->name;
        return $tab->add();
    }

    public function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName('AdminGamification');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            return $tab->delete();
        }
        return false;
    }
}
