<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\PeopleTable; 

class IndexController extends AbstractActionController
{

	protected $peopleTable;
 	public function __construct(PeopleTable $peopleTable )
	{
		$this->peopleTable = $peopleTable;
	}
								
    public function indexAction()
    {
        return new ViewModel();
    }
	
	
    public function exampleOneAction()
    {
    	$people = $this->peopleTable->fetchAll();
        return new ViewModel([
            'people' => $people
        ]);		
    }


    public function exampleTwoAction()
    {
    	$people = $this->peopleTable->fetchSpecificUser("Anthony","Agbenu");
        return new ViewModel([
            'people' => $people
        ]);		
    }
	
		
		
}
