<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(PATH_THIRD . 'date_converter/addon.setup.php');

$plugin_info = array (
	'pi_author' => DATE_CONVERTER_AUTHOR,
	'pi_author_url' => DATE_CONVERTER_AUTHOR_URL,
	'pi_description' => DATE_CONVERTER_DESC,
	'pi_name' => DATE_CONVERTER_NAME,
	'pi_version' => DATE_CONVERTER_VER,
	'pi_usage' => DATE_CONVERTER::usage()
);

class Date_converter
{
	public $return_data = "";

	public function __construct()
	{
		$language = ee()->TMPL->fetch_param('language');
		$format = ee()->TMPL->fetch_param('format');
		$convert_html = ee()->TMPL->fetch_param('convert_entities','no');

		$olddate = ee()->TMPL->tagdata;

		if ( ! is_numeric($olddate)) $olddate = strtotime($olddate);

		setlocale(LC_ALL, $language);
		$translation = get_html_translation_table(HTML_ENTITIES);
		$newdate = strftime($format,$olddate);

		if ($convert_html=="yes")
		{
			$newdate = strtr($newdate, $translation);
		}

		$this->return_data = $newdate;
	}


	public static function usage()
	{
		ob_start();

		?>
		Based on the EE2 'Date/Time Converter' plugin from Made by Hippo. Thanks Carl!
		http://www.madebyhippo.com/addon-shack/'

		Tag pair:

		{exp:date_converter
			language=""
			format=""
			convert_entities="yes|no"
		}
			{date_field}
		{/exp:date_converter}

		Pass the appropriate Language reference into the language parameter.
			* fr_FR : French
			* es_ES : Spanish
			* nl_NL : Dutch

		Language support is dependent on what Locales are installed on your server. You can check this by running 'locale -a' from a terminal window.

		Default date and time format is usually "%A %e %B %Y", however, review http://php.net/manual/en/function.strftime.php for full details on formatting

		<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.date_converter.php */
/* Location: ./system/user/addons/date_converter/pi.date_converter.php */
