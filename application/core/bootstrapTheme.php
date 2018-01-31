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
	if ($label!="" && $name!="" && $rows>0) {
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

function getCheckBox(string $label, string $name) {
	if ($label!="" && $name!="") {
		return "<div class=\"form-check form-check-inline\">
				<input type=\"checkbox\" name=\"".$name."\" title=\"".$label."\" class=\"form-check-input\">
				<label for=\"".$name."\" class=\"for-check-label\">".$label." ?</label>
			</div>";
	}
	else {
		return "";
	}
}
