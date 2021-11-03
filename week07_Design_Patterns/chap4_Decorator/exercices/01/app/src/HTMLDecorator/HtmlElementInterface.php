<?php

namespace App\HTMLDecorator;


interface HtmlElementInterface
{
public function __toString();
public function getName();
}