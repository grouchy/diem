<?php

class dmJQueryEffectsFadeForm extends dmBehaviorBaseForm {
    
    protected $events = array(
            'load'          =>      'Content load',
            'click'         =>      'Mouse click',
            'mouseover'     =>      'Mouse over',
            'mouseout'      =>      'Mouse out'
    );
    
    public function configure() {
          
        $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => false
        ));
        
        $this->widgetSchema['event'] = new sfWidgetFormChoice(array(
            'choices'=>$this->events
        ));
        $this->validatorSchema['event'] = new sfValidatorChoice(array(
            'choices'=>  array_keys($this->events)
        ));
        
        $this->widgetSchema['opacity'] = new sfWidgetFormInputText();
        $this->validatorSchema['opacity'] = new sfValidatorInteger(array(
            'required'=>true,
            'min'=>0,
            'max'=>100
        ));
          
        $this->widgetSchema['duration'] = new sfWidgetFormInputText();
        $this->validatorSchema['duration'] = new sfValidatorInteger(array(
            'min'=>0            
        ));        
        
        $this->widgetSchema['easing'] = new dmWidgetFormChoiceEasing();
        $this->validatorSchema['easing'] = new dmValidatorChoiceEasing(array(
            'required' => true
        ));
        
        $this->getWidgetSchema()->setHelps(array(
            'inner_target' => 'Redefine selector for elements to fade (optional)',
            'event' => 'Event that triggers the fade effect',
            'opacity' => 'The percentage of transparency',
            'duration' => 'Duration of fade animation in ms',
            'easing' => 'The easing function for animation'
        ));
        
        if (!$this->getWidgetSchema()->getDefault('event')) $this->getWidgetSchema()->setDefault ('event', 'load');
        if (!$this->getWidgetSchema()->getDefault('opacity')) $this->getWidgetSchema()->setDefault ('opacity', 50);
        if (!$this->getWidgetSchema()->getDefault('duration')) $this->getWidgetSchema()->setDefault ('duration', 1000);
        if (!$this->getWidgetSchema()->getDefault('easing')) $this->getWidgetSchema()->setDefault ('easing', 'jswing');
                  
        parent::configure();
    }
    
    public function getFirstDefaults() {
        return array(
            'event' => 'load',
            'opacity' => 50,
            'duration' => 1000,
            'easing' => 'jswing'
        );
    }
}

