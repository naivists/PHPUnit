<?php

require_once dirname(__FILE__) . '/../../classes/filefactory.class.php';
require_once dirname(__FILE__) . '/../../classes/grade.class.php';
require_once dirname(__FILE__) . '/../../classes/gradefile.class.php';
require_once dirname(__FILE__) . '/../../classes/rtfgradefile.class.php';
require_once dirname(__FILE__) . '/../../classes/pdfgradefile.class.php';
/**
 * Test class for FileFactory.
 * Generated by PHPUnit on 2012-02-26 at 20:45:23.
 */
class FileFactoryTest extends PHPUnit_Framework_TestCase {

    /**
     * @var FileFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
	$this->object = new FileFactory;

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
	unset($this->object);
    }

    /**
     * @covers FileFactory::GetFile
     */
    public function testGetRtfFile() {
	$file = $this->object->GetFile("Jānis Bērziņš", "rtf");
	$this->assertInstanceOf( "RtfGradeFile", $file);
    }
    
    /**
     * @covers FileFactory::GetFile
     * Gadījums, kad atgriež PDF failu, specifiski GetFile parametrā
     */
    public function testGetPdfFile(){
	$file = $this->object->GetFile("Jānis Bērziņš", "pdf");
	$this->assertInstanceOf("PdfGradeFile", $file);
    }
    /**
     * @covers FileFactory::GetFile 
     * Gadījums, kad GetFile netiek pateikts faila tips,
     * jāatgriež RTF
     */
    public function testGetFileDefault() {
	$file = $this->object->GetFile("Jānis Bērziņš");
	
	$this->assertInstanceOf( "RtfGradeFile", $file);
	
    }
    
    /**
     * @covers FileFactory::GetFile  
     */
    public function testParameterPass(){
	$file = $this->object->GetFile("Andris Bērziņš");
	
	
	$this->assertequals("Andris Bērziņš", $file->studentName);
	
	
    }

}

?>
