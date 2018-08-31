<?php

namespace Application\Model;

// Add the following import statements:
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;


class People implements  InputFilterAwareInterface
{
    public $id;
    public  $firstname;
					
    private $inputFilter;
	
    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->firstname = !empty($data['firstname']) ? $data['firstname'] : null;	
    }
            
 	// Add the following method:
    public function getArrayCopy()
    {
        return [
			'firstname' => $this->firstname
        ];
    }


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);
				 
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
	
			
}

?>