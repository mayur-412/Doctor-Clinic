<?php

class Clinic_Navwalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= "\n<ul>\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= "</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes, true );

		$class_names = $has_children ? 'dropdown' : '';

		$output .= '<li class="' . esc_attr( $class_names ) . '">';
		$output .= '<a href="' . esc_url( $item->url ) . '">';

		if ( $has_children ) {
			$output .= '<span>' . esc_html( $item->title ) . '</span> <i class="bi bi-chevron-down toggle-dropdown"></i>';
		} else {
			$output .= esc_html( $item->title );
		}

		$output .= '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}