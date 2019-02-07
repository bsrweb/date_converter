# Date Converter for Expression Engine

This plug-in is an Expression Engine v3-compatible update of the EE2 version of the Date/Time Convert plugin originally written by __Made by Hippo__:
http://www.madebyhippo.com/addon-shack/

## Usage

Example:

```
{exp:date_converter
	language="fr_FR.UTF-8"
	format="%e %B %Y"
	convert_entities="yes"
}
	{date_field}
{/exp:date_converter}
```

* The `language` parameter is dependent on the locales installed on your server. Use the command, `locale -a`, to see the full list of locales your server supports.
* __Important Note__: The `format` parameter uses variables in the strftime() PHP function and not EE's date formatting variables. Please see: http://php.net/manual/en/function.strftime.php to properly output your date and time variables.
* The `convert_entities` will use HTML entities; default is no.
