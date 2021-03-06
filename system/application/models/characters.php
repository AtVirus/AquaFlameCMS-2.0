<?php
class Character
{
    private $_Guid;
    private $_Name;
    private $_Race;
    private $_Class;
    private $_Gender;
    private $_Level;
    
    public function __construct($guid)
    {
        $this->_Guid = (int)$guid;
    }
    
    public function getGuid()
    {
        return $this->_Guid;
    }
    
    public function setName($name)
    {
        $this->_Name = (string)$name;
        return $this;
    }
    
    public function getName()
    {
        return $this->_Name;
    }
    
    public function setRace($race)
    {
        $this->_Race = (int)$race;
        return $this;
    }
    
    public function getRace()
    {
        return $this->_Race;
    }
    
    public function setClass($class)
    {
        $this->_Class = (int)$class;
        return $this;
    }
    
    public function getClass()
    {
        return $this->_Class;
    }
    
    public function setGender($gender)
    {
        $this->_Gender = (int)$gender;
        return $this;
    }
    
    public function getGender()
    {
        return $this->_Gender;
    }
    
    public function setLevel($level)
    {
        $this->_Level = (int)$level;
        return $this;
    }
    
    public function getLevel()
    {
        return $this->_Level;
    }
}

class Characters extends Model
{
    public function __construct()
    {
        $this->tableName = "characters";
        parent::Model();
    }
    
    public function getChararcterById($guid)
    {
        $this->db->select('name, race, class, gender, level, playerBytes, playerBytes2')->where('guid',$guid);
        $query = $this->db->get('characters');
        if($query->rowCount() > 0)
        {   
            $row = $this->db->fetch($query);
            $character = new Character($guid);
            $character->setClass($row->class)
                      ->setGender($row->gender)
                      ->setRace($row->race)
                      ->setLevel($row->level);
                      
            return $character;
        }
    }
}
?>