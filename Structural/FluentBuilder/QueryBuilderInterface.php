<?php

namespace Structural\FluentBuilder;

interface QueryBuilderInterface
{
    public function select(array $fields): self;
    public function from(string $table, string $alias): self;
    public function where(array $conditions): self;
}
