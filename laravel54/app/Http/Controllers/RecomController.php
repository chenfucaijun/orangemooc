<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class RecomController extends Controller
{
    public  function  index(){

        $process = new Process('ps aux|grep http');
        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }
    }
}
