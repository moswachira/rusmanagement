class Name
 {

    public $firstName;
    public $lastName;
    private $birthYear;

     public function setBirthYear($birthYear)
     $CodeWallTutorialArray = ["Eggs", "Bacon", "HashBrowns", "Beans", "Bread", "RedSauce"];
     $arrayLength = count($CodeWallTutorialArray);
     
     $i = 0;
     while ($i < $arrayLength)
     {
         echo $CodeWallTutorialArray[$i] ."<br />";
         $i++;
     }


    public function getAge()
     {
        $currentYear = 2017;
        $age = $currentYear - $this->birthYear; 
        return $age;
    }

}

    $name = new Name();
    $name->firstName = "วชิระ";
    $name->lastName = "ขันคำ";
    $name->setBirthYear(1998)
    ;
    echo "สมาชิก";echo "<br/>";
    echo "ชื่อ: $name->firstName";echo "<br/>";
    echo "นามสกุล: $name->lastName";echo "<br/>";
    echo "อายุ: " . $name->getAge() ."";echo "<br/>";
    $name = new Name();
    $name->firstName = "วชิระ";
    $name->lastName = "ขันคำ";
    $name->setBirthYear(1998)
    ;
  