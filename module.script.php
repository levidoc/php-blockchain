<?php 

class SystemBlockChain
{
    public array $chain;

    public function __construct($genesis_block=FALSE)
    {   
        if ($genesis_block == false){
            $this->chain = [$this->createGenesisBlock()];
        }else{
            $this->chain = [$genesis_block]; 
        }
        
    }

    private function createGenesisBlock(): BlockCells
    {
        return new BlockCells('Genesis Block', '0');
    }

    public function getLatestBlock(): BlockCells
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock(BlockCells $newBlock): void
    {
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
    }

    public function add_items($string){
        $newBlock = new BlockCells($string); 
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
    }

    public function isChainValid(): bool
    {
        for ($i = 1, $chainLength = count($this->chain); $i < $chainLength; $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }
}

class BlockCells
{
    public $data;
    public string $previousHash;
    public string $hash;

    public function __construct( $data, string $previousHash = '')
    {
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash(): string
    {   
        
        #Ensure Intensity 
        #$intensity = openssl_encrypt('Hello, World!', 'aes-256-cbc', "Secret Key", 0, openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'))); 
        $intensity = openssl_encrypt($this->previousHash, 'aes-256-cbc', "Secret Key", 0, "YOUR_SECRET_KEY");
        $encode = hash("sha256",$intensity); 
        return hash(
            'sha256', 
            sprintf(
               '%s%s%s',
               $encode,
               $this->previousHash,
               json_encode($this->data),
           )
        );
    }
}

function DebugBlockchain(SystemBlockChain $blockchain): void
{
    foreach ($blockchain->chain as $block) {
        echo "Data: " . json_encode($block->data) . "\n";
        echo "Previous Hash: " . $block->previousHash . "\n";
        echo "Hash: " . $block->hash . "\n\n";
    }
}

?>
