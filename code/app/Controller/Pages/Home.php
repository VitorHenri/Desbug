<?php
  namespace App\Controller\Pages;
  use \App\Utils\View;

  class Home extends Page{

    // método responsável por retornar o conteúdo (view) da Home
    public static function getHome(){

      // view da home
      $content = View::render('pages/home', [
        'header'  => self::getHeader(),
        'footer'  => self::getFooter()
      ]);

      // retornar a view da página
      return parent::getPage('Home | Desbug', $content);
    }

    // método responsável por renderizar o topo da página
    private static function getHeader(){
      return View::render('pages/header');
    }

    // método responsável por renderizar o rodapé da página
    private static function getFooter(){
      return View::render('pages/footer');
    }
  }
?>