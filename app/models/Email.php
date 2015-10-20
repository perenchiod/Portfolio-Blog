<?php

class Email extends Eloquent
{
    public static $rules = array(
	    'name'      => 'required|max:100',
	    'email'       => 'required|max:100',
	    'subject'       => 'required|max:100',
	    'message'       => 'required|max:10000'
	);
}
?>