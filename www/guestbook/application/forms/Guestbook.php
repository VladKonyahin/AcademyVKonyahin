//application/forms/Guestbook.php
   class Application_Form_Guestbook extends Zend_Form
{
    public function init()
    {
    $this->setMethod('post');
        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
        // Add the comment element
        $this->addElement('textarea', 'comment', array(
            'label'      => 'comment:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Введите 5 цифр, которвые вы видите снизу:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
        // добавить
        $this->addElement('submit', 'Add', array(
            'ignore'   => true,
            'label'    => 'Sign Guestbook',
        ));
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}