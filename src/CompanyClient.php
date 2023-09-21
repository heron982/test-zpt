<?php

use Company\Company;

class CompanyClient extends Company
{
    protected int $id;
    private int $registration;

    public function greetings() {
		return "Greetings. Your ID is $this->id\n Your REGISTRATION is $this->registration";
	}
}