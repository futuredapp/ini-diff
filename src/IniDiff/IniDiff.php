<?php

namespace IniDiff;

class IniDiff
{
  /**
   * @var array
   */
  private $template;

  /**
   * @var array
   */
  private $ini;

  /**
   * @throws IniDiffException
   */
  public function diff(): void
  {
    $this->diffArray(null, $this->template, $this->ini);
  }

  /**
   * @throws IniDiffException
   */
  private function diffArray($templateKey, $templateValue, $iniValue)
  {
    if (is_array($templateValue)) {
      foreach ($templateValue as $k => $v) {
        if (!array_key_exists($k, $iniValue)) {
          throw new IniDiffException(sprintf('Key `%s` is missing in ini file!' . PHP_EOL, $templateKey));
        }

        $this->diffArray($k, $v, $iniValue[$k]);
      }
    } elseif (is_string($templateValue)) {
      if (substr($templateValue, 0, 1) == '~') { // It's regular
        if (!preg_match($templateValue, $iniValue)) {
          throw new IniDiffException(sprintf('Key `%s` does not match regular `%s`!' . PHP_EOL, $templateKey,
            $templateValue));

        }
      } elseif ($templateValue != $iniValue) {
        throw new IniDiffException(sprintf('Key `%s` has invalid value (`%s` != `%s`)!' . PHP_EOL, $templateKey,
          $templateValue, $iniValue));
      }

    }
  }

  /**
   * @throws IniDiffException
   */
  public function setIniFile(string $iniFile)
  {
    if (!($this->ini = @parse_ini_file($iniFile))) {
      throw new IniDiffException(sprintf('Invalid ini file!' . PHP_EOL));
    }
  }

  /**
   * @throws IniDiffException
   */
  public function setTemplateFile(string $templateFile)
  {
    if (!($this->template = @parse_ini_file($templateFile))) {
      throw new IniDiffException(sprintf('Invalid template file!' . PHP_EOL));
    }
  }
}