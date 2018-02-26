<?php

use IniDiff\IniDiff;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
  private $iniDiff;

  public function setUp()
  {
    $this->iniDiff = new IniDiff;
    $this->iniDiff->setTemplateFile(__DIR__ . '/fixtures/array/template.ini');
    $this->iniDiff->setIniFile(__DIR__ . '/fixtures/array/file.ini');
  }
  public function test()
  {
    $this->assertNull($this->iniDiff->diff());
  }
}