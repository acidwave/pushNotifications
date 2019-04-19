<?php

class pushNotificationsOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'pushNotificationsItem';
    public $classKey = 'pushNotificationsItem';
    public $languageTopics = ['pushnotifications'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('pushnotifications_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('pushnotifications_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'pushNotificationsOfficeItemCreateProcessor';