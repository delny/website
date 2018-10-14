<?php
  
  namespace Website\Model\Manager;
  
  
  class CalculManager
  {
    /**
     * Porte entrée calcul
     * @param $request - requête
     * @return array
     */
    public function calcul($request)
    {
      $scriptId = !empty($request['scriptid']) ? $request['scriptid'] : 0;
      if (empty($scriptId)) {
        return [
          'erreur' => 'erreur script',
        ];
      }
      $method = 'calculScript' . $scriptId;
      if (method_exists($this, $method)) {
        return $this->$method($request);
      } else {
        return [
          'erreur' => 'erreur script',
        ];
      }
    }
    
    /**
     * Script 1 - Décompose un nombre en facteurs de nombres premiers
     * @param $request
     * @return array
     */
    private function calculScript1($request)
    {
      $nombre = !empty($request['nombre']) ? $request['nombre'] : 0;
      return $this->decomposepremier($nombre);
    }
    
    /**
     * @param bool $nombre
     * @return array
     */
    private function decomposepremier($nombre = false)
    {
      if (empty($nombre)) {
        return [
          'erreur' => 'Il faut un nombre'
        ];
      }
      
      if (!is_numeric($nombre) || !is_int($nombre / 1)) {
        return [
          'erreur' => 'Il faut un nombre'
        ];
      }
      
      if (!is_numeric($nombre) || !is_int($nombre / 1)) {
        return [
          'erreur' => 'Il faut un nombre'
        ];
      }
      
      if ($nombre == 1) {
        return [
          'reponse' => 'Comme dit dans la remarque : <br> 1 n\'est pas consid&eacute;r&eacute; comme premier'
        ];
      }
      
      $n = ltrim($nombre, "0");
      
      $m = number_format($n, 0, ',', ' ');
      $i = 2;
      while ($n % $i != 0 AND $i < sqrt($n)) {
        $i++;
      }
      if ($i > sqrt($n)) {
        $reponse = 'Pas de d&eacute;composition : ' . $m . ' est premier';
      } else {
        $n = $n / $i;
        $liste[$i] = 1;
        $premier = FALSE;
        while (!$premier) {
          while ($n % $i != 0 AND $i < sqrt($n)) {
            $i++;
          }
          if ($i > sqrt($n)) {
            $premier = TRUE;
            if (array_key_exists($n, $liste)) {
              $liste[$n]++;
            } else {
              $liste[$n] = 1;
            }
          } else {
            $premier = FALSE;
            if (array_key_exists($i, $liste)) {
              $liste[$i]++;
            } else {
              $liste[$i] = 1;
            }
            $n = $n / $i;
          }
        }
        
        $result = '';
        $y = 0;
        foreach ($liste as $nombre => $puissance) {
          if ($y == 0) {
            if ($puissance == 1) {
              $result .= '' . $nombre . '';
            } else {
              $result .= '' . $nombre . '<sup>' . $puissance . '</sup>';
            }
            $y = 1;
          } else {
            if ($puissance == 1) {
              $result .= ' x ' . $nombre . '';
            } else {
              $result .= ' x ' . $nombre . '<sup>' . $puissance . '</sup>';
            }
          }
        }
        $reponse = 'La d&eacute;composition de ' . $m . ' est : <br />' . $m . ' = ' . $result . '';
      }
      return [
        'reponse' => $reponse
      ];
    }
    
    /**
     * Script 2 - Liste de nombres premiers autour d'un nombre
     * @param $request
     * @return array
     */
    private function calculScript2($request)
    {
      $nombre = !empty($request['nombre']) ? $request['nombre'] : 0;
      $combien = !empty($request['combien']) ? $request['combien'] : 0;
      $position = !empty($request['position']) ? $request['position'] : 0;
      return $this->listpremier($nombre, $position, $combien);
    }
    
    /**
     * @param $nombre
     * @param $position
     * @param $combien
     * @return array
     */
    private function listpremier($nombre, $position, $combien)
    {
      $a = ltrim($nombre, "0");
      $combien = (is_int($combien / 1)) ? $combien : 10;
      $combien = ($combien > 1) ? $combien : 1;
      $combien = ($combien < 100) ? $combien : 100;
      
      if (!is_numeric($a) || !is_int($a / 1)) {
        return [
          'erreur' => 'Il faut un nombre entier !!'
        ];
      }
      
      if ($a < 0) {
        return [
          'erreur' => 'Il faut un entier positif !!'
        ];
      }
      
      if ($position == 'av') {
        $count_av = $combien;
        $count_ap = 0;
      } elseif ($position == 'ap') {
        $count_av = 0;
        $count_ap = $combien;
      } else {
        if ($combien % 2 == 0) {
          $count_av = ($combien / 2);
          $count_ap = ($combien / 2);
        } else {
          $count_av = (($combien + 1) / 2);
          $count_ap = (($combien - 1) / 2);
        }
      }
      $liste_av = [];
      $liste_ap = [];
      // avant
      $count = 0;
      $n = $a - 1;
      while (($count < $count_av) AND ($n > 1)) {
        $i = 2;
        while ($n % $i != 0 AND $i < sqrt($n)) {
          $i++;
        }
        if ($i > sqrt($n)) {
          $count++;
          array_push($liste_av, $n);
          
        }
        $n = $n - 1;
      }
      // apres
      $count = 0;
      $n = $a + 1;
      while ($count < $count_ap) {
        $i = 2;
        while ($n % $i != 0 AND $i < sqrt($n)) {
          $i++;
        }
        if ($i > sqrt($n)) {
          $count++;
          array_push($liste_ap, $n);
        }
        $n = $n + 1;
      }
      $reponse = '';
      // liste avant
      $liste_av = array_reverse($liste_av);
      foreach ($liste_av as $nombre) {
        $reponse .= ' ' . $nombre . ' - ';
      }
      $reponse .= ' <span class="gras"> ' . $a . ' </span> ';
      // liste apres
      foreach ($liste_ap as $nombre) {
        $reponse .= ' - ' . $nombre . ' ';
      }
      return [
        'reponse' => $reponse
      ];
    }
    
    /**
     * Script 3 - Résoudre une équation ax²+bx+c = 0
     * @param $request
     * @return array
     */
    private function calculScript3($request)
    {
      $nombre1 = !empty($request['nombre1']) ? $request['nombre1'] : 0;
      $nombre2 = !empty($request['nombre2']) ? $request['nombre2'] : 0;
      $nombre3 = !empty($request['nombre3']) ? $request['nombre3'] : 0;
      
      return $this->solveEquation($nombre1, $nombre2, $nombre3);
    }
    
    /**
     * @param $a
     * @param $b
     * @param $c
     * @return array
     */
    private function solveEquation($a, $b, $c)
    {
      if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        return [
          'erreur' => 'Il faut trois nombres r&eacute;els!'
        ];
      }
      
      if ($a == 0 && $b == 0 && $c == 0) {
        $reponse = 'S = {&real;}';
      } elseif ($a == 0 && $b == 0 && $c != 0) {
        $reponse = 'S = {&Oslash;}';
      } elseif ($a == 0 && $b != 0) {
        $x = (-$c) / ($b);
        $reponse = 'S = {' . $x . '}';
      } else {
        $d = ($b * $b) - (4 * $a * $c);
        if ($d < 0) {
          $reponse = 'S = {&Oslash;}';
        } elseif ($d == 0) {
          $x = (-$b) / (2 * $a);
          $reponse = 'S = {' . $x . '}';
        } else {
          $x1 = (-$b - sqrt($d)) / (2 * $a);
          $x2 = (-$b + sqrt($d)) / (2 * $a);
          $reponse = 'S = {' . $x1 . ' , ' . $x2 . '}';
        }
      }
      return [
        'reponse' => $reponse
      ];
    }
    
    /**
     * Script 4 - Moyenne de nombre
     * @param $request
     * @return array
     */
    private function calculScript4($request)
    {
      $nombre = !empty($request['nombre']) ? $request['nombre'] : 0;
      
      return $this->average($nombre);
    }
    
    /**
     * @param $list
     * @return array
     */
    private function average($list)
    {
      $nombres = (explode("/", $list));
      $l = count($nombres);
      
      //calcul
      if ($l == 0) {
        return [
          'erreur' => 'Il faut au moins un nombre !'
        ];
      }
      $somme = 0;
      foreach ($nombres as $nombre) {
        $somme += $nombre;
      }
      
      $reponse = $somme / $l;
      return [
        'reponse' => $reponse
      ];
    }
    
    /**
     * Script 5 - Afficher les permiers termes d'une suite défini par récurrence
     * @param $request
     * @return array
     */
    private function calculScript5($request)
    {
      $a = !empty($request['a']) ? ltrim($request['a'], "0") : 0;
      $b = !empty($request['a']) ? ltrim($request['b'], "0") : 0;
      $c = !empty($request['a']) ? ltrim($request['c'], "0") : 0;
      $n = !empty($request['a']) ? ltrim($request['n'], "0") : 0;
      
      return $this->suite($a, $b, $c, $n);
    }
    
    /**
     * @param $a
     * @param $b
     * @param $c
     * @param $n
     * @return array
     */
    private function suite($a, $b, $c, $n)
    {
      if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c) || !is_numeric($n)) {
        return [
          'erreur' => 'Il faut trois nombres'
        ];
      }
      
      if ($n <= 0) {
        return [
          'erreur' => 'Il faut que le nombre de termes &agrave; afficher soit positif !'
        ];
      }
      
      if (!is_int($n / 1)) {
        return [
          'erreur' => 'Il faut que le nombre de termes &agrave; afficher soit entier !'
        ];
      }
      
      if ($n > 200) {
        return [
          'erreur' => 'Il faut que le nombre de termes &agrave; afficher soit raisonnable !'
        ];
      }
      
      if ($a == 0) {
        $reponse = 'La suite que vous avez d&eacutefini est constante  &agrave; partir de  n = 1 et <br />
		quelque soit l\'entier n > 0, U<sub>n</sub> = ' . $b . '';
      } elseif ($n == 1) {
        $reponse = 'il n\'y a pas besoin de demander pour conna&icirc;tre uniquement le premier terme, <br /> c\'est vous qui l\'avez d&eacutefini :';
        $U[1] = ($a * $c) + $b;
        $reponse .= 'U<sub>1</sub> = ' . $a . ' x ' . $c . ' + ' . $b . ' soit ' . $U[1] . '';
      } else {
        $reponse = 'Votre suite est d&eacute;fini par : <br /> U<sub>0</sub> = ' . $c . ' et U<sub>n+1</sub> = ' . $a . ' U<sub>n</sub> + ' . $b . '<br />';
        $reponse .= ' Voici les ' . $n . ' premiers termes de cette suite : <br />';
        $U[0] = $c;
        $i = 1;
        while ($i < $n + 1) {
          $U[$i] = $a * $U[$i - 1] + $b;
          $reponse .= 'U<sub>' . $i . '</sub> = ' . $U[$i] . '<br />';
          $i++;
        }
      }
      return [
        'reponse' => $reponse
      ];
    }
    
    /**
     * Script 6 - Suite de Fibonacci
     * @param $request
     * @return array
     */
    private function calculScript6($request)
    {
      $nombre = !empty($request['nombre']) ? $request['nombre'] : 0;
      return $this->fibonacci($nombre);
    }
    
    private function fibonacci($nombre)
    {
      $n = ltrim($_POST['nombre'], "0");
      
      if ($n < 0 || !is_numeric($n)) {
        return [
          'erreur' => 'Il faut un entier positif !!!'
        ];
      }
      
      if ($n == 0) {
        $reponse = 'F(0) = 0';
      } elseif ($n == 1) {
        $reponse = 'F(1) = 1<br />';
      } elseif ($n > 1480) {
        $reponse = 'F(' . $n . ') = INF ';
      } else {
        $F[0] = 0;
        $F[1] = 1;
        $i = 2;
        while ($i <= $n) {
          $F[$i] = $F[$i - 1] + $F[$i - 2];
          $i++;
        }
        $reponse = 'F(' . $n . ') = ' . $F[$n] . '';
      }
      return [
        'reponse' => $reponse
      ];
    }
    
  }
