<?php


namespace App\Service;


class MeteoService
{
    public function ApiCall($ville){


                   $cle = "a067a8ee67eb6deb93bb335a39868ca8";
                   $api = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$ville&units=metric&lang=fr&appid=$cle");
                   return  $json = json_decode($api);

//        }catch (\Exception $e){
//
//          echo "cette ville est introuvable ".$e->getMessage();
//        }
    }

}