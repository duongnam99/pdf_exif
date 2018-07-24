<?php 
  use duongnam99\ReadPDF\ReadPDF;
  use PHPUnit\Framework\TestCase;
  // require_one('ReadPDF.php');
  include 'src/ReadPDF.php';
class ReadPDFTest extends TestCase {

    public function testGetPDFTrue(){
        $p = new ReadPDF('tests/source/clone_pdfa.pdf');
        $this->assertSame(true,method_exists($p, 'get_all'));
    }
    public function testget_all(){
        $arr = array();
        $p = new ReadPDF('tests/source/clone_pdfa.pdf');
        $this->assertSame(['Title'=>"clone_pdfa",
                            'Creator'=>"PDFlib Cookbook",
                            'CreationDate'=>"D:20170807092916+02'00'",
                            'ModDate'=> "D:20170807092916+02'00'",
                            'Producer'=>"PDFlib Personalization Server 9.1.1 (JDK 1.8/Linux-x86_64)"
                            ],$p->get_all());
    }
    public function testgetInfoByKey(){
        $arr = array();
        $p = new ReadPDF('tests/source/clone_pdfa.pdf');
        $this->assertSame('clone_pdfa',$p->getInfoByKey('Title'));
        $this->assertSame('PDFlib Cookbook',$p->getInfoByKey('Creator'));
        $this->assertSame("D:20170807092916+02'00'",$p->getInfoByKey('CreationDate'));
        $this->assertSame("D:20170807092916+02'00'",$p->getInfoByKey('ModDate'));
        $this->assertSame("PDFlib Personalization Server 9.1.1 (JDK 1.8/Linux-x86_64)",$p->getInfoByKey('Producer'));
    }
  }
?>