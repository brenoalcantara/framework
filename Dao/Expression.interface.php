<?php 

interface Expression {
	const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';

	public function mount();
}