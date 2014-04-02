<?php

class NS_Name_Parser
{
	/**
	 * Lists of titles / prefixes / suffixes to be used for parsing.
	 */
	private static $titles = array(
		'dr', 'miss', 'mr', 'mrs', 'ms', 'judge'
	);
	private static $prefixes = array(
		'bar',  'ben', 'bin', 'da', 'dal', 'de', 'del', 'der', 'den', 'di',
		'e', 'ibn', 'la', 'le', 'san', 'st', 'ste', 'van', 'vel', 'von'
	);
	private static $suffixes = array(
		'esq', 'esquire', 'jr', 'sr', '2', 'ii', 'iii', 'iv'
	);

	/**
	 * Parse a given name string
	 *
	 * @params string $name Full name to be parsed
	 * @return array containing any of the item parts we were able to parse.
	 */
	public static function parse( $name ) {
		list( $nickname, $name ) = self::extract( self::get_nickname_re(), $name );
		list( $suffix, $name ) = self::extract( self::get_suffix_re(), $name );

		// flip at comma
		$name = implode(' ', array_reverse( explode( ',', $name, 2 ) ) );

		list( $last, $name ) = self::extract( self::get_last_re(), $name );
		list( $title, $name ) = self::extract( self::get_title_re(), $name );
		list( $initial, $name ) = self::extract( self::get_initial_re(), $name );
		list( $first, $name ) = self::extract( self::get_first_re(), $name );
		$middle = trim($name);

		// fix case
		$title = self::fix_case( $title );
		$initial = strtoupper( $initial );
		$first = self::fix_case( $first );
		$nickname = self::fix_case( $nickname );
		$middle = self::fix_case( $middle );
		$last = self::fix_last_case( $last );
		$suffix = self::fix_suffix_case( $suffix );

		return compact( 'title', 'initial', 'first', 'nickname', 'middle', 'last', 'suffix' );
	}

	/**
	 * Use a regex to extract a string from another string.
	 *
	 * @param string $re Regexp string.
	 * @param string $string String to extract from.
	 * @return array(string, string) Matched item and the remaining string once
	 *  the matched item has been removed.
	 */
	private static function extract( $re, $string ) {
		if ( 3 == count( $parts = preg_split( $re, $string, 2, PREG_SPLIT_DELIM_CAPTURE ) ) ) {
			return array( trim( $parts[1] ), trim( "{$parts[0]} {$parts[2]}" ) );
		} else {
			return array( '', $string );
		}
	}

	/**
	 * Build regexps.
	 */
	private static function get_nickname_re() {
		return '/\s(?:[\(\'"]+(.+?)[\)\'"]+)\s/ui';
	}
	private static function get_last_re() {
		return sprintf( '/(?!^)\b((?:(?:\S+\sy|%s)\s)*\S+)$/ui', implode( '|', self::$prefixes ) );
	}
	private static function get_suffix_re() {
		return sprintf( '/,*\s((?:%s).*)/ui', implode( '|', self::$suffixes ) );
	}
	private static function get_title_re() {
		return sprintf( '/^(%s)\s+/ui', implode( '|', self::$titles ) );
	}
	private static function get_initial_re() {
		return '/^(\w[\.\s]+)(?=\w{2})/ui';
	}
	private static function get_first_re() {
		return '/^(\S+)/ui';
	}

	/**
	 * Fix name case.
	 */
	public static function fix_case( $name ) {
		return ucwords( strtolower( $name ) );
	}
	public static function fix_last_case( $last ) {
		$last = strtolower( $last );
		// uppercase any letter after a '
		$last = implode( "'", array_map( 'ucwords', explode( "'", $last ) ) );
		// uppercase MacName or McName
		return implode( '', array_map( 'ucwords',
			preg_split( '/(?:(?:^|s)(ma?c))/ui', $last, 0, PREG_SPLIT_DELIM_CAPTURE ) ) );
	}
	public static function fix_suffix_case( $suffix ) {
		// if it looks like a roman numeral, uppercase it
		if ( preg_match( '/^[iv]+$/ui', $suffix ) ) {
			return strtoupper( $suffix );
		}
		return self::fix_case( $suffix );
	}
}
