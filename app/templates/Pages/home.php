<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Monitoring KW';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <div class="container text-center">
            <a href="https://kw21.g12.pw//" target="_blank" rel="noopener">
                <img alt="Logo" src="https://www.svgrepo.com/show/343871/select-product-ecommerce-item.svg"
                    width="350" />
            </a>
            <h1>
                Monitoring KW - panel administratora
            </h1>
        </div>
    </header>
    <main class="main">
        <style>
            a.button{
             display:inline-block;
             padding:0.3em 1.2em;
             margin:0 0.3em 0.3em 0;
             border-radius:2em;
             box-sizing: border-box;
             text-decoration:none;
             font-family:'Roboto',sans-serif;
             font-weight:300;
             color:#FFFFFF;
             background-color:#4eb5f1;
             text-align:center;
             transition: all 0.2s;
            }
            a.button:hover{
             background-color:#4095c6;
            }
            @media all and (max-width:30em){
             a.button{
              display:block;
              margin:0.2em auto;
             }
            }
        </style>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="column">
                            <td align="center">
                                <?php echo $this->Html->link("Dodaj klienta", array('controller' => 'clients','action'=> 'add'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Dodaj CSV klienta", array('controller' => 'getrecords','action'=> 'addcsvtwo'), array( 'class' => 'button'))?>
                            <?php //echo $this->Html->link("Sprawdź zmiany własności", array('controller' => 'changeKw','action'=> 'index'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Zobacz wpisy ksiąg wieczystych", array('controller' => 'getrecords','action'=> 'index'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Wygeneruj raport dla klienta", array('controller' => 'changeKw','action'=> 'generatereport'), array( 'class' => 'button'))?>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="column">
                            <td align="center">
                            Instrukcje użycia:
                            <br>   
                            <ol>
                                <li>Dodaj nowego klienta</li>
                                <li>Dodaj plik .csv z księgami, które klient chce obserwować (z nieoznaczonymi tabelami w kolejności: 'Region', 'Numer księgi', 'Cyfra kontrolna')</li>
                                <li>Wygeneruj raport gdy sprawdzanie ksiąg się zakończy</li>
                            </ol>
  
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
