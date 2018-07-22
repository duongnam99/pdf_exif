<?php 
    namespace Read_pdf;
    
/**
 * summary
 */
class Read_pdf {
    /**
     * summary
     */
    private $p;
    private $readfile;
    private $output = array();
    public function __construct($path) {
        $this->p = new \PDFlib();
        # This means we must check return values of load_font() etc.
        $this->p->set_option("errorpolicy=return");
        $this->p->set_option("stringformat=utf8");
        $this->readfile = $this->p->open_pdi_document(realpath($path),"");
        if ($this->readfile == 0) {
            printf("Error: " . $this->p->get_errmsg());
        }
        $this->p->close_pdi_document($this->readfile);
    }
    public function set_key_info() {
        $count = $this->p->pcos_get_number($this->readfile, "length:/Info");
        for ($i=0; $i < $count; $i++) {
            $info = "type:/Info[" . $i . "]";
            $objtype = $this->p->pcos_get_string($this->readfile, $info);
            $info = "/Info[" . $i . "].key";
            $key = $this->p->pcos_get_string($this->readfile, $info);
    
            if ($objtype == "name" || $objtype == "string") {
                $info = "/Info[" . $i . "]";
                $this->output[$key] = $this->p->pcos_get_string($this->readfile,$info);
            } else {
                $info = "type:/Info[" . $i . "]";
                $this->output[$key] = $this->p->pcos_get_string($this->doc,$info);
            }
        }
    }
    public function get_all() {
        return $this->output;
    }

    public function getInfoByKey($key){
        if($key!==''){
            return $this->output[$key];
        }
    }
}

    // $a = new Read_pdf('nam.pdf');
    // echo '<pre>';
    // print_r($a->get_all());
?>