<?php

namespace WhatToWear\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class InicioController extends BaseController
{
  /**
   * Crea una nueva instancia de controlador.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Muestra la página principal.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      return view('todo.index');
  }
}
