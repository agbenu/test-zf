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
    public  $lastname;
    public  $dob;
    public  $gender;
						
    private $inputFilter;
	
    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->first_name = !empty($data['first_name']) ? $data['first_name'] : null;	
        $this->last_name = !empty($data['last_name']) ? $data['last_name'] : null;			
        $this->dob = !empty($data['dob']) ? $data['dob'] : null;					
        $this->gender = !empty($data['gender']) ? $data['gender'] : null;							
    }
            
 	// Add the following method:
    public function getArrayCopy()
    {
        return [
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,			
			'dob' => $this->dob,			
			'gender' => $this->gender									
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