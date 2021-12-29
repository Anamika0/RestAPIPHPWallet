<?php
class Share{

    private $shareTable = "share";
    public $shareId;
    public $userId;
    public $share_name;
    public $share_amount;
    public $share_type;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

	function read(){
		if($this->shareId) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->shareTable." WHERE shareId = ?");
			$stmt->bind_param("i", $this->shareId);
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->shareTable);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

	function create(){

		$stmt = $this->conn->prepare("INSERT INTO ".$this->shareTable."(`userId`, `share_name`, `share_amount`, `share_type`) VALUES(?,?,?,?)");

		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->share_name = htmlspecialchars(strip_tags($this->share_name));
		$this->share_amount = htmlspecialchars(strip_tags($this->share_amount));
		$this->share_type = htmlspecialchars(strip_tags($this->share_type));


		$stmt->bind_param("isis", $this->userId, $this->share_name, $this->share_amount, $this->share_type);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

	function update(){

		$stmt = $this->conn->prepare("
			UPDATE ".$this->shareTable." SET userId= ?, share_name = ?, share_amount = ?, share_type = ? WHERE shareId = ?");

		$this->shareId = htmlspecialchars(strip_tags($this->shareId));
		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->share_name = htmlspecialchars(strip_tags($this->share_name));
		$this->share_amount = htmlspecialchars(strip_tags($this->share_amount));
		$this->share_type = htmlspecialchars(strip_tags($this->share_type));

		$stmt->bind_param("isisi", $this->userId, $this->share_name, $this->share_amount, $this->share_type, $this->shareId);

		if($stmt->execute()){
			//print_r($stmt->errorInfo());
			return true;
		}

		return false;
	}

	function delete(){

		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->shareTable."
			WHERE shareId = ?");

		$this->shareId = htmlspecialchars(strip_tags($this->shareId));

		$stmt->bind_param("i", $this->shareId);

		if($stmt->execute()){
			return true;
		}

		return false;
	}
}
?>