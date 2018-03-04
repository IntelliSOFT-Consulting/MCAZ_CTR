<?php
    // Seconds to sleep() when no executable job is found:
    $config['Queue']['sleeptime'] = 10;
    // Probability in percent of an old job cleanup happening:
    $config['Queue']['gcprob'] = 10;
    // Default timeout after which a job is requeued if the worker doesn't report back:
    $config['Queue']['defaultworkertimeout'] = 3600;
    // Default number of retries if a job fails or times out:
    $config['Queue']['defaultworkerretries'] = 3;
    // Seconds of running time after which the worker will terminate (0 = unlimited):
    // Warning: Do not use 0 if you are using a cronjob to permanantly start a new worker once in a while and if you do not exit on idle.
    $config['Queue']['workermaxruntime'] = 90;
    //Should a Workerprocess quit when there are no more tasks for it to execute (true = exit, false = keep running):
    $config['Queue']['exitwhennothingtodo'] = false; 
    // Minimum number of seconds before a cleanup run will remove a completed task (set to 0 to disable):
    $config['Queue']['cleanuptimeout'] = 4592000; // 30 days


    