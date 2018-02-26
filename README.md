# ini-diff
PHP library to compare INI file against a template

## Installation

```
composer require thefuntasty/ini-diff
```

## Usage

```
vendor/bin/ini-diff [template] [ini]
```

where `[ini]` is any INI file, which could be parsed via PHP `parse_ini_file` and `[template]` is a template ini file includes schema and regexps to compare with.

### Template
```
key1 = value1 # Exact match
key2 = '~^[a-zA-Z0-9_\-]+$~' # Regular expression match, must start and end with `~` character 
key3 = "~^(value3|value4)$~" # Another example of regular expression match
key4 = yes # Boolean support 
```
