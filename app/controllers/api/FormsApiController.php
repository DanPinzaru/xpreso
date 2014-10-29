<?php
/**
 * @author paul
 */
use xpreso\models\Form as FormsModel;

class FormsApiController extends BaseController
{
    public function getList($lastUpdateTimestamp = 0)
    {
        $allForms = FormsModel::getAllNewest($lastUpdateTimestamp);
        return $allForms->toJson();
    }
    
    public function create()
    {
        $form = new FormsModel();
        //$form->formName = $this->sanitize(Input::get('formName'));
        $form->formName = 'form1';
        $form->state = FormsModel::$formSates['draft'];
        
        $form->save();
    }
}
