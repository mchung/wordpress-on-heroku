<?php

class WPCF7_Pipe {

	var $before = '';
	var $after = '';

	function WPCF7_Pipe( $text ) {
		$pipe_pos = strpos( $text, '|' );
		if ( false === $pipe_pos ) {
			$this->before = $this->after = trim( $text );
		} else {
			$this->before = trim( substr( $text, 0, $pipe_pos ) );
			$this->after = trim( substr( $text, $pipe_pos + 1 ) );
		}
	}
}

class WPCF7_Pipes {

	var $pipes = array();

	function WPCF7_Pipes( $texts ) {
		if ( ! is_array( $texts ) )
			return;

		foreach ( $texts as $text ) {
			$this->add_pipe( $text );
		}
	}

	function add_pipe( $text ) {
		$pipe = new WPCF7_Pipe( $text );
		$this->pipes[] = $pipe;
	}

	function do_pipe( $before ) {
		foreach ( $this->pipes as $pipe ) {
			if ( $pipe->before == $before )
				return $pipe->after;
		}
		return $before;
	}

	function collect_befores() {
		$befores = array();

		foreach ( $this->pipes as $pipe ) {
			$befores[] = $pipe->before;
		}

		return $befores;
	}

	function zero() {
		return empty( $this->pipes );
	}

	function random_pipe() {
		if ( $this->zero() )
			return null;

		return $this->pipes[array_rand( $this->pipes )];
	}
}

?>