<?php

/**
 * Concatenate an array of files into a string
 *
 * @param $files
 * @return string
 */
function concatenateFiles($files)
{
    $buffer = '';

    foreach($files as $file) {
        $buffer .= file_get_contents(__DIR__ . '/' . $file);
    }

    return $buffer;
}

/**
 * @param $files
 * @return mixed|string
 */
function minifyCSS($files)
{
    
	$buffer = concatenateFiles($files);

    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    $buffer = str_replace(array("\r\n","\r","\n","\t",'  ','    ','     '), '', $buffer);
    $buffer = preg_replace(array('(( )+{)','({( )+)'), '{', $buffer);
    $buffer = preg_replace(array('(( )+})','(}( )+)','(;( )*})'), '}', $buffer);
    $buffer = preg_replace(array('(;( )+)','(( )+;)'), ';', $buffer);

    return header("Content-type: text/css; charset: UTF-8").$buffer;
}

/**
 * @param $files
 * @return mixed|string
 */
function minifyJS($files) {
    $buffer = concatenateFiles($files);

    $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);
    $buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);
    $buffer = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);

    return header("Content-type: application/javascript; charset: UTF-8").$buffer;
}

if(isset($_GET['f']) && isset($_GET['t'])){

	if($_GET['t']=='css'){
	
		$css = minifyCSS(array(
			'../css/'.$_GET['f'].'.css'
		));
		echo $css;
	}
	
	if($_GET['t']=='js'){
	
		$js = minifyJS(array(
			'../js/'.$_GET['f'].'.js'
		));
		echo $js;
	}	

}

