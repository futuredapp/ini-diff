<?php

use IniDiff\IniDiff;
use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
  private $iniDiff;

  public function setUp()
  {
    $this->iniDiff = new IniDiff;
    $this->iniDiff->setTemplateFile(__DIR__ . '/fixtures/simple/template.ini');
    $this->iniDiff->setIniFile(__DIR__ . '/fixtures/simple/file.ini');
  }
  public function test()
  {
    $this->assertNull($this->iniDiff->diff());
  }
}