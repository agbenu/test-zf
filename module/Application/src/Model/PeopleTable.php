<?php

namespace Application\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

 


class PeopleTable
{
    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
	
    public function fetchAll()
    {
    	$select = $this->tableGateway->getSql()->select();
		$resultSet = $this->tableGateway->select(function ($select) {
                $select->order('id DESC');
        });
        return $resultSet;

    }

	public function	fetchSpecificUser($first_name,$last_name)
	{
        return $this->tableGateway->select(['first_name'=>$first_name, 'last_name'=>$last_name ]);				
	}
 
    public function getPeople($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }
        return $row;
    }
		
}