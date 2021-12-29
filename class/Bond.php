<?php
class Bond{

    private $bondTable = "bond";
    public $bondId;
    public $userId;
    public $bond_name;
    public $bond_amount;
    public $bond_type;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

	function read(){
		if($this->bondId) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->bondTable." WHERE bondId = ?");
			$stmt->bind_param("i", $this->bondId);
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->bondTable);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

	function create(){

		$stmt = $this->conn->prepare("INSERT INTO ".$this->bondTable."(`userId`, `bond_name`, `bond_amount`, `bond_type`) VALUES(?,?,?,?)");

		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->bond_name = htmlspecialchars(strip_tags($this->bond_name));
		$this->bond_amount = htmlspecialchars(strip_tags($this->bond_amount));
		$this->bond_type = htmlspecialchars(strip_tags($this->bond_type));


		$stmt->bind_param("isis", $this->userId, $this->bond_name, $this->bond_amount, $this->bond_type);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

	function update(){

		$stmt = $this->conn->prepare("
			UPDATE ".$this->bondTable." SET userId= ?, bond_name = ?, bond_amount = ?, bond_type = ? WHERE bondId = ?");

		$this->bondId = htmlspecialchars(strip_tags($this->bondId));
		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->bond_name = htmlspecialchars(strip_tags($this->bond_name));
		$this->bond_amount = htmlspecialchars(strip_tags($this->bond_amount));
		$this->bond_type = htmlspecialchars(strip_tags($this->bond_type));

		$stmt->bind_param("isisi", $this->userId, $this->bond_name, $this->bond_amount, $this->bond_type, $this->bondId);

		if($stmt->execute()){
			//print_r($stmt->errorInfo());
			return true;
		}

		return false;
	}

	function delete(){

		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->bondTable."
			WHERE bondId = ?");

		$this->bondId = htmlspecialchars(strip_tags($this->bondId));

		$stmt->bind_param("i", $this->bondId);

		if($stmt->execute()){
			return true;
		}

		return false;
	}
	
		function alter_bond(){
		
		$stmt = $this->conn->prepare("ALTER TABLE ".$this->bondTable." ADD duration double" );
		$stmt_1 = $this->conn->prepare("ALTER TABLE ".$this->bondTable." ADD rate_percent DECIMAL" );	
	 
		if($stmt->execute() && $stmt_1->execute()){
			return true;
		}
	 
		return false;		 
	}
	
}
?>