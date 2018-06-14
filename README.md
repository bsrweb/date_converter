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

* The 'language' peramater is dependent on the locales installed on your server. Use the commane, `locale -a`, to see the full list.
* The 'format' parameter is uses variables in the strftime() PHP function.
* The 'convert_entities' will use HTML entities; default is no.
