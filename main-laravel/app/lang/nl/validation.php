<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "De :attribute moet geaccepteerd worden.",
	"active_url"           => "De :attribute is niet een geldig URL.",
	"after"                => "De :attribute moet een datum zijn na :date.",
	"alpha"                => "De :attribute mag alleen letters bevatten.",
        "alpha_spaces"         => "De :attribute mag alleen letters en spaties bevatten.",
	"alpha_dash"           => "De :attribute mag alleen letters, spaties en streepjes.",
	"alpha_num"            => "De :attribute mag alleen letters en nummers bevatten.",
	"array"                => "De :attribute moet een array zijn.",
	"before"               => "De :attribute moet een datum zijn voor :date.",
	"between"              => array(
		"numeric" => "De :attribute moet tussen :min en :max liggen.",
		"file"    => "De :attribute moet utssen :min en :max kilobytes groot zijn.",
		"string"  => "De :attribute moet tussen :min en :max karakters lang zijn.",
		"array"   => "De :attribute moet tussen :min en :max items bevatten.",
	),
	"confirmed"            => "De :attribute confirmatie matched niet.",
	"date"                 => "De :attribute is geen geldig datum.",
	"date_format"          => "De :attribute matched niet het formaat :format.",
	"different"            => "De :attribute en :other moeten verschillend zijn.",
	"digits"               => "De :attribute moet :digits cijfers lang zijn.",
	"digits_between"       => "De :attribute moet tussen :min en :max cijfers lang zijn.",
	"email"                => "De :attribute moet een geldig email-adres zijn.",
	"exists"               => "De geselecteerde :attribute is ongeldig.",
	"image"                => "De :attribute moet een afbeelding zijn.",
	"in"                   => "Het geselecteerde :attribute is ongeldig.",
	"integer"              => "De :attribute moet een nummer zijn.",
	"ip"                   => "Het :attribute moet een valide IP-adres zijn.",
	"max"                  => array(
		"numeric" => "De :attribute mag niet groter zijn dan :max.",
		"file"    => "De :attribute mag niet groter zijn dan :max kilobytes.",
		"string"  => "De :attribute mag niet groter zijn dan :max karakters.",
		"array"   => "De :attribute mag niet meer dan :max items bevatten.",
	),
	"mimes"                => "De :attribute moet van het volgende type zijn: :values.",
	"min"                  => array(
		"numeric" => "De :attribute moet op zijn minst :min zijn.",
		"file"    => "De :attribute moet op zijn minst :min kilobytes groot zijn.",
		"string"  => "De :attribute moet op zijn minst :min karakters lang zijn.",
		"array"   => "De :attribute moet op zijn minst :min items bevatten.",
	),
	"not_in"               => "De geselecteerde :attribute is ongeldig.",
	"numeric"              => "De :attribute moet een nummer zijn.",
	"regex"                => "De :attribute zijn formaat is ongeldig.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
