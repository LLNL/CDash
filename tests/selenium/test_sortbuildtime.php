<?php
//
// After including cdash_selenium_test_base.php, subsequent require_once calls
// are relative to the top of the CDash source tree
//
require_once(dirname(__FILE__).'/cdash_selenium_test_case.php');

class Example extends CDashSeleniumTestCase
{
  protected function setUp()
  {
    $this->browserSetUp();
  }

  public function testSortBuildTime()
  {
    $this->open($this->webPath."/index.php?project=InsightExample&date=2010-07-07");
    $this->click("sort13sort_14");
    try {
        $this->assertEquals("2010-07-07T08:22:56 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[1]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertEquals("2010-07-07T08:26:31 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[2]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertEquals("2010-07-07T08:26:31 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[3]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("sort13sort_14");
    try {
        $this->assertEquals("2010-07-07T08:26:31 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[1]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertEquals("2010-07-07T08:26:31 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[2]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    try {
        $this->assertEquals("2010-07-07T08:22:56 EDT", $this->getText("//table[@id='project_5_13']/tbody[1]/tr[3]/td[15]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>