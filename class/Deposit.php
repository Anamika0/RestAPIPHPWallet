<?php
class Deposit{

    private $depositTable = "deposit";
    public $depositId;
    public $userId;
    public $deposit_amount;
    public $deposit_type;
    public $rate_of_Interest;
    public $duration;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

	function read(){
		if($this->depositId) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->depositTable." WHERE depositId = ?");
			$stmt->bind_param("i", $this->depositId);
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->depositTable);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

	function create(){

		$stmt = $this->conn->prepare("INSERT INTO ".$this->depositTable."(`userId`, `deposit_amount`, `deposit_type`, `rate_of_Interest`, `duration`) VALUES(?,?,?,?,?)");

		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->deposit_amount = htmlspecialchars(strip_tags($this->deposit_amount));
		$this->deposit_type = htmlspecialchars(strip_tags($this->deposit_type));
		$this->rate_of_Interest = htmlspecialchars(strip_tags($this->rate_of_Interest));
		$this->duration = htmlspecialchars(strip_tags($this->duration));


		$stmt->bind_param("iisis", $this->userId, $this->deposit_amount, $this->deposit_type, $this->rate_of_Interest, $this->duration);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

	function update(){

		$stmt = $this->conn->prepare("
			UPDATE ".$this->depositTable." SET userId= ?, deposit_amount= ?, deposit_type = ?, rate_of_Interest = ?, duration = ? WHERE depositId = ?");

		$this->depositId = htmlspecialchars(strip_tags($this->depositId));
		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->deposit_amount = htmlspecialchars(strip_tags($this->deposit_amount));
		$this->deposit_type = htmlspecialchars(strip_tags($this->deposit_type));
		$this->rate_of_Interest = htmlspecialchars(strip_tags($this->rate_of_Interest));
		$this->duration = htmlspecialchars(strip_tags($this->duration));

		$stmt->bind_param("iisisi", $this->userId, $this->deposit_amount, $this->deposit_type, $this->rate_of_Interest, $this->duration, $this->depositId);

		if($stmt->execute()){
			//print_r($stmt->errorInfo());
			return true;
		}

		return false;
	}

	function delete(){

		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->depositTable."
			WHERE depositId = ?");

		$this->depositId = htmlspecialchars(strip_tags($this->depositId));

		$stmt->bind_param("i", $this->depositId);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

}
?>