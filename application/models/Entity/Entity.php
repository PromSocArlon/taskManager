<?php
namespace app\models\Entity;

/**
 * @Table(name="tbl_entity")
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="integer")
 * @DiscriminatorMap({1 = "Task", 2 = "Member", 3 = "Team"})
 **/
abstract class Entity {

    //TODO: set to protected ?
    /**
     * @id
     * @Column(type="guid")
     * @GeneratedValue(strategy="UUID")
     */
	private $id;
	
	public function getID()
    {
        return $this->id;
    }
	
	public function setID(int $id)
    {
        $this->id = $id;
    }

    //TODO: usable ?
    //abstract function entityToArray();

}