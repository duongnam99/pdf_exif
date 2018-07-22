<?php 
  namespace Read_pdfTest;

  use PHPUnit\Framework\TestCase;
  use Read_pdf\Read_pdf;
  /**
   * summary
   */
class Read_pdfTest extends TestCase {
    public function testGetPDFTrue(){
        $p = new Read_pdf('tests/source/nam.pdf');
        $this->assertSame(true,method_exists($p, 'get_all'));

    }
    public function testgetAllInfo(){
        $arr = array();
        $p = new Read_pdf('tests/source/nam.pdf');
        $this->assertSame(['Title'=>"Microsoft Word - CTDT 2009 - Vien CNTT-TT-1.doc",
                            'Author'=>"KhangTD",
                            'Creator'=>"PScript5.dll Version 5.2.2",
                            // 'CreationDate'=>"D:20180509100339+07'00'",
                            'Producer'=>"Acrobat Distiller 6.0 (Windows)"
                            ],$p->get_all());
    }
     public function testgetInfoByKey(){
        $arr = array();
        $p = new Read_pdf('tests/source/nam.pdf');
        $this->assertSame('Microsoft Word - CTDT 2009 - Vien CNTT-TT-1.doc',$p->getInfoByKey('Title'));
        $this->assertSame('KhangTD',$p->getInfoByKey('Author'));
        $this->assertSame('PScript5.dll Version 5.2.2',$p->getInfoByKey('Creator'));
        // $this->assertSame("D:20180509100339+07'00'",$p->getInfoByKey('CreationDate'));
    }
  }
 ?>