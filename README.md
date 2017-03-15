[![Latest Version](https://img.shields.io/github/release/nakroma/cereal.svg?style=flat-square)](https://github.com/nakroma/cereal/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

# Cereal
Cereal generates random unique keys, for example as game or license keys.

## Usage
```php
use Nakroma\Cereal;

Cereal::generate();
// Output: B539-F8B7-943B-BAF5-82F6-CCF7-5ACB-B4A2
```

## Configuration
You can pass `Cereal::generate()` a bunch of options in an array, like this:
```php
Cereal::generate(['length' => 16, 'uppercase' => false]);
```
These are all the options you can use and their default values:
```php
length: 32 // Changes the length of the string
// 16 => D423-3332-2919-D000

delimiter: '-' // Changes the char between each chunk
// '@' => FDB2@4C41@C6DD@0B99@7FBD@ADF5@3345@058E

delimiterSpacing: 4 // Changes the chunk size after before each delimiter
// 8 => EA989521-282013EA-49B8D6CB-90DA28D8

uppercase: true // Changes if the string is upper or lower case
// false => c724-bbb9-b205-0995-d8b8-3d65-0e4d-6c3b

numbers: true // Enables the generation of numbers in the key
// false => VHUX-CDDE-CFFG-NKSC-SDEK-LFWX-OBCW-IOZC

chars: true // Enables the generation of chars in the key
// false => 7222-2371-3276-8402-7594-0803-3961-6800
```

## Installation
Run `composer require nakroma/cereal`