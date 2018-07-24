# Package pdf_exif

## Requirements
- You need to install library PDFLib[https://www.pdflib.com/], your PHP version >= 5.4

## Installation
- via composer : 
```
composer require duongnam99/pdf_exif
```

## Usage:
- Read pdf-file's information:
```
$read = new Read_pdf();
print_r($read->get_all());
print_r($read->getInfoByKey('Creator'));
print_r($read->getInfoByKey('Title'));
```