<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 31-01-18
 * Time: 17:54
 */

/**
 * @param string $label
 * @param string $name
 * @return null
 */

function getTextField(string $label, string $name) {
	if ($label!="" && $name!="") {
		return "<div class=\"input-group mb-3\">
				<div class=\"input-group-prepend\">
					<span class=\"input-group-text\" id=\"inputGroup-sizing-default\">".$label.": </span>
				</div>
				<input type=\"text\" class=\"form-control\" aria-label=\"".$label.": \" aria-describedby=\"inputGroup-sizing-default\" name=\"".$name."\" title=\"".$label."\" placeholder=\"Enter text here !\">
			</div>";
	}
	else {
		return "";
	}
}

function getTextarea(string $label, string $name, int $rows) {
	if ($label!="" && $name!="") {
		return "<div class=\"input-group mb-3\">
				<div class=\"input-group-prepend\">
					<span class=\"input-group-text\" id=\"inputGroup-sizing-default\">".$label.": </span>
				</div>
				<textarea rows=\"".$rows."\" class=\"form-control\" aria-label=\"".$label."\" name=\"".$name."\" title=\"".$label."\" placeholder=\"Enter text here !\"></textarea>

			</div>";
	}
	else {
		return "";
	}
}