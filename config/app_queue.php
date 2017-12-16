<?php
	$config['Queue']['sleeptime'] = 10;
	$config['Queue']['gcprob'] = 10;
	$config['Queue']['workermaxruntime'] = 60;
	//Should a Workerprocess quit when there are no more tasks for it to execute (true = exit, false = keep running):
	$config['Queue']['exitwhennothingtodo'] = false; //
	