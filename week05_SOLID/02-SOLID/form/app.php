<?php

use Form\{ComponentForm, NumberField, PasswordField, SubmitInput, TextField};

require_once __DIR__ . '/vendor/autoload.php';

$submit = new SubmitInput("submit", "Valider", "Valider");

$form = new ComponentForm(new SplObjectStorage, $submit);

$firstName = new TextField("fName", "Firstname", "");
$form->addToStorage($firstName);

$lastName = new TextField("lName", "Lastname", "");
$lastName->setClass(["test", "allo"]);
$form->addToStorage($lastName);

$age = new NumberField("age", "Age", "");
$age->setMin(18);
$age->setMax(130);
$form->addToStorage($age);

$password = new PasswordField("password", "Password", "", [], isRequired: true);
$form->addToStorage($password);

$form->displayForm();
