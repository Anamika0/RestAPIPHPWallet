<?php
class Rd{

    private $rdTable = "rd";
    public $rdId;
    public $userId;
    public $rd_amount;
    public $rd_type;
    public $rate_of_Interest;
    public $duration;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

	function read(){
		if($this->rdId) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->rdTable." WHERE rdId = ?");
			$stmt->bind_param("i", $this->rdId);
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->rdTable);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}

	function create(){

		$stmt = $this->conn->prepare("INSERT INTO ".$this->rdTable."(`userId`, `rd_amount`, `rd_type`, `rate_of_Interest`, `duration`) VALUES(?,?,?,?,?)");

		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->rd_amount = htmlspecialchars(strip_tags($this->rd_amount));
		$this->rd_type = htmlspecialchars(strip_tags($this->rd_type));
		$this->rate_of_Interest = htmlspecialchars(strip_tags($this->rate_of_Interest));
		$this->duration = htmlspecialchars(strip_tags($this->duration));


		$stmt->bind_param("iisis", $this->userId, $this->rd_amount, $this->rd_type, $this->rate_of_Interest, $this->duration);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

	function update(){

		$stmt = $this->conn->prepare("
			UPDATE ".$this->rdTable." SET userId= ?, rd_amount= ?, rd_type = ?, rate_of_Interest = ?, duration = ? WHERE rdId = ?");

		$this->rdId = htmlspecialchars(strip_tags($this->rdId));
		$this->userId = htmlspecialchars(strip_tags($this->userId));
		$this->rd_amount = htmlspecialchars(strip_tags($this->rd_amount));
		$this->rd_type = htmlspecialchars(strip_tags($this->rd_type));
		$this->rate_of_Interest = htmlspecialchars(strip_tags($this->rate_of_Interest));
		$this->duration = htmlspecialchars(strip_tags($this->duration));

		$stmt->bind_param("iisisi", $this->userId, $this->rd_amount, $this->rd_type, $this->rate_of_Interest, $this->duration, $this->rdId);

		if($stmt->execute()){
			//print_r($stmt->errorInfo());
			return true;
		}

		return false;
	}

	function delete(){

		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->rdTable."
			WHERE rdId = ?");

		$this->rdId = htmlspecialchars(strip_tags($this->rdId));

		$stmt->bind_param("i", $this->rdId);

		if($stmt->execute()){
			return true;
		}

		return false;
	}

}
?>