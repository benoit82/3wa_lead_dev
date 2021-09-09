<?php

use Form\ComponentForm;
use Form\NumberField;
use Form\PasswordField;
use Form\SubmitInput;
use Form\TextField;

require_once __DIR__ . '/vendor/autoload.php';

$submit = new SubmitInput("submit", "Valider", "Valider", "btnSubmit");

$form = new ComponentForm(new SplObjectStorage, $submit);

$firstName = new TextField("fName", "Firstname", "", "fNameField");
$form->addToStorage($firstName);

$lastName = new TextField("lName", "Lastname", "", "lNameField");
$form->addToStorage($lastName);

$age = new NumberField("age", "Age", "", "ageField");
$age->setMin(18);
$age->setMax(130);
$form->addToStorage($age);

$password = new PasswordField("password", "Password", "", "passwordField", [], isRequired: true);
$form->addToStorage($password);

$form->displayForm();
