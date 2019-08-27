<?php

class Me {

    public $firstName;
    public $lastName;
    public $age;
    
    public function Profile() {
        echo "นาย$this->firstName $this->lastName";
        echo "<br/>";
        echo "อายุ $this->age";
    }
	
	public function setBirthYear($birthYear) {
        $this->birthYear = $birthYear;
    }
    public function getAge() {
        $currentYear = 2019;
        $age = $currentYear - $this->birthYear; 
        return $age;
    }

}

$user1 = new Me();
$user1->firstName = "วงศธร";
$user1->lastName = "ด้วงนิล";
$user1->setBirthYear(1998);
$user1->Profile();
echo $user1->getAge();

?>