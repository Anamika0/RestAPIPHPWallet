<?php
class Coins{   
    
    private $coinsTable = "coins";      
    public $walletId;
    public $coin_value;
	
	private $userTable = "users";      
    public $userId;
    public $Wallet_balance;
	
	private $WalletTable = "wallet";      
    public $coin;
   
   
   
	
    public function __construct($db){
        $this->conn = $db;
    }
	
	   function viewAll(){    
        
        
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->coinsTable);     
               
        $stmt->execute();           
        $result = $stmt->get_result();      
        return $result; 
    }
	
	
	   function read(){    
        if($this->walletId) {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->coinsTable." WHERE walletId = ?");
            $stmt->bind_param("id:", $this->walletId);                   
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->coinsTable);     
        }       
        $stmt->execute();           
        $result = $stmt->get_result();      
        return $result; 
    }
	


    function create(){
        
        $stmt = $this->conn->prepare("INSERT INTO ".$this->coinsTable."(`walletId`, `coin_value`) VALUES(?,?)");
        
        $this->walletId = htmlspecialchars(strip_tags($this->walletId));
        $this->coin = htmlspecialchars(strip_tags($this->coin_value));
        
        
        $stmt->bind_param('ii', $this->walletId, $this->coin_value);
        
        if($stmt->execute()){
            return true;
        }
     
        return false;        
    }

	function update(){
		$data = json_decode(file_get_contents("php://input"), true);

		$id= $data['walletId'];
        $value= $data['coin_value'];


		$sql= "UPDATE coins SET walletId = '{$id}', coin_value ='{$value}' WHERE walletId= {$id}";


         if(mysqli_query($this->conn,"UPDATE coins SET walletId = '{$id}', coin_value ='{$value}' WHERE walletId= {$id}"))
     	{ return true;}
         return false;
	}



    function delete(){
        
        $stmt = $this->conn->prepare("
            DELETE FROM ".$this->coinsTable." 
            WHERE walletId = ?");
            
        $this->walletId = htmlspecialchars(strip_tags($this->walletId));
     
        $stmt->bind_param("i", $this->walletId);
     
        if($stmt->execute()){
            return true;
        }
     
        return false;        
    }
	
	
}