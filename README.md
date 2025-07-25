# Simple PHP Blockchain

This is a simplified PHP implementation of a blockchain for educational purposes.  It demonstrates the core concepts of a blockchain, including blocks, hashing, and the chain structure.  **This implementation is NOT suitable for production use** as it lacks critical features for scalability.

## Features

* Basic block structure with data, timestamp, previous hash, and hash.
* Proof-of-Work (PoW) system using a simple hash target.
* Chain validation.
* Adding new blocks to the chain.

## Limitations

* **Security:**  This implementation is highly vulnerable and should not be used with sensitive data or in any production environment. It lacks proper cryptographic security measures.
* **Scalability:**  The simple PoW algorithm is not efficient and will not scale to a large number of blocks.
* **Persistence:**  The blockchain data is stored in memory during runtime and is lost when the script terminates.  No persistent storage is implemented.
* **Networking:**  This is a single-node implementation.  There's no peer-to-peer networking or consensus mechanism.

## Requirements

* PHP 7.4 or higher

## Installation

1. Clone the repository: `git clone https://github.com/levidoc/php-blockchain.git`.
2. Navigate to the project directory: `cd php-blockchain`

## Usage

```php
<?php
    #Example With Obscuring User Password 
    @include_once "module.script.php"; #Or What The Module File Patch Would Be Located 

    $user_authentication = "PASSWORD";
    $background_services = new SystemBlockChain( new BlockCells($user_authentication));
    #Signal Hashing Start 

    $x = rand(3,32);
    for ($i=0; $i < $x; $i++) { 
        $background_services->addBlock( new BlockCells($user_authentication.$background_services->chain[count($background_services->chain) - 1]->hash)); 
    }

    $background_services->addBlock( new BlockCells($user_authentication)); 
    #Signal Hashing End

    $closing_hash = $background_services->getLatestBlock();
    $closing_hash = $closing_hash->hash;  
    #Close The Hash 

    DebugBlockchain($background_services);
?>
```
## Example Output
```
Data: "PASSWORD"
Previous Hash: 
Hash: bf217b68e9cf33287fa9e5301812fe0f2c922c8c58860f5535f43ed52b03f7da

Data: "PASSWORDbf217b68e9cf33287fa9e5301812fe0f2c922c8c58860f5535f43ed52b03f7da"
Previous Hash: bf217b68e9cf33287fa9e5301812fe0f2c922c8c58860f5535f43ed52b03f7da
Hash: 7c882349c31d08f619893e25617f24b22fed01b273e9bf16c9ba3614f43e6318

Data: "PASSWORD7c882349c31d08f619893e25617f24b22fed01b273e9bf16c9ba3614f43e6318"
Previous Hash: 7c882349c31d08f619893e25617f24b22fed01b273e9bf16c9ba3614f43e6318
Hash: 9dd4ac3a1ab5552d0c13731b5013c354c7c26b8fb03e11e034a4f01969769760

Data: "PASSWORD9dd4ac3a1ab5552d0c13731b5013c354c7c26b8fb03e11e034a4f01969769760"
Previous Hash: 9dd4ac3a1ab5552d0c13731b5013c354c7c26b8fb03e11e034a4f01969769760
Hash: b073f0552774707e75077243b01ac9b669680fd85abfb6e75bc08d7503e86b5a

Data: "PASSWORDb073f0552774707e75077243b01ac9b669680fd85abfb6e75bc08d7503e86b5a"
Previous Hash: b073f0552774707e75077243b01ac9b669680fd85abfb6e75bc08d7503e86b5a
Hash: 98dd655c0b5f28c2602101d308bcac490aa97279936854026f15603ee1022d52

Data: "PASSWORD"
Previous Hash: 98dd655c0b5f28c2602101d308bcac490aa97279936854026f15603ee1022d52
Hash: 43f34aa343523f670b21d1e8ed90edc8268c73998470ebd5bc02b35e41d25004

```
