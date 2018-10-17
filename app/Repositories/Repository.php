<?php

namespace App\Repositories;

interface Repository {
  function findAll();
  function getById(string $id);
  function create(mixed $input);
}
