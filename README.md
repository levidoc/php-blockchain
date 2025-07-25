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
?>
```


