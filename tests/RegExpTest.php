<?php

use IniDiff\IniDiff;
use PHPUnit\Framework\TestCase;

class RegExpTest extends TestCase
{
  private $iniDiff;

  public function setUp()
  {
    $this->iniDiff = new IniDiff;
    $this->iniDiff->setTemplateFile(__DIR__ . '/fixtures/regexp/template.ini');
    $this->iniDiff->setIniFile(__DIR__ . '/fixtures/regexp/file.ini');
  }
  public function test()
  {
    $this->assertNull($this->iniDiff->diff());
  }
}